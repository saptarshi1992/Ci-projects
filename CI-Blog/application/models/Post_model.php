
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function get_post($slug = FALSE,$limit = FALSE, $offset = FALSE)
	{
		if($limit){
			$this->db->limit($limit, $offset);
		}
		if($slug === FALSE)
			{   $this->db->order_by('posts.id', 'desc');
		$this->db->join('categories', 'categories.cat_id = posts.cat_id', 'left');
		$query = $this->db->get('posts');
		return $query->result_array();
	}
	$this->db->join('categories', 'categories.cat_id = posts.cat_id', 'left');
	$query = $this->db->get_where('posts',array('slug' => $slug
));
	return $query->row_array();
}

public function submit_post($post_image) 
{
	$slug = url_title($this->input->post('title'));

	$data = array(
		'title' => $this->input->post('title'),
		'cat_id' =>$this->input->post('cat_id'),
		'slug' => $slug,
		'body' => $this->input->post('body'),
		'user_id'=> $this->session->userdata('user_id'),
		'post_image'=> $post_image
	);

	return $this->db->insert('posts', $data);

}

public function delete_post($id)
{
	$this->db->where('id', $id);
	$this->db->delete('posts');
}

public function update_post()
{
	$slug = url_title($this->input->post('title'));

	$data = array(
		'title' => $this->input->post('title'),
		'cat_id' =>$this->input->post('cat_id'),
		'slug' => $slug,
		'body' => $this->input->post('body'),

	);
	$this->db->where('id',$this->input->post('id'));
	return $this->db->update('posts', $data);
}
public function fetch_categories()
{
	$this->db->order_by('categories');

	$query = $this->db->get('categories');

	return $query->result_array();
}
public function get_post_by_categories($id)
{
	$this->db->order_by('posts.id', 'desc');
	$this->db->join('categories', 'categories.cat_id = posts.cat_id', 'left');
	$query = $this->db->get_where('posts',array('posts.cat_id'=>$id));
	return $query->result_array();
}

}

/* End of file Post_model.php */
/* Location: ./application/models/Post_model.php */