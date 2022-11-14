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
    <script src="../common/javascript/filter.js"></script>
    <title>Main</title>
</head>

<body>
    <div class="wrapper-header-bacground-img">
        <div class="background-img1">
            <header>
                <div class="wrapper-nav-bar">
                    <div class="logo">
                        <p>Quadri club</p>
                    </div>
                    <div class="wrapper-navigation-menu">
                        <div class="navigation-menu">
                            <a href="../contact-us/contact-us.php">
                                <p>Contact Us</p>
                            </a>
                        </div>
                        <div class="navigation-menu">
                            <a href="../login/login.php">
                                <p>Login</p>
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            <div class="wrapper-slides-information">
                <div class="main-info">
                    <p class="slider-main-info">QuadriClub</p>
                </div>
                <div class="wrapper-secondary-info">
                    <div class="secondary-info">
                        <p class="slider-secondary-info">Migliori quadri per i migliri amici</p>
                    </div>
                </div>

            </div>

        </div>
    </div>

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
        $query = "SELECT op.id, op.titolo, op.descrizione, op.path, aut.autore, naz.nazionalita, op.idAutore, aut.idNazionalita FROM topere op INNER JOIN tautori aut ON op.idAutore = aut.id INNER JOIN tnazionalita naz ON aut.idNazionalita = naz.id WHERE op.privata = 'n'";
        if (isset($_REQUEST['autore'])) {
            $query .= " AND ";
            $query .= "aut.autore = '" . $_REQUEST['autore'] . "'";
        }
        if (isset($_REQUEST['nazionalita'])) {

            $query .= " AND ";

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
        } else {
            echo "<div id=\"no-results\"><h4> <p>Non sono state trovate opere disponibili corrispondenti ai criteri di ricerca inseriti...</p></h4></div>";
        }
        ?>

    </div>
    

    <?php include '../common/php/footer.php'; ?>

</body>

</html>