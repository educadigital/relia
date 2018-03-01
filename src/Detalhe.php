<?php 
class Detalhe extends Singleton
{
    private static $campos = array(
        '_link' => array(
            'type' => 'url',
            'label' => 'Link',
            'required' => 1,
            ),
        '_origem' => array(
            'type' => 'text',
            'label' => 'Origem',
            'required' => 0,
            ),
        '_facebook' => array(
            'type' => 'url',
            'label' => 'Facebook',
            'required' => 0,
            ),
        '_twitter' => array(
            'type' => 'url',
            'label' => 'Twitter',
            'required' => 0,
            ),
        );
    protected function __construct()
    {
        add_action('admin_init', array($this, 'init'));
        add_action('save_post', array($this, 'save'));
    }

    public function init()
    {
        add_meta_box('detalhes_relia', 'Detalhes do recurso', array($this, 'metabox'),
            'post', 'advanced', 'low');
    }

    public function metabox()
    {
        global $post;

        $meta = get_post_meta($post->ID);

        foreach (self::$campos as $k => $d)
        {
            echo '<fieldset><legend>', $d['label'], ':</legend>';
            echo '<input id="', $k, '" name="', $k, '" type="', $d['type'], '" class="widefat" value="', ((isset($meta[$k][0])) ?
                $meta[$k][0] : ''), '" ', ((!empty($d['required'])) ? 'required="required"' : ''),
                '/>';
            echo '</fieldset><br/>';
        }
        wp_enqueue_script('detalhe', plugin_dir_url(dirname(__FILE__)) . '/js/detalhe.js', array('jquery'), false, true);
    }

    public function save()
    {
        global $post, $typenow;
        if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') &&
            DOING_AJAX))
        {
            return false;
        }
        if ($_POST && $typenow === 'post')
        {
            foreach(self::$campos as $k => $v)
            {
                if(isset($_POST[$k]))
                {
                    $temp = strip_tags(trim($_POST[$k]));
                    if(!empty($temp))
                    {
                        update_post_meta($post->ID, $k, $temp);
                    }
                }
            }
        }
    }
}
