<?php
//La variable $choice est un placeholder pour la partie de l'URL qui a été récurpérée par le router. Cette variable va permettre de définir quoi charger comme model / requete SQL.
function consultViewPicker($choice){
	require "database/connection.php";

	// Changement de model pour une seul view
    //la variable $list va récupérer la query SQL
	$list;

	switch($choice){
		case "compagnies":
			require "model/CRUD/compagniesmodel.php";
			$list = getAllCompanies();
			break;
		case "factures":
			require "model/CRUD/invoicemodel.php";
			$list = getAllInvoices();
			break;
		case "contacts":
			require "model/CRUD/contactmodel.php";
			$list = getAllContact();
			break;
		case "fournisseurs":
			require "model/CRUD/compagniesmodel.php";
			$list = getTypedCompanies("fournisseur");
			break;
		case "clients":
			require "model/CRUD/compagniesmodel.php";
			$list = getTypedCompanies('client');
			break;
	}
    //la variable $choice, donc provenant de l'URL est ensuite injectée dans la view
    require "view/consultallview.php";
};
//fonction ci-dessous va permettre de traduire le nom des colonnes dans les tableaux dans lesquels sont placés les résultats des requêtes SQL
//ceci formera l'entête du tableau d'affichage des résultats
function addColumn($list){
	if (!empty($list)){
        foreach($list[0] as $key => $value){
			switch ($key){
				case 'name':
				case 'company':
					echo "<th>Nom de la compagnie</th>";
					break;
				case 'number':
					echo "<th>Numéro de facture</th>";
					break;
				case 'timestamp':
					echo "<th>Date</th>";
					break;
				case 'type':
					echo "<th>Type</th>";
					break;
				case 'vat':
					echo "<th>TVA</th>";
					break;
				case 'country':
					echo "<th>Pays</th>";
					break;
				case 'firstname':
					echo "<th>Prénom</th>";
					break;
				case 'lastname':
					echo "<th>Nom de famille</th>";
					break;
				case 'email':
					echo "<th>Email</th>";
					break;
				case 'phone':
					echo "<th>Téléphone</th>";
					break;
			}
		}
	}
}
?>