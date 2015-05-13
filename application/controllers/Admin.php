<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
  private $data = array();
  public function __construct(){
    parent::__construct();
    $this->data = array('title' => 'Administration',
                        'name' => $this->session->userdata('name'),
                        'userType' => $this->session->userdata('user_type'),
                        'message' => '');

    $this->load->model('model_item');
  }

  public function index(){
    $this->dashboard();
  }

  public function dashboard($message = ''){
    if($this->session->userdata('user_type') == 'AD') {
      $this->data['message'] = $message;
      $this->load->view('view_header', $this->data);
      $this->load->view('view_nav', $this->data);
      $this->load->view('admin/view_dashboard', $this->data);
      $this->load->view('view_footer');
    }
    else
      show_404();
  }

  public function createItem(){
    if($this->session->userdata('user_type') == 'AD') {
      $this->load->model('Model_item');
      $this->data['itemList'] = $this->Model_item->getItemType();
      $this->load->view('view_header', $this->data);
      $this->load->view('view_nav', $this->data);
      $this->load->view('admin/view_item_creation', $this->data);
      $this->load->view('view_footer');
    }
    else
      show_404();
  }

  public function addItem(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('item_name', 'Item Name', 'trim|required|alpha_numeric_spaces|max_length[45]');
    $this->form_validation->set_rules('item_description', 'Item Description', 'trim|required|max_length[255]');
    $this->form_validation->set_rules('item_price', 'Item Price', 'trim|required|decimal');
    $this->form_validation->set_rules('item_shipping', 'Shipping Price', 'trim|required|decimal');

    if ($this->form_validation->run() == FALSE){
      $this->createItem();
    }
    else{

      $postItemType = $this->input->post('item_type');
      switch ($postItemType)
      {
        case 1:
          $itemType = 'Knife';
          break;
        case 2:
          $itemType = 'Knife';
          break;
        case 3:
          $itemType = 'Cufflinks';
          break;
        case 4:
          $itemType = 'Ring';
          break;
        case 5:
          $itemType = 'Pendant';
          break;
        default:
          $itemType = 'Custom';
          break;
      }
      $date = date('Y-m-d');
      $fileName = $itemType.'-'.$this->model_item->getItemNumber().':'.$date;
      $date = date('Y-m-d G:i');

      $config['upload_path'] = './resource/uploadedImages/sales/'.$itemType.'/';
      $config['file_name'] = $fileName.'.jpg';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']	= '300';
      $config['max_width']  = '1024';
      $config['max_height']  = '768';

      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload())
      {
        $this->dashboard('There was an error uploading image: '.$this->upload->display_errors());
      }
      else
      {
        $this->model_item->addItem($fileName, $date);
        $this->dashboard("Item successfully added");
      }
    }
  }

}