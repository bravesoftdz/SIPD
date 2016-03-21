<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Muser extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Muser_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'muser/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'muser/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'muser/index.html';
            $config['first_url'] = base_url() . 'muser/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Muser_model->total_rows($q);
        $muser = $this->Muser_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'muser_data' => $muser,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('muser_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Muser_model->get_by_id($id);
        if ($row) {
            $data = array(
		'userID' => $row->userID,
		'pass' => $row->pass,
		'Nm_user' => $row->Nm_user,
		'lnoaktif' => $row->lnoaktif,
	    );
            $this->load->view('muser_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('muser'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('muser/create_action'),
	    'userID' => set_value('userID'),
	    'pass' => set_value('pass'),
	    'Nm_user' => set_value('Nm_user'),
	    'lnoaktif' => set_value('lnoaktif'),
	);
        $this->load->view('muser_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pass' => $this->input->post('pass',TRUE),
		'Nm_user' => $this->input->post('Nm_user',TRUE),
		'lnoaktif' => $this->input->post('lnoaktif',TRUE),
	    );

            $this->Muser_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('muser'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Muser_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('muser/update_action'),
		'userID' => set_value('userID', $row->userID),
		'pass' => set_value('pass', $row->pass),
		'Nm_user' => set_value('Nm_user', $row->Nm_user),
		'lnoaktif' => set_value('lnoaktif', $row->lnoaktif),
	    );
            $this->load->view('muser_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('muser'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('userID', TRUE));
        } else {
            $data = array(
		'pass' => $this->input->post('pass',TRUE),
		'Nm_user' => $this->input->post('Nm_user',TRUE),
		'lnoaktif' => $this->input->post('lnoaktif',TRUE),
	    );

            $this->Muser_model->update($this->input->post('userID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('muser'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Muser_model->get_by_id($id);

        if ($row) {
            $this->Muser_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('muser'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('muser'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pass', 'pass', 'trim|required');
	$this->form_validation->set_rules('Nm_user', 'nm user', 'trim|required');
	$this->form_validation->set_rules('lnoaktif', 'lnoaktif', 'trim|required');

	$this->form_validation->set_rules('userID', 'userID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Muser.php */
/* Location: ./application/controllers/Muser.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-21 15:39:05 */
/* http://harviacode.com */