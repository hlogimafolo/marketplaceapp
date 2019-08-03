<?php 
require 'core/init.php';
$lead_id = $_GET['lead_id'];
$merchant_id = 0;
$quote_description = $_GET['quote_description'];
$quote_cost = $_GET['quote_cost'];

$get_info = $campaigns->get_merchant_campaigns($merchant_id);

if (isset($_POST['submit_quote'])) {
	$lead_id = $_POST['lead_id'];
	$merchant_id = $_POST['merchant_id'];
	$quote_description = $_POST['quote_description'];
	$quote_cost = $_POST['quote_cost'];

	$campaigns->create_quote($merchant_id,$lead_id,$quote_description,$quote_cost);
	header('Location:purchased_leads.php?merchant_id='.$merchant_id);
}
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
<h3>&larr;<a href="lead_details.php?lead_id=<?=$lead_id;?>">back</a> | Send Quote</h3>
<!-- <form method="post"> 
<input type="text" name="campaign_location" value="Polokwane">
<input type="submit" name="location_search" value="Search">
</form> -->
<!-- <br> -->
<hr>
<!-- <br> -->
<!-- <p><b>Customer Requests</b> | My Projects | My Quotes | Credits (25) | MyProfile | Settings </p> -->
<!-- <hr> -->
<h4>Confirm Quote Details</h4>

<form method="post" action="">
	<!-- <h4>My Quote</h4> -->
<label><b>Description</b></label><br>
<textarea rows="5" cols="20" name="quote_description" style="margin: 0px; width: 486px; height: 99px;"><?=$quote_description;?></textarea><br><br>
<label><b>Amount</b></label><br>
<input type="text" name="quote_cost" value="<?=$quote_cost;?>"><br>
<br>
<input type="submit" name="submit_quote" value="Send Quote">
<input type="hidden" name="lead_id" value="<?=$lead_id;?>">
<input type="hidden" name="merchant_id" value="<?=$merchant_id;?>">
</form>
<!-- Go to purchased leads -->

<br>
</body>
</html>