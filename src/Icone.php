<?php
class Icone extends Singleton
{
    protected function __construct()
    {
        add_action('category_edit_form_fields', array($this, 'form'), 30);
        add_action('edit_category', array($this, 'salvar'));
        add_filter('manage_edit-category_columns', array($this, 'cabecalho'));
        add_filter('manage_category_custom_column', array($this, 'celula'), 10, 3);
    }

    private static function obterIcone($id)
    {
        $iconeId = get_term_meta($id, 'icone', true);
        return wp_get_attachment_url($iconeId);
    }

    public function form($tax)
    {
        if (empty($tax->parent))
        {
            wp_enqueue_media();
            $icone = self::obterIcone($tax->term_id); ?>
            <tr class="form-field">
                <th scope="row">
                    <label>Ícone</label>
                </th>
                <td>
                    <input class="icone" type="hidden" name="icone" value="<?php echo $icone; ?>" />
                    <img class="icone" src="<?php echo $icone; ?>" alt="" title="" style="width:33%!important;" />
                    <p><a href="#adicionar-icone" class="adicionar_icone">Adicionar ícone</a> | <a href="#remover-icone" class="remover_icone">Remover ícone</a></p>
                    <br />                                
                </td>
            </tr>
            <?php
            wp_enqueue_script('icone', plugin_dir_url(dirname(__FILE__)) . '/js/icone.js', array('jquery'), false, true); 
        }
    }

    public function salvar($tax)
    {
        if (isset($_POST['icone']) && !empty($_POST['icone']))
        {
            extract($_POST);
            update_term_meta($tax, 'icone', strip_tags($icone));
        }
    }

    public function cabecalho($defaults)
    {
        if (isset($_GET['taxonomy']) && $_GET['taxonomy'] === 'category')
        {
            $defaults['icone'] = 'Ícone';
        }
        return $defaults;
    }

    public function celula($c, $column, $term_id)
    {
        if ($column === 'icone')
        {
            $icone = self::obterIcone($term_id);
            if (!empty($icone))
            {
                echo '<img src="', $icone, '" alt="Ícone" title="Ícone" style="width:50%;"/>';
            }
        }
    }
}
