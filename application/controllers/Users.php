<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
  public function __construct(){
    parent::__construct();

    // Load Model
    $this->load->model('Main_model');

    // Load base_url
    $this->load->helper('url');
  }
  public function index(){
    $users = $this->Main_model->getUsernames();

    $data['users'] = $users;

    $this->load->view('user_view',$data);
  }

  public function userDetails(){
    header('Access-Control-Allow-Origin: *');
    // POST data
    $postData = $this->input->post();

    // get data
    $data = $this->Main_model->getUserDetails($postData);

    echo json_encode($data);
  }

}