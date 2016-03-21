<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mrekening extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mrekening_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mrekening/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mrekening/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mrekening/index.html';
            $config['first_url'] = base_url() . 'mrekening/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mrekening_model->total_rows($q);
        $mrekening = $this->Mrekening_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mrekening_data' => $mrekening,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('mrekening_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mrekening_model->get_by_id($id);
        if ($row) {
            $data = array(
		'AkunID' => $row->AkunID,
		'Description' => $row->Description,
		'Stat_' => $row->Stat_,
		'DescriptionRekening' => $row->DescriptionRekening,
		'DescriptionSubject' => $row->DescriptionSubject,
		'DescriptionObject' => $row->DescriptionObject,
		'DescriptionDetail' => $row->DescriptionDetail,
		'RekeningID' => $row->RekeningID,
		'SubjectID' => $row->SubjectID,
		'ObjectID' => $row->ObjectID,
		'DetailID' => $row->DetailID,
		'Stat2_' => $row->Stat2_,
		'Stat21_' => $row->Stat21_,
		'StatRincian' => $row->StatRincian,
		'StatHitung' => $row->StatHitung,
		'Periode' => $row->Periode,
		'Prosen' => $row->Prosen,
		'HargaDasar' => $row->HargaDasar,
		'Satuan' => $row->Satuan,
		'_pajak' => $row->_pajak,
	    );
            $this->load->view('mrekening_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mrekening'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mrekening/create_action'),
	    'AkunID' => set_value('AkunID'),
	    'Description' => set_value('Description'),
	    'Stat_' => set_value('Stat_'),
	    'DescriptionRekening' => set_value('DescriptionRekening'),
	    'DescriptionSubject' => set_value('DescriptionSubject'),
	    'DescriptionObject' => set_value('DescriptionObject'),
	    'DescriptionDetail' => set_value('DescriptionDetail'),
	    'RekeningID' => set_value('RekeningID'),
	    'SubjectID' => set_value('SubjectID'),
	    'ObjectID' => set_value('ObjectID'),
	    'DetailID' => set_value('DetailID'),
	    'Stat2_' => set_value('Stat2_'),
	    'Stat21_' => set_value('Stat21_'),
	    'StatRincian' => set_value('StatRincian'),
	    'StatHitung' => set_value('StatHitung'),
	    'Periode' => set_value('Periode'),
	    'Prosen' => set_value('Prosen'),
	    'HargaDasar' => set_value('HargaDasar'),
	    'Satuan' => set_value('Satuan'),
	    '_pajak' => set_value('_pajak'),
	);
        $this->load->view('mrekening_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Description' => $this->input->post('Description',TRUE),
		'Stat_' => $this->input->post('Stat_',TRUE),
		'DescriptionRekening' => $this->input->post('DescriptionRekening',TRUE),
		'DescriptionSubject' => $this->input->post('DescriptionSubject',TRUE),
		'DescriptionObject' => $this->input->post('DescriptionObject',TRUE),
		'DescriptionDetail' => $this->input->post('DescriptionDetail',TRUE),
		'RekeningID' => $this->input->post('RekeningID',TRUE),
		'SubjectID' => $this->input->post('SubjectID',TRUE),
		'ObjectID' => $this->input->post('ObjectID',TRUE),
		'DetailID' => $this->input->post('DetailID',TRUE),
		'Stat2_' => $this->input->post('Stat2_',TRUE),
		'Stat21_' => $this->input->post('Stat21_',TRUE),
		'StatRincian' => $this->input->post('StatRincian',TRUE),
		'StatHitung' => $this->input->post('StatHitung',TRUE),
		'Periode' => $this->input->post('Periode',TRUE),
		'Prosen' => $this->input->post('Prosen',TRUE),
		'HargaDasar' => $this->input->post('HargaDasar',TRUE),
		'Satuan' => $this->input->post('Satuan',TRUE),
		'_pajak' => $this->input->post('_pajak',TRUE),
	    );

            $this->Mrekening_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mrekening'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mrekening_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mrekening/update_action'),
		'AkunID' => set_value('AkunID', $row->AkunID),
		'Description' => set_value('Description', $row->Description),
		'Stat_' => set_value('Stat_', $row->Stat_),
		'DescriptionRekening' => set_value('DescriptionRekening', $row->DescriptionRekening),
		'DescriptionSubject' => set_value('DescriptionSubject', $row->DescriptionSubject),
		'DescriptionObject' => set_value('DescriptionObject', $row->DescriptionObject),
		'DescriptionDetail' => set_value('DescriptionDetail', $row->DescriptionDetail),
		'RekeningID' => set_value('RekeningID', $row->RekeningID),
		'SubjectID' => set_value('SubjectID', $row->SubjectID),
		'ObjectID' => set_value('ObjectID', $row->ObjectID),
		'DetailID' => set_value('DetailID', $row->DetailID),
		'Stat2_' => set_value('Stat2_', $row->Stat2_),
		'Stat21_' => set_value('Stat21_', $row->Stat21_),
		'StatRincian' => set_value('StatRincian', $row->StatRincian),
		'StatHitung' => set_value('StatHitung', $row->StatHitung),
		'Periode' => set_value('Periode', $row->Periode),
		'Prosen' => set_value('Prosen', $row->Prosen),
		'HargaDasar' => set_value('HargaDasar', $row->HargaDasar),
		'Satuan' => set_value('Satuan', $row->Satuan),
		'_pajak' => set_value('_pajak', $row->_pajak),
	    );
            $this->load->view('mrekening_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mrekening'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('AkunID', TRUE));
        } else {
            $data = array(
		'Description' => $this->input->post('Description',TRUE),
		'Stat_' => $this->input->post('Stat_',TRUE),
		'DescriptionRekening' => $this->input->post('DescriptionRekening',TRUE),
		'DescriptionSubject' => $this->input->post('DescriptionSubject',TRUE),
		'DescriptionObject' => $this->input->post('DescriptionObject',TRUE),
		'DescriptionDetail' => $this->input->post('DescriptionDetail',TRUE),
		'RekeningID' => $this->input->post('RekeningID',TRUE),
		'SubjectID' => $this->input->post('SubjectID',TRUE),
		'ObjectID' => $this->input->post('ObjectID',TRUE),
		'DetailID' => $this->input->post('DetailID',TRUE),
		'Stat2_' => $this->input->post('Stat2_',TRUE),
		'Stat21_' => $this->input->post('Stat21_',TRUE),
		'StatRincian' => $this->input->post('StatRincian',TRUE),
		'StatHitung' => $this->input->post('StatHitung',TRUE),
		'Periode' => $this->input->post('Periode',TRUE),
		'Prosen' => $this->input->post('Prosen',TRUE),
		'HargaDasar' => $this->input->post('HargaDasar',TRUE),
		'Satuan' => $this->input->post('Satuan',TRUE),
		'_pajak' => $this->input->post('_pajak',TRUE),
	    );

            $this->Mrekening_model->update($this->input->post('AkunID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mrekening'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mrekening_model->get_by_id($id);

        if ($row) {
            $this->Mrekening_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mrekening'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mrekening'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Description', 'description', 'trim|required');
	$this->form_validation->set_rules('Stat_', 'stat ', 'trim|required');
	$this->form_validation->set_rules('DescriptionRekening', 'descriptionrekening', 'trim|required');
	$this->form_validation->set_rules('DescriptionSubject', 'descriptionsubject', 'trim|required');
	$this->form_validation->set_rules('DescriptionObject', 'descriptionobject', 'trim|required');
	$this->form_validation->set_rules('DescriptionDetail', 'descriptiondetail', 'trim|required');
	$this->form_validation->set_rules('RekeningID', 'rekeningid', 'trim|required');
	$this->form_validation->set_rules('SubjectID', 'subjectid', 'trim|required');
	$this->form_validation->set_rules('ObjectID', 'objectid', 'trim|required');
	$this->form_validation->set_rules('DetailID', 'detailid', 'trim|required');
	$this->form_validation->set_rules('Stat2_', 'stat2 ', 'trim|required');
	$this->form_validation->set_rules('Stat21_', 'stat21 ', 'trim|required');
	$this->form_validation->set_rules('StatRincian', 'statrincian', 'trim|required');
	$this->form_validation->set_rules('StatHitung', 'stathitung', 'trim|required');
	$this->form_validation->set_rules('Periode', 'periode', 'trim|required');
	$this->form_validation->set_rules('Prosen', 'prosen', 'trim|required|numeric');
	$this->form_validation->set_rules('HargaDasar', 'hargadasar', 'trim|required|numeric');
	$this->form_validation->set_rules('Satuan', 'satuan', 'trim|required');
	$this->form_validation->set_rules('_pajak', ' pajak', 'trim|required|numeric');

	$this->form_validation->set_rules('AkunID', 'AkunID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mrekening.php */
/* Location: ./application/controllers/Mrekening.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-21 15:38:39 */
/* http://harviacode.com */