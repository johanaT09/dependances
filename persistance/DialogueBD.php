<?php
require_once 'Connexion.php' ;
class DialogueBD {
    public function getUnCompte($stPersonne) {
        try {
             $conn = Connexion::getConnexion();
            $sql = "select * from personne where id_personne=?";
            $parametres = array($stPersonne);
            $sth = $conn->prepare($sql);
            $sth ->execute($parametres);
            $unCompte = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $unCompte;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    
     public function getTousLesComptes() {
        try {
            $conn = Connexion::getConnexion();
            $sql = "select * from personne ORDER BY nom ASC ";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabComptes = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabComptes;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
   
}
 