function submitForm(isLoggedIn) {
    alertify.alert('Message sent!', 'Your message has been sent, we will contact you if needed.',
        function () { }).setting({
            'closable': false,
            'label': 'Return to home screen',
            'onok': function () { window.location = /*isLoggedIn ? TODO logged page :*/"../main/main.php"; return false; },
        }
        );
    return false;
}