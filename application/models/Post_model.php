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

    public function create_post($post_image){

        $data = array(
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body'),
            'image' => $post_image,
            'price' => $this->input->post('price'),
            'address' => $this->input->post('address'),
            'category_id' => $this->input->post('category'),
            'subcategory_id' => $this->input->post('sub_category'),
            
        );

        return $this->db->insert('posts', $data);
    }
}