<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function register_user($user_data)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[30]|is_unique[users.email]');
		$this->form_validation->set_rules('first', 'First Name', 'trim|required|max_length[30]|alpha');
		$this->form_validation->set_rules('last', 'Last Name', 'trim|required|max_length[30]|alpha');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[15]|matches[confirm]|md5');
		$this->form_validation->set_rules('confirm', 'Password Confirm', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			return false;
		}
		else
		{
			$password = $user_data['password'];
			$encryptedPassword = md5($password);

			$query = "INSERT INTO users (email, first_name, last_name, description, password, user_level, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?)";
			$values = array($user_data['email'], $user_data['first'], $user_data['last'], 'Add a description', $encryptedPassword, 'normal', date("Y-m-d H:i:s"), date("Y-m-d H:i:s"));
			$this->db->query($query, $values);
			return true;
		}

	}

	public function login_user($data)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			return false;
		}
		else
		{
			$user_data = $this->db->query("SELECT email, password FROM users WHERE email = ?", $data['email'])->row_array();
			if(empty($user_data))
			{
				$this->session->set_flashdata('login_error', 'Invalid credentials, please register or try again');
				return false;
			}
			else
			{
				$encryptedPassword = md5($data['password']);
				if($encryptedPassword == $user_data['password'])
				{
					return true;
				}
				else
				{
					$this->session->set_flashdata('login_error', 'Invalid credentials, please register or try again');
					return false;
				}
			}
		}

	}

	public function fetch_user($email)
	{
		return $this->db->query("SELECT id, first_name, last_name, user_level FROM users WHERE email = ?", $email)->row_array();
	}

	public function fetch_user_by_id($id)
	{
		return $this->db->query("SELECT id, first_name, last_name, created_at, email, description, user_level FROM users WHERE users.id = ?", $id)->row_array();
	}

	public function fetch_users()
	{
		return $this->db->query("SELECT * FROM users")->result_array();
	}

	public function update_desc($data)
	{
		$values = array($data['description'], date("Y-m-d H:i:s"), $data['id']);
		$this->db->query("UPDATE users SET description = ?, updated_at = ? WHERE id = ?", $values);
	}

	public function update_info($data)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[30]|is_unique[users.email]');
		$this->form_validation->set_rules('first', 'First Name', 'trim|required|max_length[30]|alpha');
		$this->form_validation->set_rules('last', 'Last Name', 'trim|required|max_length[30]|alpha');
		
		if ($this->form_validation->run() == FALSE)
		{
			return false;
		}
		else
		{
			$query = "UPDATE users SET email = ?, first_name = ?, last_name = ?, updated_at = ? WHERE id = ?";
			$values = array($data['email'], $data['first'], $data['last'], date("Y-m-d H:i:s"), $data['id']);
			$this->db->query($query, $values);
			return true;
		}	
	}

	public function update_password($data)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[15]|matches[confirm]|md5');
		$this->form_validation->set_rules('confirm', 'Password Confirm', 'trim|required');	

		if ($this->form_validation->run() == FALSE)
		{
			return false;
		}
		else
		{
			$password = $data['password'];
			$encryptedPassword = md5($password);

			$query = "UPDATE users SET password = ?, updated_at = ? WHERE id = ?";
			$values = array($encryptedPassword, date("Y-m-d H:i:s"), $data['id']);
			$this->db->query($query, $values);
			return true;
		}
	}

	public function remove_user($id)
	{
		$this->db->query("DELETE FROM users WHERE id = ?", array($id));
	}

	public function update_user_level($data)
	{
		$query = "UPDATE users SET user_level = ? WHERE id = ?";
		$values = array($data['user_level'], $data['id']);
		$this->db->query($query, $values);
	}

}

?>