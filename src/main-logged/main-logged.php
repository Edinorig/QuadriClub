<?php
include_once("../common/php/dbConnector.php");
if (!isset($_SESSION['loggedUser'])) {
    header("location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/style-pages.css">
    <link rel="stylesheet" href="../common/css/style-font.css">
    <link rel="stylesheet" href="../common/css/style-header.css">
    <link rel="stylesheet" href="../common/css/style-footer.css">
    <link rel="stylesheet" href="../common/css/style.css">
    <link rel="stylesheet" href="../main/css/style-main.css">
    <link rel="stylesheet" href="../common/css/style-tag.css">
    <link rel="shortcut icon" href="../common/images/icons/icon-logo.png" />
    <link rel="stylesheet" href="./css/style-main-logged.css">
    <script src="./javascript/logout.js"></script>
    <script src="./javascript/addClick.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../common/javascript/filter.js"></script>
    <script src="../common/lib/alertify/alertify.js"></script>
    <script src="../common/lib/alertify/alertify.min.js"></script>
    <link rel="stylesheet" href="../common/lib/alertify/css/alertify.min.css" />
    <link rel="stylesheet" href="../common/lib/alertify/css/themes/default.min.css" />
    <title>Quadri Club</title>
</head>

<body <?php if (isset($_REQUEST['ordered']) && $_REQUEST['ordered'] != "") {
            echo "onload=\"alertify.success('\\'" . $_REQUEST['ordered'] . "\\' prenotato!', 15) \"";
            unset($_REQUEST);
        }; ?>>

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
                                <p class="nav_bar_info"><a href="../contact-us/contact-us.php"> ContactUs </a></p>
                            </div>
                            <div class="nav_bar_menu">
                                <p class="nav_bar_info"><a href="#" onclick="logout()">Log Out (<?php echo $_SESSION['loggedUser']; ?>)</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="background_main_block">
                    <p class="header_first_inf">QuadriClub</p>
                    <br>
                    <p class="slider-secondary-info">Migliori quadri per i migliri amici</p>
                </div>
            </div>
        </div>
    </header>

    <div class="global_block">

        <div class="wrapper-filtr">
            <div class="block-filtr">
                <p class="name-filtr">Filtra:</p>

                <div class="nav-bar-filtr">
                    <div class="filtr-category dropdown">
                        <button class="dropbtn">Nazionalita: <?php echo isset($_REQUEST['nazionalita']) ? $_REQUEST['nazionalita'] : "tutte"; ?></button>
                        <div class="dropdown-content">
                            <a onclick="return applyFilter('nazionalita', '')">Tutte</a>
                            <?php
                            $nazQuery = "SELECT nazionalita FROM tnazionalita";
                            $nazList = mysqli_query($dbGdA, $nazQuery) or die($nazQuery);
                            if (mysqli_num_rows($nazList) > 0) {
                                while ($currentNaz = mysqli_fetch_array($nazList)) {
                                    echo "<a onclick=\"return applyFilter('nazionalita', '" . $currentNaz['nazionalita'] . "')\">" . $currentNaz['nazionalita'] . "</a>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="filtr-category dropdown">
                        <button class="dropbtn">Autore: <?php echo isset($_REQUEST['autore']) ? $_REQUEST['autore'] : "tutti"; ?></button>
                        <div class="dropdown-content">
                            <a onclick="return applyFilter('autore', '')">Tutti</a>
                            <?php
                            $autQuery = "SELECT autore FROM tautori";
                            $autList = mysqli_query($dbGdA, $autQuery) or die($autQuery);
                            if (mysqli_num_rows($autList) > 0) {
                                while ($currentAut = mysqli_fetch_array($autList)) {
                                    echo "<a onclick=\"return applyFilter('autore', '" . $currentAut['autore'] . "')\">" . $currentAut['autore'] . "</a>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="filtr-category dropdown">
                        <button class="dropbtn">Ordina per: <?php echo isset($_REQUEST['ord']) && $_REQUEST['ord'] == "dataIns" ? "data d'inserimento" : "autore"; ?></button>
                        <div class="dropdown-content">
                            <a onclick="return applyFilter('ord', 'autore')">Autore</a>
                            <a onclick="return applyFilter('ord', 'dataIns')">Data d'inserimento</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <?php
        $query = "SELECT op.id, op.titolo, op.descrizione, op.path, op.prezzo, op.dataIns, op.click, aut.autore, naz.nazionalita, op.idAutore, aut.idNazionalita FROM topere op INNER JOIN tautori aut ON op.idAutore = aut.id INNER JOIN tnazionalita naz ON aut.idNazionalita = naz.id";
        if (isset($_REQUEST['autore'])) {
            $query .= " WHERE ";
            $query .= "aut.autore = '" . $_REQUEST['autore'] . "'";
        }
        if (isset($_REQUEST['nazionalita'])) {
            if (!str_contains($query, " WHERE ")) {
                $query .= " WHERE ";
            } else {
                $query .= " AND ";
            }
            $query .= "naz.nazionalita = '" . $_REQUEST['nazionalita'] . "'";
        }
        if (isset($_REQUEST['ord'])) {
            $query .= " ORDER BY ";
            switch ($_REQUEST['ord']) {
                case "autore":
                    $table = "aut.";
                    break;
                case "dataIns":
                    $table = "op.";
                    break;
            }
            $query .= $table . $_REQUEST['ord'];
        } else { //default
            $query .= " ORDER BY op.dataIns";
        }
        $rec = mysqli_query($dbGdA, $query) or die($query);
        if (mysqli_num_rows($rec) > 0) {
            for ($itemNum = 0; $currentRecord = mysqli_fetch_array($rec); $itemNum++) {
                echo "
                    <div class=\"main_block\">
                    
                        <div class=\"main_block_card_logged\">
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
                    
                    <div class=\"wrapper-privare-info\">
                        <div class=\"price\">
                            <p>Prezzo: " . $currentRecord["prezzo"] . "$</p>
                        </div>
                        <div class=\"status-quadro\">";
                $availabilityQuery = "SELECT idUtente FROM tprenotazioni WHERE idOpera = '" . $currentRecord['id'] . "'";
                $prenotazioni = mysqli_query($dbGdA, $availabilityQuery) or die($availabilityQuery);
                if (mysqli_num_rows($prenotazioni) > 0) {
                    if (mysqli_fetch_array($prenotazioni)['idUtente'] == $_SESSION['userId']) {
                        echo "
                                <button class=\"btn_prenotato\" type=\"submit\">
                                    <p class=\"\">Prenotato</p>
                                </button>
                                ";
                    } else {
                        echo "
                                <button class=\"btn_prenotato\" type=\"submit\">
                                    <p class=\"\">Non disponibile</p>
                                </button>
                                ";
                    }
                } else {
                    echo "<form method=\"post\" action=\"../prenota-quadro/prenota-quadro.php\" id=\"postForm\">
                            <button class=\"btn_confirm_quadro\" type=\"submit\" name=\"id\" value=\"" . $currentRecord['id'] . "\" onclick=\"addClick(" . $currentRecord['id'] . ", " . $currentRecord["click"] . ")\">
                                <p class=\"btn_text\">Prenota</p>
                            </button></form>";
                }
                echo "           
                    </div>
                </div>
                </div>
                </div>";
            }
        }
        ?>

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