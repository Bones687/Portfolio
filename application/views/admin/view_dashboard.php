<h1>Admin Panel</h1>
<?php
  if($message != '')
    echo "<h3>$message</h3>";
?>
<div class="row">
  <form action="/admin/addItem">
    <input type="submit" class="special" value="Add Item">
  </form>
</div>