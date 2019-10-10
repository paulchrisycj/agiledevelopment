<?php

//Enable cross origin access control
header('Access-Control-Allow-Origin: *');

//Load recources
 require_once('./classes/recordset.class.php');
 require_once('./classes/pdoDB.class.php');

//Start of Config
//Use for local dev

//Start Session
session_start();

//Set Timezone for Time and Date $mysqlDateandTime
date_default_timezone_set('Asia/Kuala_Lumpur');

//Time and Date
$mysqlDateandTime = date("Y-m-d H:i:s");


//Standard REQUEST
$call = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'error';
$subject = isset($_REQUEST['subject']) ? $_REQUEST['subject'] : null;
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

//Admin REQUEST
$admin_id= isset($_REQUEST['admin_id']) ? $_REQUEST['admin_id'] : null;
$admin_username= isset($_REQUEST['admin_username']) ? $_REQUEST['admin_username'] : null;
$admin_password= isset($_REQUEST['admin_password']) ? $_REQUEST['admin_password'] : null;

//Booking REQUEST
$booking_id= isset($_REQUEST['booking_id']) ? $_REQUEST['booking_id'] : null;
$booking_user_id= isset($_REQUEST['booking_user_id']) ? $_REQUEST['booking_user_id'] : null;
$booking_slot_id= isset($_REQUEST['booking_slot_id']) ? $_REQUEST['booking_slot_id'] : null;

//Slots REQUEST
$slot_id= isset($_REQUEST['slot_id']) ? $_REQUEST['slot_id'] : null;
$venue_id= isset($_REQUEST['venue_id']) ? $_REQUEST['venue_id'] : null;
$slot_date= isset($_REQUEST['slot_date']) ? $_REQUEST['slot_date'] : null;
$slot_start_time= isset($_REQUEST['slot_start_time']) ? $_REQUEST['slot_start_time'] : null;
$slot_end_time= isset($_REQUEST['slot_end_time']) ? $_REQUEST['slot_end_time'] : null;
$slot_status= isset($_REQUEST['slot_status']) ? $_REQUEST['slot_status'] : null;

//User REQUEST
$user_id= isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : null;
$user_name= isset($_REQUEST['user_name']) ? $_REQUEST['user_name'] : null;
$user_password= isset($_REQUEST['user_password']) ? $_REQUEST['user_password'] : null;
$user_email= isset($_REQUEST['user_email']) ? $_REQUEST['user_email'] : null;

//Venue REQUEST
$venue_id= isset($_REQUEST['venue_id']) ? $_REQUEST['venue_id'] : null;
$venue_name= isset($_REQUEST['venue_name']) ? $_REQUEST['venue_name'] : null;
$venue_capacity= isset($_REQUEST['venue_capacity']) ? $_REQUEST['venue_capacity'] : null;
$venue_location= isset($_REQUEST['venue_location']) ? $_REQUEST['venue_location'] : null;


//Action and Subject to Route
$route = $call . ucfirst($subject);

// Connect to db
$db = pdoDB::getConnection();


function option($retval, $type){

    $ret = json_decode($retval, true);
    $option = "<option></option>";

    if($ret['RowCount'] == 0){
        $option = '<option>No option available</option>';
    }else{
        foreach($ret['results'] as $value){
            $option = $option.'<option value = "'.$value[$type].'">'.$value[$type].'</option>';
        }
    }

    return $option;
}

//set the header to json because everything is returned in that format
header("Content-Type: application/json");

