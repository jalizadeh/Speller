<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Italian Spelling | Fa lo spelling in Italiano</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">

    <a href="https://it.wikipedia.org/wiki/Alfabeto_telefonico_italiano">Alfabeto telefonico italiano</a>
    <a href="http://www.infodomus.it/radio/codici/telefonico.htm">GLI ALFABETI TELEFONICI</a>
    
        <form method="post" class="row g-2">
            <div class="col-auto">
                <input class="form-control" type="text" name="fullName" placeholder="Enter the name" required>
            </div>
            <div class="col-auto">
                <button class="btn  btn-primary" type="submit">Spell</button>
            </div>
        </form>


    <?php
    
    function getPhonetic($char)
    {
        $phonetics = array(
            'A' => 'come Ancona',
            'B' => 'come Bari',
            'C' => 'come Como',
            'D' => 'come Domodossola',
            'E' => 'come Empoli',
            'F' => 'come Firenze',
            'G' => 'come Genova',
            'H' => 'come Hotel',
            'I' => 'come Imola',
            'J' => 'come Jesolo',
            'K' => 'come Kappa',
            'L' => 'come Livorno',
            'M' => 'come Milano',
            'N' => 'come Napoli',
            'O' => 'come Otranto',
            'P' => 'come Palermo',
            'Q' => 'come Quarto',
            'R' => 'come Roma',
            'S' => 'come Savona',
            'T' => 'come Torino',
            'U' => 'come Udine',
            'V' => 'come Venezia',
            'W' => 'doppiavù',
            'X' => 'ics',
            'Y' => 'ipsilon',
            'Z' => 'come Zara'
        );

        return isset($phonetics[$char]) ? $phonetics[$char] : '';
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullName = $_POST["fullName"];

        // Convert the name to uppercase
        $fullName = strtoupper($fullName);
        $parts = preg_split('/(?=\s)|(?<=\s)/', $fullName);
        //print_r($newArray);


        echo "<br>";
        echo "<div id=\"printableArea\">";
        echo "<h2>" . $fullName . "</h2>";
        echo "<button class=\"btn btn-info\" onclick=\"printDiv('printableArea')\">Print the table</button>";
        echo "<table class=\"table table-striped\" >";
        echo "<tr><th>#</th><th>Letter</th><th>Spelling</th></tr>";
        for ($i = 0; $i < strlen($fullName); $i++) {
            $char = $fullName[$i];
            echo "<tr>";
            echo "<td>" . $i + 1 . "</td>";
            echo "<td>$char</td>";
            echo "<td>" . getPhonetic($char) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }
    ?>


</div>

<script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

</body>
</html>
