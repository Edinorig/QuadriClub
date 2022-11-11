<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/style.css">
    <link rel="stylesheet" href="../common/css/style-font.css">
    <link rel="stylesheet" href="../common/css/style-tag.css">
    <link rel="stylesheet" href="./css/style-login.css">
    <link rel="shortcut icon" href="../common/images/icons/icon-logo.png" />
    <script src="./javascript/verifyCredentials.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../common/lib/alertify/alertify.js"></script>
    <script src="../common/lib/alertify/alertify.min.js"></script>
    <script src="../common/lib/shake-element-transform/shake.js"></script>
    <link rel="stylesheet" href="../common/lib/alertify/css/alertify.min.css" />
    <link rel="stylesheet" href="../common/lib/alertify/css/themes/default.min.css" />
    <title>Login</title>
</head>

<body>

    <div id="background_img2">

        <div class="nav_bar_block">
            <div class="nav_bar">
                <div class="nav_bar_block_logo">
                    <p class="nav_bar_logo">QuadriClub</p>
                </div>
                <div class="nav_bar_block_menu">
                    <div class="nav_bar_menu">
                        <p class="nav_bar_info"><a href="../../index.php">Exit</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="form_block">

            <form id="loginForm" onsubmit="return verify()" class="form_login">
                <input type="text" placeholder="Input username" name="login" id="input_login">
                <input type="password" placeholder="Input password" id="input_password" name="password">
                <button class="btn_confirm_login" type="submit">
                    <p class="btn_text">Submit</p>
                </button>
            </form>

        </div>

    </div>
</body>

</html>