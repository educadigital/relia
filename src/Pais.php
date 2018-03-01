<?php 
class Pais extends Singleton
{
    const SLUG = 'pais';
    const KEY = 'pais';
    protected function __construct()
    {
        add_action('init', array($this, 'init'), 0);
    }
    public function init()
    {
        $labels = array(
            'name' => _x('Países', 'Taxonomy General Name', self::DOMAIN),
            'singular_name' => _x('País', 'Taxonomy Singular Name', self::DOMAIN),
            'menu_name' => __('Países', self::DOMAIN),
            'all_items' => __('Todos os países', self::DOMAIN),
            'parent_item' => __('Parent Item', self::DOMAIN),
            'parent_item_colon' => __('Parent Item:', self::DOMAIN),
            'new_item_name' => __('Novo nome de país', self::DOMAIN),
            'add_new_item' => __('Adicionar novo país', self::DOMAIN),
            'edit_item' => __('Editar país', self::DOMAIN),
            'update_item' => __('Alterar país', self::DOMAIN),
            'view_item' => __('Visualizar país', self::DOMAIN),
            'separate_items_with_commas' => __('Separe os países com vírgulas', self::DOMAIN),
            'add_or_remove_items' => __('Adicionar ou remover países', self::DOMAIN),
            'choose_from_most_used' => __('Escolher dos países mais usados', self::DOMAIN),
            'popular_items' => __('Países mais populares', self::DOMAIN),
            'search_items' => __('Buscar países', self::DOMAIN),
            'not_found' => __('Nenhum país encontrado', self::DOMAIN),
            'no_terms' => __('Sem países', self::DOMAIN),
            'items_list' => __('Lista de países', self::DOMAIN),
            'items_list_navigation' => __('Lista de navegação de países', self::DOMAIN),
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
