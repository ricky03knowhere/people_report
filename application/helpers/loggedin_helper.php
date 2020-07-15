<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function loggedin(){
	$ci = get_instance();
	
	if(!$ci ->session ->userdata('id_petugas')){
		redirect('auth');
	}
}