<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$data['title'] = "Login page";
		
		if($this ->session ->userdata('id_petugas')){
			redirect('auth/logout');
		}
		
		$this ->load ->library('form_validation');
		
		$this ->form_validation ->set_rules('username','Username','required|trim');
		$this ->form_validation ->set_rules('password','Password','required|trim');
				
		if($this ->form_validation ->run() == false){
			$this ->load ->view("templates/header",$data);		
			$this ->load ->view("auth/index");
			$this ->load ->view("templates/footer");
		}
		else{
			$this -> _login();
		}
	}
	
	public function register()
	{
		$data['title'] = "Register page";
		
		if($this ->session ->userdata('id_petugas')){
			redirect('auth/logout');
		}
				
			$this ->load ->view("templates/header",$data);		
			$this ->load ->view("auth/register");
			$this ->load ->view("templates/footer");
	}
	
	public function regist(){	
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
			
			redirect('auth');
			
		}else{
			$data = $this->upload->display_errors();
			$this ->session ->set_flashdata('error',$data);
			redirect('auth');
		}
		
		$this ->session ->set_flashdata('message','<div class="alert alert-success" role="alert">Akun telah dibuat,Silakah Login</div>');
	}
	
	public function _login(){
		$username = $this ->input ->post('username');
		$password = $this ->input ->post('password');
		
		$user = $this ->db ->get_where('petugas',['username' => $username]) ->row_array();
		
		if($user){
			if($user['password'] == $password){
			
				$data =[
						"id_petugas" => $user['id_petugas'],
						"nama_petugas" => $user['nama_petugas']
						];
						
				$this ->session ->set_userdata($data);
				
				if($user['level'] == "admin"){
					redirect('admin');
				}
				else if($user['level'] == "petugas"){

					redirect('petugas');
				}
				else if($user['level'] == "masyarakat"){
					redirect('masyarakat');
				}else{					
					redirect('auth');
				}
			}else{	
				$this ->session ->set_flashdata('message_p','autofocus="autofocus"  data-toggle="tooltip" data-placement="top" title="Password Salah!" data-offset="30"');			
				redirect('auth');
			}
		}else{
			$this ->session ->set_flashdata('message_u','autofocus="autofocus" data-toggle="tooltip" data-placement="top" title="Username tidak terdaftar!" data-offset="50"');						
			redirect('auth');
		}
	}
	
	public function logout(){
		$this ->session ->unset_userdata('id_petugas');
		$this ->session ->unset_userdata('nama__petugas');
		$this ->session ->set_flashdata('message','You have been logged out');
		redirect('auth');
	}
	
	public function blocked(){
		
		$data['title'] = "Bloked!";		
		
		$this ->load ->view("auth/blocked",$data);
	}
}