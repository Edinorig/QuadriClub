function logout() {
    $.ajax({
        type: 'GET',
        url: './php/logout.php',
        data: {},
        success: function (amount) {
            window.location = "../../index.php";
            return false;
        }
    })
}