<?php namespace Affinity4API;

/**
 * Create Quicktags for the HTML editor
 */
class QuickTag
{
    public $qtags = [
            'heading_1' => [
                'display'       => 'h1',
                'opening_tag'   => '<h1>',
                'closing_tag'   => '</h1>',
                'access_key'    => '',
                'title'         => 'Heading 1',
                'priority'      => 201,
                'instance'      => ''
            ],
            'heading_2' => [
                'display'       => 'h2',
                'opening_tag'   => '<h2>',
                'closing_tag'   => '</h2>',
                'access_key'    => '',
                'title'         => 'Heading 2',
                'priority'      => 202,
                'instance'      => ''
            ],
            'heading_3' => [
                'display'       => 'h3',
                'opening_tag'   => '<h3>',
                'closing_tag'   => '</h3>',
                'access_key'    => '',
                'title'         => 'Heading 3',
                'priority'      => 203,
                'instance'      => ''
            ],
        ];

    function __construct()
    {
        add_action( 'admin_print_footer_scripts', array($this, 'make'));
    }

    /**
     * Make a quicktag
     *
     * @param  string $id           The html id for the button.
     * @param  string $display      The html value for the button.
     * @param  string $opening_tag  Either a starting tag to be inserted like "<span>" or a callback that is executed when the button is clicked.
     * @param  string $closing_tag  Ending tag like "</span>". Leave empty if tag doesn't need to be closed (i.e. "<hr />").
     * @param  string $access_key   Shortcut access key for the button.
     * @param  string $title        The html title value for the button.
     * @param  int    $priority     A number representing the desired position of the button in the toolbar. 1 - 9 = first, 11 - 19 = second, 21 - 29 = third, etc.
     * @param  string $instance     Limit the button to a specific instance of Quicktags, add to all instances if not present.
     * @return mixed                Null or the button object that is needed for back-compat.
     */
    public function make()
    {

        if (wp_script_is('quicktags')){
?>

<script type="text/javascript">
<?php
foreach ($this->qtags as $k => $v) {
    echo 'QTags.addButton("' . $k . '", "' . $v['display'] . '", "' . $v['opening_tag'] . '", "' . $v['closing_tag'] . '", "' . $v['access_key'] . '", "' . $v['title'] . '", ' . $v['priority'] . ', "' . $v['instance'] . '");' . PHP_EOL;
}
?>
</script>

<?php
        }
    }
}

new QuickTag;
