<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function register()
	{
	
		if($this->input->post()){
			$this->load->model('User');
			$data = $this->input->post();
			$success = $this->User->register_user($data);

			if($success)
			{
				$user = $this->User->fetch_user($data['email']);
				if($user['user_level'] == 'admin')
				{
					$this->session->set_userdata('userid', $user['id']);
					$this->session->set_userdata('admin', true);
					redirect('/dashboard/admin/');
				}
				else
				{
					$this->session->set_userdata('userid', $user['id']);
					$this->session->set_userdata('admin', false);
					redirect('dashboard/');
				}
			}
		}
		$this->load->view('register');

	}

	public function login()
	{
		if($this->input->post()){
			$this->load->model('User');
			$data = $this->input->post();
			$success = $this->User->login_user($data);

			if($success)
			{
				$user = $this->User->fetch_user($data['email']);
				if($user['user_level'] == 'admin')
				{
					$this->session->set_userdata('userid', $user['id']);
					$this->session->set_userdata('admin', true);
					redirect('/dashboard/admin');
				}
				else
				{
					$this->session->set_userdata('userid', $user['id']);
					$this->session->set_userdata('admin', false);
					redirect('dashboard/');
				}
			}
		}
		$this->load->view('login');

	}

	public function update_desc()
	{
		$this->load->model('User');
		$this->User->update_desc();
		$data = $this->input->post();
		$data['id'] = $this->session->userdata('userid');
		redirect('/users/edit');
	}

	public function change_password()
	{
		$this->load->model('User');
		$data = $this->input->post();
		$data['id'] = $this->session->userdata('userid');
		$this->User->update_password($data);
		redirect('/users/edit');
	}

	public function change_info()
	{

		$this->load->model('User');
		$data = $this->input->post();
		$data['id'] = $this->session->userdata('userid');
		$this->User->update_info($data);

		redirect('/users/edit');
	}

	public function destroy_user($user_id)
	{
		$this->load->model('User');
		$this->User->remove_user($user_id);
		redirect('/dashboard/admin');
	}

	public function admin_create_user()
	{
	
		if($this->input->post()){
			$this->load->model('User');
			$data = $this->input->post();
			$this->User->register_user($data);
		}
		$this->load->view('add_user');

	}

	public function admin_edit($id)
	{
		if($this->input->post())
		{
			$data = $this->input->post();
			$data['id'] = $id;
			$this->load->model('User');
			if($this->input->post('form_id') == 'user_info')
			{
				$this->User->update_info($data);
				$this->User->update_user_level($data);
			}
			else
			{
				$this->User->update_password($data);
			}
		}	
		$view_data['id'] = $id;
		$this->load->view('admin_edit', $view_data);
	}

}
