<?php
namespace MRKWP\GlobalFooter;

class Settings
{
    protected $container;

    protected $saved_values = [];

    protected $settings;

    public function __construct($container)
    {
        $this->container = $container;
        $this->settings  = [
            'title'            => 'Divi Global Footer',
            'button_save_text' => 'Save Changes',
            'fields'           => [
                'post_id' => [
                    'type'        => 'select',
                    'id'          => 'post_id',
                    'label'       => __('Select Footer'),
                    'description' => __('To set a global footer, select a divi section from the dropdown.'),
                    'has_preview' => false,
                ],

            ],
        ];

        wp_enqueue_style('divi-global-footer-admin_style', MRKWP_GLOBAL_FOOTER_INJECTOR_URL . '/css/admin-style.css', [], '0.0.1');
    }

    /**
     * Define default field
     *
     * @return array
     */
    function default_field()
    {
        return [
            'type'                       => 'text', // text|url|select|upload
            'has_preview'                => true,
            'preview_prefix'             => 'style-',
            'preview_height'             => 182,
            'id'                         => 'field_id',
            'label'                      => __('Label'),
            'placeholder'                => '',
            'description'                => false,
            'options'                    => [
                'value' => 'label',
            ],
            'sanitize_callback'          => 'sanitize_text_field',
            'button_active_text'         => __('Change'),
            'button_inactive_text'       => __('Select'),
            'button_remove_text'         => __('Remove'),
            'media_uploader_title'       => __('Select Image'),
            'media_uploader_button_text' => __('Use This Image'),
            'default'                    => '#888888',
        ];
    }

    /**
     * Settings view page render + save
     */
    public function footerSelector()
    {
        $plugin_id = 'divi-global-footer';

        if (!empty($_POST) && isset($_POST['divi-footer-settings'])) {
            $postId = sanitize_text_field($_POST[$plugin_id . '-post_id']);
            $this->saveFooterPostId($postId);
            $is_settings_updated_message = __('Your setting has been updated.');
            $is_settings_updated         = true;
        }

        $this->saved_values['post_id']                  = $this->getFooterPostId();
        $this->settings['fields']['post_id']['options'] = [
                                                            '' => '- Select divi library item -'
                                                        ] + $this->container['divi_library']->getGlobals();
        include MRKWP_GLOBAL_FOOTER_INJECTOR_DIR . '/resources/views/settings/footer-selector.php';
    }

    /**
     * Get the Footer Post ID.
     */
    public function getFooterPostId()
    {
        return get_option(
            'divi_footer_id',
            null
        );
    }

    function get_value($key, $default = '')
    {

        if (isset($this->saved_values[$key])) {
            return $this->saved_values[$key];
        }

        return $default;
    }

    /**
     * Settings page under the Divi main menu page
     *
     * @return [type] [description]
     */
    public function main()
    {
        add_submenu_page(
            'df-hub-v2',
            __('Divi Global Footer', 'Divi'),
            __('Divi Global Footer', 'Divi'),
            'manage_options',
            'divi-footer-selector',
            [$this, 'footerSelector']
        );
    }

    /**
     * Save Post ID of the divi module.
     */
    public function saveFooterPostId($postId)
    {
        update_option('divi_footer_id', $postId);
    }
}
