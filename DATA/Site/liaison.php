<?php
        function connexion_db(){

                $host ="localhost";
                $user ="root";
                $password="";
                $nombase="H2I";
                try{
                        $bdd=new PDO('mysql:host='.$host.';dbname='.$nombase, $user, $password);
                }
                catch(Exception $e){
                        die ('Erreur : '.$e->getMessage());
                }
                $bdd->exec('SET NAMES utf8');
                $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $bdd;
        }
 ?>
