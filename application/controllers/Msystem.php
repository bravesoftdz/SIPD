<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Msystem extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Msystem_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'msystem/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'msystem/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'msystem/index.html';
            $config['first_url'] = base_url() . 'msystem/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Msystem_model->total_rows($q);
        $msystem = $this->Msystem_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'msystem_data' => $msystem,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('msystem_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Msystem_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kode' => $row->kode,
		'tanggal_pasang' => $row->tanggal_pasang,
		'nama_aplikasi' => $row->nama_aplikasi,
		'Alamat_aplikasi' => $row->Alamat_aplikasi,
		'no_telp1' => $row->no_telp1,
		'no_telp2' => $row->no_telp2,
		'kota' => $row->kota,
		'beban_administrasi' => $row->beban_administrasi,
		'biaya' => $row->biaya,
		'sumbangan' => $row->sumbangan,
		'Logo' => $row->Logo,
		'logo2' => $row->logo2,
		'copyright' => $row->copyright,
		'biayaPemakaian' => $row->biayaPemakaian,
		'version' => $row->version,
		'BatasWaktu' => $row->BatasWaktu,
		'kdBios' => $row->kdBios,
		'tglBios' => $row->tglBios,
		'TimeTrial' => $row->TimeTrial,
		'TimeTrialRunning' => $row->TimeTrialRunning,
		'ucapan' => $row->ucapan,
		'Denda' => $row->Denda,
		'StatNoPenetapan' => $row->StatNoPenetapan,
	    );
            $this->load->view('msystem_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('msystem'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('msystem/create_action'),
	    'kode' => set_value('kode'),
	    'tanggal_pasang' => set_value('tanggal_pasang'),
	    'nama_aplikasi' => set_value('nama_aplikasi'),
	    'Alamat_aplikasi' => set_value('Alamat_aplikasi'),
	    'no_telp1' => set_value('no_telp1'),
	    'no_telp2' => set_value('no_telp2'),
	    'kota' => set_value('kota'),
	    'beban_administrasi' => set_value('beban_administrasi'),
	    'biaya' => set_value('biaya'),
	    'sumbangan' => set_value('sumbangan'),
	    'Logo' => set_value('Logo'),
	    'logo2' => set_value('logo2'),
	    'copyright' => set_value('copyright'),
	    'biayaPemakaian' => set_value('biayaPemakaian'),
	    'version' => set_value('version'),
	    'BatasWaktu' => set_value('BatasWaktu'),
	    'kdBios' => set_value('kdBios'),
	    'tglBios' => set_value('tglBios'),
	    'TimeTrial' => set_value('TimeTrial'),
	    'TimeTrialRunning' => set_value('TimeTrialRunning'),
	    'ucapan' => set_value('ucapan'),
	    'Denda' => set_value('Denda'),
	    'StatNoPenetapan' => set_value('StatNoPenetapan'),
	);
        $this->load->view('msystem_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode' => $this->input->post('kode',TRUE),
		'tanggal_pasang' => $this->input->post('tanggal_pasang',TRUE),
		'nama_aplikasi' => $this->input->post('nama_aplikasi',TRUE),
		'Alamat_aplikasi' => $this->input->post('Alamat_aplikasi',TRUE),
		'no_telp1' => $this->input->post('no_telp1',TRUE),
		'no_telp2' => $this->input->post('no_telp2',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'beban_administrasi' => $this->input->post('beban_administrasi',TRUE),
		'biaya' => $this->input->post('biaya',TRUE),
		'sumbangan' => $this->input->post('sumbangan',TRUE),
		'Logo' => $this->input->post('Logo',TRUE),
		'logo2' => $this->input->post('logo2',TRUE),
		'copyright' => $this->input->post('copyright',TRUE),
		'biayaPemakaian' => $this->input->post('biayaPemakaian',TRUE),
		'version' => $this->input->post('version',TRUE),
		'BatasWaktu' => $this->input->post('BatasWaktu',TRUE),
		'kdBios' => $this->input->post('kdBios',TRUE),
		'tglBios' => $this->input->post('tglBios',TRUE),
		'TimeTrial' => $this->input->post('TimeTrial',TRUE),
		'TimeTrialRunning' => $this->input->post('TimeTrialRunning',TRUE),
		'ucapan' => $this->input->post('ucapan',TRUE),
		'Denda' => $this->input->post('Denda',TRUE),
		'StatNoPenetapan' => $this->input->post('StatNoPenetapan',TRUE),
	    );

            $this->Msystem_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('msystem'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Msystem_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('msystem/update_action'),
		'kode' => set_value('kode', $row->kode),
		'tanggal_pasang' => set_value('tanggal_pasang', $row->tanggal_pasang),
		'nama_aplikasi' => set_value('nama_aplikasi', $row->nama_aplikasi),
		'Alamat_aplikasi' => set_value('Alamat_aplikasi', $row->Alamat_aplikasi),
		'no_telp1' => set_value('no_telp1', $row->no_telp1),
		'no_telp2' => set_value('no_telp2', $row->no_telp2),
		'kota' => set_value('kota', $row->kota),
		'beban_administrasi' => set_value('beban_administrasi', $row->beban_administrasi),
		'biaya' => set_value('biaya', $row->biaya),
		'sumbangan' => set_value('sumbangan', $row->sumbangan),
		'Logo' => set_value('Logo', $row->Logo),
		'logo2' => set_value('logo2', $row->logo2),
		'copyright' => set_value('copyright', $row->copyright),
		'biayaPemakaian' => set_value('biayaPemakaian', $row->biayaPemakaian),
		'version' => set_value('version', $row->version),
		'BatasWaktu' => set_value('BatasWaktu', $row->BatasWaktu),
		'kdBios' => set_value('kdBios', $row->kdBios),
		'tglBios' => set_value('tglBios', $row->tglBios),
		'TimeTrial' => set_value('TimeTrial', $row->TimeTrial),
		'TimeTrialRunning' => set_value('TimeTrialRunning', $row->TimeTrialRunning),
		'ucapan' => set_value('ucapan', $row->ucapan),
		'Denda' => set_value('Denda', $row->Denda),
		'StatNoPenetapan' => set_value('StatNoPenetapan', $row->StatNoPenetapan),
	    );
            $this->load->view('msystem_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('msystem'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'kode' => $this->input->post('kode',TRUE),
		'tanggal_pasang' => $this->input->post('tanggal_pasang',TRUE),
		'nama_aplikasi' => $this->input->post('nama_aplikasi',TRUE),
		'Alamat_aplikasi' => $this->input->post('Alamat_aplikasi',TRUE),
		'no_telp1' => $this->input->post('no_telp1',TRUE),
		'no_telp2' => $this->input->post('no_telp2',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'beban_administrasi' => $this->input->post('beban_administrasi',TRUE),
		'biaya' => $this->input->post('biaya',TRUE),
		'sumbangan' => $this->input->post('sumbangan',TRUE),
		'Logo' => $this->input->post('Logo',TRUE),
		'logo2' => $this->input->post('logo2',TRUE),
		'copyright' => $this->input->post('copyright',TRUE),
		'biayaPemakaian' => $this->input->post('biayaPemakaian',TRUE),
		'version' => $this->input->post('version',TRUE),
		'BatasWaktu' => $this->input->post('BatasWaktu',TRUE),
		'kdBios' => $this->input->post('kdBios',TRUE),
		'tglBios' => $this->input->post('tglBios',TRUE),
		'TimeTrial' => $this->input->post('TimeTrial',TRUE),
		'TimeTrialRunning' => $this->input->post('TimeTrialRunning',TRUE),
		'ucapan' => $this->input->post('ucapan',TRUE),
		'Denda' => $this->input->post('Denda',TRUE),
		'StatNoPenetapan' => $this->input->post('StatNoPenetapan',TRUE),
	    );

            $this->Msystem_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('msystem'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Msystem_model->get_by_id($id);

        if ($row) {
            $this->Msystem_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('msystem'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('msystem'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('tanggal_pasang', 'tanggal pasang', 'trim|required');
	$this->form_validation->set_rules('nama_aplikasi', 'nama aplikasi', 'trim|required');
	$this->form_validation->set_rules('Alamat_aplikasi', 'alamat aplikasi', 'trim|required');
	$this->form_validation->set_rules('no_telp1', 'no telp1', 'trim|required');
	$this->form_validation->set_rules('no_telp2', 'no telp2', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('beban_administrasi', 'beban administrasi', 'trim|required');
	$this->form_validation->set_rules('biaya', 'biaya', 'trim|required');
	$this->form_validation->set_rules('sumbangan', 'sumbangan', 'trim|required');
	$this->form_validation->set_rules('Logo', 'logo', 'trim|required');
	$this->form_validation->set_rules('logo2', 'logo2', 'trim|required');
	$this->form_validation->set_rules('copyright', 'copyright', 'trim|required');
	$this->form_validation->set_rules('biayaPemakaian', 'biayapemakaian', 'trim|required');
	$this->form_validation->set_rules('version', 'version', 'trim|required');
	$this->form_validation->set_rules('BatasWaktu', 'bataswaktu', 'trim|required');
	$this->form_validation->set_rules('kdBios', 'kdbios', 'trim|required');
	$this->form_validation->set_rules('tglBios', 'tglbios', 'trim|required');
	$this->form_validation->set_rules('TimeTrial', 'timetrial', 'trim|required');
	$this->form_validation->set_rules('TimeTrialRunning', 'timetrialrunning', 'trim|required');
	$this->form_validation->set_rules('ucapan', 'ucapan', 'trim|required');
	$this->form_validation->set_rules('Denda', 'denda', 'trim|required');
	$this->form_validation->set_rules('StatNoPenetapan', 'statnopenetapan', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Msystem.php */
/* Location: ./application/controllers/Msystem.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-21 15:38:59 */
/* http://harviacode.com */