<?php
/*
  Dans ce fichier on va définir un ensemble de fonction pour les réutiliser après dans d'autres fichiers :D 
  Il va donc contenir plusieur fonctions à réutiliser
*/
include('database.php');
// fonction pour créer une session
function init_php_session() : bool
{
    if(!session_id())
    {
        session_start();//initialisation de la session
        session_regenerate_id();//on regènere session id
        return true;
    }
    return false; 
    
}
// fonction pour arrêter une session
function clean_php_session() : void
{

    unset($_SESSION['id']);
    unset($_SESSION['nom']);
    unset($_SESSION['email']);
    unset($_SESSION['telephone']);
    unset($_SESSION['date_naissance']);
    unset($_SESSION['mot_de_passe']);
    
}
// fonction pour vérfie si l'utilisateur est connecté
function is_logged() : bool 
{
    if(isset($_SESSION['id']) && !empty($_SESSION['id']))
        return true;
    return false;
}



