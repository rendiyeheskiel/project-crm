<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('notification', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu!</div>');
            redirect('Auth');
        } else {
            if (!($this->session->userdata('level') == 'admin')) {
                $this->session->set_flashdata('notification', '<div class="alert alert-danger" role="alert">Anda bukan Admin!</div>');
                redirect('Auth');
            }
        }
    }

    public function index()
    {
        $this->load->model('Auth_Model');
        $id = $this->session->userdata('id');
        $data['user_loged'] = $this->Auth_Model->get_data_user_session($id)->row();
        $data['keyword']=  $this->input->get('keyword');
        $data['surat'] =  $this->db->query("SELECT * FROM fibernode  WHERE node LIKE '%APS%'");
        $data['title'] = 'Dashboard';
        $data['total_surat_masuk'] = '1';
        $data['total_surat_keluar'] = '2';
        $data['total_surat_keterangan_ahli_waris'] = '3';
        $data['total_surat_proposal'] = '4';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view('template/navbar');
        $this->load->view('admin/dashboard_admin', $data);
        $this->load->view('template/footer'); 
        $this->load->view('admin/search');
    }
}
