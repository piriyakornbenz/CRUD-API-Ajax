<?php
    require_once('./config.php');

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $name = $_POST['name'];
            $email = $_POST['email'];

            $response = array();
            $response['result'] = array();

            $stmt = $db->prepare("INSERT INTO test (name, email) VALUES (?,?)");
            if($stmt->execute([$name, $email])) {
                $result = array(
                    "msg" => "success",
                    "code" => 200
                );
                array_push($response['result'], $result);
                http_response_code(200);
                echo json_encode($response);
            }
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    else {
        http_response_code(405);
    }
?>