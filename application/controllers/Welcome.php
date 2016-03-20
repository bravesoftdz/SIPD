<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$crud = new Grocery_CRUD();
		$crud->set_theme('flexigrid');  /*memilih theme UI yang ingin digunakan*/
		$crud->set_table('sipd_users');
		$crud->columns('email','username','firs_name','last_name','company','phone');
		$crud->set_subject('Users');
		$output = $crud->render();
		$this->load->view('template/header',$output);
		$this->load->view('template/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('template/footer');
	}
}
