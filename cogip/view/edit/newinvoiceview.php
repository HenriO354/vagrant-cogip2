<form class="form1" action="" method="POST">
	<label for="number">N°Factures</label>
	<input type="text" id="number" class="number" value="<?php echo 'F'.date("Ymd"). '-'?> " name="number ">
	<select name="companyId">
        <?php
        foreach($companyAll  as $company) {
            foreach($company as $value){
                echo" <option value='$value'>$value</option>";
            echo $value;
            }
        }
        ?>
    </select>
    <select name="contactId">
        <?php 
        foreach($contactAll as $contact){
            foreach($contact as $value){
                echo"<option value='$value'>$value</option>";
            }
        } ?>
    </select><button type="submit" name="envoi">Envoi</button>
</form>