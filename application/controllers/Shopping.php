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

  /**
   * load default controller listItems()
   */
  public function index(){
    $this->listItems();
  }

  /**
   * list of all items that are currently for sale
   */
  public function listItems(){
    $this->load->helper('html');
    $this->load->model("Model_shopping");

    $this->data['itemList'] = $this->Model_shopping->getItemList();
    $this->load->view("template/view_header", $this->data);
    $this->load->view("template/view_nav", $this->data);
    $this->load->view("shopping/view_created_works", $this->data);
    $this->load->view("template/view_footer");

  }
}