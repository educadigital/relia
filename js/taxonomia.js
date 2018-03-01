function resetSubmit() {
    $ = jQuery.noConflict();
    $('.spinner').hide();
    $('#publish').removeClass('button-primary-disabled');
}
jQuery(document).ready(function($) {
    //Não adicionar novas categorias
    $('#taxonomy-category>#category-adder').remove();
    //Não selecionar as categorias pai
    $('#categorychecklist>li>label>input:checkbox').click(function() {
        $(this).attr('checked', $(this).is(':checked') ? false : true);
    }).css('opacity', '0.5');
    //Controlar a marcação da categoria pai
    $('#categorychecklist li>.selectit').click(function() {
        if ($(this).find('input[type=checkbox]').is(':checked')) {
            $(this).parents('#categorychecklist>li').find('label>:checkbox:first').attr('checked', true);
        } else {
            if ($(this).parents('#categorychecklist>li>ul').find(':checkbox:checked').length <= 0) {
                $(this).parents('#categorychecklist>li').find('label>:checkbox:first').attr('checked', false);
            }
        }
    });
    //Remover a tab de categorias mais usadas
    $('a[href="#category-pop"]').parent().remove();
    //Expandir/Recolher todos os boxes de categorias
    $('#submitdiv').after('<div style="text-align: center; border: solid 1px #DFDFDF; margin: 20px 0 20px 0; background: linear-gradient(to top, #F5F5F5, #F9F9F9) repeat scroll 0 0 #F5F5F5;"><h4><a href="#mostrar_todos" id="mostrar_todos">Mostrar todos</a> | <a href="#ocultar_todos" id="ocultar_todos">Ocultar todos</a></h4></div>');
    $('#mostrar_todos').click(function() {
        $('div.postbox').not('#submitdiv').removeClass('closed');
    });
    $('#ocultar_todos').click(function() {
        $('div.postbox').not('#submitdiv').addClass('closed');
    });
    //Selecionar todas as disciplinas
    $('#disciplinadiv>.inside').append('<div><h4><a href="#marcar_disciplinas" id="marcar_disciplinas">Marcar todas</a> | <a href="#desmarcar_disciplinas" id="desmarcar_disciplinas">Desmarcar todas</a></h4></div>');
    $('#marcar_disciplinas').click(function(e) {
        e.preventDefault();
        $('input[type=checkbox]', $('#disciplinachecklist')).attr('checked', true);
    });
    $('#desmarcar_disciplinas').click(function(e) {
        e.preventDefault();
        $('input[type=checkbox]', $('#disciplinachecklist')).removeAttr('checked');
    });
    function removerErro(ele) {
        $(ele).css({
            'border': ''
        }).find('.tabs-panel').css({
            'background': ''
        });
        return true;
    }
    function animarErro(elemento) {
        var ele = $('#' + elemento + 'div'),
            posicao = $(ele).offset().top;
        $('html, body').animate({
            scrollTop: posicao - 50
        }, 'slow');
        setTimeout(function() {
            $(ele).css({
                'border': 'solid 2px red'
            }).find('.tabs-panel').css({
                'background': '#FFB'
            });
        }, 1000);
        return true;
    }
    function validarTax(tax, msg) {
        var taxList = $('#' + tax + 'checklist input:checkbox:checked'),
            taxSel = true;
        if (taxList.length <= 0) {
            taxSel = false;
        } else {
            for (let i = 0; i < taxList.length; i++) {
                if (taxList.get(i).id === 'in-category-1' || taxList.get(i).id === 'in-popular-category-1') {
                    taxList.get(i).checked = false;
                }
                if (taxList.get(i).checked) {
                    taxSel = true;
                    break;
                }
            }
        }
        if (taxSel === false) {
            resetSubmit();
            alert(msg);
            animarErro(tax);
        }
        return taxSel;
    }
    var validacoes = {
        'category': 'Por favor, selecione a categoria do recurso!',
        'area_conhecimento': 'Por favor, selecione as áreas de conhecimento do recurso!',
        'idioma': 'Por favor, selecione o idioma do recurso!',
        'nivel_escolar': 'Por favor, selecione os niveis escolares do recurso!',
        'tipo_uso': 'Por favor, selecione o tipo de uso do recurso!',
        'licenca_uso': 'Por favor, selecione as licenças de uso do recurso!',
        'disciplina': 'Por favor, selecione as disciplinas do recurso!',
        'disponibilidade': 'Por favor, Selecione a disponibilidade do recurso!',
    };
    $('form').submit(function() {    
        for (var k in validacoes) {
            if (validarTax(k, validacoes[k]) === false) {
                return false;
            }
        }
    });
    $('li>.selectit').click(function() {
        removerErro($(this).closest('div.postbox'));
    });
})
