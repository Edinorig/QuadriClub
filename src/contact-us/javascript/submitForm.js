function submitForm(isLoggedIn) {
    alertify.alert('Message sent!', 'Your message has been sent, we will contact you if needed.',
        function () { }).setting({
            'closable': false,
            'label': 'Return to home screen',
            'onok': function () { window.location = isLoggedIn ? "../main-logged/main-logged.php" : "../main/main.php"; return false; },
        }
        );
    return false;
}