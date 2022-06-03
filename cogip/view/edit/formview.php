<!-- <body>
	<section class="nav-bar">
			<img class="nav-img" src= "./cogip2000small.jpeg" />
			<ul class="list">
				<li><a href="#">Compagnie</a></li>
				<li><a href="#">Factures</a></li>
				<li><a href="#">Conctats</a></li>
				<li><a href="#">Clients</a></li>
				<li><a href="#">Fourniseurs</a></li>
			</ul>
		</section>

    <main class ="bodyForm">
		<h1 class="hform" >Creations d'un nouveaux contacts</h1> -->
<?php
function chooseView($create, $companyAll, $contactAll){
	require "view/headerview.php";
	require "view/navbarview.php";
	

	switch($create){
		case "newcontact":
			require "view/edit/newcontactview.php";
			break;

		case "newcompany":
			require "view/edit/newcompanyview.php";
			break;

		case "newinvoice":
			require "view/edit/newinvoiceview.php";
			break;

		case "newuser":
			require "view/edit/newuserview.php";
			break;
	
	}
	require "view/footerview.php";
}

?>
