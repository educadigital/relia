<?php 
class TipoUso extends Singleton
{
    const SLUG = 'tipo-de-uso';
    const KEY = 'tipo_uso';
    protected function __construct()
    {
        add_action('init', array($this, 'init'), 0);
    }
    public function init()
    {
        $labels = array(
            'name' => _x('Tipos de uso', 'Taxonomy General Name', self::DOMAIN),
            'singular_name' => _x('Tipo de uso', 'Taxonomy Singular Name', self::DOMAIN),
            'menu_name' => __('Tipos de uso', self::DOMAIN),
            'all_items' => __('Todos os tipos de uso', self::DOMAIN),
            'parent_item' => __('Parent Item', self::DOMAIN),
            'parent_item_colon' => __('Parent Item:', self::DOMAIN),
            'new_item_name' => __('Novo nome de tipo de uso', self::DOMAIN),
            'add_new_item' => __('Adicionar novo tipo de uso', self::DOMAIN),
            'edit_item' => __('Editar tipo de uso', self::DOMAIN),
            'update_item' => __('Alterar tipo de uso', self::DOMAIN),
            'view_item' => __('Visualizar tipo de uso', self::DOMAIN),
            'separate_items_with_commas' => __('Separe os tipos de uso com vírgulas', self::DOMAIN),
            'add_or_remove_items' => __('Adicionar ou remover tipos de uso', self::DOMAIN),
            'choose_from_most_used' => __('Escolher dos tipos de uso mais usados', self::DOMAIN),
            'popular_items' => __('Tipos de uso mais populares', self::DOMAIN),
            'search_items' => __('Buscar tipos de uso', self::DOMAIN),
            'not_found' => __('Nenhum tipo de uso encontrado', self::DOMAIN),
            'no_terms' => __('Sem idioms', self::DOMAIN),
            'items_list' => __('Lista de tipos de uso', self::DOMAIN),
            'items_list_navigation' => __('Lista de navegação de tipos de uso', self::DOMAIN),
            );
        $rewrite = array(
            'slug' => self::KEY,
            'with_front' => true,
            'hierarchical' => false,
            );
        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => false,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'query_var' => self::KEY,
            'rewrite' => $rewrite,
            );
        register_taxonomy(self::KEY, array('post'), $args);
    }
}
