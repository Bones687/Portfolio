  <div class="reg_form">
    <div class="form_title">Sign Up</div>
    <div class="form_sub_title">It's free and anyone can join</div>
    <?php echo validation_errors('<p class="error">'); ?>
    <?php echo form_open("welcome/registration"); ?>
    <div class="row">
      <p><label for="email_address">Your Email:</label></p>
      <p><input type="text" id="email_address" name="email_address" value="<?php echo set_value('email_address'); ?>" /></p>
    </div>
    <div class="row">
      <p><label for="user_first_name">First Name:</label></p>
      <p><input type="text" id="user_first_name" name="user_first_name" value="<?php echo set_value('user_first_name'); ?>" /></p>
      <p><label for="user_last_name">Last Name:</label></p>
      <p><input type="text" id="user_last_name" name="user_last_name" value="<?php echo set_value('user_last_name'); ?>" /></p>
    </div>
    <div class="row">
      <p><label for="password">Password:</label></p>
      <p><input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" /></p>
      <p><label for="con_password">Confirm Password:</label></p>
      <p><input type="password" id="con_password" name="con_password" value="<?php echo set_value('con_password'); ?>" /></p>
    </div>
    <div class="row">
      <p><label for="user_address1">Address:</label></p>
      <p><input type="text" id="user_address1" name="user_address1" value="<?php echo set_value('user_address1'); ?>" />&nbsp;</p>
      <p><label for="user_address2">Address2:</label></p>
      <p><input type="text" id="user_address2" name="user_address2" value="<?php echo set_value('user_address2'); ?>" /></p>
    </div>
    <div class="row">
      <p><input type="submit" class="special" value="Submit" /></p>
    </div>
    <?php echo form_close(); ?>
  </div><!--<div class="reg_form">-->
</div><!--<div id="content">-->