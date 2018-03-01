<?php 
class Taxonomia extends Singleton
{
    protected function __construct()
    {
        add_action('edit_form_advanced', array($this, 'validacoes'), 0);
        add_action('restrict_manage_posts', array($this, 'validacoes'), 0);
    }

    public function validacoes()
    {
        global $typenow;
        if ($typenow === 'post')
        {
            wp_enqueue_script('taxonomia', plugin_dir_url(dirname(__file__)) . 'js/taxonomia.js', array('jquery'), false, true);
        }

    }
}
