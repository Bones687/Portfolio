<?php
class model_item extends CI_Model {

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
}