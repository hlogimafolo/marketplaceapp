<?php
require 'core/init.php';

$merchant_id = 0;
$get_info = $campaigns->get_merchant_campaigns($merchant_id);
$get_services = $campaigns->get_merchant_service_list($merchant_id);
$get_locations = $campaigns->get_merchant_location_list($merchant_id);

?>
<!doctype html>
<html>
<head>
  <style type="text/css">
    label{
      font-weight: bold;
    }
  </style>
</head>
<body>
<!-- <a href="admin.php">< BACK</a> |  --><h3>CONFIRM YOUR SERVICE PROVIDER PROFILE</h3>
<b>Step 1 - Personal Details</b><hr>

<label>First Name: </label>
<!-- <input type="text" name="first_name"><br><br> -->
<?=$get_info->first_name;?><br>
<label>Last Name: </label>
<!-- <input type="text" name="last_name"><br><br> -->
<?=$get_info->last_name;?><br><br>
<label>Address &nbsp;&nbsp;&nbsp;</label><br>
<?=$get_info->addr_1;?><br>
<?=$get_info->addr_2;?><br>
<?=$get_info->addr_3;?><br>
<?=$get_info->addr_4;?><br>
<!-- <input type="text" name="addr_1"> -->
<!-- <input type="text" name="addr_2"> -->
<!-- <input type="text" name="addr_3"> -->
<!-- <input type="text" name="addr_4"> -->
<br>
<label>Contact No.</label>
<!-- <input type="tel" name="contact_no"><br><br> -->
<?=$get_info->contact_no;?><br>
<label>Email Address</label>
<!-- <input type="email" name="email"><br><br> -->
<?=$get_info->email;?><br><br>

<b>Step 2 - Bio</b><hr>
<label>Short Description</label><br><br>
<?=$get_info->bio;?><br><br>
<!-- <textarea rows="5" cols="20" name="bio" style="margin: 0px; width: 486px; height: 99px;"></textarea><br><br> -->
<input type="submit" onclick="window.location.href = '#';" value="Edit">
<br><br>
<b>Step 3 - Service Details</b><hr>

<label>What services do you offer?</label><br><br>
<?php foreach($get_services as $service): ?>
  <?=$service['services_list_id'];?>
  <br>
<?php endforeach ?>
<br>
<input type="submit" onclick="window.location.href = '#';" value="Edit">
<br><br>

<b>Step 4 - Service Areas</b><hr>
<br>
<label>Which locations will your services be available?</label><br>
<?php foreach($get_services as $service): ?>
  <?=$service['services_list_id'];?>
  <br>
<?php endforeach ?>
<br>
<input type="submit" onclick="window.location.href = '#';" value="Edit">
<br><br>

<input type="submit" onclick="window.location.href = 'home.php';" value="Go to My Dashboard">

<script src="jquery-1.11.1.min.js"></script>
<!-- Show service areas -->
  <script type="text/javascript">
    $('.local1').click(function(){
      $('.showlocal1').show();
    })

    $('.local1close').click(function(){
      $('.showlocal1').hide();
    })
  </script>
<!-- End service areas -->
<!-- Show service areas -->
  <script type="text/javascript">
    $('.local2').click(function(){
      $('.showlocal2').show();
    })

    $('.local2close').click(function(){
      $('.showlocal2').hide();
    })
  </script>
<!-- End service areas -->
</body>
</html>