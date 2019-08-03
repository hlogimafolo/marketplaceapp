<?php
require 'core/init.php';

if(isset($_POST['create_profile'])){
    $merchant_id = 0;
    $first_name   = htmlentities($_POST['first_name']);
    $last_name    = htmlentities($_POST['last_name']);
    $addr_1       = htmlentities($_POST['addr_1']);
    $addr_2       = htmlentities($_POST['addr_2']);
    $addr_3       = htmlentities($_POST['addr_3']);
    $addr_4       = htmlentities($_POST['addr_4']);
    $contact_no   = htmlentities($_POST['contact_no']);
    $email        = htmlentities($_POST['email']);
    // $services     = htmlentities($_POST['services']);
    // $locations    = htmlentities($_POST['locations']);
    $bio          = htmlentities($_POST['bio']);
    $campaign_status = "draft";
    $created_by = $merchant_id;
    $date_updated = date('Y-m-d');

    $campaigns->insert_campaign($merchant_id,$first_name,$last_name,$addr_1,$addr_2,$addr_3,$addr_4,$contact_no,$email,$bio,$campaign_status,$created_by,$date_updated);
    header('Location:profile_create_services.php?merchant_id='.$merchant_id);
}
?>
<!doctype html>
<html>
<body>
<a href="admin.php">< BACK</a> | <h3>SERVICE PROVIDER PROFILE</h3>
<b>Step 1 - Personal Details</b><hr>
<form method="post">
<label>First Name</label>
<input type="text" name="first_name"><br><br>
<label>Last Name</label>
<input type="text" name="last_name"><br><br>
<label>Address &nbsp;&nbsp;&nbsp;</label>
<input type="text" name="addr_1">
<input type="text" name="addr_2">
<input type="text" name="addr_3">
<input type="text" name="addr_4">
<br><br>
<label>Contact No.</label>
<input type="tel" name="contact_no"><br><br>
<label>Email Address</label>
<input type="email" name="email"><br><br>

<b>Step 2 - Bio</b><hr>
<label>Short Description</label><br><br>
<textarea rows="5" cols="20" name="bio" style="margin: 0px; width: 486px; height: 99px;"></textarea><br><br>
<input type="submit" name="create_profile" value="Create Profile"><br>
</form>
<br>

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