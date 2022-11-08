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
    <title>Contact US</title>
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
                                <p>Exit</p>
                            </a>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div class="form_block">

            <form action="" class="form_contactUs">

                <input type="text" placeholder="Input Poblem" name="login" class="input_contactUs_problem">
                <textarea name="problem_description" id="" cols="30" rows="10" class="input_contactUs_description" placeholder="Descript problem"></textarea>
                <button class="btn_confirm" type="submit">
                    <p class="btn_text">Send</p>
                </button>
            </form>

        </div>
    </div>



    <?php include '../common/php/footer.php'; ?>
</body>

</html>