<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
  private $data = array();
  public function __construct(){
    parent::__construct();
    $this->data = array('title' => 'Administration',
                        'name' => $this->session->userdata('name'),
                        'userType' => $this->session->userdata('user_type'));
  }
  public function index(){

  }
  public function dashboard(){
    $this->load->model('Model_item');
    $this->data['itemList'] = $this->Model_item->getItemType();
    $this->load->view('view_header', $this->data);
    $this->load->view('view_nav', $this->data);
    $this->load->view('admin/view_dashboard', $this->data);
    $this->load->view('view_footer');

  }
}