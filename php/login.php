<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/import.css">
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
                        <p class="nav_bar_info"><a href="../index.php">Exit</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="form_block">

            <form action="" class="form_login">
                <input type="text" placeholder="Input login" name="login" id="input_login">
                <input type="password" placeholder="Input pass" id="input_password" name="password">
                <input type="checkbox" id="toggle_password" />Show Text
                <button class="btn_confirm" type="submit">
                    <p class="btn_text">Submit</p>
                </button>
            </form>

        </div>

    </div>

    <script>
        const password = document.getElementById("input_password");
        const togglePassword = document.getElementById("toggle_password");

        togglePassword.addEventListener("click", toggleClicked);

        function toggleClicked() {
            password.classList.toggle("visible");
            if (this.checked) {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
    </script>

</body>

</html>