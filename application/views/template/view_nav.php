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
<div id="cartDisplay" class="dropdown">
  <table id="cartMenu">
  <?php
    foreach($this->cart->contents() as $item)
    {
      print_r($item);
      $filePath = '../../resource/uploadedImages/sales/'.$item['options']['item_type'].'/'.$item['options']['image'];
      echo"<tr><td>";
      echo'<img src="'.$filePath.'" height="70">';
      echo '</td><td><tr>'.$item['name'].'</tr>'.$item['price'].'</td>';
      echo"</td></tr>";
    }
  ?>
  </table>
  <div>
    <?php
      echo form_open('shopping/clearCart');
      echo form_submit('clearCart', 'Clear Cart');
      echo form_submit('checkOut', 'Check Out','class="special"');
      echo form_close();
    ?>
  </div>
</div>
<header id="header">
  <a href="/welcome/dashboard" class="image avatar"><img src="../../../resource/images/avatar.jpg" alt="" /></a>
  <h1><strong>Dalton Carvings & Woodwork Co.</strong></h1>
  <div class="fb-like" data-href="https://www.facebook.com/daltoncarvings" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
</header>
<!-- Main -->
<div id="main">