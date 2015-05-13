<body id="top">
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
    echo('<a class="menuItem" href="/welcome/login">Login</a>');
  }
  ?>
<span style="padding-right: 20px">
  <span id="cart"><img src="../../resource/images/icons/cart.png" alt="" /></span>
  (<span id="quantity">0</span>)
  </span>
  <span id="menuButton" style="alignment: right; padding-right: 30px"><img src="../../resource/images/icons/menu-icon-white.png" alt="" /></span>
</div>
<div id="menu" align="center">
  </br>
  <?php if ($userType == 'AD'){
    echo('
      <form action="/admin/dashboard">
        <input type="submit" value="Admin">
      </form>'
    );
  } ?>

  <form action="/welcome/dashboard">
    <input type="submit" value="Home">
  </form>

  <form action="/shopping/listItems">
    <input type="submit" value="Shopping">
  </form>

  <?php if($name != '') {
    echo ('
    <form action = "/welcome/logout" >
      <input type = "submit" value = "Logout" >
    </form >');
  }
  ?>


</div>
<header id="header">
  <a href="/welcome/dashboard" class="image avatar"><img src="../../resource/images/avatar.jpg" alt="" /></a>
  <h1><strong>Dalton Carvings & Woodwork Co.</strong></h1>
  <div class="fb-like" data-href="https://www.facebook.com/daltoncarvings" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
</header>
<!-- Main -->
<div id="main">