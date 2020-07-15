<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_tanggapan extends CI_Controller {

public function index($id_edit =0,$msy ="")
	{
	$id = $this ->session ->userdata('id_petugas');
	$data['title'] = "Data Tanggapan";
	
	$data['user'] = $this ->db ->get_where('petugas',['id_petugas' => $id]) ->row_array();
	$user = $data['user']['level'];

	$data['petugas'] = $this ->db ->get('petugas') ->result_array();
	$data['pengaduan'] = $this ->db ->get('pengaduan') ->result_array();
			
	$data['msy'] = $this ->db ->get_where('masyarakat',['nama' => $data['user']['nama_petugas']]) ->row_array();				
	$data['pengaduan_msy'] = $this ->db ->get_where('pengaduan',['nik' => $data['msy']['nik']]) ->row_array();			
	
	if($msy){
		$data['nav'] = '
		<li class="list-inline-item"><i class="fa fa-table mr-1"></i>Tabel
		</li>
		<li class="list-inline-item seprate">
		<span>/</span>
		</li>
		<li class="list-inline-item"><i class="fas fa-file-signature mr-2 ml-1" ></i>Tanggapan
		</li>';
		
		$data['tanggapan'] = $this ->db ->get_where('tanggapan',['id_pengaduan' => $data['pengaduan_msy']['id_pengaduan']]) ->result_array();		
	if($id_edit){
		
		$data['tanggapan'] = $this ->db ->get_where('tanggapan',['id_tanggapan' => $id_edit]) ->row_array();
				
	$data['nav'] = '
		<li class="list-inline-item"><i class="fa fa-table mr-1"></i>Tabel
		</li>
		<li class="list-inline-item seprate">
		<span>/</span>
		</li>
		<li class="list-inline-item"><i class="fas fa-file-signature mr-2 ml-1" ></i>Tanggapan
		</li>
		<li class="list-inline-item seprate">
		<span>/</span>
		</li>
		<li class="list-inline-item"><i class="fas fa-edit mr-1"></i>Edit
		</li>';
	}
	}
	else {
		$data['tanggapan'] = $this ->db ->get('tanggapan') ->result_array();
	
	$data['nav'] = '
		<li class="list-inline-item"><i class="fa fa-table mr-1"></i>Tabel
		</li>
		<li class="list-inline-item seprate">
		<span>/</span>
		</li>
		<li class="list-inline-item"><i class="fas fa-file-signature mr-2 ml-1" ></i>Tanggapan
		</li>';
	}

	
	$this->load->view('templates/header',$data);
	$this->load->view('templates/head');		
	$this->load->view($user.'/nav',$data);
	
	if($id_edit){
		$this->load->view('data_tanggapan/edit',$data);
	}else{
		$this->load->view('data_tanggapan/index',$data);		
	}
	
	$this->load->view($user.'/sidebar',$data);		
	$this->load->view('templates/foot');
	$this->load->view('templates/footer');	
}
	
	public function input(){
		
		$data = [
			"id_tanggapan" => $this ->input ->post('id_tanggapan'),
			"id_pengaduan" => $this ->input ->post('id_pengaduan'),
			"tgl_tanggapan" => $this ->input ->post('tgl_tanggapan'),
			"tanggapan" => $this ->input ->post('tanggapan'),
			"id_petugas" => $this ->input ->post('id_petugas')
		];
		
		$this ->db ->insert('tanggapan',$data);
		
		redirect('data_tanggapan');
	}
	
	public function edit(){
		
		$this->load->view('data_tanggapan/edit',$data);
	}
	
	public function edit_data($id){
		
		$data = [
			"id_tanggapan" => $this ->input ->post('id_tanggapan'),
			"id_pengaduan" => $this ->input ->post('id_pengaduan'),
			"tgl_tanggapan" => $this ->input ->post('tgl_tanggapan'),
			"tanggapan" => $this ->input ->post('tanggapan'),
			"id_petugas" => $this ->input ->post('id_petugas')
		];
		
		$this ->db ->where('id_tanggapan',$id);
		$this ->db ->update('tanggapan',$data);
		
		redirect('data_tanggapan');
	}
	
	public function delete($id){
			
		$this-> db ->delete('tanggapan',['id_tanggapan' => $id]);
		redirect('data_tanggapan');
	}
}