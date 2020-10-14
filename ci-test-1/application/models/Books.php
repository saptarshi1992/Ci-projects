 
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Model {

	public function insert_data($get_data)
	{
		$this->db->insert('book', $get_data);
	}

}

/* End of file Books.php */
/* Location: ./application/models/Books.php */