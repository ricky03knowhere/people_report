<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_petugas extends CI_Controller {


	public function index($id_edit =0)
	{
		$id = $this ->session ->userdata('id_petugas');
		$data['title'] = "Data Petugas";
		
		$data['user'] = $this ->db ->get_where('petugas',['id_petugas' => $id]) ->row_array();
		$user = $data['user']['level'];	

		if($id_edit){
			
			$data['petugas'] = $this ->db ->get_where('petugas',['id_petugas' => $id_edit]) ->row_array();
					
		$data['nav'] = '
			<li class="list-inline-item"><i class="fa fa-table mr-1"></i>Tabel
			</li>
			<li class="list-inline-item seprate">
			<span>/</span>
			</li>
			<li class="list-inline-item"><i class="fa fa-user-tie mr-1" ></i>Petugas
			</li>
			<li class="list-inline-item seprate">
			<span>/</span>
			</li>
			<li class="list-inline-item"><i class="fa fa-edit mr-1"></i>Edit
			</li>';
		}
		else {
			$data['petugas'] = $this ->db ->get('petugas') ->result_array();
		
		$data['nav'] = '
			<li class="list-inline-item"><i class="fa fa-table mr-1"></i>Tabel
			</li>
			<li class="list-inline-item seprate">
			<span>/</span>
			</li>
			<li class="list-inline-item"><i class="fa fa-user-tie mr-1" ></i>Petugas
			</li>';
		}	
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/head');		
		$this->load->view($user.'/nav',$data);
		
		if($id_edit){
			$this->load->view('data_petugas/edit',$data);
		}else{
			$this->load->view('data_petugas/index',$data);		
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
				"id_petugas" => $this ->input ->post('id_petugas'),
				"nama_petugas" => $this ->input ->post('nama_petugas'),
				"username" => $this ->input ->post('username'),
				"password" => $this ->input ->post('password'),
				"telp" => $this ->input ->post('telp'),
				"picture" => $up_picture,
				"level" => $this ->input ->post('level')
			];
			
			$this ->db ->insert('petugas',$data);
			
			redirect('data_petugas');
			
		}else{
			$data = $this->upload->display_errors();
			$this ->session ->set_flashdata('error',$data);
			redirect('data_petugas');
		}
	}
	
	
	public function edit($id){
		
		$data['petugas'] = $this ->db ->get_where('petugas',['id_petugas' => $id]) ->row_array();
		
		$this->load->view('data_petugas/edit',$data);
	}
	
	public function edit_data($id){
		
		$data['petugas'] = $this ->db ->get_where('petugas',['id_petugas' => $id]) ->row_array();
		$up_picture = $_FILES['picture']['name'];
		
		if($up_picture){
			$config['upload_path']= './assets/img/';
			$config['allowed_types']= 'gif|jpg|png';
			$config['max_size']= 2048;
			
			$this->load->library('upload', $config);
			
			if($this->upload->do_upload('picture')){
				$old_picture =$data['petugas']['picture'];
			
				$new_picture =$this->upload->data('file_name');
				$this ->db ->set('picture',$new_picture);
			}
			else{
				$data = $this->upload->display_errors();
				$this ->session ->set_flashdata('error',$data);
				redirect('data_petugas/edit/'.$id);
			}
		}
		$data = [
			"id_petugas" => $this ->input ->post('id_petugas'),
			"nama_petugas" => $this ->input ->post('nama_petugas'),
			"username" => $this ->input ->post('username'),
			"password" => $this ->input ->post('password'),
			"telp" => $this ->input ->post('telp'),
			"level" => $this ->input ->post('level')
		];
		
		$this ->db ->where('id_petugas',$id);
		$this ->db ->update('petugas',$data);
		
		redirect('data_petugas');
	}
	
	public function delete($id){
			
		$this-> db ->delete('petugas',['id_petugas' => $id]);
		redirect('data_petugas');
	}
}