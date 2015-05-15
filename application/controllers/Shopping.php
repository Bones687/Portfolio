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

  public function addItem(){
    $item_id = $this->input->post('item_id');

    if(!in_array($item_id, $this->cart->contents()))
    {
      $data = $this->getItemById($item_id);
      $item = array('id' => $data['item_id'],
                    'qty' => 1,
                    'price' => $data['item_price'],
                    'name' => $data['item_name'],
                    'options' => array('image' => $data['item_image_filepath'],
                                       'shipping' => $data['item_shipping'],
                                       'item_type' => $data['item_type']));

      $this->cart->insert($item);
    }

    $this->listItems();
  }

  private function getItemById($item_id){
    $item = array();

    $this->db->select('i.item_id, i.item_name, i.item_price, i.item_shipping, i.item_image_filepath, t.item_type')
             ->from('Item i')
             ->join('ItemType t', 't.item_type_id = i.item_type')
             ->where('i.item_id', $item_id)
             ->where('i.item_status != "SOLD"');

    if(!$query = $this->db->get())
      return $item;

    $item = $query->result_array();

    return $item[0];
  }

  public function clearCart(){
    $this->cart->destroy();
    $this->listItems();
  }
}