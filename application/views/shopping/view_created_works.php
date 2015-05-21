<section id="two">
  <h2>For Sale</h2>
  <div class="row">
    <table><tr>
    <?php
      $column = 1;
      foreach($itemList as $item)
      {
        if ($column % 2 != 0)
          echo "</tr><tr>";

        $itemType = $item['item_type'];

        if($item['item_type_id'] == '1' || $item['item_type_id'] == '2')
          $itemType = 'Knife';

        $itemSize = '';
        $data['item_id'] = $item['item_id'];

        if(isset($item['item_size'])) {
          $itemSize = ' Size: ' . $item['item_size'];
          $data['size'] = $item['item_size'];
        }

        $filePath = '../../resource/uploadedImages/sales/'.$itemType.'/'.$item['item_image_filepath'];
        echo "<td>";
        echo form_open('shopping/addItem');
        echo ('<article class="6u 12u$(xsmall) work-item">');
        echo ('<a href="'.$filePath.'" class="image fit thumb"><img src="'.$filePath.'" alt="'.$itemType.'" /></a>');
        echo ('<h3>'.$item['item_name'].'</h3>');
        echo ('<span><h3>Price: $'.$item['item_price'].$itemSize.'</h3>');
        echo form_submit('submit',"Add to Cart");
        echo ('</span><p>'.$item['item_description'].'</p>');
        echo form_hidden($data);
        echo ('</article>');
        echo form_close();
        echo "</td>";
        $column++;
      }
      //echo form_close();
    ?>
    </tr></table>
  </div>
</section>