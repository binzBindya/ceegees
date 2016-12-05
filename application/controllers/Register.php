<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Register extends CI_Controller 
{

	function index()
	{
		$this->load->view('register/index');
	}

	public function add_new()
	{
      $this->load->library('form_validation');
       $this->form_validation->set_rules('name','Name','required'); 
        $this->form_validation->set_rules('email','email','required');
        $this->form_validation->set_rules('password','password','required');
       

        if($this->form_validation->run() == TRUE)
        {

          $name = $this->security->xss_clean($this->input->post('name'));
          $email = $this->security->xss_clean($this->input->post('email'));
          $password = $this->security->xss_clean($this->input->post('password'));
          
      $this->load->model('M_admin');
          $result= $this->M_admin->add_user($name,$email,$password);
        
      
$this->session->set_flashdata('register', 'You are Successfully Registered! Please login to access your Profile!');
redirect('Register/index');  
} else {
$this->session->set_flashdata('register', 'not registered');
                   redirect('Register/index');  

}
     }
     public function forgot_password()
     {
        $this->load->view('forgot_password');
     }

      public function forgot_password1()
     {
        $this->load->library('form_validation');
       $this->form_validation->set_rules('email','email','required');
        

        if($this->form_validation->run() == TRUE)
        {

         $email = $this->security->xss_clean($this->input->post('email'));
          
           $query = $this->db->select('*')->from('login')->where('email',$email)->get();
           $row = $query->row();
           $id= "$row->id";
      /*$this->load->model('M_admin');
          $row= $this->M_admin->select_email($email);*/
         //$em = "$row->email";
 $this->load->library('my_phpmailer');

 
 $mail = new PHPMailer(true);
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl"; 
        //$mail->SMTPDebug  = 3; // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
         $mail->Username   = "webquaforum@gmail.com";  // user email address
        $mail->Password   = "webquaforum@14";            // password in GMail
        $mail->SetFrom('webquaforum@gmail.com',"ceegees");  //Who is sending the email
        $mail->AddReplyTo("webquaforum@gmail.com","ceegees");  //email address that receives the response
        $mail->Subject    = "Forgot Password";
       $mail->IsHTML(true);
         $mail->Body = "<div style='margin:0;padding:0;background:#eeeeee'>           
<table id='m_-7452655803255862081body_table' border='0' cellspacing='0' cellpadding='0' width='100%' style='background-color:#eeeeee'>
    <tbody><tr>
        <td>                  
            <table id='m_-7452655803255862081middle_column_table' border='0' cellspacing='0' cellpadding='0' align='center' style='width:640px;padding-left:20px;padding-right:20px;border-collapse:separate'>
                <tbody><tr>
                    <td class='m_-7452655803255862081middle_column_table_spacer' style='height:20px'>
                        <div class='m_-7452655803255862081middle_column_table_spacer_inner' style='height:20px;min-height:20px;max-height:20px;vertical-align:top;overflow:hidden'></div>
                    </td>
                </tr>
                <tr>
                    <td>                              
                        <table id='m_-7452655803255862081middle_column_inner_table' border='0' cellspacing='0' cellpadding='0' align='center' width='100%'>                                                                   
                            <tbody><tr>
                              <td>                                         
                                    
                                <table id='m_-7452655803255862081middle_column_content_table' border='0' cellspacing='0' cellpadding='40' width='100%' style='background:#ffffff;border-radius:8px'>
                                <tbody><tr>
                                <td id='m_-7452655803255862081middle_column_content_cell' style='background-color:#ffffff;border-radius:6px'>
                                <span style='font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;line-height:22px;color:#424242'>
                                                                             
                                   <p style='margin:0 0 30px 0'>
    
                                  <strong>Forgot your password?</strong> Reset it below:
    
                                  </p>

                                 <a style='display:inline-block;width:100%;background-color:#eaf3ff;text-decoration:none;color:#5486c6;font-size:18px;font-weight:bold;text-align:center;padding:15px 0px 15px 0px;border-radius:2px'
                                  href='http://localhost/ceegees/index.php/Register/new_password/$id' id='<?php echo $id;?>'>Reset password</a>
                                 </span>
                              </td>
                             </tr>
                            </tbody></table>
                           </td>
                          </tr><tr> 
                          <td> </td>  
                          </tr>
                         </tbody></table>                                                      
                               </td>                   
                          </tr>                    
                          <tr><td class='m_-7452655803255862081middle_column_table_spacer' style='height:20px'><div class='m_-7452655803255862081middle_column_table_spacer_inner' style='height:20px;min-height:20px;max-height:20px;vertical-align:top;overflow:hidden'></div>
                          </td></tr>               
                        </tbody></table>                        
                      </td>        
                     </tr>     
                    </tbody>
                  </table>   
                 <div class='yj6qo'>
                </div>
              <div class='adL'>
              </div>

            </div>";
              //$emil='binz.angel@gmail.com';

        
        $mail->AddAddress($email,"ceegees");

        // $mail->AddAttachment("images/phpmailer.gif");      // some attached files
        // $mail->AddAttachment("images/phpmailer_mini.gif"); // as many as you want
        if(!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
            $this->session->set_flashdata('password', 'Password has been sent to your mail, Please check your mail and SignIn.');
     redirect('Register/forgot_password'); 
        } 
         

else {
    //echo 'Message has been sent';
   $this->session->set_flashdata('password', 'New Password');
     redirect('Register/forgot_password2');  
}
}
// we are going to use SMTP
 }

   public function forgot_password2()
   {
      $this->load->view('forgot_passmesaage');
   }

     public function new_password()
     {
        $sess = $this->uri->segment(3);
        $this->load->model('M_admin');
        $data['result']=$this->M_admin->new_pass($sess);
        $this->load->view('new_password',$data);
     }
      public function new_password1()
      {
        $this->load->library('form_validation');
       $this->form_validation->set_rules('password','password','required');
       

        if($this->form_validation->run() == TRUE)
        {
           $id=$this->input->post('id');
          $password = $this->security->xss_clean($this->input->post('password'));
          
      $this->load->model('M_admin');
           $this->M_admin->new_password1($id,$password);
               
      $this->session->set_flashdata('password', 'Login Successfull');
      redirect('Login/home');  
                }
                else
                {
                   $this->session->set_flashdata('register', 'Not Success');
                   redirect('Login/index');  
                }
      }
	}

?>