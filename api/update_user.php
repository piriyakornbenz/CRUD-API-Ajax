<?php
    require_once('./config.php');

    if($_SERVER['REQUEST_METHOD'] == "POST") {
       
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        $stmt = $db->prepare("UPDATE test SET name=:name, email=:email WHERE id = :id ");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $response = array();
        $response['result'] = array();

        $result = array(
            "msg" => "success",
            "code" => 200
        );
        array_push($response['result'], $result);
        http_response_code(200);
        echo json_encode($response);

    }
    else {
        http_response_code(405);
    }
?>