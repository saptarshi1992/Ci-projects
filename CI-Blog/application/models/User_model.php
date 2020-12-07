 
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function register($pwd) 
	{
		$name = $this->input->post('name');
		$pincode = $this->input->post('pincode');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
         //$password = $this->input->post('password');

		$data = array('name' => $name,
			'pincode' => $pincode,
			'email' => $email,
			'username' => $username,
			'password' => $pwd
		);
		return $this->db->insert('user', $data);
	}
	public function login($username,$password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$query = $this->db->get('user');

		if($query->num_rows()==1)
		{
			return $query->row(0)->user_id;
		}
		else
		{
			return false;
		}

	}
	public function username_already_exist($username)
	{
		$query = $this->db->get_where('user', array('username' => $username));

		if (empty($query->row_array())) {
			return true;
		}
		else
		{
			return false;
		}
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */