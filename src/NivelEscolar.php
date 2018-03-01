<?php
class NivelEscolar extends Singleton
{
    const SLUG = 'nivel-escolar';
    const KEY = 'nivel_escolar';
    protected function __construct()
    {
        add_action('init', array($this, 'init'), 0);
    }
    public function init()
    {
        $labels = array(
            'name' => _x('Níveis escolares', 'Taxonomy General Name', self::DOMAIN),
            'singular_name' => _x('Nível escolar', 'Taxonomy Singular Name', self::DOMAIN),
            'menu_name' => __('Níveis escolares', self::DOMAIN),
            'all_items' => __('Todos os níveis escolares', self::DOMAIN),
            'parent_item' => __('Parent Item', self::DOMAIN),
            'parent_item_colon' => __('Parent Item:', self::DOMAIN),
            'new_item_name' => __('Novo nome de nível escolar', self::DOMAIN),
            'add_new_item' => __('Adicionar novo nível escolar', self::DOMAIN),
            'edit_item' => __('Editar nível escolar', self::DOMAIN),
            'update_item' => __('Alter nível escolar', self::DOMAIN),
            'view_item' => __('Visualizar nível escolar', self::DOMAIN),
            'separate_items_with_commas' => __('Separe os níveis escolares com vírgulas', self::DOMAIN),
            'add_or_remove_items' => __('Adicionar ou remover níveis escolares', self::DOMAIN),
            'choose_from_most_used' => __('Escolher dos níveis escolares mais usados', self::DOMAIN),
            'popular_items' => __('Níveis escolares mais populares', self::DOMAIN),
            'search_items' => __('Buscar níveis escolares', self::DOMAIN),
            'not_found' => __('Nenhum nível escolar encontrado', self::DOMAIN),
            'no_terms' => __('Nenhum nível escolar', self::DOMAIN),
            'items_list' => __('Lista de níveis escolares', self::DOMAIN),
            'items_list_navigation' => __('Lista de navegação de níveis escolares', self::DOMAIN),
            );
        $rewrite = array(
            'slug' => self::SLUG,
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
