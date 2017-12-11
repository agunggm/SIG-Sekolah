<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __Construct()
	{
		parent::__Construct();

	}

	public function index()
	{
		$data['tongl'] = $this->db->get('lokasi');
		$this->template->load('back-end/_template','back-end/_dashboard',$data);
	}


	public function Lokasi()
	{
		if(isset($_POST['simpan'])){
			$data = array(
				'nama'		=> $this->input->post('nama'),
				'kategori'	=> $this->input->post('kategori'),
				'alamat'	=> $this->input->post('alamat'),
				'kec'		=> $this->input->post('kec'),
				'latittude'	=> $this->input->post('lat'),
				'longitude'	=> $this->input->post('long'),
			);
			$this->db->insert('lokasi',$data);
			redirect('dashboard/lokasi');
		}elseif(isset($_POST['update'])){
			$data = array(
				'nama'		=> $this->input->post('nama'),
				'kategori'	=> $this->input->post('kategori'),
				'alamat'	=> $this->input->post('alamat'),
				'kec'		=> $this->input->post('kec'),
				'latittude'	=> $this->input->post('lat'),
				'longitude'	=> $this->input->post('long'),
			);
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('lokasi',$data);
			redirect('dashboard/lokasi');
		}else{
			$data['l'] = $this->db->get('lokasi');
			$this->template->load('back-end/_template','back-end/_lokasi',$data);
		}
	}

	public function Lokasi_tambah()
	{
		$data['k'] = $this->db->get('kategori');
		$this->template->load('back-end/_template','back-end/_lokasi_tambah',$data);
	}

	public function Lokasi_edit($id)
	{
		$data['k'] = $this->db->get('kategori');
		$data['l'] = $this->db->get_where('lokasi',array('id'=>$id))->row_array();
		$this->template->load('back-end/_template','back-end/_lokasi_edit',$data);
	}

	public function Lokasi_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('lokasi');
		redirect('dashboard/lokasi');
	}
	public function lokasi_one($id)
	{

		$data['lo'] = $this->db->get_where("lokasi",array('id'=>$id))->result_array();
		$this->template->load('back-end/_template','back-end/_lokasi_one',$data);
	}
}
