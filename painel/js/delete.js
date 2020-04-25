$('button.deletar-membro').click(function() {
    var id_membro = $(this).attr('id_membro');
    var el = $(this).parent().parent();
    
    $.ajax({
        method: 'POST',
        data: {'id_membro':id_membro},
        url: 'php/dbconnection.php'
    }).done(function() {
        el.remove();
    });
})