jQuery(document).ready(function($) {
    $('form#edittag').attr('enctype', 'multipart/form-data');
    $('.remover_icone').click(function(e) {
        e.preventDefault();
        if (confirm('Deseja realmente remover o ícone?')) {
            $(this).closest('.form-field').find('.icone').attr({
                'src': '',
                'value': ''
            });
        }
    });
    $('.adicionar_icone').click(function(e) {
        e.preventDefault();
        var me = $(this);
        window.wp.media.editor.send.attachment = function(props, attachment) {
            $(me).closest('.form-field').find('.icone').attr({
                'src': attachment.url,
                'value': attachment.id
            });
        }
        window.wp.media.editor.open(me);
        return false;
    });
});
