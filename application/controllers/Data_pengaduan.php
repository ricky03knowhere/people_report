<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pengaduan extends CI_Controller {

	public function index($id_edit = 0,$status ="",$msy ="")
	{
		$id = $this ->session ->userdata('id_petugas');
		$data['user'] = $this ->db ->get_where('petugas',['id_petugas' => $id]) ->row_array();
		$data['title'] = "Data Pengaduan";

		$user = $data['user']['level'];
		$data['status'] = $status;
		$data['msy'] = $this ->db ->get_where('masyarakat',['nama' => $data['user']['nama_petugas']]) ->row_array();		
		
		if($id_edit){
			$data['nav'] = '
				<li class="list-inline-item"><i class="fa fa-newspaper mr-1"></i>Pengaduan
				</li>
				<li class="list-inline-item seprate">
				<span>/</span>
				</li>
				<li class="list-inline-item"><i class="fa fa-edit mr-1"></i>Edit
				</li>';
		}
		else if($status == "belum"){
			$data['nav'] = '
				<li class="list-inline-item"><i class="fa fa-newspaper mr-1"></i>Pengaduan
				</li>
				<li class="list-inline-item seprate">
				<span>/</span>
				</li>
				<li class="list-inline-item"><i class="fa fa-question-circle mr-1" ></i>Belum Terverifikasi
				</li>';
		}
		else if($status == "terverifikasi"){
			$data['nav'] = '
				<li class="list-inline-item"><i class="fa fa-newspaper mr-1"></i>Pengaduan
				</li>
				<li class="list-inline-item seprate">
				<span>/</span>
				</li>
				<li class="list-inline-item"><i class="fa fa-check-circle mr-1" ></i>Terverifikasi
				</li>';
		
		}else{
				
			$data['nav'] = '
				<li class="list-inline-item"><i class="fa fa-newspaper mr-1"></i>Pengaduan
				</li>
				<li class="list-inline-item seprate">
				<span>/</span>
				</li>
				<li class="list-inline-item"><i class="fa fa-file-import mr-1" ></i>Masuk
				</li>';
		}
		
		$data['masyarakat'] = $this ->db ->get('masyarakat') ->result_array();
		
		if($msy){
			$data['pengaduan'] = $this ->db ->get_where('pengaduan',['nik' => $data['msy']['nik']]) ->result_array();		
			if($msy && $status){
				$sql = "status = 'terverifikasi' AND nik = '".$data['msy']['nik']."'";
				$data['pengaduan'] = $this ->db ->get_where('pengaduan',$sql) ->result_array();
			}
		}
	   else if($status){
		if($status == "belum"){
				$sql = "status = 'proses' OR status = '0'";
				$data['pengaduan'] = $this ->db ->get_where('pengaduan',$sql) ->result_array();
			}
			else if($status == "terverifikasi"){
				$data['pengaduan'] = $this ->db ->get_where('pengaduan',['status' => 'terverifikasi']) ->result_array();
			}
			else{
				$data['pengaduan'] = $this ->db ->get('pengaduan') ->result_array();
			}
			}
			else{
			$data['pengaduan'] = $this ->db ->get('pengaduan') ->result_array();

		}
		$data['pengaduan_edit'] = $this ->db ->get_where('pengaduan',['id_pengaduan' => $id_edit]) ->row_array();
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/head');		
		$this->load->view($user.'/nav',$data);
		
		if($id_edit){
			$this->load->view('data_pengaduan/editx',$data);
		}else{
			$this->load->view('data_pengaduan/index',$data);		
		}
		
		$this->load->view($user.'/sidebar',$data);		
		$this->load->view('templates/foot');
		$this->load->view('templates/footer');	
	}
	
	public function input(){
		
		$up_foto =$_FILES['foto']['name'];
		
		$config['upload_path']= './assets/img/';
		$config['allowed_types']= 'gif|jpg|png';
		$config['max_size']= 2048;
		
		$this->load->library('upload', $config);
		
		if($this->upload->do_upload('foto')){
		
			$data = [
				"id_pengaduan" => $this ->input ->post('id_pengaduan'),
				"tgl_pengaduan" => $this ->input ->post('tgl_pengaduan'),
				"nik" => $this ->input ->post('nik'),
				"isi_laporan" => $this ->input ->post('isi_laporan'),
				"foto" => $up_foto,
				"status" => $this ->input ->post('status')
			];
			
			$this ->db ->insert('pengaduan',$data);
			
			redirect('data_pengaduan');
		
		}else {
			$data = $this->upload->display_errors();
			$this ->session ->set_flashdata('error',$data);
			
			redirect('data_pengaduan');
		}
	}
	
	public function edit($id){
		
		$data['masyarakat'] = $this ->db ->get('masyarakat') ->result_array();
		$data['pengaduan'] = $this ->db ->get_where('pengaduan',['id_pengaduan' => $id]) ->row_array();
		
		
		$this->load->view('data_pengaduan/editx',$data);
	}
	
	public function edit_data($id){
		
		$data['pengaduan'] = $this ->db ->get_where('pengaduan',['id_pengaduan' => $id]) ->row_array();
		
		$up_foto = $_FILES['foto']['name'];
		
		if($up_foto){
			$config['upload_path']= './assets/img/';
			$config['allowed_types']= 'gif|jpg|png';
			$config['max_size']= 2048;
			
			$this->load->library('upload', $config);
			
			if($this->upload->do_upload('foto')){
				$old_foto = $data['pengaduan']['foto'];
			
				$new_foto = $this->upload->data('file_name');
				$this ->db ->set('foto',$new_foto);
			}
			else{
				$data = $this->upload->display_errors();
				$this ->session ->set_flashdata('error',$data);
				redirect('data_pengaduan/edit/'.$id);
			}
		}
		
		$data = [
			"id_pengaduan" => $this ->input ->post('id_pengaduan'),
			"tgl_pengaduan" => $this ->input ->post('tgl_pengaduan'),
			"nik" => $this ->input ->post('nik'),
			"isi_laporan" => $this ->input ->post('isi_laporan'),
			"status" => $this ->input ->post('status')
		];
		

		$this ->db ->where('id_pengaduan',$id);
		$this ->db ->update('pengaduan',$data);
		
		redirect('data_pengaduan');
	}
	
	public function delete($id){
			
		$this-> db ->delete('pengaduan',['id_pengaduan' => $id]);
		redirect('data_pengaduan');
	}
}