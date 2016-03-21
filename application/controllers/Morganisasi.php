<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Morganisasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Morganisasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'morganisasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'morganisasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'morganisasi/index.html';
            $config['first_url'] = base_url() . 'morganisasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Morganisasi_model->total_rows($q);
        $morganisasi = $this->Morganisasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'morganisasi_data' => $morganisasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('morganisasi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Morganisasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Kode' => $row->Kode,
		'UnitDescription' => $row->UnitDescription,
		'Level' => $row->Level,
		'ID' => $row->ID,
		'Unit' => $row->Unit,
		'Ket' => $row->Ket,
	    );
            $this->load->view('morganisasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('morganisasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('morganisasi/create_action'),
	    'Kode' => set_value('Kode'),
	    'UnitDescription' => set_value('UnitDescription'),
	    'Level' => set_value('Level'),
	    'ID' => set_value('ID'),
	    'Unit' => set_value('Unit'),
	    'Ket' => set_value('Ket'),
	);
        $this->load->view('morganisasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'UnitDescription' => $this->input->post('UnitDescription',TRUE),
		'Level' => $this->input->post('Level',TRUE),
		'ID' => $this->input->post('ID',TRUE),
		'Unit' => $this->input->post('Unit',TRUE),
		'Ket' => $this->input->post('Ket',TRUE),
	    );

            $this->Morganisasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('morganisasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Morganisasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('morganisasi/update_action'),
		'Kode' => set_value('Kode', $row->Kode),
		'UnitDescription' => set_value('UnitDescription', $row->UnitDescription),
		'Level' => set_value('Level', $row->Level),
		'ID' => set_value('ID', $row->ID),
		'Unit' => set_value('Unit', $row->Unit),
		'Ket' => set_value('Ket', $row->Ket),
	    );
            $this->load->view('morganisasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('morganisasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Kode', TRUE));
        } else {
            $data = array(
		'UnitDescription' => $this->input->post('UnitDescription',TRUE),
		'Level' => $this->input->post('Level',TRUE),
		'ID' => $this->input->post('ID',TRUE),
		'Unit' => $this->input->post('Unit',TRUE),
		'Ket' => $this->input->post('Ket',TRUE),
	    );

            $this->Morganisasi_model->update($this->input->post('Kode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('morganisasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Morganisasi_model->get_by_id($id);

        if ($row) {
            $this->Morganisasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('morganisasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('morganisasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('UnitDescription', 'unitdescription', 'trim|required');
	$this->form_validation->set_rules('Level', 'level', 'trim|required');
	$this->form_validation->set_rules('ID', 'id', 'trim|required');
	$this->form_validation->set_rules('Unit', 'unit', 'trim|required');
	$this->form_validation->set_rules('Ket', 'ket', 'trim|required');

	$this->form_validation->set_rules('Kode', 'Kode', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Morganisasi.php */
/* Location: ./application/controllers/Morganisasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-21 15:38:24 */
/* http://harviacode.com */