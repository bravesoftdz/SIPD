<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_Controller {
		/**
		 * @author : Afes Oktavianus
		 * @web : -
		 * @keterangan : Controller untuk halaman Login
		 **/
	    public function __construct()
	    {
	        parent::__construct();	
	        $this->load->library(array('pagination','Grocery_crud'));        	       
	        $this->load->model('m_user');
	    }
	    	    
	    public function index() {
			/**
			* @return function for index with grocery crud
			* @since 2016-03-20
			* @see SIPD V.1.0
			*/
			try {
				$this->config->set_item('grocery_crud_dialog_forms',true);
				$this->config->set_item('grocery_crud_default_per_page',10);
				
				$crud = new Grocery_CRUD();
				$crud->set_theme('flexigrid');  /*memilih theme UI yang ingin digunakan*/
				$crud->set_table('sipd_users');
				$crud->columns('email','username','first_name','last_name','company','phone');
				$crud->add_fields('ip_address','email','username','password','salt','first_name','last_name','company','phone');
				$crud->edit_fields('email','username','password','salt','first_name','last_name','company','phone');
				$crud->set_subject('Users');
				$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/")));
				//$crud->set_crud_url_path(site_url('user/index/'));
				$output = $crud->render();
								 
				$this->load->view('template/header',$output);
		        $this->load->view('template/sidebar');         
		        $this->load->view('admin/user/list',$output);         
		        $this->load->view('template/footer'); 
			} catch(Exception $e) {
				 /*penanganan bila ada error*/ 
				$this->grocery_exceptions->show_error($e->getMessage(), $e->getTraceAsString());
			}
			  
			//$this->load->view('',$output);
		}
			
						
		 
	    public function index2()
	    {	
	    	$limit=$this->config->item('limit_data');
	    	//pagination settings
	        $config['base_url'] = site_url('user/');
	        $config['total_rows'] = $this->m_user->total_rows('sipd_users');
	        $config['per_page'] = $limit;
	        $config["uri_segment"] = 3;
	        $choice = $config["total_rows"]/$config["per_page"];
	        $config["num_links"] = floor($choice);

	        // integrate bootstrap pagination
	        $config['full_tag_open'] = '<ul class="pagination pagination-sm inline">';
	        $config['full_tag_close'] = '</ul>';
	        $config['first_link'] = false;
	        $config['last_link'] = false;
	        $config['first_tag_open'] = '<li>';
	        $config['first_tag_close'] = '</li>';
	        $config['prev_link'] = '«';
	        $config['prev_tag_open'] = '<li class="prev">';
	        $config['prev_tag_close'] = '</li>';
	        $config['next_link'] = '»';
	        $config['next_tag_open'] = '<li>';
	        $config['next_tag_close'] = '</li>';
	        $config['last_tag_open'] = '<li>';
	        $config['last_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '<li class="active"><a href="#">';
	        $config['cur_tag_close'] = '</a></li>';
	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';
	        
	        $this->pagination->initialize($config);

	        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        
	        // get user list
	        $data['userlist'] = $this->m_user->getUsers($config["per_page"], $data['page'], NULL);
	        
	        $data['paging'] = $this->pagination->create_links();
	    	 
	    	$this->load->view('template/header');
	        $this->load->view('template/sidebar');         
	        $this->load->view('admin/user/list',$data);         
	        $this->load->view('template/footer');         
	    }  
	    
	    // Untuk Searching
	    public function search() {
	    	// get limit page for pagination
	    	$limit=$this->config->item('limit_data');
	    	
			// get search string
	        $search = ($this->input->post("user_name"))? $this->input->post("user_name") : "NIL";

	        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

	        // pagination settings
	        $config = array();
	        $config['base_url'] = site_url("user/search/$search");
	        $config['total_rows'] = $this->m_user->getCounts($search);
	        $config['per_page'] = $limit;
	        $config["uri_segment"] = 4;
	        $choice = $config["total_rows"]/$config["per_page"];
	        $config["num_links"] = floor($choice);

	        // integrate bootstrap pagination
	        $config['full_tag_open'] = '<ul class="pagination pagination-sm inline">';
	        $config['full_tag_close'] = '</ul>';
	        $config['first_link'] = false;
	        $config['last_link'] = false;
	        $config['first_tag_open'] = '<li>';
	        $config['first_tag_close'] = '</li>';
	        $config['prev_link'] = 'Prev';
	        $config['prev_tag_open'] = '<li class="prev">';
	        $config['prev_tag_close'] = '</li>';
	        $config['next_link'] = 'Next';
	        $config['next_tag_open'] = '<li>';
	        $config['next_tag_close'] = '</li>';
	        $config['last_tag_open'] = '<li>';
	        $config['last_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '<li class="active"><a href="#">';
	        $config['cur_tag_close'] = '</a></li>';
	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';
	        $this->pagination->initialize($config);

	        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
	        // get user list
	        $data['userlist'] = $this->m_user->getUsers($config['per_page'], $data['page'], $search);

	        $data['pagination'] = $this->pagination->create_links();

	        $this->load->view('template/header');
	        $this->load->view('template/sidebar');         
	        $this->load->view('admin/user/list',$data);         
	        $this->load->view('template/footer');
		}
		
		// Untuk Sorting Desc
		public function sort()
	    {	
	    	
	    	// get sort string
	        $sort = ($this->input->post("sorts"))? $this->input->post("sorts") : "NIL";			

	    	$limit=$this->config->item('limit_data');
	    	//pagination settings
	        $config['base_url'] = site_url('user/');
	        $config['total_rows'] = $this->m_user->total_rows('sipd_users');
	        $config['per_page'] = $limit;
	        $config["uri_segment"] = 3;
	        $choice = $config["total_rows"]/$config["per_page"];
	        $config["num_links"] = floor($choice);

	        // integrate bootstrap pagination
	        $config['full_tag_open'] = '<ul class="pagination pagination-sm inline">';
	        $config['full_tag_close'] = '</ul>';
	        $config['first_link'] = false;
	        $config['last_link'] = false;
	        $config['first_tag_open'] = '<li>';
	        $config['first_tag_close'] = '</li>';
	        $config['prev_link'] = '«';
	        $config['prev_tag_open'] = '<li class="prev">';
	        $config['prev_tag_close'] = '</li>';
	        $config['next_link'] = '»';
	        $config['next_tag_open'] = '<li>';
	        $config['next_tag_close'] = '</li>';
	        $config['last_tag_open'] = '<li>';
	        $config['last_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '<li class="active"><a href="#">';
	        $config['cur_tag_close'] = '</a></li>';
	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';
	        
	        $this->pagination->initialize($config);

	        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        
	        // get user list
	        $data['userlist'] = $this->m_user->getSortUsers($config["per_page"], $data['page'], NULL, $sort);
	        
	        $data['paging'] = $this->pagination->create_links();
	    	 
	    	$this->load->view('template/header');
	        $this->load->view('template/sidebar');         
	        $this->load->view('admin/user/list',$data);         
	        $this->load->view('template/footer');         
	    }  
	    
	    public function add() {
			$cek = $this->session->userdata('logged_in');
			if(!empty($cek))
			{
				$d['judul'] = 'SIM - '.$this->config->item('nama_perusahaan');
				$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
				$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
				$d['lisensi'] = $this->config->item('lisensi_app');
				
				$bc['menu'] = $this->load->view('app/menu', '', true);
				$bc['bio'] = $this->load->view('app/bio', $bc, true);
				$bc['jdl'] = "Tambah";
				
				$bc['kode_barang'] = $this->app_model->getMaxKodeBarang();
				$bc['nama_barang'] = "";
				$bc['stok'] = "";
				$bc['harga_barang'] = "";
				$bc['keterangan'] = "";
				$bc['stts'] = "tambah";
				
				$this->load->view('barang/bg_input_barang',$bc);
			}
			else
			{
				$st = $this->session->userdata('stts');
				if($st=='admin')
				{
					header('location:'.base_url().'app');
				}
				else
				{
					header('location:'.base_url().'front');
				}
			}
		}
    }
    


/* End of file User.php */
/* Location: ./application/controllers/User.php */
    