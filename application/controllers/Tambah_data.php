<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Base.php';

class Tambah_data extends Base{
	public function lihat($id = null){

		$cek = $this->m_data->where(['id'=>$id])->get('data')->num_rows();
			if($cek > 0){

				$data = $this->data();
				$data['data'] = $this->m_data
					->select('a.id,a.tanggal,a.asal,a.keperluan,a.jenis,a.surat_tugas,b.nama')
					->from('data a')
					->join('jenis_tamu b','a.jenis = b.id','left')
					->where(['a.id'=>$id])
					->get('')
					->row_object();
				$data['tamu'] = $this->m_data->where(['data_id'=>$id])->get('data_tamu')->result_object();
				$data['tgl'] ='';

				return view('content/tambah/data',$data);
			}
			else{
				$data = $this->data();
				$data['tgl'] ='';
				return view('404',$data);
			}

	}
	

	public function cek(){
		$ttd = $this->m_data->get('ttd')->row_object();
		$data = $this->data();
		$data['file'] = $ttd->file;
		$data['tgl'] ='';
		
		return view('content/ttd/cek',$data);
	}
}
