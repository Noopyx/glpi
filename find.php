<?php
define('FICHIER', 'noms.txt');
 
if (!isset($_POST['valider'])) {
?>
<form method="POST">
    Mot recherché : <input type="text" name="mot" value=""/><br/>
    <input type="submit" value="valider" name="valider"/>
</form>
 
<?php
} else {
    $existe = FALSE;
    @ $fp = fopen(FICHIER, 'r') or die('Ouverture en lecture de "' . FICHIER . '" impossible !');
    while (!feof($fp) && !$existe) {
        $ligne = fgets($fp, 1024);
        if (preg_match('|\b' . preg_quote($_POST['mot']) . '\b|i', $ligne)) {
            $existe = TRUE;
        }
    }
    fclose($fp);
    if ($existe) {
        echo "'$mot' trouvé dans '$ligne'.";
    } else {
        die("Ce nom n'est pas présent !");
    }
}
?>