<?php
class Disciplina extends Singleton
{
    const SLUG = 'disciplina';
    const KEY = 'disciplina';
    protected function __construct()
    {
        add_action('init', array($this, 'init'), 0);
    }
    public function init()
    {
        $labels = array(
            'name' => _x('Disciplinas', 'Taxonomy General Name', self::DOMAIN),
            'singular_name' => _x('Disciplina', 'Taxonomy Singular Name', self::DOMAIN),
            'menu_name' => __('Disciplinas', self::DOMAIN),
            'all_items' => __('Todas as disciplinas', self::DOMAIN),
            'parent_item' => __('Parent Item', self::DOMAIN),
            'parent_item_colon' => __('Parent Item:', self::DOMAIN),
            'new_item_name' => __('Novo nome de disciplina', self::DOMAIN),
            'add_new_item' => __('Adicionar nova disciplina', self::DOMAIN),
            'edit_item' => __('Editar disciplina', self::DOMAIN),
            'update_item' => __('Alterar disciplina', self::DOMAIN),
            'view_item' => __('Visualizar disciplina', self::DOMAIN),
            'separate_items_with_commas' => __('Separe as disciplinas com vírgulas', self::DOMAIN),
            'add_or_remove_items' => __('Adicionar ou remover disciplinas', self::DOMAIN),
            'choose_from_most_used' => __('Escolher das disciplinas mais usadas', self::DOMAIN),
            'popular_items' => __('Disciplinas mais populares', self::DOMAIN),
            'search_items' => __('Buscar disciplinas', self::DOMAIN),
            'not_found' => __('Nenhuma disciplina encontrada', self::DOMAIN),
            'no_terms' => __('Sem disciplinas', self::DOMAIN),
            'items_list' => __('Lista de disciplinas', self::DOMAIN),
            'items_list_navigation' => __('Lista de navegação de disciplinas', self::DOMAIN),
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
