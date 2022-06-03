<?php
	
function insertcontact($a,$b,$c,$d,$e){

	$conn = dbconnect();
	$stmt = $conn->stmt_init();

	 //Préparation de la requête
    $sql = <<<SQL
        INSERT INTO contact (firstname, lastname, phone, email,contact_company_id)
        VALUES (? ,? ,? ,? ,?)
SQL;

	$stmt->prepare($sql);


    //éviter injection sql
	$stmt->bind_param('ssssi', $a, $b, $c, $d, $e);

    //exécute 
    $stmt->execute();
	echo mysqli_error($conn);
	}


function insertcompany($a,$b,$c,$d){

	$conn = dbconnect();
	$stmt = $conn->stmt_init();

	 //Préparation de la requête
    $sql = <<<SQL
        INSERT INTO company (name, country, vat, type)
        VALUES (? ,? ,? ,?)
SQL;

	$stmt->prepare($sql);


    //éviter injection sql
	$stmt->bind_param('ssss', $a, $b, $c, $d);

    //exécute 
    $stmt->execute();
	echo mysqli_error($conn);
	}

function insertinvoice($a,$b,$c){
	

	$conn = dbconnect();
	$stmt = $conn->stmt_init();

	 //Préparation de la requête
    $sql = <<<SQL
        INSERT INTO company (`number`, invoice_compagny_id, invoivce_contact_id)
        VALUES (? ,? ,?)
SQL;

	$stmt->prepare($sql);


    //éviter injection sql
	$stmt->bind_param('sss', $a, $b, $c);

    //exécute 
    $stmt->execute();
	echo mysqli_error($conn);
	}


function insertuser($a, $b, $c){
	

	$conn = dbconnect();
	$stmt = $conn->stmt_init();

	 //Préparation de la requête
    $sql = <<<SQL
        INSERT INTO user (username, password, mode)
        VALUES (? ,? ,?)
SQL;

	$stmt->prepare($sql);


    //éviter injection sql
	$stmt->bind_param('sss', $a, $b, $c);

    //exécute 
    $stmt->execute();
	echo mysqli_error($conn);
	}

function companyselect(){

	$conn = dbconnect();
	$stmt = $conn->stmt_init();

	 //Préparation de la requête
    $sql = <<<SQL
        SELECT name 
		FROM company
SQL;

	$stmt->prepare($sql);


    

    //exécute 
    $stmt->execute();
	$result = $stmt->get_result();

    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
	
	}
function contactselect(){


	$conn = dbconnect();
	$stmt = $conn->stmt_init();

	 //Préparation de la requête
    $sql = <<<SQL
        SELECT firstname, lastname 
		FROM contact
SQL;

	$stmt->prepare($sql);


    //éviter injection sql
	

    //exécute 
    $stmt->execute();
	$result = $stmt->get_result();

    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
	
}
	
	
