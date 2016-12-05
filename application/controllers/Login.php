<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login extends CI_Controller 
{

	function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_dash');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_dash');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login/index');
		}
		else
		{
			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->security->xss_clean($this->input->post('password'));
			$this->load->model('m_admin');
            $query = $this->m_admin->login($username,$password);
			if($query==false){
			 	$msg = '<font color=white>Invalid username and/or password. Please Check it</font><br />';
				$data['message'] = $msg;	
				$this->load->view('login/index',$data);
				     		   }
			else{
                $row = $query->row(); 
				$newdata = array(
                			   'username'  => $username,
                  			   'userid'     =>  $row->id,
                   			   'logged_in' => TRUE
               					);

				$this->session->set_userdata($newdata);
				redirect('Login/home');
			    }

		}
    }
    public function home()
    {
      $this->load->view('admin/common/header');
        $this->load->view('admin/common/menu');
        $this->load->view('admin/home'); 
    }

   
	}



?>
