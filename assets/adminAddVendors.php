<?php
if(!isset($_SESSION)){
    session_start();
}
/**
 * Created by PhpStorm.
 * User: iotenti
 * Date: 2/4/2018
 * Time: 3:09 PM
 */
include_once ("adminHeader.php");
include_once("functions.php");
include_once("dbconnect.php");
$db = dbconnect();

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? NULL;
$vendorName = filter_input(INPUT_POST, 'vendorName', FILTER_SANITIZE_STRING) ?? NULL;
$vendorContactFname = filter_input(INPUT_POST, 'vendorContactFname', FILTER_SANITIZE_STRING) ?? NULL;
$vendorContactLname = filter_input(INPUT_POST, 'vendorContactLname', FILTER_SANITIZE_STRING) ?? NULL;
$vendorPhone = filter_input(INPUT_POST, 'vendorPhone', FILTER_SANITIZE_STRING) ?? NULL;
$vendorEmail = filter_input(INPUT_POST, 'vendorEmail', FILTER_SANITIZE_STRING) ?? NULL;
$vendorCountry = filter_input(INPUT_POST, 'vendorCountry', FILTER_SANITIZE_STRING) ?? NULL;
$vendorCity = filter_input(INPUT_POST, 'vendorCity', FILTER_SANITIZE_STRING) ?? NULL;
$vendorZipCode = filter_input(INPUT_POST, 'vendorZipCode', FILTER_SANITIZE_STRING) ?? NULL;
$vendorState = filter_input(INPUT_POST, 'vendorState', FILTER_SANITIZE_STRING) ?? NULL;
$vendorId = filter_input(INPUT_GET, 'vendorId', FILTER_SANITIZE_STRING) ?? NULL;

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 crudNav">
            <div class="btn-group" role="group" aria-label="inventoryNav">
                <a class='btn btn-secondary' href="adminVendors.php" role="button">View</a>
                <a class='btn btn-secondary' href="adminAddVendors.php" role="button">Add</a>
                <a class='btn btn-secondary' href="adminUpdateAndDeleteVendors.php" role="button">Edit</a>
            </div>
        </div>
        <h1>Add Vendors</h1>
    </div>
</div>
<?php

switch($action){
    default:
        include_once ("../forms/addVendorForm.php");
        break;
    case 'Add Vendor':

        $cleanPhoneNum = preg_replace("/[^0-9]/", "", $vendorPhone); //strips all non-numeric values from phone number before storing to db.
        if(filter_var($vendorEmail, FILTER_VALIDATE_EMAIL)){ //if email is valid store everything
            $vendor = array(
                "vendor_id" => $vendorId,
                "vendor_name" => $vendorName,
                "vendor_contact_fname" => $vendorContactFname,
                "vendor_contact_lname" => $vendorContactLname,
                "vendor_email" => $vendorEmail,
                "vendor_phone" => $cleanPhoneNum,
                "vendor_country" => $vendorCountry,
                "vendor_city" => $vendorCity,
                "vendor_state" => $vendorState,
                "vendor_zipcode" => $vendorZipCode
            );
            $result = addVendor($db, $vendor);
            echo getMessage($result);
            include_once ("../forms/addVendorForm.php");

        } else { //invalid email
            echo "please enter a valid email";
            include_once ("../forms/addVendorForm.php");
        }
        break;
}

include_once ("footer.html");
?>