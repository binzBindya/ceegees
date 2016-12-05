<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller 
{
      function __construct(){
    		parent::__construct();
            $user = $this->session->userdata('level');
                if (!isset($user)){ 
                        redirect('/');
                } 
                else{ 
                    return true;
                }
    }
        public function index()
     {
             $this->load->model('m_import');
        $data['files'] = $this->m_import->list_files();
        $this->load->view('admin/common/header');
        $this->load->view('admin/common/menu');
        $this->load->view('admin/pdf_list',$data); 
       }  
       
        public function change_password()
     {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
           
            $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_password_check');
            if ($this->form_validation->run() == TRUE)
                
                {
                  
                    $password = $this->security->xss_clean($this->input->post('password'));
                   
                    $this->session->set_flashdata('check_password', 'true'); 
                    redirect('admin/reset_password');	
                }
            else
                {
                    $this->load->view('admin/common/header');
                    $this->load->view('admin/common/menu');
                    $this->load->view('admin/change_password');
                }
        } 
        
       
    public function password_check($str)
	{
        $user_data=$this->session->all_userdata();
        $query = $this->db->select('password')->from('login')->where('id',$user_data['userid'])->get();
        foreach ($query->result() as $row)
        {
                if($row->password==md5($str))
                {
                   return true;
                }
               else
               {
                   $this->form_validation->set_message('password_check', 'Incorrect Password');
                   return false;
                }
        }
       
		
    }

    public function reset_password()
    {
      
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[conpassword]');
            $this->form_validation->set_rules('conpassword', 'Confirm Password', 'trim|required');
            if ($this->form_validation->run() == TRUE)
                
                {
                  $password = $this->security->xss_clean($this->input->post('password'));
                  $this->load->model('m_admin');
                  $this->m_admin->reset_password($password);
                  $this->session->set_flashdata('resetpassword', 'Password Changed');
                  redirect('admin/reset_password');
                }
            else
                {
            
                    $this->load->view('admin/common/header');
                    $this->load->view('admin/common/menu');
                    $this->load->view('admin/new_password');
        
                }
                    
        }
    public function logout()
    {
            $this->session->sess_destroy();
            redirect('Login/index');
    }
}
?>