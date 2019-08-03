<?php 
class Campaigns{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}	
	

// METHODS FOR KUFU APP START HERE
//This method is for inserting service provider personal details    
	public function insert_campaign($merchant_id,$first_name,$last_name,$addr_1,$addr_2,$addr_3,$addr_4,$contact_no,$email,$bio,$campaign_status,$created_by,$date_updated)
	{
		global $db;

		$query = $this->db->prepare("INSERT INTO `campaigns` (`merchant_id`,`first_name`,`last_name`,`addr_1`,`addr_2`,`addr_3`,`addr_4`,`contact_no`,`email`,`bio`,`campaign_status`,`created_by`,`date_updated`) 
										VALUES 		(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		
        $query->bindValue(1, $merchant_id);
        $query->bindValue(2, $first_name);
        $query->bindValue(3, $last_name);
        $query->bindValue(4, $addr_1);
        $query->bindValue(5, $addr_2);
        $query->bindValue(6, $addr_3);
        $query->bindValue(7, $addr_4);
        $query->bindValue(8, $contact_no);
        $query->bindValue(9, $email);
        $query->bindValue(10, $bio);
        $query->bindValue(11, $campaign_status);
        $query->bindValue(12, $created_by);
        $query->bindValue(13, $date_updated);

		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	

	}

//This method is for inserting service provider services
    public function insert_service_list($merchant_id,$services_list_id){

        $i=0;

        foreach($_POST['services_list_id'] as $services_list_id) {

        $query = $this->db->prepare("INSERT INTO `services` (`merchant_id`,`services_list_id`) 
                                        VALUES      (?, ?)");
        
        $query->bindValue(1, $merchant_id);
        $query->bindValue(2, $services_list_id);
        $i++;

        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }   

    }
}

//This method is for inserting service provider locations
    public function insert_location_list($merchant_id,$locations_list_id){

        $i=0;

        foreach($_POST['locations_list_id'] as $locations_list_id) {

        $query = $this->db->prepare("INSERT INTO `locations` (`merchant_id`,`locations_list_id`) 
                                        VALUES      (?, ?)");
        
        $query->bindValue(1, $merchant_id);
        $query->bindValue(2, $locations_list_id);
        $i++;

        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }   

    }
}

//This method is for creating quotes for the service provider
    public function create_quote($merchant_id,$lead_id,$quote_description,$quote_cost)
    {
        global $db;
        $quote_date = time();
        $query = $this->db->prepare("INSERT INTO `quotes` (`merchant_id`,`lead_id`,`quote_description`,`quote_cost`,`quote_date`) 
                                        VALUES      (?, ?, ?, ?, ?)");
        
        $query->bindValue(1, $merchant_id);
        $query->bindValue(2, $lead_id);
        $query->bindValue(3, $quote_description);
        $query->bindValue(4, $quote_cost);
        $query->bindValue(5, $quote_date);

        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }   

    }

//This method is for inserting multiple images for service provider portfolio details
    public function add_gallery_images($merchant_id, $file_name){
            

if(isset($_FILES['files'])){
    $errors= array();
    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
        $file_name = $key.$_FILES['files']['name'][$key];
        $file_size =$_FILES['files']['size'][$key];
        $file_tmp =$_FILES['files']['tmp_name'][$key];
        $file_type=$_FILES['files']['type'][$key];  
        if($file_size > 2097152){
            $errors[]='File size must be less than 2 MB';
        }       
        $query  = $this->db->prepare("INSERT INTO `portfolio_gallery` (`merchant_id`,`image`) VALUES (?,?)");
        $query->bindValue(1, $merchant_id);        
        $query->bindValue(2, $file_name);
        
        try {
            $query->execute();
              //header('Location:view_property_gallery.php?p_id='.$id);
        } catch (PDOException $e) {

            die($e->getMessage());
        }
        $desired_dir="gallery";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);        // Create directory if it does not exist
            }
            if(is_dir("images/$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"images/$desired_dir/".$file_name);
            }else{                                  // rename the file if another one exist
                $new_dir="images/$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;               
            }
                    
        }else{
                print_r($errors);
        }
    }
    
}

    }

