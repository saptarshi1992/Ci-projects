<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {



	public function index($offset = 0)
	{
  //paginattion config//
  // $this->load->library('pagination');

   $config['base_url'] = base_url().'posts/index/';
   $config['total_rows'] = $this->db->count_all('posts');
   $config['per_page'] = 3;
   $config[' uri_segment'] = 3;
   $config['attributes'] = array('class' => 'pagination-links');

   $this->pagination->initialize($config);


   if(!$this->session->userdata('user_login_status'))
   {
    redirect('users/login','refresh');
  }

  $data['title'] = 'Latest Post';

  $data['posts'] = $this->post_model->get_post(FALSE, $config['per_page'],$offset);


  $this->load->view('templates/header');
  $this->load->view('posts/index', $data);
  $this->load->view('templates/footer');
}
public function view($slug = NULL)
{   

  $data['post'] = $this->post_model->get_post($slug);


  $post_id = $data['post']['id'];

  $data['comment'] = $this->comments_model->get_comments($post_id);



  if(empty($data['post']))
  {
   show_404();
 }

 $data['title'] = $data['post']['title'];  

 $this->load->view('templates/header');
 $this->load->view('posts/view', $data);
 $this->load->view('templates/footer');   	
}

public function create()
{
 if(!$this->session->userdata('user_login_status'))
 {
  redirect('users/login','refresh');
}
$data['title'] = "create post";
$data['categories'] = $this->post_model->fetch_categories();
$this->form_validation->set_rules('title', 'title', 'required');
$this->form_validation->set_rules('body', 'body', 'required');

if ($this->form_validation->run() === FALSE) {
 $this->load->view('templates/header');
 $this->load->view('posts/create', $data);
 $this->load->view('templates/footer');  
} else {
  $config['upload_path']          = './assets/posts';
  $config['allowed_types']        = 'gif|jpg|png';
  $config['max_size']             = 2000;
  $config['max_width']            = 1024;
  $config['max_height']           = 768;


  $this->load->library('upload', $config);

  if ( ! $this->upload->do_upload()){
   $error = array('error' => $this->upload->display_errors());
   $post_image = "noimage.png";
 }
 else{
   $data = array('upload_data' => $this->upload->data());
   $post_image = $_FILES['userfile']['name'];
 }

 $this->post_model->submit_post($post_image);
 $this->session->set_flashdata('Post_created', 'you created a new post in ci blog');
 redirect('posts','refresh');
}

}

public function delete($id)
{
 $this->post_model->delete_post($id);
 redirect('posts','refresh');
}
public function edit($slug)
{
 if(!$this->session->userdata('user_login_status'))
 {
  redirect('users/login','refresh');
}
if($this->session->userdata('user_id') != $this->post_model->get_post($slug)['user_id'] ){
  redirect('posts','refresh');
}
$data['post'] = $this->post_model->get_post($slug);
$data['categories'] = $this->post_model->fetch_categories();

if(empty($data['post']))
{
 show_404();
}

$data['title'] = 'Update Data';  

$this->load->view('templates/header');
$this->load->view('posts/edit', $data);
$this->load->view('templates/footer');
}

public function update_data()
{ 
 if(!$this->session->userdata('user_login_status'))
 {
  redirect('users/login','refresh');
}  
$this->post_model->update_post();

redirect('posts','refresh');
}

}


/* End of file Posts.php */
/* Location: ./application/controllers/Posts.php */