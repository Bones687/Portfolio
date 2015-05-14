<div id="content">
  <div class="signup_wrap">
    <div class="signin_form">
      <?php echo form_open("welcome/login"); ?>
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" value="" />
      <label for="pass">Password:</label>
      <input type="password" id="pass" name="pass" value="" />
      <input type="submit" class="" value="Sign in" />
      <a class="menuItem" href="/welcome/registration">Register</a>
      <?php echo form_close(); ?>
    </div><!--<div class="signin_form">-->
  </div><!--<div class="signup_wrap">-->
</div><!--<div id="content">-->