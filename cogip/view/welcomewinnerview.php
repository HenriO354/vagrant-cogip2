<?php 
	include "headerview.php";
	include "navbarview.php";
?>
<main id="main">
	<section class="text">
		<h1>Bienvenue <?php echo $_SESSION['username'];?></h1>
		<p>
			Vous vous trouvez dans l'interface de la banque de données de la COGIP, 
			consultez les éléments les plus récents ci-dessous ou utilisez le menu
			ci dessus pour accéder à une liste de tous les éléments.
		</p>
	</section>
	<?php if ($_SESSION['mode'] == 'winner' OR $_SESSION['mode'] == 'admin') {?>
	<section class="admin">
		<img class="acceuil-img" src="assets/images/ranu.jpeg"/>
		<a type="submit" class="lien-admin" href="edit">Module administrateur</a>
	</section>
	<?php } ?>
			
	<section class="tableaux">
		<section class="tabFactures">	
			<table>
				<caption>Factures</caption>
				<thead>
					<tr>
						<th>numéro facture</th>
						<th>date</th>
						<th>société</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($invoiceList as $invoice){
						echo "<tr>";
						foreach($invoice as $key => $value){

							if ($key != 'id') echo "<td>$value</td>";
						}
						echo '</tr>';
					}?>
				</tbody>
			</table>
		</section>
		<section class="tabCompagnie">	
			<table>
				<caption>Compagnie</caption>
				<thead>	
					<tr>
						<th>nom de la société</th>
						<th>Type</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($companyList as $company){
						echo "<tr>";
						foreach ($company as $key => $value) {
							if ($key != 'id') echo "<td>$value</td>";
						}
						echo "</tr>";
					}?>

				</tbody>
			</table>
		</section>
		<section class="tabContacts">
			<table>
				<caption>Contacts</caption>
				<thead>
					<th>Nom</th>
					<th>prénom</th>
					<th>email</th>
					<th>société</th>
				</thead>
				<tbody>
					<?php foreach($contactList as $contact){
						echo "<tr>";
						foreach ($contact as $key => $value) {
							if ($key != 'id') echo "<td>$value</td>";
						}
						echo "</tr>";
					}?>
				</tbody>
			</table>
		</section>
	</section>
</main>

<?php include "footerview.php"; ?>
	
</html>	
