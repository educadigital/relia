<?php
class Indicacao extends Singleton
{
    const SLUG = 'indicacao';
    const KEY = 'indicacao';
    protected function __construct()
    {
        add_action('init', array($this, 'init'), 0);
    }
    public function init()
    {
        $labels = array(
            'name' => _x('Indicações', 'Taxonomy General Name', self::DOMAIN),
            'singular_name' => _x('Indicação', 'Taxonomy Singular Name', self::DOMAIN),
            'menu_name' => __('Indicações', self::DOMAIN),
            'all_items' => __('Todas as indicações', self::DOMAIN),
            'parent_item' => __('Parent Item', self::DOMAIN),
            'parent_item_colon' => __('Parent Item:', self::DOMAIN),
            'new_item_name' => __('Nova indicação', self::DOMAIN),
            'add_new_item' => __('Adicionar nova indicação', self::DOMAIN),
            'edit_item' => __('Editar indicação', self::DOMAIN),
            'update_item' => __('Alterar indicação', self::DOMAIN),
            'view_item' => __('Visualizar indicação', self::DOMAIN),
            'separate_items_with_commas' => __('Separe as indicações com vírgulas', self::DOMAIN),
            'add_or_remove_items' => __('Adicionar ou remover indicações', self::DOMAIN),
            'choose_from_most_used' => __('Escolher das indicações mais usadas', self::DOMAIN),
            'popular_items' => __('Indicações mais populares', self::DOMAIN),
            'search_items' => __('Buscar indicações', self::DOMAIN),
            'not_found' => __('Nenhuma indicação encontrada', self::DOMAIN),
            'no_terms' => __('Sem indicações', self::DOMAIN),
            'items_list' => __('Lista de indicações', self::DOMAIN),
            'items_list_navigation' => __('Lista de navegação de indicações', self::DOMAIN),
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
