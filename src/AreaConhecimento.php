<?php 
class AreaConhecimento extends Singleton
{
    const SLUG = 'area-de-conhecimento';
    const KEY = 'area_conhecimento';
    protected function __construct()
    {
        add_action('init', array($this, 'init'), 0);
    }
    public function init()
    {
        $labels = array(
            'name' => _x('Áreas de conhecimento', 'Taxonomy General Name', self::DOMAIN),
            'singular_name' => _x('Área de conhecimento', 'Taxonomy Singular Name', self::DOMAIN),
            'menu_name' => __('Áreas de conhecimento', self::DOMAIN),
            'all_items' => __('Todas as áreas de conhecimento', self::DOMAIN),
            'parent_item' => __('Parent Item', self::DOMAIN),
            'parent_item_colon' => __('Parent Item:', self::DOMAIN),
            'new_item_name' => __('Novo nome de área de conhecimento', self::DOMAIN),
            'add_new_item' => __('Adicionar nova área de conhecimento', self::DOMAIN),
            'edit_item' => __('Editar área de conhecimento', self::DOMAIN),
            'update_item' => __('Alterar área de conhecimento', self::DOMAIN),
            'view_item' => __('Visualizar área de conhecimento', self::DOMAIN),
            'separate_items_with_commas' => __('Separe as áreas de conhecimento com vírgulas', self::DOMAIN),
            'add_or_remove_items' => __('Adicionar ou remover áreas de conhecimento', self::DOMAIN),
            'choose_from_most_used' => __('Escolher das áreas de conhecimento mais usadas', self::DOMAIN),
            'popular_items' => __('Áreas de conhecimento mais populares', self::DOMAIN),
            'search_items' => __('Buscar áreas de conhecimento', self::DOMAIN),
            'not_found' => __('Nenhuma área de conhecimento encontrada', self::DOMAIN),
            'no_terms' => __('Sem áreas de conhecimento', self::DOMAIN),
            'items_list' => __('Lista de áreas de conhecimento', self::DOMAIN),
            'items_list_navigation' => __('Lista de navegação de áreas de conhecimento', self::DOMAIN),
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
