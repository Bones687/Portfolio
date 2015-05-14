<?php
class Model_item extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  /**
   * @return string : returns a string for the different options for a select tag
   */
  public function getItemType(){

    $option = '';

    $this->db->from('ItemType');

    if (!$query = $this->db->get())
      return $option;

    foreach($query->result_array() as $value)
      $option .= '<option value="' . $value['item_type_id'] . '">' . $value['item_type'] . '</option>';

    return $option;
  }

  /**
   * @param null $filePath : the name of the image that is stored on the server
   * @param null $date : the date that it was uploaded
   */
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

  /**
   * @return array $result : if the query is successful it will return the next insert id number
   */
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

  /**
   * @return array $result : if the query is successful it will return an array of the most recent
   *                         addition of each item type
   */
  public function getRecentWorks(){
    $result = array();
    $lastItem = array();

    $this->db->select_max('item_id')
             ->from('Item')
             ->group_by('item_type');

    if (!$query = $this->db->get())
      return $lastItem;

    $temp = $query->result_array();

    foreach ($temp as $value)
      $lastItem[] = $value['item_id'];
    $this->db->from('Item i')
             ->join('ItemType t', 'i.item_type = t.item_type_id')
             ->where_in('i.item_id', $lastItem);


    if (!$query = $this->db->get())
      return $result;

    $result = $query->result_array();;

    return $result;
  }
}