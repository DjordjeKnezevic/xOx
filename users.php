<?php

// function handleRequest(requestType, responseMessage) {

// }



if (isset($_POST['userSubmit'])) {
    include "includes/connect.php";
    $message = "";
    $messageType = "";
    $query = "";

    $referrer = parse_url($_SERVER['HTTP_REFERER']);
    $referrer_url = $referrer['scheme'] . '://' . $referrer['host'] . ':' . $referrer['port'] . $referrer['path'];

    switch ($_POST['userSubmit']) {
        case "insert":
            $messageType = "insert";
            $username = $_POST['username'];
            $password = $_POST['password'];
            $queryInsert = "INSERT INTO user(`username`, `password`) VALUES('$username', '$password')";
            $querySelect = "SELECT * FROM `user` WHERE `username` = '$username'";
            try {
                $result = $conn->query($querySelect);
            } catch (Exception $e) {
                $message = $e->getMessage();
            }
            if ($result->rowCount() > 0) {
                $message = "User $username already exists";
                break;
            }
            $reUsername = '/^[A-Z][\w\d!@$%^&*._]{2,10}$/';
            $rePassword = '/^[A-Z][\w\d!@$%^&*._]{7,19}$/';
            if (!preg_match($reUsername, $username)) {
                $message = "Nedozvoljen format username-a";
                break;
            }
            if (!preg_match($rePassword, $password)) {
                $message = "Nedozvoljen format password-a";
                break;
            }
            try {
                $conn->query($queryInsert);
                $message = "succesfully inserted user: $username, $password";
            } catch (Exception $e) {
                $message = $e->getMessage();
            }
            break;
        case "get":
            $messageType = "get";
            $requestedUsername = $_POST['getUser'];
            $query = "SELECT * FROM `user` WHERE `username` = '$requestedUsername'";
            try {
                $row = $conn->query($query)->fetch();
                // while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                //     $message .= $row['username'] . " " . $row['password'] . "<br/>";
                // }
                // foreach ($result as $row) {
                //     $message .= $row->username . " " . $row->password;
                // }
                $message .= $row->username . " " . $row->password;
                if ($message == " ")
                    $message = "No results found";
                // $message = "" ? $message = "No results found" : $message;
            } catch (Exception $e) {
                $message = $e->getMessage();
            }
            break;
        case "delete":
            $messageType = "delete";
            $requestedUsername = $_POST['deleteUser'];
            $query = "DELETE FROM `user` WHERE `username` = '$requestedUsername'";
            try {
                $result = $conn->query($query);
                if ($result->rowCount() == 1) {
                    $message = "Succesfully deleted user: $requestedUsername";
                } else {
                    $message = "No user found";
                }
            } catch (Exception $e) {
                $message = $e->getMessage();
            }
            break;
        case "update":
            $messageType = "update";
            $requestedUsername = $_POST['updateUser'];
            $changeTo = $_POST['changeTo'];
            $query = "UPDATE `user` SET `username`='$changeTo' WHERE `username` = '$requestedUsername'";
            try {
                $result = $conn->query($query);
                if ($result->rowCount() == 1) {
                    $message = "Succesfully updated user: $requestedUsername";
                } else {
                    $message = "No user found";
                }
            } catch (Exception $e) {
                $message = $e->getMessage();
            }
            break;
    }
    $conn = null;
    header("Location: /?$messageType=$message");
} else {
    header("Location: /?error=405 FORBIDDEN");
}




?>