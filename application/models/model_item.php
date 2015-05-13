<?php
class Model_item extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getItemType(){
    $return = array();
    $this->db->from('ItemType');

    if (!$query = $this->db->get())
      return $return;
    $option = '';

    foreach($query->result_array() as $value)
      $option .= '<option value="' . $value['item_type_id'] . '">' . $value['item_type'] . '</option>';

    return $option;
  }

  public function addItem($filePath = null, $date = null){
    $data = array(
      'item_name' => $this->input->post('item_name'),
      'item_description' => $this->input->post('item_description'),
      'item_price' => $this->input->post('item_price'),
      'item_shipping' => $this->input->post('item_shipping'),
      'item_type' => $this->input->post('item_type'),
      'item_image_filepath' => $filePath.'.jpg',
      'item_upload_date' => $date
    );
    $this->db->insert('item', $data);
  }

  public function getItemNumber(){
    $result = array();

    $this->db->select_max('item_id')
             ->from('item');
    if (!$query = $this->db->get())
      return $result;
    $result = $query->result_array();
    $result = $result[0]['item_id'] + 1;

    return $result;
  }
}