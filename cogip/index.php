<?php
session_start();

$url = $_GET['id'];
$urlArray = explode('/', $url);

//LA PARTIE CI-DESSOUS RESTE COMMENTEE JUSQU'AU PASSAGE LIVE
//if ($_SESSION['isLoggedIn'] == TRUE){
if($urlArray[0] == 'login'){
    $_SESSION['bodytag'] ='login';
    require "controller/logincontroller.php";
    verifyLogin();
}

elseif($urlArray[0] =='home' OR $urlArray[0] == 'welcome'){
    //controlleur de la page welcome ou home
    //la variable ci-dessous permet de definir le type de query ds le model
    $_SESSION['bodytag'] = '';
    require "controller/welcomecontroller.php";

}

elseif($urlArray[0] =='edit') {
    //la variable ci-dessous permet de definir le type de query ds le model

    //controlleur du module d'édition aussi appelé dashboard
    $_SESSION['bodytag'] = '';
    require "controller/editcontroller.php";
    prepareDashboard();
}

elseif ($urlArray[0]=='newinvoice' OR $urlArray[0]=='newcontact' OR $urlArray[0]=='newcompany' OR $urlArray[0]=='newuser'){
    $_SESSION['bodytag'] = '';
    require "controller/editcontroller.php";
    prepareView($urlArray[0]); 
}

elseif((empty($urlArray[1])) AND ($urlArray[0] =='compagnies' OR $urlArray[0]=='factures' OR $urlArray[0]=='contacts' OR $urlArray[0]=='clients' OR $urlArray[0]=='fournisseurs')) {
    //envoyer vers le controller de consultation si déjà loggé
    $_SESSION['bodytag']="";
    require "controller/consultcontrollerall.php";
    consultViewPicker($urlArray[0]);
}

elseif($urlArray[0] =='compagnies' OR $urlArray[0]=='factures' OR $urlArray[0]=='contacts' OR $urlArray[0]=='clients' OR $urlArray[0]=='fournisseurs') {
    $_SESSION['bodytag']="";
    require "controller/consultcontrollerone.php";
    consultOneViewPicker($urlArray[0], $urlArray[1]);
}
elseif($urlArray[0] == 'delete') {
    require "function/delete.php";
    delete($urlArray[0], $urlArray[1], $urlArray[2]);
}
// elseif($urlArray[0] == 'logout') {
//     require "controller/logincontroller.php";
//     logout();
// }

// LA PARTIE CI-DESSOUS RESTE COMMENTEE JUSQU'A PASSAGE LIVE
//    else {
//        require "controller/welcomecontroller.php";
//    }
    //}
else {
    $_SESSION['bodytag'] ='login';
    require "controller/logincontroller.php";
    verifyLogin();
}


?>
