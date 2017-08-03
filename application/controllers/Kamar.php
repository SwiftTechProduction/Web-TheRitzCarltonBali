<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kamar_model','kamar');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('index_view');
	}

	public function loadIndex()
	{
		$this->load->helper('url');
		$this->load->view('index_view');
	}

	public function loadKamar()
	{
		$this->load->helper('url');
		$this->load->view('kamar_view');
	}

	public function loadLagu()
	{
		$this->load->helper('url');
		$this->load->view('song_view');
	}

	public function ajax_list()
	{
		$list = $this->kamar->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kamar)
                {
			$no++;
			$row = array();
			$row[] = $kamar->id;
			$row[] = $kamar->kode_kamar;
			$row[] = $kamar->nama_kamar;
			$row[] = $kamar->lantai_kamar;
			$row[] = $kamar->tipe_kamar;
			$row[] = $kamar->harga;
			

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kamar('."'".$kamar->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kamar('."'".$kamar->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kamar->count_all(),
						"recordsFiltered" => $this->kamar->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->kamar->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'id' => $this->input->post('id'),
				'kode_kamar' => $this->input->post('kode_kamar'),
				'nama_kamar' => $this->input->post('nama_kamar'),
				'lantai_kamar' => $this->input->post('lantai_kamar'),
				'tipe_kamar' => $this->input->post('tipe_kamar'),
				'harga' => $this->input->post('harga'),
				
			);
		$insert = $this->kamar->save($data);
		echo json_encode(array("status" => TRUE));
	} 

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'id' => $this->input->post('id'),
				'kode_kamar' => $this->input->post('kode_kamar'),
				'nama_kamar' => $this->input->post('nama_kamar'),
				'lantai_kamar' => $this->input->post('lantai_kamar'),
				'tipe_kamar' => $this->input->post('tipe_kamar'),
				'harga' => $this->input->post('harga'),
				
			);
		$this->kamar->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->kamar->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id') == '')
		{
			$data['inputerror'][] = 'id';
			$data['error_string'][] = 'Id is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('kode_kamar') == '')
		{
			$data['inputerror'][] = 'kode_kamar';
			$data['error_string'][] = 'Kode Kamar is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama_kamar') == '')
		{
			$data['inputerror'][] = 'nama_kamar';
			$data['error_string'][] = 'Nama Kamar is required';
			$data['status'] = FALSE;
		}
                
                if($this->input->post('lantai_kamar') == '')
		{
			$data['inputerror'][] = 'lantai_kamar';
			$data['error_string'][] = 'Lantai Kamar is required';
			$data['status'] = FALSE;
		}
                
                if($this->input->post('tipe_kamar') == '')
		{
			$data['inputerror'][] = 'tipe_kamar';
			$data['error_string'][] = 'Tipe Kamar is required';
			$data['status'] = FALSE;
		}
                
                if($this->input->post('harga') == '')
		{
			$data['inputerror'][] = 'harga';
			$data['error_string'][] = 'Harga is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
