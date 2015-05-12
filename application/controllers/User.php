<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('model_user');
  }
  public function index()
  {
    if(($this->session->userdata('user_name')!=""))
    {
      $this->welcome();
    }
    else{
      $data['title']= 'Home';
      $this->load->view('view_header',$data);
      $this->load->view("view_registration.php", $data);
      $this->load->view('view_footer',$data);
    }
  }
  public function welcome()
  {
    $data['title']= 'Welcome';
    $data['user'] = $this->session->userdata('name');
    print_r($this->session->userdata('name'));
    $this->load->view('view_header',$data);
    $this->load->view('view_nav.php', $data);
    $this->load->view('dashboard.php', $data);
    $this->load->view('view_footer',$data);
  }
  public function login()
  {
    $email=$this->input->post('email');
    $password=md5($this->input->post('pass'));

    $result=$this->model_user->login($email,$password);
    if($result) $this->welcome();
    else{
      $this->load->view('view_header');
      $this->load->view('view_login');
      $this->load->view('view_footer');
    }
  }
  public function thank()
  {
    $data['title']= 'Thank';
    $this->load->view('view_header',$data);
    $this->load->view('view_thank.php', $data);
    $this->load->view('view_footer',$data);
  }
  public function registration()
  {
    $this->load->library('form_validation');
    // field name, error message, validation rules
    $this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
    $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

    if($this->form_validation->run() == FALSE)
    {
      $this->index();
    }
    else
    {
      $this->model_user->add_user();
      $this->thank();
    }
  }
  public function logout()
  {
    $newdata = array(
      'user_id'   =>'',
      'user_name'  =>'',
      'user_email'     => '',
      'logged_in' => FALSE,
    );
    $this->session->unset_userdata($newdata );
    $this->session->sess_destroy();
    $data['title']= 'Home';
    $this->load->view('view_header',$data);
    $this->load->view("view_nav");
    $this->load->view('dashboard.php', $data);
    $this->load->view('view_footer',$data);
  }
}