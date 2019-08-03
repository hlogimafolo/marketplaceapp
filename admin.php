<?php
require 'core/init.php';

$total_merchants = $merchants->get_total_merchants_count();
$total_campaigns_pending = $campaigns->get_total_campaigns_pending();
$total_campaigns_active = $campaigns->get_total_campaigns_active();
$total_campaigns_complete = $campaigns->get_total_campaigns_complete();
?>
<!doctype html>
<html>
<body>
<!-- <input type="submit" onclick="window.location.href = 'home.php';" value="HOME">
<input type="submit" onclick="window.location.href = 'merchant.php';" value="SWITCH"> -->
<br><br>
<h1>Welcome to Kufu!</h1> 
<!-- <br>
<input type="text" value="MERCHANTS: <?php echo $total_merchants;?>">
<input type="text" value="PENDING: <?php echo $total_campaigns_pending;?>">
<input type="text" value="ACTIVE: <?php echo $total_campaigns_active;?>">
<input type="text" value="COMPLETE: <?php echo $total_campaigns_complete;?>"> -->
<!-- <br><br> -->
First, let us start by creating your Service Provider Profile
<br><br>
<input type="submit" onclick="window.location.href = 'profile_create.php';" value="Create my profile">

<!-- <br>
MANAGE LEADS <br>
<a href="campaign_create.php">New Leads</a><br> -->
<!-- <a href="campaign_create.php">Purchased Leads</a><br>

<a href="campaign_create.php">Create Campaign</a><br> -->
<!-- <a href="campaign_edit.php">Edit Campaign</a><br> -->
<!-- <a href="campaign_drafts.php">Campaign Drafts</a><br>
<a href="campaign_requests.php">Campaign Requests</a><br> -->
<!-- <a href="">View Campaigns*</a><br> -->
<!-- <a href="view_active_campaigns.php">Active Campaigns</a><br>
<a href="view_complete_campaigns.php">Complete Campaigns</a><br>
<br> -->

<!-- MANAGE USERS<br>
<a href="">View All Users*</a><br>
<a href="">Add New User*</a><br>
<br> -->

<!-- MANAGE MERCHANTS<br>
<a href="merchant_management.php">View All Merchants</a><br>
<a href="user_add.php">Add New Merchant</a><br>
<br>

REPORTS<br>
<a href="">Campaign reports*</a><br>
<br>
<a href="">View complaints*</a><br> -->

</body>
</html>
