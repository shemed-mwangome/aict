<?php
require realpath(__DIR__ . "/vendor/autoload.php");

session_start();


$errors = array();
$userdata = array();
$fullname = $gender = $dob = $marital_status = $spouse_name = $date_marriage = $parent_name = $employer = $skills = $address = $phone_no = $email = $location = $street = $house_no = $user_photo = "";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: personal_details.php");
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["fullname"])) {
        $errors["fullnameErr"] = "Jina kamili linahitajika";
    } else {
        $userdata["fullname"] = clean_data($_POST['fullname']);
    }

    if (empty($_POST["gender"])) {
        $errors["genderErr"] = "Chagua jinsia";
    } else {
        $userdata["gender"] = clean_data($_POST['gender']);
    }

    if (empty($_POST["dob"])) {
        $errors["dobErr"] = "Jaza tarehe ya kuzaliwa";
    } else {
        $userdata["dob"] = clean_data($_POST['dob']);
    }
    if (empty($_POST["marital_status"])) {
        $errors["marital_statusErr"] = "Chagua hali ya Ndoa";
    } else {
        $userdata["marital_status"] = clean_data($_POST['marital_status']);
    }
    if (empty($_POST["spouse_name"])) {
        $errors["spouse_nameErr"] = "Jaza jina la Mwenza";
    } else {
        $userdata["spouse_name"] = clean_data($_POST['spouse_name']);
    }
    if (empty($_POST["date_marriage"])) {
        $errors["date_marriageErr"] = "Chagua Tarehe ya Ndoa";
    } else {
        $userdata["date_marriage"] = clean_data($_POST['date_marriage']);
    }
    if (empty($_POST["parent_name"])) {
        $errors["parent_nameErr"] = "Jaza jina la mzazi/ Mlezi";
    } else {
        $userdata["parent_name"] = clean_data($_POST['parent_name']);
    }
    if (empty($_POST["employer"])) {
        $errors["employerErr"] = "Jaza jina la mwajiri";
    } else {
        $userdata["employer"] = clean_data($_POST['employer']);
    }
    if (empty($_POST["skills"])) {
        $errors["skillErr"] = "Jaza ujuzi";
    } else {
        $userdata["skills"] = clean_data($_POST['skills']);
    }
    if (empty($_POST["address"])) {
        $errors["addressErr"] = "Jaza anuani";
    } else {
        $userdata["address"] = clean_data($_POST['address']);
    }
    if (empty($_POST["phone_no"])) {
        $errors["phone_noErr"] = "Jaza namba ya simu";
    } else {
        $userdata["phone_no"] = clean_data($_POST['phone_no']);
    }
    if (empty($_POST["email"])) {
        $errors["emailErr"] = "Jaza anuani ya barua pepe";
    } else {
        $userdata["email"] = clean_data($_POST['email']);
    }
    if (empty($_POST["location"])) {
        $errors["locationErr"] = "Jaza Mahali unapoishi";
    } else {
        $userdata["location"] = clean_data($_POST['location']);
    }
    if (empty($_POST["street"])) {
        $errors["streetErr"] = "Jaza mtaa unaoishi";
    } else {
        $userdata['street'] = clean_data($_POST['street']);
    }
    if (empty($_POST["house_no"])) {
        $errors["house_noErr"] = "Jaza namba ya nyumba";
    } else {
        $userdata['house_no'] = clean_data($_POST['house_no']);
    }



    if (count($errors) > 0) {
        $_SESSION["errors"] = $errors;
        $_SESSION["userdata"] = $userdata;
        header("Location: personal_details.php");
    } else {
        // Processing inputs

        if (isset($_FILES["user_photo"])) {
            //Process images
            $target_dir = "uploads/";
            $filename = "";
            $is_upload = false;
            $uploaded_filename = $_FILES["user_photo"]["name"];
            $tmp_name = $_FILES["user_photo"]["tmp_name"];
            $extension = strtolower(pathinfo($uploaded_filename, PATHINFO_EXTENSION));

            // Getting mime
            $properties = getimagesize($_FILES["user_photo"]["tmp_name"]);
            $type = $_FILES["user_photo"]["type"];

            // Required mime and type
            $allowed_types = array("jpg", "jpeg", "gif", "png", "webp");
            $mime = array("image/jpeg", "image/png", "image/gif", "image/webp");

            // Checking mime and type
            if (in_array($type, $mime) && in_array($extension, $allowed_types)) {
                $is_upload = true;
            }

            if ($is_upload) {
                $filename = $target_dir . date('Ymd_his') . "." . $extension;
                // Move file to location
                move_uploaded_file($tmp_name, $filename);
                $userdata["photo_path"] = $filename;
            }

            // Implement saving to database;

            $user = new App\User\User();

            // register User
            $id = $user->registerUser($userdata);

            $user_registered = false;


            // Check if user is inserted
            if ($id) {
                echo "passed";

                // Insert spouse
                $user->registerMarriage($userdata, $id);

                // Insert employment details
                $user->registerEmployement($userdata, $id);

                // Insert Residence data
                $user->registerResidence($userdata, $id);



                $user_registered = true;

                if ($user_registered) {
                    header("Location: family_details.php");
                }
            }
        }
    }
}

function clean_data($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = ($data);
    return $data;
}

function uploadImage()
{
}
