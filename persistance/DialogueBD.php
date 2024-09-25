<?php
require_once 'Connexion.php' ;
class DialogueBD
{
    public function getTousLesMangas()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "select distinct * from manga m join genre g on m.id_genre=g.id_genre order by id_manga";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $listManga = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listManga;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }


    public function addUnManga($titre, $idgenre, $couverture, $iddessinateur, $idscenariste, $prix)
    {
        $ajoutOk = false;
        try {
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO manga (titre, id_genre, couverture, id_dessinateur, id_scenariste, prix) VALUES (?,?,?,?,?,?)";
            $sth = $conn->prepare($sql);
            $sth->execute(array($titre, $idgenre, $couverture, $iddessinateur, $idscenariste, $prix));
            header('location:../vues/listerMangas.php');
            $ajoutOk = true;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
        return $ajoutOk;
    }

    public function getTousLesgenres()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "select distinct * from genre";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $listgenre = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listgenre;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getTousLesDessinateur()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "select distinct * from dessinateur";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $listManga = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listManga;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getMangaParGenre($id_genre)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM manga join genre on genre.id_genre = manga.id_genre join dessinateur on manga.id_dessinateur = dessinateur.id_dessinateur join scenariste on manga.id_scenariste = scenariste.id_scenariste WHERE genre.id_genre=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($id_genre));
            $tabEmployesService = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmployesService;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }


    public function getGenre($genre)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "select distinct lib_genre from genre where id_genre = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($genre));
            $listgenre = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listgenre;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }

    }
}