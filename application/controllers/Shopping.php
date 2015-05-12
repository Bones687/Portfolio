<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller {
  public function index(){
    $this->load->helper('url');
  }
  function listItems(){
    $this->load->helper('html');
    $data['title'] = "Neil Dalton";
    echo(CI_VERSION);
    $this->load->model("Shopping_model");
    $this->load->view("view_header", $data);
    $this->load->view("dashboard", $data);
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