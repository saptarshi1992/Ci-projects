<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}
	
	public function add_categories()
	{
    //$name = $this->input->post('name');
		
		$data = array(
			'categories' => $this->input->post('name')
		);

		return $this->db->insert('categories', $data);
	}
	public function fetch_categories()
	{  
		$this->db->order_by('categories');

		$query = $this->db->get('categories');

		return $query->result_array();
		
	}
	public function get_categories($id)
	{
		$query = $this->db->get_where('categories',array(
			'cat_id' => $id
		)
	);
		return $query->row();
	}


}

/* End of file Categories_model.php */
/* Location: ./application/models/Categories_model.php */