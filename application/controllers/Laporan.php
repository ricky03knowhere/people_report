<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function header($table,$status ="",$type)
	{
		
		if($status == "belum"){
			$data['title'] = "data_".$table."_belum_terverifikasi";
			$data['name'] = $table." belum terverifikasi";
			
			$sql = "status = 'proses' OR status = '0'";
			$data[$table] = $this ->db ->get_where('pengaduan',$sql) ->result_array();
					
			$data['total'] = $this ->db ->get_where('pengaduan',$sql) ->num_rows();
		}
		else if($status == "terverifikasi"){
			$data['title'] = "data_".$table."_telah_terverifikasi";
			$data['name'] = $table." telah terverifikasi";
			
			$data[$table] = $this ->db ->get_where('pengaduan',['status' => 'terverifikasi']) ->result_array();
			$data['total'] = $this ->db ->get_where('pengaduan',['status' => 'terverifikasi']) ->num_rows();
		}else{
			$data['title'] = "data_".$table;
			$data['name'] = $table;
			$data[$table] = $this ->db ->get($table) ->result_array();
			$data['total'] = $this ->db ->get($table) ->num_rows();		
		}

		$data['color'] = "";
		
		if($type == "print"){
			$data['color'] = "#F49AC2";
		}
		else if($type == "doc"){
			$data['color'] = "#ABCDEF";
		}
		else if($type == "spread"){
			$data['color'] = "#779ECB";
		}
		
		$this->load->view('laporan/'.$type,$data);
		$this->load->view('laporan/header',$data);
		$this->load->view('laporan/exp_'.$table,$data);
	}
}