<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mrumusreklame extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mrumusreklame_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mrumusreklame/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mrumusreklame/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mrumusreklame/index.html';
            $config['first_url'] = base_url() . 'mrumusreklame/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mrumusreklame_model->total_rows($q);
        $mrumusreklame = $this->Mrumusreklame_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mrumusreklame_data' => $mrumusreklame,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('mrumusreklame_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mrumusreklame_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ThnPeriode' => $row->ThnPeriode,
		'Thn_' => $row->Thn_,
		'Bln_' => $row->Bln_,
		'Minggu_' => $row->Minggu_,
		'Hari_' => $row->Hari_,
		'JlnNegara' => $row->JlnNegara,
		'JlnKabupaten' => $row->JlnKabupaten,
		'JlnLingkungan' => $row->JlnLingkungan,
		'SdtPandang>2' => $row->SdtPandang>2,
		'SdtPandang2' => $row->SdtPandang2,
		'SdtPandang1' => $row->SdtPandang1,
		'LokasiKhusus' => $row->LokasiKhusus,
		'LokasiBiasa' => $row->LokasiBiasa,
	    );
            $this->load->view('mrumusreklame_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mrumusreklame'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mrumusreklame/create_action'),
	    'ThnPeriode' => set_value('ThnPeriode'),
	    'Thn_' => set_value('Thn_'),
	    'Bln_' => set_value('Bln_'),
	    'Minggu_' => set_value('Minggu_'),
	    'Hari_' => set_value('Hari_'),
	    'JlnNegara' => set_value('JlnNegara'),
	    'JlnKabupaten' => set_value('JlnKabupaten'),
	    'JlnLingkungan' => set_value('JlnLingkungan'),
	    'SdtPandang>2' => set_value('SdtPandang>2'),
	    'SdtPandang2' => set_value('SdtPandang2'),
	    'SdtPandang1' => set_value('SdtPandang1'),
	    'LokasiKhusus' => set_value('LokasiKhusus'),
	    'LokasiBiasa' => set_value('LokasiBiasa'),
	);
        $this->load->view('mrumusreklame_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Thn_' => $this->input->post('Thn_',TRUE),
		'Bln_' => $this->input->post('Bln_',TRUE),
		'Minggu_' => $this->input->post('Minggu_',TRUE),
		'Hari_' => $this->input->post('Hari_',TRUE),
		'JlnNegara' => $this->input->post('JlnNegara',TRUE),
		'JlnKabupaten' => $this->input->post('JlnKabupaten',TRUE),
		'JlnLingkungan' => $this->input->post('JlnLingkungan',TRUE),
		'SdtPandang>2' => $this->input->post('SdtPandang>2',TRUE),
		'SdtPandang2' => $this->input->post('SdtPandang2',TRUE),
		'SdtPandang1' => $this->input->post('SdtPandang1',TRUE),
		'LokasiKhusus' => $this->input->post('LokasiKhusus',TRUE),
		'LokasiBiasa' => $this->input->post('LokasiBiasa',TRUE),
	    );

            $this->Mrumusreklame_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mrumusreklame'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mrumusreklame_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mrumusreklame/update_action'),
		'ThnPeriode' => set_value('ThnPeriode', $row->ThnPeriode),
		'Thn_' => set_value('Thn_', $row->Thn_),
		'Bln_' => set_value('Bln_', $row->Bln_),
		'Minggu_' => set_value('Minggu_', $row->Minggu_),
		'Hari_' => set_value('Hari_', $row->Hari_),
		'JlnNegara' => set_value('JlnNegara', $row->JlnNegara),
		'JlnKabupaten' => set_value('JlnKabupaten', $row->JlnKabupaten),
		'JlnLingkungan' => set_value('JlnLingkungan', $row->JlnLingkungan),
		'SdtPandang>2' => set_value('SdtPandang>2', $row->SdtPandang>2),
		'SdtPandang2' => set_value('SdtPandang2', $row->SdtPandang2),
		'SdtPandang1' => set_value('SdtPandang1', $row->SdtPandang1),
		'LokasiKhusus' => set_value('LokasiKhusus', $row->LokasiKhusus),
		'LokasiBiasa' => set_value('LokasiBiasa', $row->LokasiBiasa),
	    );
            $this->load->view('mrumusreklame_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mrumusreklame'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ThnPeriode', TRUE));
        } else {
            $data = array(
		'Thn_' => $this->input->post('Thn_',TRUE),
		'Bln_' => $this->input->post('Bln_',TRUE),
		'Minggu_' => $this->input->post('Minggu_',TRUE),
		'Hari_' => $this->input->post('Hari_',TRUE),
		'JlnNegara' => $this->input->post('JlnNegara',TRUE),
		'JlnKabupaten' => $this->input->post('JlnKabupaten',TRUE),
		'JlnLingkungan' => $this->input->post('JlnLingkungan',TRUE),
		'SdtPandang>2' => $this->input->post('SdtPandang>2',TRUE),
		'SdtPandang2' => $this->input->post('SdtPandang2',TRUE),
		'SdtPandang1' => $this->input->post('SdtPandang1',TRUE),
		'LokasiKhusus' => $this->input->post('LokasiKhusus',TRUE),
		'LokasiBiasa' => $this->input->post('LokasiBiasa',TRUE),
	    );

            $this->Mrumusreklame_model->update($this->input->post('ThnPeriode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mrumusreklame'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mrumusreklame_model->get_by_id($id);

        if ($row) {
            $this->Mrumusreklame_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mrumusreklame'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mrumusreklame'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Thn_', 'thn ', 'trim|required|numeric');
	$this->form_validation->set_rules('Bln_', 'bln ', 'trim|required|numeric');
	$this->form_validation->set_rules('Minggu_', 'minggu ', 'trim|required|numeric');
	$this->form_validation->set_rules('Hari_', 'hari ', 'trim|required|numeric');
	$this->form_validation->set_rules('JlnNegara', 'jlnnegara', 'trim|required|numeric');
	$this->form_validation->set_rules('JlnKabupaten', 'jlnkabupaten', 'trim|required|numeric');
	$this->form_validation->set_rules('JlnLingkungan', 'jlnlingkungan', 'trim|required|numeric');
	$this->form_validation->set_rules('SdtPandang>2', 'sdtpandang>2', 'trim|required|numeric');
	$this->form_validation->set_rules('SdtPandang2', 'sdtpandang2', 'trim|required|numeric');
	$this->form_validation->set_rules('SdtPandang1', 'sdtpandang1', 'trim|required|numeric');
	$this->form_validation->set_rules('LokasiKhusus', 'lokasikhusus', 'trim|required|numeric');
	$this->form_validation->set_rules('LokasiBiasa', 'lokasibiasa', 'trim|required|numeric');

	$this->form_validation->set_rules('ThnPeriode', 'ThnPeriode', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mrumusreklame.php */
/* Location: ./application/controllers/Mrumusreklame.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-21 15:38:52 */
/* http://harviacode.com */