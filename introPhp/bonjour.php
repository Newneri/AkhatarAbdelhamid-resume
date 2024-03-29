<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Test PHP</title>
</head>
<body>
    <main>
    <div class="entete">
        <h2>Nom</h2>
        <h2>Prenom</h2>
        <h2>Date</h2>
        <h2>Poste</h2>
    </div>

    <?php
        $tableau = array( 
                        array("Giroud", "Olivier", "1986", "Attaquant"), 
                        array("Griezman", "Antoine", "1991", "Attaquant"),
                        array("Mbappé", "Kylian", "1998", "Attaquant"),
                        array("Nobbs", "Jordan", "1992", "Attaquant"),
                        array("Williamson", "Leah", "1997", "Attaquant"),
                        array("Earps", "Mary", "1993", "Attaquant"));
        echo "<table>";
        foreach($tableau as $joueur) {
            echo "<tr>";
            array_push($tableau, 2024 - intval($joueur[2], 10));
            foreach($joueur as $attribut) {
                echo "<td> $attribut </td>";
            }
            echo "</tr>";
        };
        echo "</table>"
    ?>
    </main>
</body>
</html>