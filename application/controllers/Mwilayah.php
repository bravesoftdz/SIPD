<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mwilayah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mwilayah_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mwilayah/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mwilayah/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mwilayah/index.html';
            $config['first_url'] = base_url() . 'mwilayah/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mwilayah_model->total_rows($q);
        $mwilayah = $this->Mwilayah_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mwilayah_data' => $mwilayah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('mwilayah_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mwilayah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'WilayahID' => $row->WilayahID,
		'Nama' => $row->Nama,
		'Stat_' => $row->Stat_,
		'NamaKabupaten' => $row->NamaKabupaten,
		'NamaKecamatan' => $row->NamaKecamatan,
		'KodeKabupaten' => $row->KodeKabupaten,
		'KodeKecamatan' => $row->KodeKecamatan,
		'changed_by' => $row->changed_by,
		'Last_Modified' => $row->Last_Modified,
	    );
            $this->load->view('mwilayah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mwilayah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mwilayah/create_action'),
	    'WilayahID' => set_value('WilayahID'),
	    'Nama' => set_value('Nama'),
	    'Stat_' => set_value('Stat_'),
	    'NamaKabupaten' => set_value('NamaKabupaten'),
	    'NamaKecamatan' => set_value('NamaKecamatan'),
	    'KodeKabupaten' => set_value('KodeKabupaten'),
	    'KodeKecamatan' => set_value('KodeKecamatan'),
	    'changed_by' => set_value('changed_by'),
	    'Last_Modified' => set_value('Last_Modified'),
	);
        $this->load->view('mwilayah_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nama' => $this->input->post('Nama',TRUE),
		'Stat_' => $this->input->post('Stat_',TRUE),
		'NamaKabupaten' => $this->input->post('NamaKabupaten',TRUE),
		'NamaKecamatan' => $this->input->post('NamaKecamatan',TRUE),
		'KodeKabupaten' => $this->input->post('KodeKabupaten',TRUE),
		'KodeKecamatan' => $this->input->post('KodeKecamatan',TRUE),
		'changed_by' => $this->input->post('changed_by',TRUE),
		'Last_Modified' => $this->input->post('Last_Modified',TRUE),
	    );

            $this->Mwilayah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mwilayah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mwilayah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mwilayah/update_action'),
		'WilayahID' => set_value('WilayahID', $row->WilayahID),
		'Nama' => set_value('Nama', $row->Nama),
		'Stat_' => set_value('Stat_', $row->Stat_),
		'NamaKabupaten' => set_value('NamaKabupaten', $row->NamaKabupaten),
		'NamaKecamatan' => set_value('NamaKecamatan', $row->NamaKecamatan),
		'KodeKabupaten' => set_value('KodeKabupaten', $row->KodeKabupaten),
		'KodeKecamatan' => set_value('KodeKecamatan', $row->KodeKecamatan),
		'changed_by' => set_value('changed_by', $row->changed_by),
		'Last_Modified' => set_value('Last_Modified', $row->Last_Modified),
	    );
            $this->load->view('mwilayah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mwilayah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('WilayahID', TRUE));
        } else {
            $data = array(
		'Nama' => $this->input->post('Nama',TRUE),
		'Stat_' => $this->input->post('Stat_',TRUE),
		'NamaKabupaten' => $this->input->post('NamaKabupaten',TRUE),
		'NamaKecamatan' => $this->input->post('NamaKecamatan',TRUE),
		'KodeKabupaten' => $this->input->post('KodeKabupaten',TRUE),
		'KodeKecamatan' => $this->input->post('KodeKecamatan',TRUE),
		'changed_by' => $this->input->post('changed_by',TRUE),
		'Last_Modified' => $this->input->post('Last_Modified',TRUE),
	    );

            $this->Mwilayah_model->update($this->input->post('WilayahID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mwilayah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mwilayah_model->get_by_id($id);

        if ($row) {
            $this->Mwilayah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mwilayah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mwilayah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('Stat_', 'stat ', 'trim|required');
	$this->form_validation->set_rules('NamaKabupaten', 'namakabupaten', 'trim|required');
	$this->form_validation->set_rules('NamaKecamatan', 'namakecamatan', 'trim|required');
	$this->form_validation->set_rules('KodeKabupaten', 'kodekabupaten', 'trim|required');
	$this->form_validation->set_rules('KodeKecamatan', 'kodekecamatan', 'trim|required');
	$this->form_validation->set_rules('changed_by', 'changed by', 'trim|required');
	$this->form_validation->set_rules('Last_Modified', 'last modified', 'trim|required');

	$this->form_validation->set_rules('WilayahID', 'WilayahID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mwilayah.php */
/* Location: ./application/controllers/Mwilayah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-21 15:39:19 */
/* http://harviacode.com */