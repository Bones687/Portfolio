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

    $addToCart = 'ADD';
    $rowId = '';

    foreach ($this->cart->contents() as $items){

      if($item_id == $items['id']) {

        if ($items['options']['item_type'] == 'Knife' || $items['options']['item_type'] == 'Custom') {
          $addToCart = 'IGNORE';
        }
        else if ($item_id == $items['id'] && $items['options']['item_type'] == 'Ring' && $items['options']['size'] != $this->input->post('size')) {
            $addToCart = 'ADD';
        }
        else {
          $addToCart = 'UPDATE';
          $rowId = $items['rowid'];
        }
      }
    }

    if($addToCart == 'ADD')
    {
      $data = $this->getItemById($item_id);
      $item = array('id' => $data['item_id'],
                    'qty' => 1,
                    'price' => $data['item_price'],
                    'name' => $data['item_name'],
                    'options' => array('image' => $data['item_image_filepath'],
                                       'shipping' => $data['item_shipping'],
                                       'item_type' => $data['item_type']));
      if (NULL !== ($this->input->post('size')))
        $item['options']['size'] = $this->input->post('size');

      $this->cart->insert($item);
    }

    if($addToCart == 'UPDATE'){
      $item = $this->cart->get_item($rowId);
      $data = array('rowid' => $rowId,
                    'qty' => $item['qty'] + 1);

      $this->cart->update($data);
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

  public function cartOptions(){
    if (NULL !== ($this->input->post('clearCart')))
      $this->clearCart();
    else if(NULL !== ($this->input->post('checkOut')))
      $this->viewCart();
  }

  private function clearCart(){
    $this->cart->destroy();
    $this->listItems();
  }

  public function removeItem(){
    $item = $this->cart->get_item($this->input->post('item_to_remove'));
    $data = array('rowid' => $item['rowid'],
                  'qty' => $item['qty'] - 1);
    $this->cart->update($data);
    $this->listItems();
  }

  private function viewCart(){
    $this->data['title'] = 'Cart';
    $this->data['cartItems'] = $this->cart->contents();

    $this->load->view("template/view_header", $this->data);
    $this->load->view("template/view_nav", $this->data);
    $this->load->view("shopping/view_cart", $this->data);
    $this->load->view("template/view_footer");
  }
}