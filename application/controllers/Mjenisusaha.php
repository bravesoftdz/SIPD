<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mjenisusaha extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mjenisusaha_model');
        $this->load->library(array('form_validation','Grocery_crud'));
    }

    public function index()
    {
    	/*
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mjenisusaha/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mjenisusaha/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mjenisusaha/index.html';
            $config['first_url'] = base_url() . 'mjenisusaha/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mjenisusaha_model->total_rows($q);
        $mjenisusaha = $this->Mjenisusaha_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mjenisusaha_data' => $mjenisusaha,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        */
        try {
			$this->config->set_item('grocery_crud_dialog_forms',true);
			$this->config->set_item('grocery_crud_default_per_page',10);
			
			$crud = new Grocery_CRUD();
			
			$crud->set_theme('flexigrid');  /*memilih theme UI yang ingin digunakan*/
			
			$crud->set_table('sipd_mjenisusaha');
			$crud->columns('JUsahaID','Description');
			$crud->display_as('Usaha ID','Description');
			$crud->add_fields('JUsahaID','Description');
			$crud->edit_fields('JUsahaID','Description');
			$crud->set_subject('Jenis Usaha');
			$crud->order_by('JUsahaID','desc');
			
			$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/")));
			//$crud->set_crud_url_path(site_url('user/index/'));
			$output = $crud->render();
			
	        $this->load->view('template/header',$output);
	        //$this->load->view('template/header');
	        $this->load->view('template/sidebar');         
	        //$this->load->view('admin/user/list',$output);         
	        $this->load->view('admin/jenis_usaha/mjenisusaha_list', $output);
	        $this->load->view('template/footer');	
		} catch(Exception $e) {
			 /*penanganan bila ada error*/ 
			$this->grocery_exceptions->show_error($e->getMessage(), $e->getTraceAsString());
		}
    }

    public function read($id) 
    {
        $row = $this->Mjenisusaha_model->get_by_id($id);
        if ($row) {
            $data = array(
		'JUsahaID' => $row->JUsahaID,
		'Description' => $row->Description,
	    );
            $this->load->view('mjenisusaha_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mjenisusaha'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mjenisusaha/create_action'),
	    'JUsahaID' => set_value('JUsahaID'),
	    'Description' => set_value('Description'),
	);
        $this->load->view('mjenisusaha_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Description' => $this->input->post('Description',TRUE),
	    );

            $this->Mjenisusaha_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mjenisusaha'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mjenisusaha_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mjenisusaha/update_action'),
		'JUsahaID' => set_value('JUsahaID', $row->JUsahaID),
		'Description' => set_value('Description', $row->Description),
	    );
            $this->load->view('mjenisusaha_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mjenisusaha'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('JUsahaID', TRUE));
        } else {
            $data = array(
		'Description' => $this->input->post('Description',TRUE),
	    );

            $this->Mjenisusaha_model->update($this->input->post('JUsahaID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mjenisusaha'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mjenisusaha_model->get_by_id($id);

        if ($row) {
            $this->Mjenisusaha_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mjenisusaha'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mjenisusaha'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Description', 'description', 'trim|required');

	$this->form_validation->set_rules('JUsahaID', 'JUsahaID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mjenisusaha.php */
/* Location: ./application/controllers/Mjenisusaha.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-21 15:38:12 */
/* http://harviacode.com */