<?php
  session_start();
//connexion a la base de donnees
    try {
          $bdd= new PDO(
            'mysql:host=localhost; dbname=week4; charset=utf8',
            'root',
            '301234',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
          );
    } catch (Exception $e ) {
        die ('Erreur: '. $e->getMessage());
    }
?>    