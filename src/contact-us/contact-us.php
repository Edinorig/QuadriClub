<?php
include_once("../common/php/dbConnector.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-contact-us.css">
    <link rel="stylesheet" href="../common/css/style-pages.css">
    <link rel="stylesheet" href="../common/css/style-font.css">
    <link rel="stylesheet" href="../common/css/style-header.css">
    <link rel="stylesheet" href="../common/css/style-footer.css">
    <link rel="shortcut icon" href="../common/images/icons/icon-logo.png" />
    <script src="javascript/submitForm.js"></script>
    <script src="../common/lib/alertify/alertify.js"></script>
    <script src="../common/lib/alertify/alertify.min.js"></script>
    <link rel="stylesheet" href="../common/lib/alertify/css/alertify.min.css" />
    <link rel="stylesheet" href="../common/lib/alertify/css/themes/default.min.css" />
    <title>Contact US</title>
</head>

<body>
    <div class="wrapper-header-bacground-img" style="height: 100vh;">
        <div class="background-img1">
            <header>
                <div class="wrapper-nav-bar">
                    <div class="logo">
                        <p>Quadri club</p>
                    </div>
                    <div class="wrapper-navigation-menu">
                        <div class="navigation-menu-contactus">
                            <a href=<?php echo isset($_SESSION['loggedUser']) ? "../main-logged/main-logged.php" : "../../index.php"; ?>>
                                <p>Esci</p>
                            </a>
                        </div>
                    </div>
                </div>
            </header>
            <div class="form_block">
            <form onSubmit="return submitForm(<?php echo isset($_SESSION['loggedUser']) ?>)" class="form_contactUs">
                <input type="text" placeholder="Inserisci la problema..." name="reason" class="input_contactUs_problem" style="padding: 5px;">
                <textarea name="description" id="" cols="30" rows="10" class="input_contactUs_description" placeholder="Aggiungi i detagli ..."></textarea>
                <button class="btn_confirm" type="submit">
                    <p class="btn_text">Invia</p>
                </button>
            </form>

        </div>
        </div>
    </div>
</body>

</html>