switch ($route) {

//  Standard
    case 'loginAdmin':
        $sqlSearch = "SELECT * FROM admin WHERE admin_username=:admin_username AND admin_password=:admin_password";
        $rs = new JSONRecordSet();
        $retval = $rs->getRecordSet($sqlSearch, null,
            array(
                ':admin_username'=>$admin_username,
                ':admin_password'=>$admin_password
            )
        );
        $retval = json_decode($retval, true);
        if($retval['RowCount'] == 1){
            $_SESSION['admin_id'] = $retval['results'][0]['admin_id'];
            header('Location: http://localhost/Codeigniter/index.php/admin/dashboard');
        }else{
            session_destroy();
            header('Location: http://localhost/Codeigniter/index.php/admin/dashboard');
        }
        break;

    case 'loginUser':
        $sqlSearch = "SELECT * FROM user WHERE user_name=:user_name AND user_password=:user_password";
        $rs = new JSONRecordSet();
        $retval = $rs->getRecordSet($sqlSearch, null,
            array(
                ':user_name'=>$user_name,
                ':user_password'=>$user_password
            )
        );
        $retval = json_decode($retval, true);
        if($retval['RowCount'] == 1){
            $_SESSION['user_id'] = $retval['results'][0]['user_id'];
            header('Location: http://localhost/Codeigniter/index.php/user/dashboard');
        }else{
            header('Location: http://localhost/Codeigniter/index.php/user/dashboard');
        }
        break;


    case 'showAllBooking':
        $sqlSearch = "SELECT * FROM booking LEFT JOIN slots ON booking.booking_slot_id=slots.slot_id RIGHT JOIN venue ON slots.venue_id=venue.venue_id GROUP BY booking.booking_id";
        $rs = new JSONRecordSet();
        $retval = $rs->getRecordSet($sqlSearch, null,
            array(
            )
        );
        echo $retval;
        break;

    case 'showAllMyBookings':
        $sqlSearch = "SELECT * FROM booking LEFT JOIN slots ON booking.booking_slot_id=slots.slot_id RIGHT JOIN venue ON slots.venue_id=venue.venue_id WHERE booking.booking_user_id=:booking_user_id GROUP BY booking.booking_id";
        $rs = new JSONRecordSet();
        $retval = $rs->getRecordSet($sqlSearch, null,
            array(
                ':booking_user_id'=>$booking_user_id
            )
        );
        echo $retval;
        break;

    case 'showAllSlots':
        $sqlSearch = "SELECT * FROM slots LEFT JOIN venue ON slots.venue_id=venue.venue_id GROUP BY slots.slot_id";
        $rs = new JSONRecordSet();
        $retval = $rs->getRecordSet($sqlSearch, null,
            array(
            )
        );
        echo $retval;
        break;

    case 'showAllUnreservedSlots':
        $sqlSearch = "SELECT * FROM slots LEFT JOIN venue ON slots.venue_id=venue.venue_id WHERE slots.slot_id NOT IN (SELECT slots.slot_id FROM slots LEFT JOIN venue ON slots.venue_id=venue.venue_id RIGHT JOIN booking ON slots.slot_id = booking.booking_slot_id GROUP BY slots.slot_id) GROUP BY slots.slot_id";
        $rs = new JSONRecordSet();
        $retval = $rs->getRecordSet($sqlSearch, null,
            array(
            )
        );
        echo $retval;
        break;

    case 'showAllVenue':
        $sqlSearch = "SELECT * FROM venue";
        $rs = new JSONRecordSet();
        $retval = $rs->getRecordSet($sqlSearch, null,
            array(
            )
        );
        echo $retval;
        break;

        //ADD
    case 'addBooking':
        $sqlInsert="INSERT INTO `agiledev`.`booking` 
                        (
                        `booking_user_id`, 
                        `booking_slot_id`
                        ) 
                        VALUES 
                        (
                        :booking_user_id,
                        :booking_slot_id
                        )";
        $rs = new JSONRecordSet();
        $retval = $rs->setRecord($sqlInsert, null,
            array(
                ':booking_user_id'=>$booking_user_id,
                ':booking_slot_id'=>$booking_slot_id
            )
        );
        echo $retval;
        break;

    case 'addVenue':
        $sqlInsert="INSERT INTO `agiledev`.`venue` 
                        (
                        `venue_name`, 
                        `venue_capacity`, 
                        `venue_location`
                        )
                        VALUES 
                        (
                        :venue_name,
                        :venue_capacity,
                        :venue_location
                        )";
        $rs = new JSONRecordSet();
        $retval = $rs->setRecord($sqlInsert, null,
            array(
                ':venue_name'=>$venue_name,
                ':venue_capacity'=>$venue_capacity,
                ':venue_location'=>$venue_location
            )
        );
        echo $retval;
        break;


    case 'addSlot':
        $sqlInsert="INSERT INTO `agiledev`.`slots` 
                        (
                        `venue_id`, 
                        `slot_date`, 
                        `slot_start_time`, 
                        `slot_end_time`, 
                        `slot_status`
                        ) 
                        VALUES 
                        (
                        :venue_id,
                        :slot_date,
                        :slot_start_time,
                        :slot_end_time,
                        :slot_status
                        )";
        $rs = new JSONRecordSet();
        $retval = $rs->setRecord($sqlInsert, null,
            array(
                ':venue_id'=>$venue_id,
                ':slot_date'=>$slot_date,
                ':slot_start_time'=>$slot_start_time,
                ':slot_end_time'=>$slot_end_time,
                ':slot_status'=>0
            )
        );
        echo $retval;
        break;




    case 'option_drum_type':
        $sqlSearch = "select distinct drum_type from drum order by field(drum_type, 
        'PVC',
        'PVC/PVC',
        'XLPE/PVC(1C)',
        'XLPE/PVC',
        'PVC Flex(1C)',
        'PVC Flex',
        'TRS',
        'PVC/SWA/PVC',
        'XLPE/SWA/PVC',
        'XLPE/AWA/PVC',
        'MICA/XLPE/PVC',
        'MICA/XLPE/LSHF',
        'YSLY Control',
        'PVC Flat',
        'Crane 2S',
        'SiHF Silicon',
        'LiYCY Screen',
        'XLPE/OS/PVC',
        'PVC/OS/SWA/PVC',
        'XLPE/OS/SWA/PVC',
        'Profibus DP',
        'H07RNF Neoprene',
        'ABC 11KV',
        'ABC',
        'Alum PVC',
        'Alum XLPE/PVC',
        'Alum XLPE/SWA/PVC',
        'Alum XLPE/SCT/PE',
        '11KV Alum XLPE/SCT/PE',
        '11KV Cu XLPE/SCT/SWA/PE',
        '33KV Cu XLPE/SCT/SWA/PE',
        'Internal Telephone',
        'Jelly Filled Telephone',
        'Drop Telephone'
        ) asc, drum_type";
        $rs = new JSONRecordSet();
        $retval = $rs->getRecordSet($sqlSearch, null, null);
        echo option($retval, 'drum_type');
        break;

		
	case 'logout':
		session_destroy();		
		if ($_SERVER['SERVER_NAME'] == "localhost") {
			$path = "http://localhost/KSLetricMalaysia";
		} else {
			$path = "http://" . $_SERVER['SERVER_NAME'];
		}
		header("Location: ".$path);
		break;


		
	case 'session':
		var_dump($_SESSION);
		break;
		
	default :
		echo "API not exists. ";
	break;

}//end of switch
?>