//This method is for getting service provider quote details
    public function get_quotes($merchant_id){

        $query = $this->db->prepare("SELECT * FROM `quotes` WHERE `merchant_id` = ?");
        $query->bindValue(1, $merchant_id);

        try{
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

//This method is for getting service provider services details
    public function get_merchant_service_list($merchant_id){

        $query = $this->db->prepare("SELECT * FROM `services` WHERE `merchant_id` = ?");
        $query->bindValue(1, $merchant_id);

        try{
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    } 

//This method is for getting service provider location details
    public function get_merchant_location_list($merchant_id){

        $query = $this->db->prepare("SELECT * FROM `locations` WHERE `merchant_id` = ?");
        $query->bindValue(1, $merchant_id);

        try{
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    } 

//This method is for getting service provider details
    public function get_merchant_campaigns($merchant_id){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `merchant_id` = ?");
        $query->bindValue(1, $merchant_id);


        try{
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    } 

// METHODS FOR KUFU APP END HERE

	public function update_campaign($campaign_id, $merchant_id,$campaign_name,$campaign_type,$campaign_description,$campaign_location,$campaign_ad,$campaign_start,$campaign_end,$campaign_status,$created_by,$date_updated)
	{

		$query = $this->db->prepare("UPDATE `campaigns` SET
								`campaign_name` = ?,
                                `campaign_type` = ?,
                                `campaign_description` = ?,
                                `campaign_location` = ?,
                                `campaign_ad` = ?,
                                `campaign_start` = ?,
                                `campaign_end` = ?,
                                `campaign_status` = ?,
                                `created_by` = ?,
                                `date_updated` = ?
									
								WHERE `campaign_id`	= ?");

		$query->bindValue(1, $campaign_name);
        $query->bindValue(2, $campaign_type);
        $query->bindValue(3, $campaign_description);
        $query->bindValue(4, $campaign_location);
        $query->bindValue(5, $campaign_ad);
        $query->bindValue(6, $campaign_start);
        $query->bindValue(7, $campaign_end);
        $query->bindValue(8, $campaign_status);
        $query->bindValue(9, $created_by);
        $query->bindValue(10, $date_updated);
        $query->bindValue(11, $campaign_id);
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}


	public function delete_campaign($campaign_id)
	{

		$query = $this->db->prepare("DELETE FROM `campaigns` WHERE `campaign_id` = ?");

		$query->bindValue(1, $campaign_id);
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
    }


    public function get_campaigns_by_location($campaign_location){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `campaign_location` = ? ORDER BY `campaign_hits` DESC");
		$query->bindValue(1, $campaign_location);

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function get_location_competitions($campaign_location){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `campaign_location` = ? AND `campaign_type` = ? AND `campaign_status` = ? ORDER BY `campaign_hits` DESC");
		$query->bindValue(1, $campaign_location);
		$query->bindValue(2, 'competition');
		$query->bindValue(3, 'active');

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function get_location_events($campaign_location){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `campaign_location` = ? AND `campaign_type` = ? AND `campaign_status` = ? ORDER BY `campaign_hits` DESC");
		$query->bindValue(1, $campaign_location);
		$query->bindValue(2, 'event');
		$query->bindValue(3, 'active');

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function get_location_discounts($campaign_location){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `campaign_location` = ? AND `campaign_type` = ? AND `campaign_status` = ? ORDER BY `campaign_hits` DESC");
		$query->bindValue(1, $campaign_location);
		$query->bindValue(2, 'discount');
		$query->bindValue(3, 'active');

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function get_location_promotions($campaign_location){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `campaign_location` = ? AND `campaign_type` = ? AND `campaign_status` = ? ORDER BY `campaign_hits` DESC");
		$query->bindValue(1, $campaign_location);
		$query->bindValue(2, 'promotion');
		$query->bindValue(3, 'active');

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function get_campaigns_by_category($campaign_location,$campaign_type){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `campaign_location` = ? AND `campaign_type` = ? AND `campaign_status` = ? ORDER BY `campaign_hits` DESC");
		$query->bindValue(1, $campaign_location);
		$query->bindValue(2, $campaign_type);
		$query->bindValue(3, 'active');

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function campaign_data($campaign_id){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `campaign_id` = ?");
        $query->bindValue(1, $campaign_id);


        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }  
    
    public function get_merchant_id($campaign_id){

        $query = $this->db->prepare("SELECT `merchant_id` FROM `campaigns` WHERE `campaign_id` = ?");
        $query->bindValue(1, $campaign_id);


        try{
            $query->execute();
            return $query->fetchColumn();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    } 




    public function get_other_merchant_campaigns($merchant_id,$campaign_id){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `merchant_id` = ? AND `campaign_id` <> ? AND `campaign_status` = ?");
        $query->bindValue(1, $merchant_id);
        $query->bindValue(2, $campaign_id);
        $query->bindValue(3, 'active');


        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function get_draft_campaigns(){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `campaign_status` = ? AND `merchant_id` = ?");
        $query->bindValue(1, 'draft');
        $query->bindValue(2, 0);

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function get_total_campaigns_pending(){

        $query = $this->db->prepare("SELECT COUNT(`campaign_id`) FROM `campaigns` WHERE `campaign_status` = ?");
        $query->bindValue(1, 'pending');

        try{
            $query->execute();
            return $query->fetchColumn();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function get_total_campaigns_active(){

        $query = $this->db->prepare("SELECT COUNT(`campaign_id`) FROM `campaigns` WHERE `campaign_status` = ?");
        $query->bindValue(1, 'active');

        try{
            $query->execute();
            return $query->fetchColumn();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function get_total_campaigns_complete(){

        $query = $this->db->prepare("SELECT COUNT(`campaign_id`) FROM `campaigns` WHERE `campaign_status` = ? OR `campaign_status` = ?");
        $query->bindValue(1, 'complete');
        $query->bindValue(2, 'expired');

        try{
            $query->execute();
            return $query->fetchColumn();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function get_campaign_data($campaign_id){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `campaign_id` = ?");
        $query->bindValue(1, $campaign_id);

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function request_campaign($campaign_id){

        $date_updated = date('Y-m-d');
        $query = $this->db->prepare("UPDATE `campaigns` SET
                                     `campaign_status` = ?,
                                     `date_updated`    = ?
                                     WHERE `campaign_id` = ?");
        $query->bindValue(1, 'pending');
        $query->bindValue(2, $date_updated);
        $query->bindValue(3, $campaign_id);

        try{
            $query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function activate_campaign($campaign_id){

        $date_updated = date('Y-m-d');
        $query = $this->db->prepare("UPDATE `campaigns` SET
                                     `campaign_status` = ?,
                                     `date_updated`    = ?
                                     WHERE `campaign_id` = ?");
        $query->bindValue(1, 'active');
        $query->bindValue(2, $date_updated);
        $query->bindValue(3, $campaign_id);

        try{
            $query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function reactivate_campaign($campaign_id){

        $date_updated = date('Y-m-d');
        $query = $this->db->prepare("UPDATE `campaigns` SET
                                     `campaign_status` = ?,
                                     `date_updated`    = ?
                                     WHERE `campaign_id` = ?");
        $query->bindValue(1, 'draft');
        $query->bindValue(2, $date_updated);
        $query->bindValue(3, $campaign_id);

        try{
            $query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function get_trending_campaigns(){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `campaign_status` = ? ORDER BY `campaign_hits` DESC");
        $query->bindValue(1, 'active');

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function get_active_campaigns(){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `campaign_status` = ? ORDER BY `campaign_hits` DESC");
        $query->bindValue(1, 'active');

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function merchant_active_campaigns($merchant_id){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `campaign_status` = ? AND `merchant_id` = ?");
        $query->bindValue(1, 'active');
        $query->bindValue(2, $merchant_id);

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }


    public function get_pending_campaigns(){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `campaign_status` = ?");
        $query->bindValue(1, 'pending');

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function merchant_pending_campaigns($merchant_id){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `campaign_status` = ? AND `merchant_id` = ?");
        $query->bindValue(1, 'pending');
        $query->bindValue(2, $merchant_id);

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function expire_campaign($campaign_id){

        $date_updated = date('Y-m-d');
        $query = $this->db->prepare("UPDATE `campaigns` SET
                                     `campaign_status` = ?,
                                     `date_updated`    = ?
                                     WHERE `campaign_id` = ?");
        $query->bindValue(1, 'expired');
        $query->bindValue(2, $date_updated);
        $query->bindValue(3, $campaign_id);

        try{
            $query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function get_complete_campaigns(){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `campaign_status` = ? OR `campaign_status` = ? ");
        $query->bindValue(1, 'complete');
        $query->bindValue(2, 'expired');

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function merchant_complete_campaigns($merchant_id){

        $query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `merchant_id` = ? AND (`campaign_status` = ? OR `campaign_status` = ?)");
        $query->bindValue(1, $merchant_id);
        $query->bindValue(2, 'complete');
        $query->bindValue(3, 'expired');

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }

    public function update_campaign_hits($campaign_id,$campaign_hits){

        $query = $this->db->prepare("UPDATE `campaigns` SET `campaign_hits` = ? WHERE `campaign_id` = ?");
        $query->bindValue(1, $campaign_hits);
        $query->bindValue(2, $campaign_id);

        try{
            $query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}        

    }
	
	public function get_merchant_pending_count($merchant_id){

		$query = $this->db->prepare("SELECT COUNT(`merchant_id`) FROM `campaigns` WHERE `merchant_id` = ? AND `campaign_status` = ?");
		$query->bindValue(1, $merchant_id);
		$query->bindValue(2, 'pending');

        try{
            $query->execute();
            return $query->fetchColumn();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function get_merchant_active_count($merchant_id){

		$query = $this->db->prepare("SELECT COUNT(`merchant_id`) FROM `campaigns` WHERE `merchant_id` = ? AND `campaign_status` = ?");
		$query->bindValue(1, $merchant_id);
		$query->bindValue(2, 'active');

        try{
            $query->execute();
            return $query->fetchColumn();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function get_merchant_complete_count($merchant_id){

		$query = $this->db->prepare("SELECT COUNT(`merchant_id`) FROM `campaigns` WHERE `merchant_id` = ? AND `campaign_status` = ?");
		$query->bindValue(1, $merchant_id);
		$query->bindValue(2, 'expired');

        try{
            $query->execute();
            return $query->fetchColumn();
		}catch(PDOException $e){
			die($e->getMessage());
		}
    }
    
	public function get_merchant_draft($merchant_id){

		$query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `merchant_id` = ? AND `campaign_status` = ?");
		$query->bindValue(1, $merchant_id);
		$query->bindValue(2, 'draft');

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	
	public function get_merchant_pending($merchant_id){

		$query = $this->db->prepare("SELECT * FROM `campaigns` WHERE `merchant_id` = ? AND `campaign_status` = ?");
		$query->bindValue(1, $merchant_id);
		$query->bindValue(2, 'pending');

        try{
            $query->execute();
            return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	

	public function get_merchant_active($merchant_id){

		$query = $this->db->prepare("SELECT COUNT(`merchant_id`) FROM `campaigns` WHERE `merchant_id` = ? AND `campaign_status` = ?");
		$query->bindValue(1, $merchant_id);
		$query->bindValue(2, 'active');

        try{
            $query->execute();
            return $query->fetchColumn();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function get_merchant_complete($merchant_id){

		$query = $this->db->prepare("SELECT COUNT(`merchant_id`) FROM `campaigns` WHERE `merchant_id` = ? AND `campaign_status` = ? OR `campaign_status` = ?");
		$query->bindValue(1, $merchant_id);
		$query->bindValue(2, 'complete');
		$query->bindValue(2, 'expired');

        try{
            $query->execute();
            return $query->fetchColumn();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

}