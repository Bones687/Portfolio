<?php

class model_user extends CI_Model {
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Function is pretty self explanatory it checks the provided login/password
   *
   * @param $email
   * @param $password
   * @return bool
   */
  function login($email,$password)
  {
    $this->db->where("user_email",$email);
    $this->db->where("user_password",$password);

    $query=$this->db->get("user");
    if($query->num_rows()>0)
    {
      foreach($query->result() as $rows)
      {
        //add all data to session
        $newdata = array(
          'user_id'  => $rows->user_id,
          'user_name'  => $rows->user_email,
          'name' => $rows->user_first_name,
          'user_type' => $rows->user_type,
          'user_status' => $rows->user_status,
          'logged_in'  => TRUE,
        );
      }
      $this->session->set_userdata($newdata);
      return true;
    }
    return false;
  }

  /**
   * if everything in the registration form was correct it will insert user into the database.
   */
  public function add_user()
  {
    $data=array(
      'user_email'=>$this->input->post('email_address'),
      'user_password'=>md5($this->input->post('password')),
      'user_first_name'=>$this->input->post('user_first_name'),
      'user_last_name'=>$this->input->post('user_last_name'),
      'user_address1'=>$this->input->post('user_address1'),
      'user_address2'=>$this->input->post('user_address2'),
    );
    $this->db->insert('user',$data);
  }
}