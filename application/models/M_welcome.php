<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_welcome extends CI_Model {
  public function create($id, $filename) {
    $data = [
      'id' => $id,
      'name' => $this->input->post('name', TRUE),
      'description' => $this->input->post('description', TRUE),
      'filename' => $filename
    ];
    
    $this->db->insert('post', $data);
  }

  //1.buat function read
  public function read($id = FALSE) {
    if ($id === FALSE) {
      return $this->db->get('post')->result();
    }else{
      $query = $this->db->get_where('post', ['id' => $id]);
      return $query->row();
    }
  }

  //1. buat function update
  public function update($id) {
    $data = [
      'name' => $this->input->post('name', TRUE),
      'description' => $this->input->post('description', TRUE),
    ];
    $this->db->where('id', $id);
    $this->db->update('post', $data);
  }

  //buat function delete
  public function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('post');
  }
}