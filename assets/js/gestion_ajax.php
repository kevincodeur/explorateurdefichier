<?php
require_once ('../../config.php');

if (isset($_GET['dossier']) && $_GET['dossier'] != ''){
    $dirPath = $_GET['dossier'];
    $result = '';

    $dirs = new RecursiveDirectoryIterator($dirPath);
    $dirs->rewind();

    while($dirs->valid()){
        if(is_dir($dirs->key())){
            if($dirs->getFilename() != "." && $dirs->key() != BASE_DIR && $dirs->key() != BASE_DIR."/." && $dirs->key() != BASE_DIR."/.."){
                if($dirs->getFilename() == '..'){
                    $path = str_replace( '\\', '/', $dirs->key());
                    $pathArray = explode('/', $path);
                    array_pop($pathArray);
                    array_splice($pathArray, -1);
                    $parentPath = implode('/', $pathArray);

                    $result .=  '<div class=" col-lg-3 col-sm-12  col-md-4 d-flex align-items-center flex-column justify-content-center margin-btn"> 
                                    <div class="d-flex align-items-center">
                                        <a class="dossier btn-4" data-dir="'.$parentPath.'" href="'.$parentPath.'">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                    </div>
                                </div>';
                } else {
                    $result .= '<div class="col-lg-3 col-sm-12 col-12 col-md-4  d-flex align-items-center flex-column justify-content-center">
                                    <a class="dossier btnfos btnfos-5 d-flex justify-content-center align-items-center flex-column liensfichier" data-dir="'.$dirs->key().'" href="#">
                                        <img class="fichierimg" src=assets/images/png/folder.png>
                                        ' . $dirs->getFilename() . 
                                    '</a> 
                                </div>';
                }
            }
        } else {
            $nomFichier = $dirs->getfilename()."\n";// Affiche le nom du fichier
            $info = new SplFileInfo($dirs);// Recuperer l'extension
            $extension = $info->getExtension();// Affiche l'extension

            $result .= '<div class="col-lg-3 col-sm-12 col-12 col-md-4  d-flex justify-content-center align-items-center flex-column liensfichier">
                            <img class="fichierimg" src=assets/images/png/'.$extension.'.png> '.$nomFichier.' <br> </div>';
        }
        
        $dirs->next();
    }
    echo $result;
} ?>
