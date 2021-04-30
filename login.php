<?php
session_start();

require realpath(__DIR__ . "/vendor/autoload.php");
$errors = array();
$userdata = array();
$username = $password = "";

if (isset($_POST["action"]) && $_POST["action"] == "login") {

    if (!empty($_POST["username"])) {
        $username = clean_data($_POST["username"]);
    } else {
        $errors["username"] = "Hakikisha username yako";
    }

    if (!empty($_POST["password"])) {
        $password = clean_data($_POST["password"]);
    } else {
        $errors["password"] = "Hakikisha password yako";
    }

    if (count($errors) > 0) {
        echo json_encode($errors);
    } else {
        $result = login($username, $password);

        $page = "";
        $success = false;

        if ($result) {
            $isValid = password_verify($password, $result->password);

            if ($isValid) {
                switch ($result->permission_id) {
                    case 1:
                        $page = "administrator";
                        break;
                    case 2:
                        $page = "operator";
                        break;
                    default:
                        $page = "default";
                }
                $success = true;
            }
        }


        $output = ['success' => $success, 'page' => $page];

        echo json_encode($output);
    }
}

function clean_data($data)
{
    $data = trim($data);
    $data = htmlentities($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}

function login($username, $password)
{
    $operator = new \App\User\Operator();
    $row = $operator->login($username, $password);
    return $row;
}
