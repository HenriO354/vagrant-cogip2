<?php

function getAllUsers(){
	$connection = dbconnect();
	$sql = <<<SQL
	SELECT id, username, mode
    FROM user
SQL;

    $stmt= $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function deleteUser($id){
	$connection = dbconnect();
	$sql = <<<SQL
	DELETE FROM user
    WHERE id = ?
SQL;

    $stmt= $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>