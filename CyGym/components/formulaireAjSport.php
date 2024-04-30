<?php

$noms = array();
define('ROOT_PATH', dirname(__DIR__) . '/');
$file = fopen(ROOT_PATH . "donnees/profs.csv", "r") or die("unable to open file");

$tmp = 0;
while (($data = fgetcsv($file, 1000, ",")) !== false) {
    if ($tmp > 0) {
        $noms[] = $data[3];
    }
    $tmp++;
}
fclose($file);

?>


<div class='card'>
    <h2>Modify Sports</h2>
    <form action='../requestsForms/modifierSport.php' method='POST' autocomplete='off'>
        <div class='form-element'>
            <select name='pseudo' id=''>
                <?php
                foreach ($noms as $nom) {
                    echo "<option value='" . $nom . "'>" . $nom . "</option>";
                }
                ?>
            </select>
        </div>
        <div class='form-element'>
            <input type='text' placeholder='Sport 1' name='sport1' required>
        </div>
        <div class='form-element'>
            <input type='text' placeholder='Sport 2' name='sport2' required>
        </div>
        <input type='submit' value='Modify' class='loginButton' name='submit'>
    </form>
</div>