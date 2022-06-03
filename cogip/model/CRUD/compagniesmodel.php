<?php
// Fichier devant contenir les CRUD pour query, modification, suppression du tablea client.
// Ce fichier doit également permettre de faire des sélections, edit etc. en fonction de la colonne type: client ou fournisseur

function getLimitedCompanies(){
    /*
        Cette fonction va rechercher les dernières compagnies encodées dans la banque de donnée et 
        retourne un nombre limité de compagnies
    */
    $limited = 5;

    //Connection avec la base de donnée
    $conn = dbconnect();

    //Préparation de la requête
    $sql = <<<SQL
        SELECT id, name, type
        FROM company
        ORDER BY timestamp DESC
        LIMIT ?
SQL;

    $stmt = $conn->prepare($sql);

    //éviter injection sql
    $stmt->bind_param('s', $limited);

    //exécute et récupération des données
    $stmt->execute();
    $result = $stmt->get_result();

    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function getAllCompanies(){
    /*
        Cette fonction va rechercher toutes les compagnies dans la banque de donnée et 
        retourne toutes les compagnies
    */

    //Connection avec la base de donnée
    $conn = dbconnect();

    //Préparation de la requête
    $sql = <<<SQL
        SELECT id, name, country, type, vat
        FROM company
        ORDER BY name ASC
SQL;

    $stmt = $conn->prepare($sql);

    //exécute et récupération des données
    $stmt->execute();
    $result = $stmt->get_result();

    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function getTypedCompanies($type){
    /*
        Cette fonction va rechercher tous les compagnies d'un type spécifique dans la banque de donnée,
        $type est  le type spécifique de la compagnie
        retourne une liste des compagnies recherchées
    */

    //Connection avec la base de donnée
    $conn = dbconnect();

    //Préparation de la requête
    $sql = <<<SQL
        SELECT id, name, country, vat
        FROM company
        WHERE type = ?
        ORDER BY name ASC
SQL;

    $stmt = $conn->prepare($sql);

    //éviter injection sql
    $stmt->bind_param('s', $type);

    //exécute et récupération des données
    $stmt->execute();
    $result = $stmt->get_result();

    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function getCompany($chosenId){
/*
 * Cette fonction va rechercher une facture dans la banque de donnée
 * L'id recherchée est normalement fournie grace au catch d'url
 * Doit retourner une liste détaillant la facture */

    //connection db
    $conn = dbconnect();
}

function deleteCompany($id){
	$connection = dbconnect();
	$sql = <<<SQL
	DELETE FROM company
    WHERE id = ?
SQL;

    $stmt= $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>
