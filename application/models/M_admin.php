<?php
class M_admin extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
  
    function login($username,$password)
    {
        $condition = array('username' => $username, 'password' => $password);
        $this->db->select('*');
	    $this->db->from('login');
        $this->db->where($condition);
	    $query = $this->db->get();
       
        if ($query->num_rows() == 1) {
            return $query;
				    } 
        else{
		return false;
	    }	


}

public function add_user($name,$email,$password)
    {
        $data = array(
            'email' => $email ,
            'username' => $name ,
            'password' => $password
                    );
        $this->db->insert('login', $data); 
    }

 public function select_email($email)
 {
    $this->db->select('*')->from('login');
    $this->db->where('email',$email);
    $query = $this->db->get();
        return $query->result();
 }

 public function new_pass($sess)
 {
    $this->db->select('*')->from('login');
    $this->db->where('id',$sess);
    $query = $this->db->get();
        return $query->result();
 }

 public function new_password1($id,$password){
     $data = array(
            'password' => $password
           );
		$this->db->where('id', $id);
		$this->db->update('login', $data); 
    }   

	function register_login($name,$password)
    {
        $condition = array('username' => $name, 'password' => $password);
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where($condition);
        $query = $this->db->get();
       
        if ($query->num_rows() == 1) {
            return $query;
                    } 
        else{
        return false;
        }   


}

  
}
?>
