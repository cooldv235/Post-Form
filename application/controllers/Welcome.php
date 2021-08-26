<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
	
		// Load Model
		$this->load->model('Post_model');
	}

	public function index(){

		
		$data['categories'] = $this->Post_model->get_categories();

		// FORM VALIDATION
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('price', 'Address', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('sub_category', 'Sub Category', 'required');

		if($this->form_validation->run() === false){
			$data['title'] = 'Post Form';

			$this->load->view('post_index', $data);
		} else {

			// UPLOAD IMAGE
			$config['upload_path'] = './assets/images';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('userfile')){
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}

			$this->Post_model->create_post($post_image);

			// Set message
			$this->session->set_flashdata('post_created', 'Your post has been created');

			redirect('welcome');
		}


		// print_r($categories);exit;

		
		
	}

	public function get_sub_categories(){
		header('Access-Control-Allow-Origin: *');
		// POST data
		$postData = $this->input->post();

		// print_r($postData);

		// get data
		$data = $this->Post_model->get_sub_categories($postData);
	
		echo json_encode($data);
	}
	
}
