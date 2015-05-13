<section id="two">
  <h2>For Sale</h2>
  <div class="row">
    <?php
      foreach($itemList as $item)
      {
        $itemType = $item['item_type'];

        if($item['item_type_id'] == '1' || $item['item_type_id'] == '2')
          $itemType = 'Knife';

        $filePath = '../../resource/uploadedImages/sales/'.$itemType.'/'.$item['item_image_filepath'];

        echo ('<article class="6u 12u$(xsmall) work-item">');
        echo ('<a href="'.$filePath.'" class="image fit thumb"><img src="'.$filePath.'" alt="'.$itemType.'" /></a>');
        echo ('<h3>'.$item['item_name'].'</h3>');
        echo ('<span><h3>Price: $'.$item['item_price'].'</h3><button>Add to Cart</button></span>');
        echo ('<p>'.$item['item_description'].'</p>');
        echo ('</article>');
      }
    ?>
  </div>
</section>