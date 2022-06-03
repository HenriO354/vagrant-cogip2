<?php
require "database/connection.php";
function delete($delete, $choice, $id){
    if ($_SESSION['mode'] == 'winner' AND $delete == 'delete' AND preg_match('/^\d$/', $id)) {
        switch ($choice){
            case "compagnie":
                require "model/CRUD/compagniesmodel.php";
                deleteCompany($id);
                break;
            case "facture":
                require "model/CRUD/invoicemodel.php";
                deleteInvoice($id);
                break;
            case "contact":
                require "model/CRUD/contactmodel.php";
                deleteContact($id);
                break;
            case "utilisateur":
                require "model/CRUD/usermodel.php";

        }
    }
    header("location: ../../edit");
}
?>