$('button.deletar-membro').click(function() {
    var id_membro = $(this).attr('id_membro');
    var el = $(this).parent().parent();
    
    $.ajax({
        method: 'post',
        data: {'id_membro':id_membro},
        url: 'deletar.php'
    }).done(function() {
        el.remove();
    });
})