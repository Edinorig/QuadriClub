function addClick(id, oldVal) {
    $.ajax({
        type: 'GET',
        url: "./php/addClick.php",
        data: {
            'id': id,
            'val': oldVal + 1
        },
        success: function (resp) {
            console.log(resp);
        }
    })
    return false;
}
