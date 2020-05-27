<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Base.php';

class Register_informasi extends Base{
	public function tambah($id){

		$data = $this->m_data->insert('informasi',['data_id'=>$id]);
		if($data == true){
			redirect(base_url('register_informasi/edit/'.$id));
		}

	}
	public function edit($id){

		$data = $this->data();
		$data['tgl'] = '';
		$data['data'] = $this->m_data->where(['data_id'=>$id])->get('informasi')->row_object();
		return view('content/laporan/register_informasi',$data);
	}

	public function proses_edit(){
		$array = array();
		foreach ($_POST as $key => $value) {
			$array[] = array(htmlspecialchars($key)=> htmlspecialchars($value));
		}
		$data = call_user_func_array('array_merge', $array);

		$eksekusi = $this->m_data->where(['data_id'=>$data['data_id']])->update('informasi',$data);
		if($eksekusi == true){
			redirect(base_url('register_informasi/edit/'.$data['data_id']));
		}
	}
}
