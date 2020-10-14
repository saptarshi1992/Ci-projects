<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Student_insert');
	}
	public function index()
	{
		$this->load->view('dash/add_student');
	}
    public function student_update()
    {
    	if($this->input->post('s_submit'))
    	{
    		$name = $this->input->post('s_name');
    		$email = $this->input->post('s_email');
    		$phone = $this->input->post('s_phone');
    		$book = $this->input->post('s_books');
    		$insert_data = array(
                's_name' => $name,
                's_email' => $email,
                's_phone' => $phone,
                's_book' => $book,
            );
    		$this->Student_insert->insert_student_data($insert_data);
    		redirect('student','refresh');
    	}
    }
    public function student_list()
    {
    	$this->load->view('dash/student_list');
    }
    public function student_details_view()
    {
    	$this->load->view('dash/update_student');
    }
    public function student_details_update_view()
    {
    	$this->load->view('dash/update_student_data');
    }
    public function student_update_data_insert($id)
    {
       if($this->input->post('s_u_submit'))
       {
          $s_name = $this->input->post('s_u_name');
          $s_email = $this->input->post('s_u_email');
          $s_phone = $this->input->post('s_u_phone');
          $s_book = $this->input->post('s_u_books');
          $get_data = array(
            's_name' => $s_name,
            's_email' => $s_email,
            's_phone' => $s_phone,
            's_book' => $s_book
        );
          $this->db->where('s_id', $id);
          $this->db->update('student', $get_data);
          redirect('Student/student_list','refresh');

      }
  }
  public function delete($id)
  {
   $this->db->where('s_id', $id);
   $this->db->delete('student');
   redirect('Student/student_list','refresh');
}



}

/* End of file Student.php */
/* Location: ./application/controllers/Student.php */