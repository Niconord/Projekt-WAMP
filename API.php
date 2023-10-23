<?php
require "settings/init.php";

$data = json_decode(file_get_contents('php://input'), true);

// Password GlenKim


header('Content-type: application/json; charset=utf-8');

if(isset($data["password"]) && $data["password"] == "GlenKim") {
    $sql = "SELECT * FROM film WHERE 1=1 ";
    $bind = [];

    if(!empty($data["nameSearch"])) {
        $sql .= " AND (filmnavn LIKE CONCAT('%', :filmnavn, '%') OR filmgenre LIKE CONCAT('%', :filmgenre, '%') OR filmproducer LIKE CONCAT('%', :filmproducer, '%')) ";
        $bind[":filmnavn"] = $data["nameSearch"];
        $bind[":filmgenre"] = $data["nameSearch"];
        $bind[":filmproducer"] = $data["nameSearch"];
    }


    $film = $db->sql($sql, $bind);
    header("HTTP/1.1 200 OK");

    echo json_encode($film);


} else {
    header("HTTP/1.1 401 Unauthorized");
    $error["errorMessage"] = "Kodeord er forkert";

    echo json_encode($error);
}

?>


