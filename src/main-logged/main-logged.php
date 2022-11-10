<?php
include_once("../common/php/dbConnector.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-main.css">
    <link rel="stylesheet" href="../common/css/style-pages.css">
    <link rel="stylesheet" href="../common/css/style-font.css">
    <link rel="stylesheet" href="../common/css/style-header.css">
    <link rel="stylesheet" href="../common/css/style-footer.css">
    <link rel="stylesheet" href="../common/css/style.css">
    <link rel="stylesheet" href="../common/css/style-tag.css">
    <link rel="shortcut icon" href="../common/images/icons/icon-logo.png" />
    <link rel="stylesheet" href="./css/style-main-logged.css">
    <title>Quadri Club</title>
</head>

<body>
    <header>
        <div class="background_img fade">
            <div id="background_img1">
                <div class="nav_bar_block">
                    <div class="nav_bar">
                        <div class="nav_bar_block_logo">
                            <p class="nav_bar_logo">QuadriClub</p>
                        </div>
                        <div class="nav_bar_block_menu">
                            <div class="nav_bar_menu">
                                <p class="nav_bar_info"><a href="../contact-us/contagitct-us.php"> ContactUs </a></p>
                            </div>
                            <div class="nav_bar_menu">
                                <p class="nav_bar_info"><a href="../login/login.php">LogIn</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="background_main_block">
                    <p class="header_first_inf">QuadriClub</p>
                    <br>
                    <p class="header_second_inf">Best Paintings For Best Friends</p>
                </div>
            </div>
        </div>
    </header>

    <div class="global_block">

        <div class="wrapper-filtr">
            <div class="block-filtr">
                <p class="name-filtr">Filtr</p>

                <div class="nav-bar-filtr">
                    <div class="filtr-category">
                        <p>Nazionalita</p>
                    </div>
                    <div class="filtr-category">
                        <p>Autore</p>
                    </div>
                    <div class="filtr-category">
                        <p>Ordine</p>
                    </div>
                </div>

            </div>
        </div>


        <?php
        $searchTerm = ""; //TODO barra di ricerca
        $query = "SELECT op.id, op.titolo, op.descrizione, op.path, aut.autore, naz.nazionalita, op.idAutore, aut.idNazionalita FROM topere op INNER JOIN tautori aut ON op.idAutore = aut.id INNER JOIN tnazionalita naz ON aut.idNazionalita = naz.id WHERE op.titolo LIKE '%" . $searchTerm . "%';";
        //Sempre ricerca //$query .= isset($_GET["category"]) ? ($_GET["category"]  != "-1" ? "AND idCategoria LIKE '" . $_GET["category"] . "'" : "") : "";
        $rec = mysqli_query($dbGdA, $query) or die($query);
        if (mysqli_num_rows($rec) > 0) {
            for ($itemNum = 0; $currentRecord = mysqli_fetch_array($rec); $itemNum++) {
                echo "
                    <div class=\"main_block\">
                    
                        <div class=\"main_block_card\">
                            <div class=\"main_block_card_logo\">
                                <p class=\"card_logo\">" . $currentRecord["titolo"] . "</p>
                            </div>
                            <div class=\"main_block_card_body\">
                                <div class=\"main_block_card_body_painting\">
                                    <img src=\"../common/" . str_replace('/', '/quadri/', $currentRecord["path"]) . "\" alt=\"\">
                                </div>
                                <div class=\"main_block_card_body_info\">
                                    <div class=\"main_block_card_body_info_description\">
                                        <p class=\"card_description\">" . $currentRecord["descrizione"] . "</p>
                                    </div>
                                    <div class=\"main_block_card_body_info_author\">
                                        <p class=\"card_author\">" . $currentRecord["autore"] . " (" . $currentRecord["nazionalita"] . ")</p>
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                    </div>
                    ";
            }
        }
        ?>

        <div class="wrapper-panel">
            <div class="panel">
                <p>Prev</p>
            </div>
            <div class="panel">
                <p>Next</p>
            </div>
        </div>

    </div>

    <footer>
        <div class="footer_block">
            <p class="footer_info">Email: infoQuadr.gmail.com</p>
        </div>
        <div class="footer_block">
            <p class="footer_info">Telefono: +39 123 324 4759</p>
        </div>
    </footer>
</body>

</html>