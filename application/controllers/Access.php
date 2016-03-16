<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {
	/**
	 * @author : Afes Oktavianus
	 * @web : -
	 * @keterangan : Controller untuk halaman Login
	 **/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }  
    
    public function index()
    {
    	$this->load->library('migration');
    	if (! $this->migration->current()) {
		 	echo 'Error' .	$this->migration->error_string();
		} else {			
		 	$this->load->view('template/header2');
         	$this->load->view('access/login');         			 	
		}
    }
    
    public function validate() {
        $this->form_validation->set_rules('usermail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('userpass', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('access/login');
        }else{
            redirect('welcome');
        }
    }
    
    public function logout() {
		$cek = $this->session->userdata('_is_logged_in');
		if(empty($cek))
		{
			header('location:'.base_url().'access');
		}
		else
		{
			$this->session->sess_destroy();
			header('location:'.base_url().'access');
		}
	}
}

/* End of file app.php */
/* Location: ./application/controllers/Access.php */