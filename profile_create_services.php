<?php
require 'core/init.php';

$merchant_id = 0;

    if (isset($_POST['create_profile_services'])) {
        $services_list_id = $_POST['services_list_id'];

    $campaigns->insert_service_list($merchant_id,$services_list_id);
    header('Location:profile_create_areas.php?merchant_id='.$merchant_id);
    }


?>
<!doctype html>
<html>
<body>
<!-- <a href="admin.php">< BACK</a> |  --><h3>SERVICE PROVIDER PROFILE</h3>
<br>

<b>Step 3 - Service Details</b><hr>
<form method="post">
<label>What services do you offer?</label><br><br>
<input id="amenities-checkbox-1" name="services_list_id[]" value="Graphic Design" type="checkbox" />
<label class="" for="amenities-checkbox-1">Graphic Design</label><br>
<input id="amenities-checkbox-2" name="services_list_id[]" value="Logo Design" type="checkbox" />
<label class="" for="amenities-checkbox-2">Logo Design</label><br>
<input id="amenities-checkbox-3" name="services_list_id[]" value="Profile Design" type="checkbox" />
<label class="" for="amenities-checkbox-2">Profile Design</label><br>
<input id="amenities-checkbox-4" name="services_list_id[]" value="Brochure Design" type="checkbox" />
<label class="" for="amenities-checkbox-2">Brochure Design</label><br>
<!-- <select name="campaign_type">
  <option value="competition">Competition</option>
  <option value="event">Event</option>
  <option value="discount">Discount</option>
  <option value="promotion">Promotion</option>
</select><br> -->
<br>
<input type="submit" name="create_profile_services" value="Continue"><br>
</form>

<!-- <b>Step 5 - Media of Previous Work</b><hr>
<label>Upload Images of Past Work</label><br><br>
<input type="file" name="campaign_ad"><br><br> -->


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