<?php
Class Admin extends CI_Model
{
    function login($email, $password)
    {
      $this -> db -> select('user_id, email, password');
      $this -> db -> from('pto_users');
      $this -> db -> where('email', $email);
      $this -> db -> where('password', MD5($password));
      $this -> db -> limit(1);

      $query = $this -> db -> get();

      if($query -> num_rows() == 1)
      {
        return $query->result();
      }
      else
      {
        return false;
      }
    }
    public function isAdmin($logindata)
    {

        $querydb1 = $this->db->select('*')->from("pto_users")->where('email',$logindata['email'])->where('password',md5($logindata['pass']))->where('is_active','1');
        $querydb = $querydb1->get();
        $result = $querydb->result();
        //$this->db->where('email',$logindata['email'])->where('password',md5($logindata['pass']));


        return $result;
    }
    function insert_admin($data){
        $this->db->insert('pto_users', $data); 
        return $this->db->insert_id();
    }
}
?>