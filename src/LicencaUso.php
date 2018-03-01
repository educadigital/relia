<?php
class LicencaUso extends Singleton
{
    const SLUG = 'licenca-de-uso';
    const KEY = 'licenca_uso';
    protected function __construct()
    {
        add_action('init', array($this, 'init'), 0);
    }
    public function init()
    {
        $labels = array(
            'name' => _x('Licenças de uso', 'Taxonomy General Name', self::DOMAIN),
            'singular_name' => _x('Licença de uso', 'Taxonomy Singular Name', self::DOMAIN),
            'menu_name' => __('Licenças de uso', self::DOMAIN),
            'all_items' => __('Todas as licenças de uso', self::DOMAIN),
            'parent_item' => __('Parent Item', self::DOMAIN),
            'parent_item_colon' => __('Parent Item:', self::DOMAIN),
            'new_item_name' => __('Novo nome de licença de uso', self::DOMAIN),
            'add_new_item' => __('Adicionar nova licença de uso', self::DOMAIN),
            'edit_item' => __('Editar licença de uso', self::DOMAIN),
            'update_item' => __('Alterar licença de uso', self::DOMAIN),
            'view_item' => __('Visualizar licença de uso', self::DOMAIN),
            'separate_items_with_commas' => __('Separe as licenças de uso com vírgulas', self::DOMAIN),
            'add_or_remove_items' => __('Adicionar ou remover licenças de uso', self::DOMAIN),
            'choose_from_most_used' => __('Escolher das licenças de uso mais usadas', self::DOMAIN),
            'popular_items' => __('Licenças de uso mais populares', self::DOMAIN),
            'search_items' => __('Buscar licenças de uso', self::DOMAIN),
            'not_found' => __('Nenhuma licença de uso encontrada', self::DOMAIN),
            'no_terms' => __('Sem licenças de uso', self::DOMAIN),
            'items_list' => __('Lista de licenças de uso', self::DOMAIN),
            'items_list_navigation' => __('Lista de navegação de licenças de uso', self::DOMAIN),
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
