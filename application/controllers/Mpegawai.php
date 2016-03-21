<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mpegawai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mpegawai_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mpegawai/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mpegawai/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mpegawai/index.html';
            $config['first_url'] = base_url() . 'mpegawai/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mpegawai_model->total_rows($q);
        $mpegawai = $this->Mpegawai_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mpegawai_data' => $mpegawai,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('mpegawai_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mpegawai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'NIP' => $row->NIP,
		'Nama_Pegawai' => $row->Nama_Pegawai,
		'Jabatan' => $row->Jabatan,
		'Alamat' => $row->Alamat,
		'Kota' => $row->Kota,
		'NoTelp' => $row->NoTelp,
		'KC' => $row->KC,
	    );
            $this->load->view('mpegawai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mpegawai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mpegawai/create_action'),
	    'NIP' => set_value('NIP'),
	    'Nama_Pegawai' => set_value('Nama_Pegawai'),
	    'Jabatan' => set_value('Jabatan'),
	    'Alamat' => set_value('Alamat'),
	    'Kota' => set_value('Kota'),
	    'NoTelp' => set_value('NoTelp'),
	    'KC' => set_value('KC'),
	);
        $this->load->view('mpegawai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nama_Pegawai' => $this->input->post('Nama_Pegawai',TRUE),
		'Jabatan' => $this->input->post('Jabatan',TRUE),
		'Alamat' => $this->input->post('Alamat',TRUE),
		'Kota' => $this->input->post('Kota',TRUE),
		'NoTelp' => $this->input->post('NoTelp',TRUE),
		'KC' => $this->input->post('KC',TRUE),
	    );

            $this->Mpegawai_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mpegawai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mpegawai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mpegawai/update_action'),
		'NIP' => set_value('NIP', $row->NIP),
		'Nama_Pegawai' => set_value('Nama_Pegawai', $row->Nama_Pegawai),
		'Jabatan' => set_value('Jabatan', $row->Jabatan),
		'Alamat' => set_value('Alamat', $row->Alamat),
		'Kota' => set_value('Kota', $row->Kota),
		'NoTelp' => set_value('NoTelp', $row->NoTelp),
		'KC' => set_value('KC', $row->KC),
	    );
            $this->load->view('mpegawai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mpegawai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('NIP', TRUE));
        } else {
            $data = array(
		'Nama_Pegawai' => $this->input->post('Nama_Pegawai',TRUE),
		'Jabatan' => $this->input->post('Jabatan',TRUE),
		'Alamat' => $this->input->post('Alamat',TRUE),
		'Kota' => $this->input->post('Kota',TRUE),
		'NoTelp' => $this->input->post('NoTelp',TRUE),
		'KC' => $this->input->post('KC',TRUE),
	    );

            $this->Mpegawai_model->update($this->input->post('NIP', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mpegawai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mpegawai_model->get_by_id($id);

        if ($row) {
            $this->Mpegawai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mpegawai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mpegawai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nama_Pegawai', 'nama pegawai', 'trim|required');
	$this->form_validation->set_rules('Jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('Alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('Kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('NoTelp', 'notelp', 'trim|required');
	$this->form_validation->set_rules('KC', 'kc', 'trim|required');

	$this->form_validation->set_rules('NIP', 'NIP', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mpegawai.php */
/* Location: ./application/controllers/Mpegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-21 15:38:31 */
/* http://harviacode.com */