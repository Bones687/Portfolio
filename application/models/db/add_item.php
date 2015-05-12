<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_item extends CI_Model {
  public function definition(){
    return array('table' => 'AddItem',
                 'pk' => 'id',
                 'model' => array('item_id' =>      array('label' => 'Item Id',
                                                          'rules' => 'required',
                                                          'type' => 'hidden',
                                                          'length' => 1),
                                  'item_name' =>    array('label' => 'Item Name',
                                                          'rules' => 'required',
                                                          'type' => 'text',
                                                          'length' => 45),
                                  'item_description' =>    array('label' => 'Item Description',
                                                          'rules' => 'required',
                                                          'type' => 'text',
                                                          'length' => 255),
                                  'item_description' =>    array('label' => 'Item Description',
                                                           'rules' => 'required',
                                                           'type' => 'text',
                                                           'length' => 255),
                 ));
  }
}