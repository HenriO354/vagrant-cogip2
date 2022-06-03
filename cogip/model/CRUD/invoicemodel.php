<?php
// Fichier devant contenir les CRUD (query, modifications, delete) pour les factures

function getLimitedInvoices(){
    /*
        Cette fonction va rechercher les dernières factures encodées dans la banque de donnée et 
        retourne un nombre limité de factures
    */
    $limited = 5;

    //Connection avec la base de donnée
    $conn = dbconnect();

    //Préparation de la requête de l'éditeur
    $sql = <<<SQL
        SELECT invoice.id, number, invoice.timestamp, name AS company
        FROM invoice
        LEFT JOIN company ON company.id = invoice_company_id
        ORDER BY invoice.timestamp DESC
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

function getAllInvoices(){
    /*
        Cette fonction va rechercher toutes les factures dans la banque de donnée et 
        retourne toutes les compagnies
    */

    //Connection avec la base de donnée
    $conn = dbconnect();

    //Préparation de la requête
    $sql = <<<SQL
        SELECT invoice.id, number, invoice.timestamp, name AS company, type
        FROM `invoice`
        INNER JOIN company ON company.id = invoice_company_id
        ORDER BY invoice.timestamp DESC
SQL;

    $stmt = $conn->prepare($sql);

    //exécute et récupération des données
    $stmt->execute();
    $result = $stmt->get_result();

    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function getInvoice($chosenId){
    /*
        Cette fonction va rechercher une facture dans la banque de donnée
        $id est la facture recherchée dans la banque de donnée
        retourne une liste détailant la facture
    */

    //Connection avec la base de donnée
    $conn = dbconnect();

    //Préparation de la requête
    $sql = <<<SQL
        SELECT I.id, I.number, I.timestamp, name, type, firstname, lastname, phone, email
        FROM invoice I
        LEFT JOIN company ON company.id = invoice_company_id
        LEFT JOIN contact ON contact.id = invoice_contact_id
        WHERE I.id = ?
SQL;

    $stmt = $conn->prepare($sql);

    //éviter injection sql
    $stmt->bind_param('i', $chosenId);

    //exécute et récupération des données
    $stmt->execute();
    $data = $stmt->get_result();

    $invoice = $data->fetch_assoc();
    //creation de l'array vide
    if (!empty($invoice)){
        $result = array(
            'id' => '',
            'number' => '',
            'timestamp' => '',
            'company' => array(
                'name' => '',
                'type' => ''
            ),
            'contact' => array(
                'firstname' => '',
                'lastname' => '',
                'phone' => '',
                'email' => ''
            )
        );
        //placer les valeurs récupérées de query au bon endroit dans l'array        
        foreach($invoice as $key => $value){
            switch ($key) {
                case 'name':
                case 'type':
                    $result['company'][$key] = $value;
                    break;
                case 'id':
                case 'number':
                case 'timestamp':
                    $result[$key] = $value;
                    break;
                default:
                    $result['contact'][$key] = $value;
            }
        }
        return $result;
    }
    
}

function deleteInvoice($id){
	$connection = dbconnect();
	$sql = <<<SQL
	DELETE FROM invoice
    WHERE id = ?
SQL;

    $stmt= $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>
