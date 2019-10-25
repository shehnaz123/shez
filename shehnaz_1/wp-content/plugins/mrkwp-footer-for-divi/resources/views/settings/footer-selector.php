<div id="wrapper" class=''>
                <div id="panel-wrap">
                    <?php if (isset($is_settings_updated) && $is_settings_updated) { ?>
                        <div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible <?php echo $is_settings_updated_success ? '' : 'error' ?>" style="margin: 0 0 25px 0;">
                            <p>
                                <strong><?php echo esc_html($is_settings_updated_message); ?></strong>
                            </p>
                            <button type="button" class="notice-dismiss">
                                <span class="screen-reader-text"><?php _e('Dismiss this notice.'); ?></span>
                            </button>
                        </div>
                    <?php } ?>

                  <form action="" method="POST">
                       <input type="hidden" name='divi-footer-settings' value='true'>
                        <div id="epanel-wrapper">
                            <div id="epanel">
                                <div id="epanel-content-wrap">
                                    <div id="epanel-content">
                                        <div id="epanel-header">
                                            <?php if ($this->settings['title']) { ?>
                                                <h1 id="epanel-title"><?php echo esc_html($this->settings['title']); ?></h1>
                                            <?php } ?>
                                        </div><!-- #wrap-general.content-div -->
                                        <div id="wrap-general" class="content-div">
                                            <ul class="idTabs">
                                                <li class="ui-tabs-active">
                                                    <a href="#general-1"><?php _e('General'); ?></a>
                                                </li>
                                            </ul><!-- .idTabs -->
                                            <div id="general-1" class="tab-content">
                                                <?php
                                                if (! empty($this->settings['fields'])) {
                                                    // Loop fields
                                                    foreach ($this->settings['fields'] as $field) {
                                                        $field    = wp_parse_args($field, $this->default_field());
                                                        $value_id = $field['id'];
                                                        $field_id = "{$plugin_id}-{$value_id}";
                                                        ?>

                                                        <div class="epanel-box" data-type="<?php echo esc_attr($field['type']); ?>">
                                                            <div class="box-title">
                                                                <?php
                                                                if ($field['label']) {
                                                                    printf(
                                                                        '<h3>%1$s</h3>',
                                                                        esc_attr($field['label'])
                                                                    );
                                                                }

                                                                if ($field['description' ]) {
                                                                    printf(
                                                                        '<div class="box-descr"><p>%1$s</p></div><!-- .box-descr -->',
                                                                        esc_attr($field['description'])
                                                                    );
                                                                }
                                                                ?>
                                                                </div><!-- .box-title -->
                                                                <div class="box-content">
                                                                <?php
                                                                    // Display field based on its type
                                                                switch ($field['type']) {
                                                                    // Upload
                                                                case 'upload':
                                                                    printf(
                                                                        '<input name="%1$s" id="%1$s" class="input-src" type="hidden" value="%2$s">',
                                                                        esc_attr($field_id),
                                                                        esc_attr($this->get_value($value_id))
                                                                    );

                                                                    printf(
                                                                        '<input name="%1$s-id" id="%1$s-id" class="input-id" type="hidden" value="%2$s">',
                                                                        esc_attr($field_id),
                                                                        esc_attr($this->get_value($value_id . '-id'))
                                                                    );

                                                                    printf(
                                                                        '<p>
                                                                                        <button id="%1$s-button-upload" class="button button-upload" data-button-active-text="%2$s" data-button-inactive-text="%3$s" data-media-uploader-title="%5$s" data-media-uploader-button-text="%6$s" style="margin: 0;">%2$s</button>
                                                                                        <a href="#" id="%1$s-button-remove" class="button-remove" style="margin-left: 20px; display: none; height: 40px; line-height: 40px; color: #C1C1C1;">%4$s</a>
                                                                                    </p>',
                                                                        esc_attr($field_id),
                                                                        esc_attr($field['button_active_text']),
                                                                        esc_attr($field['button_inactive_text']),
                                                                        esc_html($field['button_remove_text']),
                                                                        esc_attr($field['media_uploader_title']),
                                                                        esc_attr($field['media_uploader_button_text'])
                                                                    );

                                                                    // Print preview
                                                                    $has_preview = ( $this->get_value($value_id, false) && $this->get_value($value_id, false) );

                                                                    $preview_image = $has_preview ? sprintf(
                                                                        '<img src="%1$s" style="%2$s" />',
                                                                        esc_attr($this->get_value($value_id)),
                                                                        esc_attr('max-width: 100%;')
                                                                    ) : '';

                                                                    printf(
                                                                        '<div class="option-preview" id="%1$s-preview" style="%2$s">%3$s</div>',
                                                                        esc_attr($field_id),
                                                                        esc_attr('width: 100%; margin-top: 20px;'),
                                                                        $preview_image
                                                                    );
                                                                    break;

                                                                    // Select
                                                                case 'select':
                                                                    printf(
                                                                        '<select name="%1$s" id="%1$s" data-preview-prefix="%2$s" data-preview-height="%3$s">',
                                                                        esc_attr($field_id),
                                                                        esc_attr($field['preview_prefix']),
                                                                        esc_attr($field['preview_height'])
                                                                    );

                                                                    if (is_array($field['options']) && ! empty($field['options'])) {
                                                                        foreach ($field['options'] as $option_value => $option_label) {
                                                                            printf(
                                                                                '<option value="%1$s" %3$s>%2$s</option>',
                                                                                esc_attr($option_value),
                                                                                esc_attr($option_label),
                                                                                "{$option_value}" === $this->get_value($value_id) ? 'selected="selected"' : ''
                                                                            );
                                                                        }
                                                                    }

                                                                    echo '</select>';

                                                                    // Print preview
                                                                    if ($field['has_preview']) {
                                                                        $has_preview   = $this->get_value($value_id, false);
                                                                        $preview_style = $has_preview ? sprintf(' min-height: %1$dpx', $field['preview_height']) : '';
                                                                        $preview_url   = $has_preview ? $this->settings['preview_dir_url'] . $field['preview_prefix'] . $this->get_value($value_id) . '.gif' : '';
                                                                        $preview_image = $has_preview ? sprintf(
                                                                            '<img src="%1$s" />',
                                                                            esc_url($preview_url)
                                                                        ) : '';

                                                                        printf(
                                                                            '<div class="option-preview" style="margin-top: 20px;%1$s">%2$s</div><!-- .option-preview -->',
                                                                            esc_attr($preview_style),
                                                                            $preview_image
                                                                        );
                                                                    }

                                                                    break;

                                                                    // Toggle
                                                                case 'toggle':
                                                                    printf(
                                                                        '<select name="%1$s" id="%1$s" data-preview-prefix="%2$s" data-preview-height="%3$s" class="et-pb-toggle-select">',
                                                                        esc_attr($field_id),
                                                                        esc_attr($field['preview_prefix']),
                                                                        esc_attr($field['preview_height'])
                                                                    );

                                                                    $toggle_options = array( 'off', 'on' );

                                                                    $selected_value = et_divi_100_sanitize_toggle($this->get_value($value_id));

                                                                    foreach ($toggle_options as $option_value) {
                                                                        printf(
                                                                            '<option value="%1$s" %2$s>%1$s</option>',
                                                                            esc_attr($option_value),
                                                                            "{$option_value}" === $selected_value ? 'selected="selected"' : ''
                                                                        );
                                                                    }

                                                                    echo '</select>';

                                                                    echo sprintf(
                                                                        '<div class="et_pb_yes_no_button et_pb_%1$s_state" style="max-width: 195px;">
                                                                                        <span class="et_pb_value_text et_pb_on_value">%2$s</span>
                                                                                        <span class="et_pb_button_slider"></span>
                                                                                        <span class="et_pb_value_text et_pb_off_value">%3$s</span>
                                                                                    </div>',
                                                                        esc_attr($selected_value),
                                                                        esc_html__('Enable'),
                                                                        esc_html__('Disable')
                                                                    );

                                                                    echo '</select>';

                                                                    break;

                                                                case 'color':
                                                                    printf(
                                                                        '<button class="reset-color" data-for="%1$s">%2$s</button>',
                                                                        esc_attr($field_id),
                                                                        esc_html__('Reset Color')
                                                                    );

                                                                    printf(
                                                                        '<input type="text" id="%1$s" name="%1$s" placeholder="%2$s" value="%3$s" class="regular-text colorpicker" data-default="%4$s" />',
                                                                        esc_attr($field_id),
                                                                        esc_attr($field['placeholder']),
                                                                        esc_attr($this->get_value($value_id)),
                                                                        esc_attr($field['default'])
                                                                    );

                                                                    break;

                                                                    // URL
                                                                case 'url':
                                                                    printf(
                                                                        '<input type="text" id="%1$s" name="%1$s" placeholder="%2$s" value="%3$s" />',
                                                                        esc_attr($field_id),
                                                                        esc_attr($field['placeholder']),
                                                                        esc_attr($this->get_value($value_id))
                                                                    );
                                                                    break;

                                                                    // Text
                                                                default:
                                                                    printf(
                                                                        '<input type="text" id="%1$s" name="%1$s" placeholder="%2$s" value="%3$s" />',
                                                                        esc_attr($field_id),
                                                                        esc_attr($field['placeholder']),
                                                                        esc_attr($this->get_value($value_id))
                                                                    );
                                                                    break;
                                                                }
                                                                ?>
                                                                </div><!-- .box-content -->
                                                            </div><!-- .epanel-box -->
                                                            <?php
                                                    }
                                                }
                                                ?>
                                            </div> <!-- #general-1.tab-content -->

                                        </div><!-- #epanel-header -->
                                    </div><!-- #epanel-content -->
                                </div><!-- #epanel-content-wrap -->
                            </div><!-- #epanel -->
                        </div><!-- #epanel-wrapper -->

                        <div id="epanel-bottom">
                            <?php
                                // Print nonce
                                // wp_nonce_field($nonce, $nonce);

                                // Print submit button
                                printf(
                                    '<button class="save-button" name="save" id="epanel-save">%s</button>',
                                    esc_attr($this->settings['button_save_text'])
                                );
                                ?>
                        </div><!-- #epanel-bottom -->
                    </form>

                </div><!-- #panel-wrap -->
</div>
