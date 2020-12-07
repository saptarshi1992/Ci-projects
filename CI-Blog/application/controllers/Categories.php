<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function index()
	{

		if(!$this->session->userdata('user_login_status'))
		{
			redirect('users/login','refresh');
		}
		$data['title'] = 'Categories';

		$data['categories'] = $this->categories_model->fetch_categories();

		$this->load->view('templates/header');
		$this->load->view('categories/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		if(!$this->session->userdata('user_login_status'))
		{
			redirect('users/login','refresh');
		}
		$data['title'] = 'Create Categories';

		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('categories/create', $data);
			$this->load->view('templates/footer');  
		} else {
			
			$this->categories_model->add_categories();
			$this->session->set_flashdata('catergories_created', 'Now You add a new catagory');
			redirect('categories/create','refresh');        

		}
	}
	public function posts($id)
	{  
		$data['title'] = $this->categories_model->get_categories($id)->categories;

		$data['posts'] = $this->post_model->get_post_by_categories($id);

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');  
	}

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */