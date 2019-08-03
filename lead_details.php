<?php 
require 'core/init.php';
$lead_id = $_GET['lead_id'];
$merchant_id = 0;
$get_info = $campaigns->get_merchant_campaigns($merchant_id);
// $view_trending_campaigns = $campaigns->get_trending_campaigns();

// if(isset($_POST['trending_deal_click'])){
//     $campaign_id = $_POST['campaign_id'];
//     $campaign_hits = ($_POST['campaign_hits'])+1;

//     $campaigns->update_campaign_hits($campaign_id,$campaign_hits);
//     header('Location:view_deal.php?campaign_id='.$campaign_id);
// }

// if(isset($_POST['location_search'])){
//     $campaign_location = $_POST['campaign_location'];

//     header('Location:location_deals.php?campaign_location='.$campaign_location);
// }
?>
<!doctype html>
<html>
<body>
<a href="login.php">Logout </a>
<br>
<hr>
<br>
<h3>&larr;<a href="home.php">back</a> | Lead Details</h3>
<!-- <form method="post"> 
<input type="text" name="campaign_location" value="Polokwane">
<input type="submit" name="location_search" value="Search">
</form> -->
<!-- <br> -->
<hr>
<!-- <br> -->
<!-- <p><b>Customer Requests</b> | My Projects | My Quotes | Credits (25) | MyProfile | Settings </p> -->
<!-- <hr> -->
<h4>Lead Details</h4>


<b>Project</b> : Request for Graphic Design Services<br><br>
<b>Posted</b> : 05-08-2019<br><br>
<b>Client Name</b> : George</b><br><br>
<b>Project Details </b>: I need a marketing poster design for my new business. The poster should be able to be printed as a flyer as well and should be one sided. I have images that I can supply.
<br><br>
<b>Required</b> : In Two Weeks<br><br>
<b>Cost to quote</b> : 5 Credits<br><hr>
<input type="submit" onclick="window.location.href = 'send_quote.php?lead_id=<?=$lead_id;?>';" value="Send Quote">
<input type="submit" onclick="window.location.href = 'buy_credits.php?merchant_id=<?=$merchant_id;?>&lead_id=<?=$lead_id;?>';" value="Buy Credits">
<br>
</body>
</html>