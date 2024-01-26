<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertor Valutar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .converter {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            padding: 8px;
            margin-bottom: 10px;
        }

     
    </style>
</head>
<body>
<form method="post" action="script.php">
  
</form>

    <div class="converter">
        <h2>Convertor Valutar</h2>
        <label for="amount">Suma:</label>
        <input type="number" id="amount" placeholder="Introduceți suma">

        <label for="fromCurrency">De la:</label>
        <select id="fromCurrency">
        
            <option value="USD">MDL</option>
            <option value="EUR">USD</option>
            <option value="EUR">EUR</option>
            <option value="EUR">RUB</option>
            <option value="EUR">RON</option>
            <option value="EUR">UAH</option>
            <option value="EUR">GBP</option>
            <option value="EUR">CHF</option>
        

        </select>

        <label for="toCurrency">La:</label>
        <select id="toCurrency">
         
            <option value="USD">MDL</option>
            <option value="EUR">USD</option>
            <option value="EUR">EUR</option>
            <option value="EUR">RUB</option>
            <option value="EUR">RON</option>
            <option value="EUR">UAH</option>
            <option value="EUR">GBP</option>
            <option value="EUR">CHF</option>
         
        </select>

        <button onclick="convertCurrency()">Converteste</button>

        <h3>Rezultat:</h3>
        <p id="result">Aici va apărea rezultatul conversiei.</p>
    </div>

    <script>
        function convertCurrency() {
       
        }
    </script>
  <?php

$hostname="localhost";
$username="root";
$password="";
$database="convertor2";
$conexiune=mysqli_connect($hostname, $username, $password) or die ("Nu mă pot conecta la baza de date");
mysqli_select_db($conexiune, $database) or die ("Nu găsesc baza de date");


$amount = $_POST['amount'];
$fromCurrency = $_POST['fromCurrency'];
$toCurrency = $_POST['toCurrency'];


$sql = "SELECT curs FROM cursuri_valutare WHERE moneda = '$fromCurrency' OR moneda = '$toCurrency'";
$result = $conn->query($sql);

if ($result->num_rows === 2) {
    $cursuri = array();
    while ($row = $result->fetch_assoc()) {
        $cursuri[] = $row['curs'];
    }

    
    $fromRate = $cursuri[0];
    $toRate = $cursuri[1];

    if ($fromRate != 0) {
        $resultValue = ($toRate / $fromRate) * $amount;

     
        echo $amount . " " . $fromCurrency . " = " . number_format($resultValue, 2) . " " . $toCurrency;
    } else {
        echo "Eroare la conversie: cursul pentru moneda de origine este zero.";
    }
} else {
    echo "Nu s-au găsit cursuri valutare pentru monedele selectate.";
}

$conn->close();
?>


</body>
</html>

</body>
</html>