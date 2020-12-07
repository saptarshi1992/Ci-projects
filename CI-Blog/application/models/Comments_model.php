<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function create_comment($post_id)
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$comment = $this->input->post('comment');

		$data = array('post_id'=>$post_id,
			          'name'=>$name,
			          'email'=>$email,
			          'comment'=>$comment
			         );
		return $this->db->insert('comments', $data);
	}

	public function get_comments($post_id)
	{
		$query = $this->db->get_where('comments', array('post_id' => $post_id));

		return $query->result_array();
	}
}

/* End of file Comments_model.php */
/* Location: ./application/models/Comments_model.php */