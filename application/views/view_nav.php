<body id="top">

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
  <span id="cart"><img src="../../resource/images/icons/cart.png" alt="" /></span>
  (<span>0</span>)
  <span id="menuButton" style="alignment: right"><img src="../../resource/images/icons/menu-icon-white.png" alt="" /></span>
</div>
<div id="menu" align="center">
  <?php if ($userType == 'AD'){
    echo('<a class="menuItem" href="/admin/dashboard">Admin</a></br>');
  } ?>
  <a class="menuItem" href="/shopping/listItems">Shopping</a></br>
  <a class="menuItem" href="/welcome/dashboard">Home</a></br>
  <a class="menuItem" href="/welcome/logout">Logout</a>
</div>
<header id="header">
  <a href="/welcome/dashboard" class="image avatar"><img src="../../resource/images/avatar.jpg" alt="" /></a>
  <h1><strong>Dalton Carvings & Woodwork Co.</strong></h1>
</header>
<!-- Main -->
<div id="main">