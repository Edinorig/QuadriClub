function prenota(itemId, userId, title) {
    alertify.confirm('CONFERMA PRENOTAZIONE', 'Confermi di voler inviare una prenotazione per \"' + title + '\"?', function () {
        $.ajax({
            type: 'POST',
            url: "php/prenota.php",
            data: {
                'user': userId,
                'item': itemId
            },
            success: function (result) {
                if (result == "inserito") {
                    $('#compra-quadro').attr('class', 'btn_prenotato');
                    $('#compra-quadro').attr('onclick', '');
                    $('#compra-quadro').children("p").text('Prenotato');
                    window.location = "../main-logged/main-logged.php?ordered=" + title.replace('\'', '\\\'');
                    alertify.success('Prenotato!', 15)
                } else {
                    alertify.error('Insertion error, resonse: ' + result, 15)
                }

            }
        })
    }
        , function () { });
}

//chiamare in inizializzazioen pagina per proteggere da reload se serve
function setAvailability(available) {
    if (available) {
        $('#compra-quadro').attr('class', 'btn_prenotato');
        $('#compra-quadro').attr('onclick', '');
        $('#compra-quadro').children("p").text('Prenotato');
    }
}