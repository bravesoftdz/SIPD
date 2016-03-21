<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mreklame extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mreklame_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mreklame/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mreklame/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mreklame/index.html';
            $config['first_url'] = base_url() . 'mreklame/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mreklame_model->total_rows($q);
        $mreklame = $this->Mreklame_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mreklame_data' => $mreklame,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('mreklame_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mreklame_model->get_by_id($id);
        if ($row) {
            $data = array(
		'No' => $row->No,
		'AkunID' => $row->AkunID,
		'Stat_' => $row->Stat_,
		'Description' => $row->Description,
		'HargaDasar' => $row->HargaDasar,
		'Satuan' => $row->Satuan,
		'Keterangan' => $row->Keterangan,
		'Prosentase' => $row->Prosentase,
	    );
            $this->load->view('mreklame_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mreklame'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mreklame/create_action'),
	    'No' => set_value('No'),
	    'AkunID' => set_value('AkunID'),
	    'Stat_' => set_value('Stat_'),
	    'Description' => set_value('Description'),
	    'HargaDasar' => set_value('HargaDasar'),
	    'Satuan' => set_value('Satuan'),
	    'Keterangan' => set_value('Keterangan'),
	    'Prosentase' => set_value('Prosentase'),
	);
        $this->load->view('mreklame_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Stat_' => $this->input->post('Stat_',TRUE),
		'Description' => $this->input->post('Description',TRUE),
		'HargaDasar' => $this->input->post('HargaDasar',TRUE),
		'Satuan' => $this->input->post('Satuan',TRUE),
		'Keterangan' => $this->input->post('Keterangan',TRUE),
		'Prosentase' => $this->input->post('Prosentase',TRUE),
	    );

            $this->Mreklame_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mreklame'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mreklame_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mreklame/update_action'),
		'No' => set_value('No', $row->No),
		'AkunID' => set_value('AkunID', $row->AkunID),
		'Stat_' => set_value('Stat_', $row->Stat_),
		'Description' => set_value('Description', $row->Description),
		'HargaDasar' => set_value('HargaDasar', $row->HargaDasar),
		'Satuan' => set_value('Satuan', $row->Satuan),
		'Keterangan' => set_value('Keterangan', $row->Keterangan),
		'Prosentase' => set_value('Prosentase', $row->Prosentase),
	    );
            $this->load->view('mreklame_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mreklame'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('No', TRUE));
        } else {
            $data = array(
		'Stat_' => $this->input->post('Stat_',TRUE),
		'Description' => $this->input->post('Description',TRUE),
		'HargaDasar' => $this->input->post('HargaDasar',TRUE),
		'Satuan' => $this->input->post('Satuan',TRUE),
		'Keterangan' => $this->input->post('Keterangan',TRUE),
		'Prosentase' => $this->input->post('Prosentase',TRUE),
	    );

            $this->Mreklame_model->update($this->input->post('No', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mreklame'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mreklame_model->get_by_id($id);

        if ($row) {
            $this->Mreklame_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mreklame'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mreklame'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Stat_', 'stat ', 'trim|required');
	$this->form_validation->set_rules('Description', 'description', 'trim|required');
	$this->form_validation->set_rules('HargaDasar', 'hargadasar', 'trim|required|numeric');
	$this->form_validation->set_rules('Satuan', 'satuan', 'trim|required');
	$this->form_validation->set_rules('Keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('Prosentase', 'prosentase', 'trim|required|numeric');

	$this->form_validation->set_rules('No', 'No', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mreklame.php */
/* Location: ./application/controllers/Mreklame.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-21 15:38:47 */
/* http://harviacode.com */