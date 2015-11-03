<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {

	public function dashboard_page()
	{
		$this->load->model('User');
		$view_data['users'] = $this->User->fetch_users();
		$this->load->view('user_dashboard', $view_data);
	}

	public function profile_page()
	{
		$this->load->view('profile_page');
	}

	public function show_wall($user_id)
	{
		$this->load->model('Dashboard');
		$this->load->model('User');
		$this->session->set_userdata('wall_user', $user_id);
		$view_data['wall_user'] = $this->User->fetch_user_by_id($user_id);
		$view_data['wall_posts'] = $this->Dashboard->fetch_posts($user_id);
		$view_data['wall_comments'] = $this->Dashboard->fetch_comments($user_id);
		$view_data['wall_posts'] = $this->Dashboard->associate_comments($view_data['wall_posts'], $view_data['wall_comments']);
		$this->load->view('wall', $view_data);
	}

	public function add_post()
	{
		$this->load->model('Dashboard');
		$data = $this->input->post();
		$this->Dashboard->insert_post($data);
		redirect('/users/show/'.$this->session->userdata('wall_user'));
	}

	public function add_comment($post_id)
	{
		$this->load->model('Dashboard');
		$data = $this->input->post();
		$data['post_id'] = $post_id;
		$this->Dashboard->insert_comment($data);
		redirect('/users/show/'.$this->session->userdata('wall_user'));
	}

}
