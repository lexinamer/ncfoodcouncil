<?php
namespace ResponsiveTable\Admin;

use  ResponsiveTable\Admin\Customizer\CustomizeRange;
use  ResponsiveTable\Admin\Customizer\CustomizeDonate;
/**
 * Class Customizer
 *
 * @package ResponsiveTable\Admin
 */



class Customizer
{


    public function __construct()
    {

        $this->registerHooks();
    }

    public function registerHooks(){
        add_action('customize_register', array($this, 'addSection'));
        add_action('customize_register', array($this, 'addSettings'));
    }

    public function addSection($wp_customize){


        $wp_customize->add_section( 'wprt_settings' , array(
            'title'      => __('Tables Settings', 'wp-responsive-table'),
            'priority'   => 200,
        ) );

    }


    public function addSettings($wp_customize){


        $radioOptions = array('choices' => array(
            'show' => __('Use plugin styles', 'wp-responsive-table'),
            'hide' => __('Use theme styles', 'wp-responsive-table'),
        ),
            'default' => 'hide',
        );

        $this->addSetting('wprt_style_display', 'radio', 'Table Display Settings', $wp_customize, $radioOptions);


        $RangeOptions = array(
            'min' => 50,
            'max' => 100,
            'step' => 1,
            'default' => 100,
        );

        $this->addSetting('wprt_width_on_large', 'range', 'Width on large screen', $wp_customize, $RangeOptions);


        $RangeOptions = array(
            'min' => 0,
            'max' => 10,
            'step' => 1,
            'default' => 1,
        );

        $this->addSetting('wprt_border', 'range', 'Borders', $wp_customize, $RangeOptions);


        $colortOptions = array(
            'default' => '#dddddd',
        );

        $this->addSetting('wprt_color_border', 'color', 'Border color', $wp_customize, $colortOptions);

        $RangeOptions = array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
            'default' => 8,
        );

        $this->addSetting('wprt_padding_hor', 'range', 'Horizontal padding', $wp_customize, $RangeOptions);


        $RangeOptions = array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
            'default' => 8,
        );

        $this->addSetting('wprt_padding_vert', 'range', 'Vertical padding', $wp_customize, $RangeOptions);


        $selectOptions = array('choices' => array(
            'left' => __('Align left', 'wp-responsive-table'),
            'center' => __('Align center', 'wp-responsive-table'),
            'right' => __('Align right', 'wp-responsive-table'),
        ),
            'default' => 'center',
        );

        $this->addSetting('wprt_hor_align', 'select', 'Horizontal align', $wp_customize, $selectOptions);

//        $selectOptions = array('choices' => array(
//            'top' => __('Align top', 'wp-responsive-table'),
//            'middle' => __('Align center', 'wp-responsive-table'),
//            'bottom' => __('Align bottom', 'wp-responsive-table'),
//        ),
//            'default' => 'middle',
//        );
//
//        $this->addSetting('wprt_vert_align', 'select', 'Vertical align', $wp_customize, $selectOptions);


        $checkboxOptions = array(
            'default' => 1
        );

        $this->addSetting('wprt_row_colors', 'checkbox', 'Alternating Row Colors', $wp_customize, $checkboxOptions);

        $colortOptions = array(
            'default' => '#f9f9f9',
        );

        $this->addSetting('wprt_row_color_customize', 'color', 'Row color', $wp_customize, $colortOptions);

        $wp_customize->add_setting('wprt_donate', array(

        ));


        $wp_customize->add_control(new CustomizeDonate($wp_customize, 'wprt_donate', array(
            'label' => __('Donate to this plugin', 'wp-responsive-table'),
            'section' => 'wprt_settings',
            'settings' => 'wprt_donate',
        )));

    }


    private function addSetting($name, $type, $label, $wp_customize, $args = array())
    {

        $default = array(
            'default' => '',
            'description' => ''
        );
        $args = array_merge($default, $args);

        switch ($type) {
            case 'text':
            case 'checkbox':
                $wp_customize->add_setting($name, array(
                    'default' => $args['default']
                ));
                $wp_customize->selective_refresh->add_partial($name, array(
                    'selector' => '.' . $name
                ));
                $wp_customize->add_control($name, array(
                        'label' => __($label, 'wp-responsive-table'),
                        'section' => 'wprt_settings',
                        'type' => $type,
                    )
                );
                break;

            case 'select':
                $wp_customize->add_setting($name, array(
                    'capability' => 'edit_theme_options',
                    'default' => $args['default'],
                ));

                $wp_customize->add_control($name, array(
                    'type' => 'select',
                    'section' => 'wprt_settings',
                    'label' => __($label, 'wp-question-answer'),
                    'description' => __($args['description'], 'wp-responsive-table'),
                    'choices' => $args['choices'],
                ));
                break;

            case 'radio':
                $wp_customize->add_setting($name, array(
                    'capability' => 'edit_theme_options',
                    'default' => $args['default'],
                ));
                $wp_customize->selective_refresh->add_partial($name, array(
                    'selector' => '.'.$name
                ));

                $wp_customize->add_control($name, array(
                    'type' => 'radio',
                    'section' => 'wprt_settings',
                    'label' => __($label, 'wp-question-answer'),
                    'description' => __($args['description'], 'wp-responsive-table'),
                    'choices' => $args['choices'],
                ));
                break;

            case 'range':
                $wp_customize->add_setting($name, array(
                    'default' => $args['default']
                ));
                $wp_customize->selective_refresh->add_partial($name, array(
                    'selector' => '.'.$name
                ));

                $wp_customize->add_control(new CustomizeRange($wp_customize, $name, array(
                    'label' => __($label, 'wp-responsive-table'),
                    'min' => $args['min'],
                    'max' => $args['max'],
                    'step' => $args['step'],
                    'section' => 'wprt_settings',
                )));

                break;

            case 'color':
                $wp_customize->add_setting($name, array(
                    'default' => $args['default']
                ));
                $wp_customize->selective_refresh->add_partial($name, array(
                    'selector' => '.'.$name
                ));

                $wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, $name, array(
                    'label' => __($label, 'wp-responsive-table'),
                    'section' => 'wprt_settings',
                    'settings' => $name,
                )));


                break;
        }

    }







}