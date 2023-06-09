<html>
<head>
    <meta charset="UTF-8">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <?php
        $con = mysqli_connect("localhost", "root", "", "dane3");
        if(mysqli_connect_errno()){
            echo "nie udalo sie polaczyc, sprobuj jeszcze raz: " . mysqli_connect_error();
            exit();
        }
        if(isset($_POST["nr"]) && !empty($_POST["nr"])){
            $sql = "DELETE FROM `produkty` WHERE `id` = '".$_POST["nr"]."'";
            $con->query($sql);
        }
    ?>
    <div class="banerLewy">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </div>
    <div class="banerPrawy">
        <table>
            <tr>
                <td>Kryminał</td>
                <td>Horror</td>
                <td>Przygodowy</td>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </div>
    <div class="lista">
        <h3>Polecamy</h3>
        <?php
            $sql="SELECT `id`, `nazwa`, `ilosc`, `opis`, `zdjecie` FROM `produkty` WHERE `id`=18 or `id`=22 or `id`=23 or `id`=25";
            $res = $con->query($sql);
            while($row = $res->fetch_assoc()){
                echo "<div class='film'>";
                echo "<h4>" . $row["id"] . ". " . $row["nazwa"] . "</h4>";
                echo "<img src='" . $row["zdjecie"] . "' alt='film'>";
                echo "<p>" . $row["opis"] . "</p>";
                echo "</div>";
            }
        ?>
    </div>
    <div class="lista">
        <h3>Filmy fantastyczne</h3>
        <?php
            $sql="SELECT `id`, `nazwa`, `ilosc`, `opis`, `zdjecie` FROM `produkty` WHERE `Rodzaje_id` = 12";
            $res = $con->query($sql);
            while($row = $res->fetch_assoc()){
                echo "<div class='film'>";
                echo "<h4>" . $row["id"] . ". " . $row["nazwa"] . "</h4>";
                echo "<img src='" . $row["zdjecie"] . "' alt='film'>";
                echo "<p>" . $row["opis"] . "</p>";
                echo "</div>";
            }
        ?>
    </div>
    <div class="stopka">
        <form method="POST">
            <label>Usuń film nr.:</label><input type="number" name="nr">
            <input type="submit" value="Usuń film">
        </form>
        <span>Stronę wykonał: bartosz kowalski</span>
    </div>
    <?php mysqli_close($con); ?>
    </body>
</html>