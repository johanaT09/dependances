<html>
<head>
    <?php require_once 'header.php';
    require_once '../persistance/DialogueBD.php';
    try {
        $undlg= new DialogueBD();
        $mesMangas = $undlg->getTousLesMangas();
        $mesGenres = $undlg->getTousLesGenres();
        $mesDessinateurs = $undlg->getTousLesDessinateur();
        if (isset($_POST['titre'])&& isset($_POST['id_genre']) && isset($_POST['couverture'])
            && isset($_POST['id_dessinateur']) && isset($_POST['id_scenariste']) && isset($_POST['prix'])) {

            $titre = $_POST['titre'];
            $idgenre = $_POST['id_genre'];
            $couverture = $_POST['couverture'];
            $iddessinateur = $_POST['id_dessinateur'];
            $idscenariste= $_POST['id_scenariste'];
            $prix = $_POST['prix'];
            $OK = $undlg->addUnManga($titre, $idgenre, $couverture, $iddessinateur, $idscenariste, $prix);

        }
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
    ?>
    <title>Mangas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="body">
<?php require_once("menu.html");
if (isset($OK)) {
    if ($OK) {
        echo "Ajout réussi : $titre a été ajouté(e) dans votre liste !";
    } else{
        echo "Echec de l'ajout !";
    }
}
?>
</body>
<h1 style="text-align: center">Ajouter un Manga</h1>
<div class="well">
    <form class="form-horizontal" enctype="multipart/form-data" role="form"
          name="mangaForm" action="addManga.php"
          method="POST">
        <div class="form-group">
            <label class="col-md-3 control-label">Titre : </label>
            <div class="col-md-3">
                <input type="text" name="titre" class="form-control" required
                       autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Genre : </label>
            <label class="col-md-3 control-label"</label>
            <select type="text" name="id_genre" class="form-control" required
                    autofocus>
                <?php foreach ($mesGenres as $ligne) {
                    $id_genre = $ligne['id_genre'];
                    $lib=$ligne['lib_genre'];
                    echo "<option value=$id_genre>$lib</option>";
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Couverture :</label>
            <div class="col-md-3">
                <input name="couverture" type="text" class="form-control" required
                       autofocus/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Dessinateur :</label>
            <div class="col-md-3">
                <select type="text" name="id_dessinateur" class="form-control" required
                        autofocus>
                    <?php foreach ($mesDessinateurs as $ligne) {
                        $id_d = $ligne['id_dessinateur'];
                        $nom_d = $ligne['nom_dessinateur'];
                        $prenom = $ligne['prenom_dessinateur'];
                        echo "<option value=$id_d->$nom_d $prenom</option>";
                    } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Scenariste :</label>
            <div class="col-md-3">
                <select type="text" name="id_scenariste" class="form-control" required
                        autofocus>
                    <?php foreach ($mesDessinateurs as $ligne) {
                        $id_d = $ligne['id_dessinateur'];
                        $nom_d = $ligne['nom_dessinateur'];
                        $prenom = $ligne['prenom_dessinateur'];
                        echo "<option value=$id_d->$nom_d $prenom</option>";
                    } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Prix :</label>
            <div class="col-md-3">
                <input name="prix" type="text" class="form-control" required
                       autofocus/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">

                <button type="submit" class="btn btn-default btn-
primary"><span class="glyphicon glyphicon-ok"></span> Valider
                </button>
                &nbsp;

                <button type="button" class="btn btn-default btn-primary"
                        onclick="javascript:
window.location='../index.php';"><span
                        class="glyphicon glyphicon-remove"></span>

                </button>
            </div>
        </div>
    </form>
</div>
</html>
