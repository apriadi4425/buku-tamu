<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Base.php';

class Proses extends Base{
	public function tekan_tambah(){
		$data = array('keperluan'=>'');
		$eksekusi = $this->m_data->insert('data',$data);
		if($eksekusi){

			$data = $this->m_data->where(['tanggal'=>null])->order_by('id','desc')->get('data')->row_object();
			$response = array(
				'status' =>'sukses',
				'last_id'=>$data->id,
			);
		}else{
			$response = array(
				'status' => 'error'
			);
		}
		echo json_encode($response);
	}

	public function cek_tombol(){
		$id = $this->input->post('id');
		$data = $this->m_data->where(['id'=>$id])->get('data')->row_object();

		if($data->tanggal == null){
			echo json_encode('1');
		}else{
			echo json_encode('2');
		}

	}

	public function edit_data(){
		$id = $this->input->post('id');
		$tanggal = $this->input->post('tanggal');
		$keperluan = $this->input->post('keperluan');
		$jenis = $this->input->post('jenis');
		$asal= $this->input->post('asal');
		$surat_tugas = $this->input->post('surat_tugas');
		$data = array(
			'tanggal' => $tanggal,
			'keperluan' => $keperluan,
			'jenis' => $jenis,
			'asal' => $asal,
			'surat_tugas' => $surat_tugas
		);
		if($tanggal == '' || $keperluan = '' || $jenis == '' || $asal == '' || $surat_tugas = ''){
			$response = 'error2';
		}else{
			$eksekusi = $this->m_data->where(['id'=>$id])->update('data',$data);

			if($eksekusi){
				$response = 'sukses';
			}else{
				$response = 'error';
			}
		}
		echo json_encode($response);
	}

	public function tambah_nama_pengunjung(){
		$array = array();
		foreach ($_POST as $key => $value) {
			$array[] = array(htmlspecialchars($key)=> htmlspecialchars($value));
		}
		$data = call_user_func_array('array_merge', $array);
		if($data['nama'] == ''){
			$response = 'error2';
		}else{
			$eksekusi = $this->m_data->insert('data_tamu',$data);
			if($eksekusi){
				$response = 'sukses';
			}else{
				$response = 'error';
			}
		}
		echo json_encode($response);
	}
	
	public function edit_nama_pengunjung(){
		$array = array();
		foreach ($_POST as $key => $value) {
			$array[] = array(htmlspecialchars($key)=> htmlspecialchars($value));
		}
		$data = call_user_func_array('array_merge', $array);
			$array = array(
				'nama'=>$data['nama'],
				'no_telp'=>$data['no_telp'],
				'alamat'=>$data['alamat'],
				'pekerjaan'=>$data['pekerjaan']
			);
		if($data['nama'] == ''){
			$response = 'error2';
		}else{
			$eksekusi = $this->m_data->where(['id'=>$data['id']])->update('data_tamu',$array);
			if($eksekusi){
				$response = 'sukses';
			}else{
				$response = 'error';
			}
		}
		echo json_encode($response);
	}
	
	public function get_tamu(){
		$id = $this->input->get('id');
		
		$data = $this->m_data->where(['id'=>$id])->get('data_tamu')->row_object();
		echo json_encode($data);
	}
	
	public function hapus($table,$id,$data_id){
		$this->m_data->where(['id'=>$id])->delete($table);
		if($table == 'data_tamu'){
			redirect(base_url('tambah_data/lihat/'.$data_id));
		}else{
			redirect(base_url());
		}
	}

}
