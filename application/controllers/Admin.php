<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		loggedin();
	}

	public function index()
	{
		$id = $this ->session ->userdata('id_petugas');
		$data['user'] = $this ->db ->get_where('petugas',['id_petugas' => $id]) ->row_array();
		$data['title'] = "Admin page";
		$data['nav'] = '<li class="list-inline-item active">
						<a href="<?= base_url( \' index.php/admin \' ); ?>"><i class="fa fa-tachometer-alt mr-1" ></i>Dashboard</a>
						</li>';

		$data['pengaduan'] = $this ->db ->get('pengaduan') ->num_rows();
		$sql = "status = 'proses' OR status = '0'";
		$data['belum'] = $this ->db ->get_where('pengaduan',$sql) ->num_rows();
		$data['terverifikasi'] = $this ->db ->get_where('pengaduan',['status' => 'terverifikasi']) ->num_rows();
		
		$data['admin'] = $this ->db ->get_where('petugas',['level' => 'admin']) ->num_rows();
		$data['petugas'] = $this ->db ->get_where('petugas',['level' => 'petugas']) ->num_rows();
		$data['masyarakat'] = $this ->db ->get_where('petugas',['level' => 'masyarakat']) ->num_rows();
		
		if(($data['user']['level'] == "petugas") || ($data['user']['level'] == "masyarakat")){
			$data['title'] = "Bloked!";		
			
			$this ->load ->view("auth/blocked",$data);

		}
		else{
			$this->load->view('templates/header',$data);
			$this->load->view('templates/head');
			$this->load->view('admin/nav',$data);					
			$this->load->view('admin/index',$data);
			$this->load->view('admin/sidebar',$data);
			$this->load->view('templates/foot');
			$this->load->view('templates/footer');
		}
	}
	
}