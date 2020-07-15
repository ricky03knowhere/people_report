<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		loggedin();
	}
	
	public function index()
	{
	
		$id = $this ->session ->userdata('id_petugas');
		$data['user'] = $this ->db ->get_where('petugas',['id_petugas' => $id]) ->row_array();
		$data['title'] = "Petugas page";
		$data['nav'] = '<li class="list-inline-item active">
						<a href="<?= base_url(\'index.php/petugas\'); ?>"><i class="fa fa-tachometer-alt mr-1" ></i>Dashboard</a>
						</li>';
		
		$data['petugas'] = $this ->db ->get('petugas') ->result_array();
		$data['pengaduan_dt'] = $this ->db ->get('pengaduan') ->result_array();
		
		$data['pengaduan'] = $this ->db ->get('pengaduan') ->num_rows();
		$sql = "status = 'proses' OR status = '0'";
		$data['belum'] = $this ->db ->get_where('pengaduan',$sql) ->num_rows();
		$data['terverifikasi'] = $this ->db ->get_where('pengaduan',['status' => 'terverifikasi']) ->num_rows();
		
		$data['tlh_dtnggp'] = $this ->db ->get('tanggapan') ->num_rows();
		$data['blm_dtnggp'] = $data['pengaduan'];
	
		$this->load->view('templates/header',$data);
		$this->load->view('templates/head');
		$this->load->view('petugas/nav',$data);					
		$this->load->view('petugas/index',$data);
		$this->load->view('petugas/sidebar',$data);
		$this->load->view('templates/foot');
		$this->load->view('templates/footer');
		
	}
			
}