<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
	
		// Load Model
		$this->load->model('Post_model');
	}

	public function index(){

		$categories = $this->Post_model->get_categories();
		$data['categories'] = $categories;

		// print_r($categories);exit;

		$data['title'] = 'Post Form';

		$this->load->view('post_index', $data);
		
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
