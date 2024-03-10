<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tunnelbana uppgift</title>
    <link rel = "stylesheet" href = "./css/style.css">
</head>
<body>


<form action="#" method = "post" id = "container">
        <div class = "formBox">
            <label for="från">Från</label>
                <select name = "stop">
                    <?php
                    //Det här är en array 
                    $linje19 = ['Hagsätra', 'Rågsved', 'Högdalen', 'Bandhagen', 'Stureby', 'Svedmyra', 'Sockenplan', 'Enskede Gård', 'Globen', 'Gullmarsplan', 'Skanstull', 
                    'Medborgarplatsen', 'Slussen', 'Gamla Stan', 'T-Centralen', 'Hötorget', 'Rådmansgatan','Odenplan', 'S:T Eriksplan', 'Fridhemsplan', 
                    'Thorildsplan', 'Kristineberg', 'Alvik', 'Stora Mossen', 'Abrahamsberg', 'Brommaplan', 'Åkeshov', 
                    'Ängbyplan', 'Islandstorget', 'Blackeberg', 'Råcksta', 'Vällingby', 'Johannelund', 'Hässelby Gård', 'Hässelby Strand'];

                    //Det här är en loop som har skrivits inuti select taggen för att kunna synas som en option taggens values, 
                    // och loopen loopar igenom varje element i arrayen för att uppvisa den
                    foreach($linje19 as $item){
                        echo "<option value = '$item'>$item</option>";
                    }
                    ?>
                </select>
        
            <label for="till">Till</label>
                <select name = "destination">
                    <?php
                    $linje19 = ['Hagsätra', 'Rågsved', 'Högdalen', 'Bandhagen', 'Stureby', 'Svedmyra', 'Sockenplan', 'Enskede Gård', 'Globen', 'Gullmarsplan', 'Skanstull', 
                    'Medborgarplatsen', 'Slussen', 'Gamla Stan', 'T-Centralen', 'Hötorget', 'Rådmansgatan','Odenplan', 'S:T Eriksplan', 'Fridhemsplan', 
                    'Thorildsplan', 'Kristineberg', 'Alvik', 'Stora Mossen', 'Abrahamsberg', 'Brommaplan', 'Åkeshov', 
                    'Ängbyplan', 'Islandstorget', 'Blackeberg', 'Råcksta', 'Vällingby', 'Johannelund', 'Hässelby Gård', 'Hässelby Strand'];

                    foreach($linje19 as $item){
                        echo "<option value = '$item'>$item</option>";
                    }
                    ?>
                
                </select>

            <div id = "buttonDiv">
                <input type = "submit" name = "sub" value = "Räkna">
            </div>

        </div>
</form>

<?php
            
 if(isset($_POST['sub'])){ //det här gör så att när man klickar på knappen som har name attributen 'sub', så ska nedanstående utföras

    //dessa två är variabler som har skapats för select taggarna
    $startStation = $_POST['stop'];
    $endStation = $_POST['destination'];

    //funktion eller metoden array_search, letar igenom varje element i arrayen "$linje19", och detta sparas i två variabler
    $firstStop = array_search($startStation, $linje19);
    $secondStop = array_search($endStation, $linje19);
    

    $amount = $secondStop - $firstStop; //beräknar ut antal stationerna mellan de två option values och subtraherar de från varandra

    echo "<div class = 'echo_align'>"; //skapade en div för att kunna positionera texten enligt min preferens
    echo "<p> Antal stationer: $amount </p>";
    echo "</div>";

    $time = $amount * 3; //för att kunna få fram hur lång tid det tar mellan olika stationer beroende på vad man väljer,
                        // multiplicerade jag 3 med antal stationer eftersom om skillnaden mellan de två option values är 1 
                        //så ska det vara lika med 3 minuter

    echo "<div class = 'time_align'>";
    echo "<p> Beräknad restid: $time minuter </p>";
    echo "</div>";

    $localTime = time(); //använde time() funktionen för att få lokala tiden

    $total = $localTime + $time; //här tänkte jag att man behövde addera den lokala tiden 
                                //med resultatet av antal stationer multiplicerat med 3 för att få fram ankomsttiden, 
                                //men det fungerade inte eftersom det är någonting som fattas och det lyckades jag inte få fram

    $result = date('H:i', $total); //date() funktionen ger tiden, eller omvandlar/formaterar tiden som man får av time() 
                                //funktionen till en mer läsbar version. Man kan då uppvisa timmarna, minuterna samt sekunderna
                                // fast jag valde bara att visa timmen och minuten av tiden.

    echo "<div class = 'arrival_align'>";
    echo "<p>Förväntad ankomsttid: $result </p>";
    echo "</div>";
}

?>
</body>
</html>