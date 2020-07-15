<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_masyarakat extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		loggedin();
	}

	public function index($id_edit =0)
	{
		$id = $this ->session ->userdata('id_petugas');
		$data['title'] = "Data Masyarakat";
		
		$data['user'] = $this ->db ->get_where('petugas',['id_petugas' => $id]) ->row_array();
		$user = $data['user']['level'];
		
		if($id_edit){
			
			$data['masyarakat'] = $this ->db ->get_where('masyarakat',['nik' => $id_edit]) ->row_array();
					
		$data['nav'] = '
			<li class="list-inline-item"><i class="fa fa-table mr-1"></i>Tabel
			</li>
			<li class="list-inline-item seprate">
			<span>/</span>
			</li>
			<li class="list-inline-item"><i class="fa fa-users mr-1" ></i>Masyarakat
			</li>
			<li class="list-inline-item seprate">
			<span>/</span>
			</li>
			<li class="list-inline-item"><i class="fa fa-edit mr-1"></i>Edit
			</li>';
		}
		else {
			$data['masyarakat'] = $this ->db ->get('masyarakat') ->result_array();
		
		$data['nav'] = '
			<li class="list-inline-item"><i class="fa fa-table mr-1"></i>Tabel
			</li>
			<li class="list-inline-item seprate">
			<span>/</span>
			</li>
			<li class="list-inline-item"><i class="fa fa-users mr-1" ></i>Masyarakat
			</li>';
		}	
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/head');		
		$this->load->view($user.'/nav',$data);
		
		if($id_edit){
			$this->load->view('data_masyarakat/edit',$data);
		}else{
			$this->load->view('data_masyarakat/index',$data);		
		}
		
		$this->load->view($user.'/sidebar',$data);		
		$this->load->view('templates/foot');
		$this->load->view('templates/footer');	
	}
	
	public function input(){
		    
		    $up_picture =$_FILES['picture']['name'];
		
			$config['upload_path']= './assets/img/';
			$config['allowed_types']= 'gif|jpg|png';
			$config['max_size']= 2048;
			
			$this->load->library('upload', $config);

			if($this->upload->do_upload('picture')){
				$data = [
					"nik" => $this ->input ->post('nik'),
					"nama" => $this ->input ->post('nama'),
					"username" => $this ->input ->post('username'),
					"password" => $this ->input ->post('password'),
					"telp" => $this ->input ->post('telp'),
					"picture" => $up_picture
				];
				
				$this ->db ->insert('masyarakat',$data);
				
				redirect('data_masyarakat');
			}
			else{
				$data = $this->upload->display_errors();
				$this ->session ->set_flashdata('error',$data);
				redirect('data_masyarakat');
			}
	}
	
	public function edit($id){
		
		$data['masyarakat'] = $this ->db ->get_where('masyarakat',['nik' => $id]) ->row_array();
		
		$this->load->view('data_masyarakat/index',$data);
	}
	
	public function edit_data($id){
		
		$data['masyarakat'] = $this ->db ->get_where('masyarakat',['nik' => $id]) ->row_array();
		$up_picture = $_FILES['picture']['name'];
		
		if($up_picture){
			$config['upload_path']= './assets/img/';
			$config['allowed_types']= 'gif|jpg|png';
			$config['max_size']= 2048;
			
			$this->load->library('upload', $config);
			
			if($this->upload->do_upload('picture')){
				$old_picture =$data['masyarakat']['picture'];
			
				$new_picture =$this->upload->data('file_name');
				$this ->db ->set('picture',$new_picture);
			}
			else{
				$data = $this->upload->display_errors();
				$this ->session ->set_flashdata('error',$data);
				redirect('data_masyarakat/edit/'.$id);
			}
		}
		
		$data = [
			"nik" => $this ->input ->post('nik'),
			"nama" => $this ->input ->post('nama'),
			"username" => $this ->input ->post('username'),
			"password" => $this ->input ->post('password'),
			"telp" => $this ->input ->post('telp'),
		];
		
		$this ->db ->where('nik',$id);
		$this ->db ->update('masyarakat',$data);
		
		redirect('data_masyarakat');
	}
	
	public function delete($id){
		
		$data['masyarakat'] = $this ->db ->get_where('masyarakat',['nik' => $id]) ->row_array();
		
		$this-> db ->delete('masyarakat',['nik' => $id]);
		
		redirect('data_masyarakat');
	}
}