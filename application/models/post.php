<?php

class Post extends CI_Model {

  public function get_all_posts() {
    $query = 'SELECT posts.id, content, users.first_name, user_id
              FROM posts
              JOIN users
              ON posts.user_id = users.id
              ORDER BY posts.created_at DESC';
    return $this->db->query($query)->result_array();
  }

  public function add_post($data) {
    $query = "INSERT INTO posts (content, user_id) VALUES (?, ?)";
    $this->db->query($query, $data);
  }

  public function update_post($values) {
    $query = "UPDATE posts SET content = ?, updated_at = NOW() WHERE id = ?";
    $this->db->query($query, $values);
  }

}
?>