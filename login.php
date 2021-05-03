<?php
session_start();

require realpath(__DIR__ . "/vendor/autoload.php");
$errors = $result = array();
$username = $password = "";
$success = false;

if (isset($_POST["action"]) && $_POST["action"] == "login") {

    if (!empty($_POST["username"])) {
        $username = clean_data($_POST["username"]);
    } else {
        $errors["username"] = "Jaza jina la mtumiaji";
    }

    if (!empty($_POST["password"])) {
        $password = clean_data($_POST["password"]);
    } else {
        $errors["password"] = "Jaza neno la siri yako";
    }

    if (count($errors) > 0) {
        $result['errors'] =  $errors;
        echo json_encode($result);
    } else {
        $dbResult = login($username, $password);

        if ($dbResult) {
            $isValid = password_verify($password, $dbResult->password);

            if ($isValid) {
                $page = "";
                switch ($dbResult->permission_id) {
                    case 1:
                        $page = "administrator";
                        break;
                    case 2:
                        $page = "standard";
                        break;
                    default:
                        $page = "default";
                        break;
                }
                $success = true;
                $_SESSION["isLogged"] = true;
                $_SESSION['user'] = $page;
            } else {
                $errors["password_error"] = "Umekosea neno siri la mtumiaji";
            }
        } else {
            $errors["not_found"] = "Umekosea jina la mtumiaji";
        }

        if (count($errors) > 0) {
            $result["errors"] = $errors;
            echo json_encode($result);
        } else {
            $success = array(
                "status" => true,
                "page" => $page
            );
            $result["success"] = $success;
            echo json_encode($result);
        }
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
