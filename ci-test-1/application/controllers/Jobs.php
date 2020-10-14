
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Books');
	}

	public function index()
	{
		$this->load->view('dash/add_job');
	}
	public function insert_book()
	{
		if($this->input->post('b_submit'))
		{
			$b_name = $this->input->post('b_name');
			$get_data = array(
				'book_name' => $b_name
			);
			
			$this->Books->insert_data($get_data);
			redirect('jobs','refresh');

		}
	}
	public function job_list()
	{
		$this->load->view('dash/book_list');
	}
	public function update_data($book_id)
	{
		$this->load->view('dash/update_book', $book_id);
	}
	public function update_data_insert($id)
	{
		if($this->input->post('u_submit'))
		{
			$book_name = $this->input->post('b_name');
			$book_name = array('book_name' => $book_name);
			$this->db->where('b_id', $id);
			$this->db->update('book', $book_name);
			redirect('jobs/job_list','refresh');
		}

	}
	public function delete_data($d_id)
	{
		$this->db->where('b_id', $d_id);
		$this->db->delete('book');
		redirect('jobs/job_list','refresh');
	}
}

/* End of file Jobs.php */
/* Location: ./application/controllers/Jobs.php */