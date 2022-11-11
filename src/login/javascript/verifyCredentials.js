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
            if (id.responseText >= 0) {
                alert(id.responseText);
            } else {
                alert("failed" + id.responseText);
            }
        }
    })
    return false;
}