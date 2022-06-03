<?php
//Ceci est le controlleur qui va récupérer un seul compagnie/facture/contact
    echo "Consult controller one.";
//la partie de l'url choppant l'ID doit être fournie dans une fonction
//qui va ensuite appeler dans le model l'url requis
function consultOneViewPicker($choice, $chosenId){
    echo $chosenId;
    function consultViewOnePicker($choice, $chosenId) {
     require "database/connection.php";

     $list;

     switch($choice){
         case "compagnies":
             require "model/CRUD/compagniesmodel.php";
             //$list = fonction qui va chercher une se    ule requete, lui passer le $chosenID
             break;
         case "factures":
             require "model/CRUD/invoicemodel.php";
             // la variable list reçoit l'array résultant de la query
             $list = getInvoice($chosenId);
             break;
         case "contacts":
             require "model/CRUD/contactmodel.php";
             //idem que ci-dessus pour la variable $li    st
             //
             //VERIFIER
             //Chercher une seule compagnie dans le ty    pe fournisseur ou client, cmt ça se passe dans le htm    l, comment ça va être géré par le routeur.

    }
    require "view/consultoneview.php";
    show($list);
 }


}
?>
