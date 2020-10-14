
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_insert extends CI_Model {

	public function insert_student_data($get_data)
	{
		$this->db->insert('student', $get_data);
	}

}

/* End of file Student_insert.php */
/* Location: ./application/models/Student_insert.php */