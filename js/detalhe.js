function validarLink(link) {
    var pattern = new RegExp(/^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/i);
    return pattern.test(link);
}
jQuery(document).ready(function($) {
    $('form').submit(function() {
        var ele = $('#detalhes_relia #_link'),
            link = $(ele).val();
        if (link === '' || !validarLink(link)) {                                      
            if($(ele).parent().find('.error-message').length === 0){
                $(ele).after('<span class="error-message">Por favor, informe o link do recurso corretamente!</span>');  
            } else {
                if($('#detalhes_relia_erro').length === 0){
                    $('#submitdiv').append('<div class="error-message" id="detalhes_relia_erro" style="border: 1px solid red;padding: 12px;border-radius: 4px;">Atenção! Por favor, verifique a seção "Detalhes do recurso".</div>');
                }
            }
            return false;
        }
        return true;
    });
    $('#detalhes_relia #_link').focus(function(){
        $(this).parent().find('.error-message').remove(); 
    });
    $('#detalhes_relia').click(function(){
        $('#detalhes_relia_erro').remove();
    })
});
