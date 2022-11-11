function verify() {
    $.ajax({
        type: 'POST',
        url: "./php/verifyCredentials.php",
        data: {
            'user': $('#input_login').val(),
            'pass': $('#input_password').val()
        },
        complete: function (id) {
            //console.log(id)
            if (id.responseText == "true") {
                window.location = "../main-logged/main-logged.php";
            } else {
                alertify.dismissAll();
                alertify.notify('Credential Error', 'error', 15, $(function () {
                    $('#loginForm').children("input").shake()
                }));
            }
        }
    })
    return false;
}