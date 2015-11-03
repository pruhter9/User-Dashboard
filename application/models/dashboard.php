<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Model {

	public function fetch_posts($userid)
	{
		return $this->db->query("SELECT posts.id as post_id, content, posts.created_at as created_at, first_name, last_name  FROM posts JOIN users ON posts.from_user_id = users.id WHERE for_user_id = ? ORDER BY posts.created_at DESC", $userid)->result_array();
	}

	public function fetch_comments($userid)
	{
		//return $this->db->query("SELECT posts.id as post_id, posts.user_id, posts.content, posts.created_at, first_name, last_name FROM posts JOIN users ON posts.from_user_id = users.id WHERE for_user_id = ?", $userid)->result_array();
		return $this->db->query("SELECT comments.content AS comment, message_id, comments.created_at AS com_created_at, first_name, last_name FROM comments JOIN posts ON comments.message_id = posts.id JOIN users ON comments.user_id = users.id WHERE posts.for_user_id = ? GROUP BY comments.id ORDER BY comments.created_at", $userid)->result_array();
	}

	public function associate_comments($posts, $comments)
	{
		$ret_arr = $posts;
		for($i=0; $i<count($posts); $i++) {
			$post_comments = array();
			foreach ($comments as $comment) {
				if($comment['message_id'] == $posts[$i]['post_id'])
				{	
					$post_comments[] = $comment;
				}
			}
			$ret_arr[$i]['comments'] = $post_comments;
		}
		return $ret_arr;
	}

	public function insert_post($data)
	{
		$query = "INSERT INTO posts (from_user_id, for_user_id, content, created_at, updated_at) VALUES (?,?,?,?,?)";
		$values = array($this->session->userdata('userid'), $this->session->userdata['wall_user'], $data['user_post'], date("Y-m-d H:i:s"), date("Y-m-d H:i:s"));
		$this->db->query($query, $values);
	}

	public function insert_comment($data)
	{
		$query = "INSERT INTO comments (user_id, message_id, content, created_at, updated_at) VALUES (?,?,?,?,?)";
		$values = array($this->session->userdata('userid'), $data['post_id'], $data['user_comment'], date("Y-m-d H:i:s"), date("Y-m-d H:i:s"));
		$this->db->query($query, $values);
	}

}

?>