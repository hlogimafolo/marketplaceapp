<?php 
require 'core/init.php';
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
<h3>Welcome to your Kufu Dashboard, <?=$get_info->first_name;?>  </h3>
<!-- <form method="post"> 
<input type="text" name="campaign_location" value="Polokwane">
<input type="submit" name="location_search" value="Search">
</form> -->
<!-- <br> -->
<hr>
<!-- <br> -->
<p><b><a href="home.php">Customer Requests</a></b> | My Projects | <a href="purchased_leads.php">My Quotes</a> | Credits (25) | <a href="my_profile.php">MyProfile</a> | Settings </p>
<hr>
<h4>New Leads</h4>
<b>Project:</b> Request for Graphic Design Services<br>
<b>Posted</b> : 05-08-2019<br>
<b>Deadline</b> : In Two Weeks<br>
<a href="lead_details.php?lead_id=1">View Details</a><br><br>
<b>Project:</b> Request for Website Design<br>
<b>Posted</b> : 07-08-2019<br>
<b>Deadline</b> : Urgently<br>
<a href="lead_details.php?lead_id=2">View Details</a><br><br>
<b>Project:</b> Request for Logo Design<br>
<b>Posted</b> : 10-08-2019<br>
<b>Deadline</b> : In one month<br>
<a href="lead_details.php?lead_id=3">View Details</a><br><br>

<br>
<br>
</body>
</html>