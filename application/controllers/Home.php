<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Base.php';

class Home extends Base{
	public function beranda($tanggal = null){
		if($tanggal == null){
			$tanggalnya = date('Y-m-d');
		}else{
			$tanggalnya = $tanggal;
		}
		$data = $this->data();$this->get_data();
		$data['tgl'] = $tanggalnya;
		return view('content/home',$data);
	}
	
	public function datanya($tanggal = null){
		if($tanggal == null){
			$tanggalnya = date('Y-m-d');
		}else{
			$tanggalnya = $tanggal;
		}
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"))+1;
		$length = intval($this->input->get("length"));
		$query = $this->m_data->where(['tanggal'=>$tanggalnya])->get('data')->result_object();

		$data = [];
		foreach($query as $r){
			$data_tamu = $this->m_data->where(['data_id'=>$r->id])->order_by('id','asc')->get('data_tamu');
			$jumlah_nama_tamu = $data_tamu->num_rows();
			$nama = '';
			$nox = 1;
			if($jumlah_nama_tamu > 0){
				$data_tamunya = $data_tamu->result_object();
					foreach ($data_tamunya as $dtm):
						$nama .= $nox++.'. '.$dtm->nama.'<br>';
					endforeach;
			}else{
				$nama .= '';
			}
			$data[] = array(
				"<p class='text_table'>".$start++."</p>",
				"<p class='text_table'>".$nama."</p>",
				"<p class='text_table'>".$r->keperluan."</p>",
				"<p class='text_table'>".$r->asal."</p>",
				"<p class='text_table'><a href='".base_url('detil/lihat/'.$r->id)."'>Detil</a></p>",

			);
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => count($query),
			"recordsFiltered" => count($query),
			"data" => $data
		);
		echo json_encode($result);
		exit();
	}
}
