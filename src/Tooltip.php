<?php 
class Tooltip extends Singleton
{
    protected function __construct()
    {
        add_action('admin_menu', array($this, 'menu'), 1);
    }
    public function menu()
    {
        add_menu_page('Tooltips', 'Tooltips', 'manage_options', 'tooltips', array($this,
                'menuPage'), '', 25);
    }
    public function menuPage()
    {
        echo '<h3>Tooltips</h3>';
        if ($_POST)
        {
            foreach ($_POST as $k => $v)
            {
                $_POST[$k] = strip_tags($v);
                if (!empty($v) && $k !== 'submit')
                {
                    update_option('tooltip_tax_' . $k, stripslashes($v));
                }
                else
                {
                    update_option('tooltip_tax_' . $k, 'Não informado');
                }
            }
            echo '<div id="message" class="notice notice-success is-dismissible"><p>Tooltips atulizados com sucesso.</p></div>';
        }

        $args = array('public' => true);
        $taxonomies = get_taxonomies($args, 'objects', 'and');
        $gerarTr = function($label, $k, $v)
        {
            ?>
            <tr>
                <td style="text-align: right;"><strong><?php echo $label; ?>:</strong></td>
                <td><textarea cols="60" name="<?php echo $k; ?>"><?php echo $v; ?></textarea></td>
            </tr>
            <?php
        };
        if ($taxonomies)
        {
            ?>
            <form method="post" action="">
                <table>
                    <?php
                    foreach ($taxonomies as $taxonomy)
                    {
                        if ($taxonomy->rewrite['slug'] !== 'tag' && $taxonomy->rewrite['slug'] != 'type')
                        {
                            $name = $taxonomy->name;
                            $gerarTr($taxonomy->labels->name, $name, get_option('tooltip_tax_' . $name));
                        }
                    }
                    $gerarTr('Redes sociais', 'redes_sociais', get_option('tooltip_tax_redes_sociais'));
                    $gerarTr('Origem', 'origem', get_option('tooltip_tax_origem'));
                    ?>
                </table>
                <?php submit_button(); ?>
            </form>
            <?php
        }
    }
}
