<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

    public function get_categories(){

        $this->db->select('id');
        $this->db->select('name');
        $records = $this->db->get('category');
        $categories = $records->result_array();
        return $categories;

    }

    public function get_sub_categories($postData = array()){
        $response = array();

        if(isset($postData['category'])){
            // SELECT SUB CATEGORIES
            $this->db->select('*');
            $this->db->where('category_id',$postData['category']);
            $records = $this->db->get('sub_category');
            $response = $records->result_array();
        }

        return $response;
    }
}