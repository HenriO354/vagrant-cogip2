<?php 
include "headerview.php";
include "navbarview.php";
?>

        <h1 class="ContactviewAll" >COGiP: <?= ucfirst($choice)?></h1>

        <table>
            <caption>Tous les <?= $choice ?></caption>
            <thead>
<?php
addColumn($list);
?>
            </thead>
            <tbody>
<?php 
foreach($list as $element){
    echo "<tr>";
    foreach ($element as $key => $value) {
        if ($key == 'name'){
            echo "<td><a href=".$choice."/".$element['id'].">".$element['name']."</a></td>";
        }
        elseif ($key == 'lastname') {
            echo "<td><a href=".$choice."/".$element['id'].">".$element['lastname']."</a></td>";
        }
        elseif ($key == 'number'){
            echo "<td><a href=".$choice."/".$element['id'].">".$element['number']."</a></td>";
        }
        elseif ($key != 'id') { 
            echo "<td>$value</td>";
        }
    }
    echo "</tr>";
}
?>	
            </tbody>

        </table>
<?php 
include "footerview.php";
?>