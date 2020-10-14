
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  public function __construct()
  {
  	parent::__construct();
  	
  	$this->load->model('Users');
  }
  

  public function index()
  {
    $this->load->view('inc/header.php');
    $this->load->view('home');
    $this->load->view('inc/footer.php');
  }
  public function register()
  {
    $this->load->view('inc/header.php');
    $this->load->view('register');
    $this->load->view('inc/footer.php');
  }
  public function login_process()
  {
   if($this->input->post('u_login')){
    $u_name = $this->input->post('u_name');
    $u_pass = md5($this->input->post('u_pass'));    	} 
    $user_data = array(
     'u_name'=> $u_name, 
     'u_pass'=> $u_pass
   );
    $user_list = $this->db->get_where(' user_data', array('u_name'=>$user_data['u_name']));
    foreach ($user_list->result() as $user) {
     
     if($user_data['u_name']==$user->u_name && $user_data['u_pass']==$user->u_pass)
     {
      $_SESSION['u_name'] = $user_data['u_name'];
      redirect('dash','refresh');
    }
    else{
     echo "<script> alert('username or password error');</script>";
     redirect('home','refresh');
   }
 }
}
public function reg_process()
{
 if($this->input->post('u_reg')){ 
  $u_mail =$this->input->post('u_email');
  $u_name = $this->input->post('u_name');
  $u_pass = md5($this->input->post('u_pass'));    	} 
  $user_data = array(
   'u_email' =>$u_mail,
   'u_name'=> $u_name, 
   'u_pass'=> $u_pass
 );
  $this->Users->insert_user($user_data);
  redirect('home','refresh');
}
public function logout()
{
  session_unset();
  session_destroy();
  redirect('home','refresh');
}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */