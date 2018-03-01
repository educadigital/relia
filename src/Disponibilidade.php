<?php
class Disponibilidade extends Singleton
{
    const SLUG = 'disponibilidade';
    const KEY = 'disponibilidade';
    protected function __construct()
    {
        add_action('init', array($this, 'init'), 0);
    }
    public function init()
    {
        $labels = array(
            'name' => _x('Disponibilidades', 'Taxonomy General Name', self::DOMAIN),
            'singular_name' => _x('Disponibilidade', 'Taxonomy Singular Name', self::DOMAIN),
            'menu_name' => __('Disponibilidades', self::DOMAIN),
            'all_items' => __('Todas as disponibilidades', self::DOMAIN),
            'parent_item' => __('Parent Item', self::DOMAIN),
            'parent_item_colon' => __('Parent Item:', self::DOMAIN),
            'new_item_name' => __('Novo nome de disponibilidade', self::DOMAIN),
            'add_new_item' => __('Adicionar nova disponibilidade', self::DOMAIN),
            'edit_item' => __('Editar disponibilidade', self::DOMAIN),
            'update_item' => __('Alterar disponibilidade', self::DOMAIN),
            'view_item' => __('Visualizar disponibilidade', self::DOMAIN),
            'separate_items_with_commas' => __('Separe as disponibilidades com vírgulas', self::DOMAIN),
            'add_or_remove_items' => __('Adicionar ou remover disponibilidades', self::DOMAIN),
            'choose_from_most_used' => __('Escolher das disponibilidades mais usadas', self::DOMAIN),
            'popular_items' => __('Disponibilidades mais populares', self::DOMAIN),
            'search_items' => __('Buscar disponibilidades', self::DOMAIN),
            'not_found' => __('Nenhuma disponibilidade encontrada', self::DOMAIN),
            'no_terms' => __('Sem disponibilidades', self::DOMAIN),
            'items_list' => __('Lista de disponibilidades', self::DOMAIN),
            'items_list_navigation' => __('Lista de navegação de disponibilidades', self::DOMAIN),
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
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'query_var' => self::KEY,
            'rewrite' => $rewrite,
            );
        register_taxonomy(self::KEY, array('post'), $args);
    }
}
