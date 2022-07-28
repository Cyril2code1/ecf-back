<?php

class Candidat {

    public function __construct() {

    }

    public function data() {
        if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_FILES['cv'])) {

            $uuid = $_SESSION['uuid'];
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $cv = $_FILES['cv'];
            

            if ($cv['error'] > 0) {
                $error = $cv['error'];
                switch ($error) {
                    case 1:
                        $error = 'le fichier dépasse la taille maximale autorisée par php';
                        break;
                    case 2:
                        $error = 'le fichier dépasse la taille maximale indiquée';
                        break;
                    case 3:
                        $error = 'le fichier n\'a été que partiellement téléversé';
                        break;
                    case 4:
                        $error = 'aucun fichier n\'a été téléversé';
                        break;
                    case 6:
                        $error = 'dossier temporaire manquant';
                        break;
                    case 7:
                        $error = 'échec d\'écriture sur le disque';
                        break;
                    case 8:
                        $error = 'une extension PHP a stoppé le téléversement';
                        break;
                    default:
                        $error = 'erreur inconnue';
                        break;
                }
                $message = '<div class="border border-danger border-3">Erreur: '.$error.'</div>';
            } else {    
               
                move_uploaded_file($cv['tmp_name'], "./cv_pdf/".$uuid);  
                require INC.'db_connect.php';
                
                $sql = "INSERT INTO `candidats` (`uuid`, `lastname`, `firstname`) VALUES (:uuid, :lastname, :firstname)";

                $query = $pdo->prepare($sql);

                $query->bindValue(':uuid', $uuid, PDO::PARAM_STR);
                $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
                $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
                $query->bindValue(':cv', $cv, PDO::PARAM_STR);

                $query->execute();

                $message = '<div class="border border-success border-3">Votre profil a bien été complété, vous pouvez maintenant aller consulter <a href=\'./index.php?section=candidat\'>les annonces</a></div>';
        }
        return $message;
        }
    }
}