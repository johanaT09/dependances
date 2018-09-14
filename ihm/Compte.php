<!DOCTYPE html>
<?php
require_once '../persistance/DialogueBD.php';
try {
    $undlg= new DialogueBD();
    $rs=$undlg->getUnCompte($_POST['lstPersonne']);   
    foreach($rs as $ligne)
            {
                $id_personne=$ligne['id_personne'];
                $nom=$ligne['nom'];
                $prenom=$ligne['prenom'];
                $tel=$ligne['tel'];
            }
            
} catch (Exception $e) {
    $erreur=$e->getMessage(); 
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Consulter un compte</title>
    </head>
    <body>
    <p></p>
            <table border="1" align="center">
            <tbody>
                <tr>
                    <td colspan="2" align="center">Consulation</td>
                </tr>
                <tr>
                    <td align="right">Nom :</td>
                    <td><input type="text" name="txtNom" value="<?php echo $ligne['nom']; ?>" size="30" /></td>
                </tr>
                <tr>
                    <td align="right">Prénom :</td>
                    <td><input type="text" name="txtPrenom" value="<?php echo $ligne['prenom']; ?>" size="80" /></td>
                </tr>
                <tr>
                    <td align="right">Téléphone :</td>
                    <td><input type="text" name="txtTel" value="<?php echo $ligne['tel']; ?>" size="80" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="button" value="Annuler" name="btnAnnuler" onClick="window.location.href='../index.php';" /></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
