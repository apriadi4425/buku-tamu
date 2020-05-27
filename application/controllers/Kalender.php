<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Base.php';

class Kalender extends Base{
	protected $judul = 'Kalender Tamu';
	public function lihat($tanggal = null){
		if($tanggal == null){
			$tanggalnya = date('Y-m-d');
		}else{
			$tanggalnya = $tanggal;
		}
		$data = $this->data();
		$data['data'] = $this->m_data->get('data')->result_object();
		$data['tgl'] = $tanggalnya;
		return view('content/laporan/kalender',$data);
	}

}
