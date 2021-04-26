<?php
require realpath(__DIR__ . "/vendor/autoload.php");

session_start();


$errors = array();
global $userdata;

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: personal_details.php");
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["personal_submit"])) {

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

        //Process images
        if (isset($_FILES["user_photo"])) {
            $target_dir = "uploads/";
            $filename = "";
            $is_upload = false;
            $uploaded_filename = $_FILES["user_photo"]["name"];
            $tmp_name = $_FILES["user_photo"]["tmp_name"];
            $extension = strtolower(pathinfo($uploaded_filename, PATHINFO_EXTENSION));
            $filename = $target_dir . date('Ymd_his') . "." . $extension;
            $userdata["photo_path"] = $filename;

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
                // Move file to location
                move_uploaded_file($tmp_name, $filename);
            }
        }

        registerUser($userdata);
        unset($_SESSION["errors"]);
        unset($_SESSION["userdata"]);

        header("Location: religious_details.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "search_user") {

    $phone_no = clean_data($_POST["phone_no"]);

    getUser($phone_no);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "load_user") {

    $user_id = clean_data($_POST["user_id"]);

    loadUser($user_id);
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["action"]) && ($_POST["action"] == "fetch_children")) {

    $phone_no = clean_data($_POST["phone_no"]);

    $user = new \App\User\User();
    getChildren($phone_no);
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["action"]) && ($_POST["action"] == "register_children")) {


    $child_data = array();
    $errors = array();
    if (empty($_POST["phone_no"])) {
        $errors["phone_no"] = "Weka namba ya simu";
    } else {
        $child_data["phone_no"] = clean_data($_POST["phone_no"]);
    }
    if (empty($_POST["parent_id"])) {
        $errors["parent_id"] = "Weka namba ya simu";
    } else {
        $child_data["parent_id"] = clean_data($_POST["parent_id"]);
    }
    if (empty($_POST["parent_name"])) {
        $errors["parent_name"] = "Jina za mzazi";
    } else {
        $child_data["parent_name"] = clean_data($_POST["parent_name"]);
    }
    if (empty($_POST["child_name"])) {
        $errors["child_name"] = "Jina linahitajika";
    } else {
        $child_data["child_name"] = clean_data($_POST["child_name"]);
    }

    if (empty($_POST["child_gender"])) {
        $errors["child_gender"] = "Jinsi inahitajika ";
    } else {
        $child_data["child_gender"] = clean_data($_POST["child_gender"]);
    }

    if (empty($_POST["child_age"])) {
        $errors["child_age"] = "Umri unahitajika";
    } else {
        $child_data["child_age"] = clean_data($_POST["child_age"]);
    }

    if (empty($_POST["child_location"])) {
        $errors["child_location"] = "Jaza mahali anapoishi";
    } else {
        $child_data["child_location"] = clean_data($_POST["child_location"]);
    }

    if (count($errors) > 0) {
        $_SESSION["child_errors"] = $errors;
        $_SESSION["child_data"] = $child_data;
        header("Location: family_details.php");
    } else {
        $result = registerChildren($child_data);
        if ($result) {
            unset($_SESSION["child_errors"]);
            unset($_SESSION["child_data"]);
            header("Location: family_details.php");
            exit();
        }
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["action"]) && ($_POST["action"] == "register_religion")) {



    $religion_data = array();
    $errors = array();
    if (empty($_POST["user_id"])) {
        $errors["user_id"] = "Jaza ID";
    } else {
        $religion_data["user_id"] = clean_data($_POST["user_id"]);
    }
    if (empty($_POST["is_graduate"])) {
        $errors["is_graduate"] = "Jaza uhitimu";
    } else {
        $religion_data["is_graduate"] = clean_data($_POST["is_graduate"]);
    }
    if (empty($_POST["has_bible_knowledge"])) {
        $errors["has_bible_knowledge"] = "Jaza elimu ya Biblia";
    } else {
        $religion_data["has_bible_knowledge"] = clean_data($_POST["has_bible_knowledge"]);
    }
    if (empty($_POST["joined_date"])) {
        $errors["joined_date"] = "Jaza tarehe ya kujiunga";
    } else {
        $religion_data["joined_date"] = clean_data($_POST["joined_date"]);
    }
    if (empty($_POST["salvation_date"])) {
        $errors["salvation_date"] = "Jaza tarehe ya kuokoka";
    } else {
        $religion_data["salvation_date"] = clean_data($_POST["salvation_date"]);
    }

    if (empty($_POST["baptism_date"])) {
        $errors["baptism_date"] = "Jaza tarehe ya kubatizwa";
    } else {
        $religion_data["baptism_date"] = clean_data($_POST["baptism_date"]);
    }

    if (empty($_POST["baptism_location"])) {
        $errors["baptism_location"] = "Jaza mahali pa kuokoka";
    } else {
        $religion_data["baptism_location"] = clean_data($_POST["baptism_location"]);
    }

    if (empty($_POST["reason"])) {
        $errors["reason"] = "Jaza sababu za kuokoka";
    } else {
        $religion_data["reason"] = clean_data($_POST["reason"]);
    }
    if (empty($_POST["prefered_work"])) {
        $errors["prefered_work"] = "Jaza kazi unayoipenda";
    } else {
        $religion_data["prefered_work"] = clean_data($_POST["prefered_work"]);
    }
    if (empty($_POST["prefered_section"])) {
        $errors["prefered_section"] = "Jaza kitengo unachokipenda";
    } else {
        $religion_data["prefered_section"] = clean_data($_POST["prefered_section"]);
    }


    if (count($errors) > 0) {
        $_SESSION["religion_errors"] = $errors;
        $_SESSION["religion_data"] = $religion_data;
        header("Location: religious_details.php");
        exit();
    } else {
        $result = registerReligion($religion_data);
        if ($result) {
            unset($_SESSION["religion_errors"]);
            unset($_SESSION["religion_data"]);
            header("Location: religious_details.php");
            exit();
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

function registerUser($userdata)
{
    $user = new App\User\User();

    // register User
    $user_registered = $user->registerUser($userdata);

    if ($user_registered) {
        $user_id = $user->lastId();

        // Storing user_id in session to be used later for fetching user info instead of phone number
        $_SESSION["user_id"] = $user_id;
        setcookie("user_id", $_SESSION["user_id"], 0);

        // register spouse
        $user->registerMarriage($user_id, $userdata);

        // Register residence
        $user->registerResidence($user_id, $userdata);

        // Register employment
        $user->registerEmployement($user_id, $userdata);
        
    }
}

function getUser($phone_no)
{
    $user = new \App\User\User();

    $row = $user->getUser($phone_no);
    echo json_encode($row);
}

function loadUser($user_id)
{
    $user = new \App\User\User();

    $row = $user->loadUser($user_id);
    echo json_encode($row);
}

function getChildren($phone_no)
{
    $user = new \App\User\User();

    // Fetch user
    $row = $user->getUser($phone_no);

    // Extract id
    $id = $row->id;

    // Fetch children
    $row = $user->getChildren($id);

    echo json_encode($row);
}

function registerChildren($data)
{
    $user = new \App\User\User();
    return  $user->registerChildren($data);
}

function registerReligion($data)
{
    $user = new \App\User\User();
    return  $user->registerReligion($data);
}
