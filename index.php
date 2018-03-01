<?php 
/**
 * Plugin name: REliA
 * Description: Habilita 10 taxonomias para classificação de recursos.
 * Author: André Keher
 * Author URI: http://github.com/andrekeher
 */
class Relia
{
    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');

        require_once __dir__ . '/vendor/autoload.php';

        // Taxonomias
        AreaConhecimento::getInstance();
        Disciplina::getInstance();
        Disponibilidade::getInstance();
        Dispositivo::getInstance();
        Idioma::getInstance();
        Indicacao::getInstance();
        LicencaUso::getInstance();
        NivelEscolar::getInstance();
        Pais::getInstance();
        TipoUso::getInstance();
        Taxonomia::getInstance();

        // Customizações
        Icone::getInstance();
        Tooltip::getInstance();
        Detalhe::getInstance();
        
        add_filter('wp_terms_checklist_args', array($this, 'taxCheckedOnTop'));
    }

    public function taxCheckedOnTop($args)
    {
        $args['checked_ontop'] = false;
        return $args;
    }
}
$relia = new Relia();