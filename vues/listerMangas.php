<html>
<?php
require_once '../persistance/DialogueBD.php';
require_once("menu.html");
try {
    $undlg= new DialogueBD();
    $mesMangas=$undlg->getTousLesMangas();
} catch (Exception $e) {
    $erreur=$e->getMessage();
}
?>
<head>
    <?php require_once 'header.php';?>
    <title>Mangas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../lib/css/mangas.css" rel="stylesheet">
    <script src="../lib/jquery/jquery-2.1.3.min.js"></script>
    <script src="../lib/bootstrap/js/ui-bootstrap-tpls.js" type="text/javascript"></script>
    <script src="../lib/bootstrap/js/bootstrap.js"></script>
</head>

<div class="container">
    <h1>Liste de mes Mangas</h1>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Genre</th>
            <th>Prix</th>
        </tr>
        </thead>
        <tbody>
<?php
$lignes="";
foreach ($mesMangas as $manga)
{ // On parcourt la collection
    $lignes .= "<tr>\n"; // On construit une ligne <tr>
    $lignes .= "<td> $manga[id_manga]</td>\n"; // On construit un <td>
    $lignes .= "<td> $manga[titre]</td>\n";
    $lignes .= "<td> $manga[lib_genre]</td>\n";
    $lignes .="<td> $manga[prix] </td>\n";
    $lignes .= "</tr>\n";
}
echo utf8_encode($lignes); // On affiche tous les <tr>
?>

<?php
require_once("menu.html");
?>

    </tbody>
    </table>
</div>