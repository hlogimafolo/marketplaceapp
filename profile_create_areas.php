<?php
require 'core/init.php';

$merchant_id = 0;

    if (isset($_POST['create_profile_areas'])) {
        $locations_list_id = $_POST['locations_list_id'];

    $campaigns->insert_location_list($merchant_id,$locations_list_id);
    header('Location:profile_create_portfolio.php?merchant_id='.$merchant_id);
    }


?>
<!doctype html>
<html>
<body>
<a href="admin.php">< BACK</a> | <h3>SERVICE PROVIDER PROFILE</h3>
<br>

<form method="post">
<b>Step 4 - Service Areas</b><hr>
<label>Which locations will your services be available?</label><br>
<p class="local1" style="cursor: pointer;">Limpopo</p>
<div class="showlocal1" style="display: none;">
<input id="amenities-checkbox-1" name="locations_list_id[]" value="Polokwane" type="checkbox" />
<label class="" for="amenities-checkbox-1">Polokwane</label><br>
<input id="amenities-checkbox-2" name="locations_list_id[]" value="Tzaneen" type="checkbox" />
<label class="" for="amenities-checkbox-2">Tzaneen</label><br>
<input id="amenities-checkbox-3" name="locations_list_id[]" value="Lebowakgomo" type="checkbox" />
<label class="" for="amenities-checkbox-3">Lebowakgomo</label><br>
<input id="amenities-checkbox-4" name="locations_list_id[]" value="Seshego" type="checkbox" />
<label class="" for="amenities-checkbox-4">Seshego</label><br>
<p class="local1close" style="cursor: pointer;">close</p>
</div>
<p class="local2" style="cursor: pointer;">Gauteng</p>
<div class="showlocal2" style="display: none;">
<input id="amenities-checkbox-5" name="locations_list_id[]" value="Pretoria" type="checkbox" />
<label class="" for="amenities-checkbox-5">Pretoria</label><br>
<input id="amenities-checkbox-6" name="locations_list_id[]" value="Johannesburg" type="checkbox" />
<label class="" for="amenities-checkbox-6">Johannesburg</label><br>
<input id="amenities-checkbox-7" name="locations_list_id[]" value="Midrand" type="checkbox" />
<label class="" for="amenities-checkbox-7">Midrand</label><br>
<input id="amenities-checkbox-8" name="locations_list_id[]" value="Sandton" type="checkbox" />
<label class="" for="amenities-checkbox-8">Sandton</label><br>
<p class="local2close" style="cursor: pointer;">close</p>
</div>

<!-- <select name="campaign_type">
  <option value="competition">Competition</option>
  <option value="event">Event</option>
  <option value="discount">Discount</option>
  <option value="promotion">Promotion</option>
</select><br> -->
<br>
<input type="submit" name="create_profile_areas" value="Continue"><br>
</form>
<br>


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