<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
  private $data = array('title' => 'Dalton Carvings',
                        'name' => '',
                        'userType' => 'RG');

  public function __construct()
  {
    parent::__construct();
    $this->load->model('model_user');
  }

  /**
   * by default load dashboard()
   */
  public function index()
  {
    $this->dashboard();
  }

  /**
   * this checks if you are still logged in then loads the home screen with my most recent uploads
   */
  public function dashboard()
  {
    $this->data['title']= 'Welcome';
    $this->data['name'] = '';

    if(null !== ($this->session->userdata('name')))
    {
      if (!$this->session->userdata('user_status'))
        $this->logout();
      $this->data['name'] = $this->session->userdata('name');
      $this->data['userType'] = $this->session->userdata('user_type');
    }
    $this->load->model('Model_item');
    $this->data['itemList'] = $this->Model_item->getRecentWorks();

    $this->load->view('template/view_header',$this->data);
    $this->load->view('template/view_nav', $this->data);
    $this->load->view('base/dashboard', $this->data);
    $this->load->view('template/view_footer');
  }

  /**
   * verifies password and user emails and then either logs you in or gives you an error
   */
  public function login()
  {
    $email=$this->input->post('email');
    $password=md5($this->input->post('pass'));

    $result=$this->model_user->login($email,$password);

    if($result)
      $this->dashboard();
    else{
      $this->load->view('template/view_header', $this->data);
      $this->load->view('template/view_nav', $this->data);
      $this->load->view('base/view_login');
      $this->load->view('template/view_footer');
    }
  }

  /**
   * loads the registration form
   */
  public function register()
  {
    $this->data['title']= 'Registration';
    $this->load->view('template/view_header',$this->data);
    $this->load->view('template/view_nav', $this->data);
    $this->load->view("base/view_registration");
    $this->load->view('template/view_footer');
  }

  /**
   * sets rules for registration and runs logic to register or add user to the database
   */
  public function registration()
  {
    $this->load->library('form_validation');
    // field name, error message, validation rules
    $this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
    $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

    if($this->form_validation->run() == FALSE)
    {
      $this->register();
    }
    else
    {
      $this->model_user->add_user();
      $this->login();
    }
  }

  /**
   * kill session data and load the dashboard
   */
  public function logout()
  {
    $newdata = array(
      'user_id',
      'user_name',
      'name',
      'user_type',
      'user_status',
      'logged_in',
    );

    $this->session->unset_userdata($newdata);
    $this->session->sess_destroy();

    $this->dashboard();
  }
}
