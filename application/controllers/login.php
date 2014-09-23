<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
	
		//$this->load->view('signup_form');
		$this->load->view('login_form');

		
	}
	function signup(){
		$this->load->view('signup_form');
	}
	function create_member()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name','name','trim|required');
		$this->form_validation->set_rules('last_name','last name','trim|required');
		$this->form_validation->set_rules('last_name','last name','trim|required');
		$this->form_validation->set_rules('email', 'Email','trim|required|valid_email|xss_clean|callback_check_if_email_exists');
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[4]|callback_check_if_username_exists');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password_confirm', 'Password confirmation', 'trim|required|matches[password]');
		if ($this->form_validation->run()==false) {
			$this->load->view('signup_form');
			# code...
		}
		else
		{
			$this->load->model('membership_model');
			if ($query=$this->membership_model->create_member()) {
				# code...
				$data['account_created']='your accound has been created </br></br>you may login.';
				$this->load->view('login_form',$data);
			}
			else{
				# code...
				$this->load->view('signup_form');
			}
		}
	}
	function check_if_username_exists($requested_username){
		$this->load->model('membership_model');
		$username_available=$this->membership_model->check_if_username_exists($requested_username);
		if ($username_available) {
			# code...
			return true;
		}
			else{
				return false;
			}
		
	}
	function check_if_email_exists($requested_email){
		$this->load->model('membership_model');
		$email_not_in_use=$this->membership_model->check_if_email_exists($requested_email);
		if ($email_not_in_use) {
			# code...
			return true;
		}
			else{
				return false;
			}
		
	}
	function validate_credentials(){
		$this->load->model('membership_model');
		$query=$this->membership_model->validate();
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
			if ($this->form_validation->run()==false) {
			$this->load->view('login_form');
			# code...
		}
		else{

		if($query)//if validation is true 
		{
			$data=array(
				'username'=>$this->input->post('username'),
				'is_logged_in'=>true
				);
			
			$this->session->set_userdata($data);
			//redirect(members);

		echo "you are logged in";
		$this->load->view('members');
		}
		else{

			$this->index();
			echo "please try again";

		}
		}
	}
	function logout()
{
    $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
    $this->session->sess_destroy();
    echo "you have logged out";
    redirect('login/index');

}

	
}

