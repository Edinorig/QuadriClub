<?php
include_once("../common/php/dbConnector.php");
if (!isset($_SESSION['loggedUser']) || !isset($_REQUEST['id'])) {
    header("location: " . isset($_SESSION['loggedUser']) ? "../main-logged/main-logged.php" : "../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-prenota-quadro.css">
    <link rel="stylesheet" href="../common/css/style.css">
    <link rel="stylesheet" href="../common/css/style-font.css">
    <link rel="stylesheet" href="../common/css/style-tag.css">
    <link rel="stylesheet" href="../common/css/style-pages.css">
    <link rel="shortcut icon" href="../common/images/icons/icon-logo.png" />
    <script src="./javascript/prenota.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../common/lib/alertify/alertify.js"></script>
    <script src="../common/lib/alertify/alertify.min.js"></script>
    <link rel="stylesheet" href="../common/lib/alertify/css/alertify.min.css" />
    <link rel="stylesheet" href="../common/lib/alertify/css/themes/default.min.css" />
    <title>Prenota</title>
</head>

<?php
$query = "SELECT op.id, op.titolo, op.descrizione, op.path, aut.autore, naz.nazionalita, op.idAutore, aut.idNazionalita FROM topere op INNER JOIN tautori aut ON op.idAutore = aut.id INNER JOIN tnazionalita naz ON aut.idNazionalita = naz.id WHERE op.id = " . $_REQUEST['id'] . ";";
//Sempre ricerca $query .= isset($_GET["category"]) ? ($_GET["category"] != "-1" ? "AND idCategoria LIKE '" . $_GET["category"] . "'" : "") : "";
$rec = mysqli_query($dbGdA, $query) or die($query);
if (mysqli_num_rows($rec) > 0) {
    $currentRecord = mysqli_fetch_array($rec);
};
?>

<body>
    <div class="background_img">
        <div id="background_img2-prenota" style="background-image: linear-gradient(rgba(0, 0, 0, 0.527), rgba(0, 0, 0, 0.5)), url(../common/<?php echo str_replace('/', '/quadri/', $currentRecord["path"]); ?>);">

            <div class="nav_bar_block">
                <div class="nav_bar">
                    <div class="nav_bar_block_logo">
                        <p class="nav_bar_logo">QuadriClub</p>
                    </div>
                    <div class="nav_bar_block_menu">
                        <div class="nav_bar_menu">
                            <p class="nav_bar_info"><a href="../main-logged/main-logged.php"> Esci </a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="background_main_block">

                <div class="main_block">

                    <div class="main_block_card">
                        <div class="main_block_card_logo">
                            <p class="card_logo_prenota"> Prenota:</p>
                        </div>

                        <div class="wrapper-body">
                            <?php echo "
                        <div class=\"main_block\">

                            <div class=\"main_block_card\">
                                <div class=\"main_block_card_logo info\">
                                    <p class=\"card_logo\">" . $currentRecord["titolo"] . "</p>
                                </div>
                                <div class=\"main_block_card_body\">
                                    <div class=\"main_block_card_body_painting\">
                                        <img src=\"../common/" . str_replace('/', '/quadri/', $currentRecord["path"]) . "\" alt=\"\">
                                    </div>
                                    <div class=\"main_block_card_body_info info\">
                                        <div class=\"main_block_card_body_info_description\">
                                            <p class=\"card_description\">" . $currentRecord["descrizione"] . "</p>
                                        </div>
                                        <div class=\"main_block_card_body_info_author info\">
                                            <p class=\"card_author\">" . $currentRecord["autore"] . " (" . $currentRecord["nazionalita"] . ")</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>";

                            ?>
                            <div class="wrapper-privare-info">
                                <div class="cancella-quadro">
                                    <button class="btn_cancella" type="submit">
                                        <a href="../main-logged/main-logged.php">
                                            <p class="btn_text">Ritorna</p>
                                        </a>
                                    </button>
                                </div>
                                <div class="compra-quadro">
                                    <button id="compra-quadro" class="btn_confirm" type="submit" onclick="prenota(<?php echo $currentRecord['id'] . ', ' . $_SESSION['userId'] . ', \'' . str_replace('\'', '\\\'', $currentRecord['titolo']) . '\''; ?>)">
                                        <p class="btn_text">Prenota</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>