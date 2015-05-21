<?php
print_r($cartItems);

echo'<table>';
$i = 1;
foreach($cartItems as $item)
{
  $alt = 'Light';
  if ($i % 2 == 0)
    $alt = 'Dark';

  $class = 'cartTable'.$alt;
  echo'<tr class="cartTableLight"><td class="cartTableLight">';
  $filePath = '../../resource/uploadedImages/sales/'.$item['options']['item_type'].'/'.$item['options']['image'];
  echo form_open('shopping/removeItem');
  echo'<table class="'.$class.'"><tr class="'.$class.'"><td class="'.$class.'" align="center" rowspan="3" width="25%"><img src="'.$filePath.'" height="210"></td><td class="'.$class.'" colspan="4">'.$item['name'].'</td>';
  echo '<tr class="'.$class.'"><td class="'.$class.'">Price:</td><td class="'.$class.'">'.$item['price'].'</td><td class="'.$class.'">Qty</td><td class="'.$class.'">'.$item['qty'].'</td></tr>';
  echo '<tr class="'.$class.'"><td class="'.$class.'"></td><td class="'.$class.'">';
  echo form_submit('removeItem', 'Remove Item', 'class="small"');
  echo'</td><td class="'.$class.'">';
  echo form_input()
  echo'</td><td class="'.$class.'">';
  echo form_submit('updateItem', 'Update Item', 'class="small"');
  echo'</td></tr></table>';
  echo form_hidden('item_to_remove', $item['rowid']);
  echo form_close();
  echo '</td></tr>';
  $i++;
}

echo'</table>';