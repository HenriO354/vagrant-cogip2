<?php 
	include "headerview.php";
	include "navbarview.php";
?>
<main id="main">
	<section class="text">
		<h1>Administration</h1>
		<p>
            <?php echo $_SESSION['username']; ?>, vous êtes un <?php echo $usertype; ?>.
			Vous vous trouvez dans l'interface administrative de la COGIP, 
			consultez les éléments les plus récents ci-dessous pour créer, modifier, supprimer ou utilisez le menu
			ci dessus pour accéder à une liste de tous les éléments et quitter cette interface.
		</p>
	</section>
	<section class="create">
		<a href="newinvoice" class="button">nouvelle facture</a>
		<a href="newcompany" class="button">nouvelle compagnie</a>
		<a href="newcontact" class="button">nouveau contact</a>
		<?php
			if ($usertype == 'winner') { ?>
				<a href="newuser" class=>nouvel utilisateur</a>
			<?php }
			
		?>
	</section>
			
	<section class="tableaux">
		<section>	
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

							if ($key != 'id') {
                                echo "<td>$value</td>";
                                
                            }
                        }
                        if ($usertype == 'winner') { ?>
                            <td>éditer</td>
                            <td><a href="delete/facture/<?php echo $invoice['id']?>">suprimmer</a></td>
                        <?php } ?>
                        </tr>
                        
					<?php } ?>
				</tbody>
			</table>
		</section>
		<section>	
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
						if ($usertype == 'winner') { ?>
                            <td>éditer</td>
                            <td><a href="delete/compagnie/<?php echo $company['id']?>">suprimmer</a></td>
                        <?php } ?>
                        </tr>
                        
					<?php } ?>

				</tbody>
			</table>
		</section>
		<section>
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
						if ($usertype == 'winner') { ?>
                            <td>éditer</td>
                            <td><a href="delete/contact/<?php echo $contact['id']?>">suprimmer</a></td>
                        <?php } ?>
                        </tr>
                        
					<?php } ?>
				</tbody>
			</table>
		</section>
		<?php if($usertype == 'winner') { ?>
			<section>
				<table>
					<caption>utilisateurs</caption>
					<thead>
						<th>Nom</th>
						<th>Accessibilité</th>
					</thead>
					<tbody>
						<?php foreach($userList as $user){
							echo "<tr>";
							foreach ($user as $key => $value) {
								if ($key != 'id') echo "<td>$value</td>";
							} ?>
                            <td>éditer</td>
                            <td><a href="delete/utilisateur/<?php echo $user['id']?>">suprimmer</a></td>
                        	</tr>
						<?php } ?>
					</tbody>
				</table>
			</section>
		<?php } ?>
			
	</section>
</main>

<?php include "footerview.php"; ?>
	
</html>	
