<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ttd extends CI_Controller
{

	public function index(){
		return view('content/ttd/index');
	}
	function proses(){
		$ttd = $this->m_data->get('ttd')->row_object();

		if($ttd->status == 2){
			$data = array(
				'status' => '1'
			);
			$result = array();
			$imagedata = base64_decode($_POST['img_data']);
			$filename = $ttd->file;
			//Location to where you want to created sign image
			$file_name = './assets/ttd/'.$filename.'.jpg';
			file_put_contents($file_name,$imagedata);
			$result['status'] = 1;
			$result['file_name'] = $file_name;

			$this->m_data->where(['id'=>1])->update('ttd',$data);
		}else{
			$result['status'] = '2';
		}

		echo json_encode($result);
	}
	public function loading($id){
		$tamu = $this->m_data->where(['id'=>$id])->get('data_tamu')->row_object();

		$ubah_nama = strtolower(str_replace(' ','_',strtolower($tamu->nama)));
		$ubah_nama2 = str_replace('.','',$ubah_nama);
		$ubah_nama3 = str_replace("'","",$ubah_nama2);
		$ubah_nama4 = str_replace(",","",$ubah_nama3);
		$data = array(
				'file' => $ubah_nama4.'_'.$tamu->data_id.'_'.$tamu->id,
				'status' => '2',
				'data_id' => $tamu->data_id,
				'tamu_id' => $tamu->id
			);
		$this->m_data->where(['id'=>'1'])->update('ttd',$data);
		
		return view('content/ttd/loading',$data);
	}

	public function cek_proses_ttd(){
		$data = $this->m_data->get('ttd')->row_object();
		$array = array(
			'status' =>$data->status
		);
		echo json_encode($array);
	}
	public function do_crop() {
		$data = $this->m_data->get('ttd')->row_object();
		$data_id = $data->data_id;
		# ambil width crop
		$targ_w = $_POST['w'];
		# abmil heigth crop
		$targ_h = $_POST['h'];
		# rasio gambar crop
		$jpeg_quality = 90;

		$nama_file = $data->file.'.jpg';
		# folder tempat gambar yang mau di crop
		$src = APPPATH . '../assets/ttd/'.$nama_file;

		# inisial handle copy gambar
		$img_r = imagecreatefromjpeg($src);
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

		# simpan hasil croping pada folder lain
		$path_img_crop = realpath(APPPATH . '../assets/ttd');
		# nama gambar yg di crop
		$img_name_crop = $data->file. '.jpg';

		# proses copy
		imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);

		# buat gambar
		imagejpeg($dst_r,$path_img_crop .'/'. $img_name_crop,$jpeg_quality);

		$datanya_tamu = array(
			'ttd' => $data->file.'.jpg',
		);
		$this->m_data->where(['id'=>$data->tamu_id])->update('data_tamu',$datanya_tamu);
		redirect(base_url('tambah_data/lihat/'.$data_id));

	}
	public function ulangi(){
		$data = $this->m_data->get('konfig')->row_object();
		$nama_file = $data->file.'.jpg';
		$src = APPPATH . '../assets/ttd/'.$nama_file;
		if(file_exists($src)){
			unlink($src);
		}

		$datax = array(
			'status' => '2'
		);
		$proses = $this->m_data->updatebyid('ttd',$datax,'id','1');
		if($proses){
			if($data->cara_ttd == '2'){
				redirect(base_url('ttd/loading'));
			}else{
				redirect(base_url('ttd'));
			}

		}else{
			redirect(base_url('ttd/cek_proses'));
		}

	}


}
