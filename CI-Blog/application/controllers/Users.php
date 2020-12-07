<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function register()
	{
		$data['title'] = 'Sign Up'; 

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('username','Username','required|callback_username_already_exist');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('user/register', $data);
			$this->load->view('templates/footer');  
		}
		else
		{
			$pwd = md5($this->input->post('password'));

			$this->user_model->register($pwd);

			$this->session->set_flashdata('user_register', 'Now You Register With CI-Blog');

			redirect('users/register','refresh');  
		}
	}
	public function login()
	{
		$data['title'] = 'Sign In'; 
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == false){

			$this->load->view('templates/header');
			$this->load->view('user/login', $data);
			$this->load->view('templates/footer'); 
		}
		else
		{
			$password = md5($this->input->post('password'));
			$username = $this->input->post('username');

			$user_id = $this->user_model->login($username,$password);

			if($user_id)
			{   
				$user_data = array(
					'username' =>$username,
					'user_id' => $user_id,
					'user_login_status'=> true
				);
				$this->session->set_userdata($user_data);

				$this->session->set_flashdata('user_login', 'Welcome in Ci Blog');

				redirect('posts','refresh');  
			}
			else
			{
				$this->session->set_flashdata('user_login_fail', 'check your username and password');

				redirect('users/login','refresh');  
			}



		}
		

		
	}

	public function logout()
	{

		$this->session->unset_userdata('user_login_status');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('user_logout', 'You Logout from CI-Blog');

		redirect('users/login','refresh');  


	}

	public function username_already_exist($username)
	{
		$this->form_validation->set_message('username_already_exist','please pick another username this username is already exist');
		if($this->user_model->username_already_exist($username))
		{
			return true;
		}
		else
		{
			return false;
		}

	}


}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */