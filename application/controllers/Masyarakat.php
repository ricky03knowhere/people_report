<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		loggedin();
	}
	
	public function index()
	{
		$id = $this ->session ->userdata('id_petugas');
		$data['user'] = $this ->db ->get_where('petugas',['id_petugas' => $id]) ->row_array();
		$data['title'] = "Masyarakat page";
		$data['nav'] = '<li class="list-inline-item active">
						<a href="<?= base_url(\'index.php/masyarakat\'); ?>"><i class="fa fa-tachometer-alt mr-1" ></i>Dashboard</a>
						</li>';
		
		$data['msy'] = $this ->db ->get_where('masyarakat',['nama' => $data['user']['nama_petugas']]) ->row_array();		
		
		$data['pengaduan'] = $this ->db ->get_where('pengaduan',['nik' => $data['msy']['nik']]) ->num_rows();		
		$data['pengaduan_msy'] = $this ->db ->get_where('pengaduan',['nik' => $data['msy']['nik']]) ->row_array();		
		
		$sql = "status = 'terverifikasi' AND nik = '".$data['msy']['nik']."'";
		$data['terverifikasi'] = $this ->db ->get_where('pengaduan',$sql) ->num_rows();
		$data['ditanggapi'] = $this ->db ->get_where('tanggapan',['id_pengaduan' => $data['pengaduan_msy']['id_pengaduan']]) ->num_rows();		
		
			
		$this->load->view('templates/header',$data);
		$this->load->view('templates/head');
		$this->load->view('masyarakat/nav',$data);					
		$this->load->view('masyarakat/index',$data);
		$this->load->view('masyarakat/sidebar',$data);
		$this->load->view('templates/foot');
		$this->load->view('templates/footer');
	}	
}