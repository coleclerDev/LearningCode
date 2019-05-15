<?php

require('controller/frontend.php');


try {
    if (isset($_GET['action'])) {

        // Recherche la bonne action a effectuer
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }

        elseif ($_GET['action'] == 'post') {

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }

            else {
                throw new Exception('Page not found !');
            }

        } elseif ($_GET['action'] == 'addComment') {

            if (isset($_GET['id']) && $_GET['id'] > 0) {

                if(!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }

            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }

        } elseif ($_GET['action'] == 'modifyComment') {
            
            if (isset($_GET['comment']) && $_GET['comment'] > 0) {
                
                // Test si le formulaire a deja ete rempli sinon l'envoi
                if(!empty($_POST['author']) && !empty($_POST['comment'])) {
                    modifyComment($_GET['comment'], $_POST['author'], $_POST['comment']);
                } else {
                    getFormComment($_GET['comment']);
                }
                
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }

        } elseif ($_GET['action'] == 'createPost') {
            if(!empty($_POST['title']) && !empty($_POST['content'])) {    
                addPost($_POST['title'], $_POST['content']);
            } else {
                getFormPost();
            }
        }

    // Pas d'action donc page d'accueil
    } else {
        listPosts();
    }

// Retour des erreurs
} catch(Exception $e) {
    $errorMessage = 'Erreur : ' . $e->getMessage();
    require('view/errorView.php');

}