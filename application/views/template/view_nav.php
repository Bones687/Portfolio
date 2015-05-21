<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
<!-- Header -->
<?php
  if($name != '') {
    echo('<div id="navBar" align="right">');
    echo('<span>Welcome ' . $name . '</span>');
  }
  else {
    echo('<div id="navBar" align="right">');
    echo('<a class="redirectButton" class="menuItem" href="/welcome/login">Login</a>');
  }
  ?>
<span id="cart" style="padding-right: 20px">
  <span><img src="../../../resource/images/icons/cart.png" alt="" /></span>
  (<span id="quantity"><?php echo($this->cart->total_items()); ?></span>)
  </span>
  <span id="menuButton" style="alignment: right; padding-right: 30px"><img src="../../../resource/images/icons/menu-icon-white.png" alt="" /></span>
</div>
<div id="menu" class="dropdown" align="center">
  </br>
  <?php if ($userType == 'AD'){
    echo('
      <form action="/admin/dashboard">
        <input class="redirectButton" type="submit" value="Admin">
      </form>'
    );
  } ?>

  <form action="/welcome/dashboard">
    <input class="redirectButton" type="submit" value="Home">
  </form>

  <form action="/shopping/listItems">
    <input class="redirectButton" type="submit" value="Shopping">
  </form>

  <?php if($name != '') {
    echo ('
    <form action = "/welcome/logout" >
      <input class="redirectButton" type = "submit" value = "Logout" >
    </form >');
  }
  ?>


</div>
<?php if ($this->cart->total() > 0) { ?>
<div id="cartDisplay" class="dropdown">
  <?php
    foreach($this->cart->contents() as $item)
    {
      $filePath = '../../resource/uploadedImages/sales/'.$item['options']['item_type'].'/'.$item['options']['image'];
      echo form_open('shopping/removeItem');
      echo'<div class="cartItem">';
      echo'<table class="cartTable"><tr class="cartTable"><td class="cartTable" colspan="4"><img src="'.$filePath.'" height="70"></td></tr><tr><td class="cartTable" colspan="4">';
      echo $item['name'].'</td></tr><tr class="cartTable"><td class="cartTable">Price</td><td class="cartTable">$'.$item['price'].'</td><td class="cartTable" >Qty</td><td class="cartTable" >'.$item['qty'].'</td></tr><tr class="cartTable"><td class="cartTable" colspan="4">';
      echo form_submit('removeItem', 'Remove Item', 'class="small"');
      echo '</td></tr></table>';
      echo form_hidden('item_to_remove', $item['rowid']);
      echo form_close();
      echo'</div>';
    }
  ?>
  <table class="cartTable">
    <tr>
      <td class="cartTable">Total</td>
      <td class="cartTable">$<?php echo $this->cart->total() + 10; ?></td>
    </tr>
  </table>
  <div>
    <?php
      echo form_open('shopping/cartOptions');
      echo form_submit('clearCart', 'Clear Cart');
      echo form_submit('checkOut', 'Check Out','class="special"');
      echo form_close();
    ?>
  </div>
</div>
<?php } ?>
<header id="header">
  <a href="/welcome/dashboard" class="image avatar"><img src="../../../resource/images/avatar.jpg" alt="" /></a>
  <h1><strong>Dalton Carvings & Woodwork Co.</strong></h1>
  <div class="fb-like" data-href="https://www.facebook.com/daltoncarvings" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
</header>
<!-- Main -->
<div id="main">