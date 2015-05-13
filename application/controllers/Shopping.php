<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller {

  private $data = array();

  public function __construct(){
    parent::__construct();
    $this->data = array('title' => 'Shopping',
      'name' => $this->session->userdata('name'),
      'userType' => $this->session->userdata('user_type'),
      'message' => '');
  }

  public function index(){
    $this->load->helper('url');
  }
  function listItems(){
    $this->load->helper('html');
    $this->load->model("Model_shopping");

    $this->data['itemList'] = $this->Model_shopping->getItemList();
    $this->load->view("view_header", $this->data);
    $this->load->view("view_nav", $this->data);
    $this->load->view("shopping/view_created_works", $this->data);
    $this->load->view("view_footer");

  }
  function about(){
    $data['title'] = "About";
    $this->load->view("view_header");
    $this->load->view("view_nav");
    $this->load->view("view_about", $data);
    $this->load->view("view_footer");
  }
  function contact(){
    $this->load->view();
  }
  public function getValues(){
    $this->load->model("get_db");
    $data['results'] = $this->get_db->getAll();
    $this->load->view("view_db", $data);

  }
}