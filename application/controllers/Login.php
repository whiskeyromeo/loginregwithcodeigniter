<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('login_reg');
	}

	public function index()
	{
		$this->load->view('main_view');

	}

	public function validate_login()
	{
		$data = [
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		];
		//var_dump($data);
		//die('in validate_login controller');
		$query = $this->login_reg->get_info($data);

		if($query)
		{
			$this->login($data);
		}
		else
		{
			$this->index();
		}

	}
	function login($data)
	{
		$data['is_logged_in'] = TRUE;
		$this->load->view('member_page', $data);	
	}

	function create_member()
	{
		$this->load->library('form_validation');
		//set rules(field name, error message, validation rules)
		$this->form_validation->set_rules('firstname', 'Name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('username', 'Password', 'trim|required|min_length[8]|max_length[32]');
		$this->form_validation->set_rules('confpassword', 'Password Confirmation', 'trim|required|matches[password]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->register();
		}

	}
	function register()
	{
		$data = [
			'first_name' => $this->input->post('firstname'),
			'last_name' =>$this->input->post('lastname'),
			'email' =>$this->input->post('email'),
			'username' =>$this->input->post('username'),
			'password' =>md5($this->input->post('password'))
		];
		$query = $this->login_reg->register_user($data);

		$gotdata = $this->login_reg->get_info($data);
		var_dump($gotdata);
		if($gotdata)
			$this->load->view('member_page',$gotdata);
		
	}

}