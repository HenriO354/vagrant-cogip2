<?php
require "./database/connection.php";

//Fichier pour le model de la page login

	// check si le Login est dans la BD  
//global $username;
//global $password;

function checkLogin($username, $password){
	$connection = dbconnect();
	$sql = <<<SQL
	SELECT * FROM user
	WHERE `username` = ?
	LIMIT 1
SQL;

    $stmt= $connection->prepare($sql);
    //eviter l'injection SQL
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);

    if(!empty($row)){
        if($row[0]['password'] == $password) {
            $_SESSION['username'] = $username;
            $_SESSION['isLoggedIn'] = TRUE;
            $_SESSION['mode'] = $row[0]['mode'];
            header("location: home");
        }
    }
	else{
		echo 'Pas d\'utilisateur trouvé';
	}
 }


//function check_password($password){
///	while($row = mysqli_fetch_assoc($result)){
//					if($password == password_verify($row['password'])
//}

?>
