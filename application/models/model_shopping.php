<?php

class Model_shopping extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  /**
   * Function to get items to display their information. Not a very complex join
   *
   * @param string $type : if this is set it will filter items by their type ie.cufflinks, rings, knives...
   * @param string $status : filter on their status. This will be used mostly to see revenue
   * @return array
   */
  public function getItemList($type = '', $status = ''){
    $result = array();

    $this->db->from('item i')
             ->join('itemType t', 'i.item_type = t.item_type_id');
    if ($type != '') {
      $this->db->where('t.item_type', $type);
    }
    if ($status != '') {
      $this->db->where('i.item_status', $status);
    }
    else
      $this->db->where('i.item_status !=', 'SOLD');

    if (!$query = $this->db->get()){
      return $result;
    }
    $result = $query->result_array();
    return $result;
  }
}