<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tri données</title>
</head>
<body>
    <?php

        $tableau = array();
        
        function createTab(){
            $tmp = array();
            for($i = 0; $i < 10; $i++){
                $tmp[$i] = rand(0, 100);
            }
            return $tmp;
        }  

        function afficherTab($tab){
            echo "<table>";
            echo "<tr>";
            for($i = 0; $i < count($tab); $i++){
                echo "<td>" . ($i+1) . "</td>";
            }
            echo "</tr>";
            echo "<tr>";
            for($i = 0; $i < count($tab); $i++){
                echo "<td>" . $tab[$i] . "</td>";
            }
            echo "</tr>";
            echo "</table>";
        }

        function triAbulles($tab) {
            for($i=0; $i< count($tab)-1; $i++) {
                for($j=0; $j<(count($tab)-1-$i); $j++) {
                    if ($tab[$j] > $tab[$j+1] ) {
                        $temp = $tab[$j+1];
                        $tab[$j+1] = $tab[$j];
                        $tab[$j] = $temp;
                    }
                }
            }
            return $tab;
        }

        $tableau = createTab();
        echo "<h2> Non trié </h2>";
        afficherTab($tableau);
        $tableau = triAbulles($tableau);
        echo "<h2> Trié </h2>";
        afficherTab($tableau);
    ?>
    
</body>
</html>