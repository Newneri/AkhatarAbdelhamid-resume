<?php
$sports = array();
define('ROOT_PATH', dirname(__DIR__) . '/');
$file = fopen(ROOT_PATH . "donnees/sports.csv", "r") or die("unable to open file");

while (($data = fgetcsv($file, 1000, ",")) !== false) {
    if ($data[0] == $_SESSION["username"]) {
        $sports[0] = $data[1];
        $sports[1] = $data[2];
    }
}

fclose($file);
?>

<div class="card">
    <h2>Add a lesson</h2>
    <form action="../requestsForms/ajouterCours.php" method="POST" autocomplete="off">
    <div class='form-element'>
            <select name='sport'>
                <?php
                    foreach ($sports as $sport) {
                        echo "<option value='" . $sport . "'>" . $sport . "</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-element">
            <input type="text" placeholder="Description" name="description" required>
        </div>
        <div class="form-element">
            <label for="date-cours">Date of lesson</label>
            <input type="date" name="date-cours" required>
        </div>
        <div class="form-element">
            <input type="text" placeholder="Direction" name="adresse" required>
        </div>
        <div class='form-element'>
                <?php
                    echo "<label value='" . $_SESSION["username"] . "'> Coach : " . $_SESSION["username"] . "</label>";
                ?>
        </div>
        <input type="submit" value="Add" class="loginButton" name="submit">
    </form>
</div>