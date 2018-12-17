<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
    <title>Explorateur</title>
</head>
<body class="d-flex flex-column flex-wrap mh100vh">
    
<!-- Header -->

 <header class="container-fluid">
    <div class="row">
        
        <div class="col-lg-12 mx-auto text-center pt-4 pr-4 pl-4"><img class="imgheader" src="assets/images/svg/logo1.svg" alt="1000">
        <div class="ralewaythin col-lg-10 mx-auto text-center pt-1">Nouvel explorer <span class="rose">ultra hightech !</span></div></div>
    
    </div>
</header>


<div class="container pt-1 flex-grow">
    <div class="row">
        <div class="row offset-lg-1 col-lg-11 marginauto padding0">
            <div id="reponse" class="row col-lg-12 marginauto padding0">
    <?php

error_reporting(E_ALL ^ E_NOTICE | E_WARNING);
ini_set('display_errors', 'ON');


require_once ('config.php');

$dirs = new RecursiveDirectoryIterator(BASE_DIR);
$dirs->rewind();

while($dirs->valid()){
    if(is_dir($dirs->key())){ //Dossier
        if($dirs->getFilename() != '.' && $dirs->getFilename() != '..'){
            echo '
            <div class="col-lg-3 col-sm-12 col-12 col-md-4  d-flex align-items-center flex-column justify-content-center">
            <a class="dossier btnfos btnfos-5 d-flex justify-content-center align-items-center flex-column liensfichier" data-dir="'.$dirs->key().'" href="#">
            <img class="fichierimg" src=assets/images/png/folder.png>
            ' . $dirs->getFilename() . '</a> 
            </div>';
        }
    } else {
        $nomFichier = $dirs->getfilename()."\n";// Affiche le nom du fichier
        $info = new SplFileInfo($dirs);// Recuperer l'extension
        $extension = $info->getExtension();// Affiche l'extension
        
//Fichier

        echo '<div class="col-lg-3 col-sm-12 col-12 col-md-4  d-flex justify-content-center align-items-center flex-column liensfichier">
        <img class="fichierimg" src=assets/images/png/'.$extension.'.png> '.$nomFichier.' <br> </div>';
    }
    $dirs->next();
    

}

?>

                
            </div>
        </div>
    </div>         
</div>

 <div class="container-fluid footer">
    <div class="row">
        <div class="ralewaythin ft15 col-lg-12 mx-auto text-center pt-1"><b>Copyright ©</b> Hélène - Kevin - Morgan - Stéphane</div>
    </div>
</div>

<script src="assets/js/traitement_ajax.js"></script>
</body>
</html>