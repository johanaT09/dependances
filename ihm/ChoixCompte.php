<?php
require_once '../persistance/DialogueBD.php';
try {
        $undlg = new DialogueBD();
        $listePersonnes = $undlg->getTousLesComptes();
        $listeOptions = "<OPTION VALUE=0>Sélectionner une personne\n";
        foreach ($listePersonnes as $personne) {
             $listeOptions .= "<OPTION VALUE=$personne[id_personne]> $personne[prenom] $personne[nom]\n";
        }
    } catch (Exception $e) 
    {
        $erreur = $e->getMessage();
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Agenda</title>
    </head>
    <body>
        <form name="fCompte" action="Compte.php" method="POST">
            <table border="0" align="center" >
                <tbody>
                    <tr>
                        <td colspan="2" align="center">Choisir une personne</td>
                    </tr>
                    <tr>
                        <td align="right">Personne :</td>
                        <td>
                            <select name="lstPersonne">
                                <?php echo $listeOptions; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="Valider" name="btnValider" /></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
