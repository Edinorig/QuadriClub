function logout() {
    $.ajax({
        type: "GET",
        url: "./php/logout.php",
        data: {},
        complete: function () {
            window.location = "../../index.php";
        }
    })
    return false;
}