<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selectare</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        } 
        .main {
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .add {
            display: flex;
            width: 80%;
            justify-content: flex-end;
        }
        svg {
            height: 3vh;
            width: 3vw;
        }
        table {
            width: 80%;
            height: 15vh;
        }
        th {
            background-color: #050D1A;
            color: #fff;
            height: 5vh;
        }
        td {
            height: 5vh;
        }
        tr:nth-child(odd) {
            background-color: lightblue;
        }
        tr:nth-child(even) {
            background-color: lightgray;
        }
    </style>
</head>
<body>

    <div class="add">
        <a href="create.php"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#2196f3" d="M256 0C114.836 0 0 114.836 0 256s114.836 256 256 256 256-114.836 256-256S397.164 0 256 0zm0 0" opacity="1" data-original="#2196f3" class=""></path><path fill="#fafafa" d="M368 277.332h-90.668V368c0 11.777-9.555 21.332-21.332 21.332s-21.332-9.555-21.332-21.332v-90.668H144c-11.777 0-21.332-9.555-21.332-21.332s9.555-21.332 21.332-21.332h90.668V144c0-11.777 9.555-21.332 21.332-21.332s21.332 9.555 21.332 21.332v90.668H368c11.777 0 21.332 9.555 21.332 21.332s-9.555 21.332-21.332 21.332zm0 0" opacity="1" data-original="#fafafa" class=""></path></g></svg> Adauga elev</a>
    </div>
    <div class="main">
    <?php
    include ("conexiune.php");
    $sql=mysqli_query($conexiune, "SELECT * FROM `cursuri_valutare`");
    echo "<table>";
    echo "<tr><th>Id</th><th>moneda</th><th>curs</th>;
    while ($row=mysqli_fetch_row($sql)) {
    echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><a href='update.php?id=$row[0]'>Modifica</a></td><td><a href='delete.php?id=$row[0]'>Sterge</a></td>";
    }
    echo "</table>";
    mysqli_close($conexiune);
    ?>
    </div>
</body>
</html>