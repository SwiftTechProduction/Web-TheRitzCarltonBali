<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('booking_model','booking');
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

	public function loadBooking()
	{
		$this->load->helper('url');
		$this->load->view('booking_view');
	}

	public function loadLagu()
	{
		$this->load->helper('url');
		$this->load->view('song_view');
	}

	public function ajax_list()
	{
		$list = $this->booking->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $booking)
                {
			$no++;
			$row = array();
			$row[] = $booking->id;
			$row[] = $booking->kode_kamar;
			$row[] = $booking->nama_kamar;
			$row[] = $booking->kode_pelanggan;
			$row[] = $booking->nama;
			$row[] = $booking->harga;
			$row[] = $booking->check_in;
			$row[] = $booking->check_out;
			

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_booking('."'".$booking->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_booking('."'".$booking->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->booking->count_all(),
						"recordsFiltered" => $this->booking->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->booking->get_by_id($id);
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
				'kode_pelanggan' => $this->input->post('kode_pelanggan'),
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'check_in' => $this->input->post('check_in'),
				'check_out' => $this->input->post('check_out'),
				
			);
		$insert = $this->booking->save($data);
		echo json_encode(array("status" => TRUE));
	} 

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'id' => $this->input->post('id'),
				'kode_kamar' => $this->input->post('kode_kamar'),
				'nama_kamar' => $this->input->post('nama_kamar'),
				'kode_pelanggan' => $this->input->post('kode_pelanggan'),
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'check_in' => $this->input->post('check_in'),
				'check_out' => $this->input->post('check_out'),
				
			);
		$this->booking->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->booking->delete_by_id($id);
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
                
                if($this->input->post('kode_pelanggan') == '')
		{
			$data['inputerror'][] = 'kode_pelanggan';
			$data['error_string'][] = 'kode_pelanggan is required';
			$data['status'] = FALSE;
		}
                
                if($this->input->post('nama') == '')
		{
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'Nama is required';
			$data['status'] = FALSE;
		}
                
                if($this->input->post('harga') == '')
		{
			$data['inputerror'][] = 'harga';
			$data['error_string'][] = 'Harga is required';
			$data['status'] = FALSE;
		}
                
                if($this->input->post('check_in') == '')
		{
			$data['inputerror'][] = 'check_in';
			$data['error_string'][] = 'Check In is required';
			$data['status'] = FALSE;
		}
                
                if($this->input->post('check_out') == '')
		{
			$data['inputerror'][] = 'check_out';
			$data['error_string'][] = 'Check Out is required';
			$data['status'] = FALSE;
		}
                

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
