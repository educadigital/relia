<?php
class Dispositivo extends Singleton
{
    const SLUG = 'dispositivos-compativeis';
    const KEY = 'dispositivo';
    protected function __construct()
    {
        add_action('init', array($this, 'init'), 0);
    }
    public function init()
    {
        $labels = array(
            'name' => _x('Dispositivos compatíveis', 'Taxonomy General Name', self::DOMAIN),
            'singular_name' => _x('Dispositivo compatível', 'Taxonomy Singular Name', self::DOMAIN),
            'menu_name' => __('Dispositivos compatíveis', self::DOMAIN),
            'all_items' => __('Todos os dispositivos compatíveis', self::DOMAIN),
            'parent_item' => __('Parent Item', self::DOMAIN),
            'parent_item_colon' => __('Parent Item:', self::DOMAIN),
            'new_item_name' => __('Novo nome de dispositivo compatível', self::DOMAIN),
            'add_new_item' => __('Adicionar novo dispositivo compatível', self::DOMAIN),
            'edit_item' => __('Editar dispositivo compatível', self::DOMAIN),
            'update_item' => __('Alterar dispositivo compatível', self::DOMAIN),
            'view_item' => __('Visualizar dispositivo compatível', self::DOMAIN),
            'separate_items_with_commas' => __('Separe os dispositivos compatíveis com vírgulas', self::DOMAIN),
            'add_or_remove_items' => __('Adicionar ou remover dispositivos compatíveis', self::DOMAIN),
            'choose_from_most_used' => __('Escolher dos dispositivos compatíveis mais usados', self::DOMAIN),
            'popular_items' => __('Dispositivos compatíveis mais populares', self::DOMAIN),
            'search_items' => __('Buscar dispositivos compatíveis', self::DOMAIN),
            'not_found' => __('Nenhum dispositivo compatível encontrado', self::DOMAIN),
            'no_terms' => __('Sem dispositivos compatíveis', self::DOMAIN),
            'items_list' => __('Lista de dispositivos compatíveis', self::DOMAIN),
            'items_list_navigation' => __('Lista de navegação de dispositivos compatíveis', self::DOMAIN),
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
