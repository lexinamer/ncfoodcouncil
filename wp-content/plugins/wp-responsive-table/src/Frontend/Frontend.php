<?php namespace ResponsiveTable\Frontend;

use Premmerce\SDK\V2\FileManager\FileManager;
use ResponsiveTable\ResponsiveTablePlugin;
/**
 * Class Frontend
 *
 * @package ResponsiveTable\Frontend
 */
class Frontend {


	/**
	 * @var FileManager
	 */
	private $fileManager;

	public function __construct( FileManager $fileManager ) {
		$this->fileManager = $fileManager;
        $this->registerActions();
	}

    public function registerActions(){
        add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'));
        add_filter('the_content', array($this, 'addContentWrapper'));
        add_filter('acf_the_content', array($this, 'addContentWrapper'));
        add_filter('wp_head', array($this, 'addSettingsStyles'));
    }

    public function enqueueScripts()
    {

        $display_style = get_theme_mod('wprt_style_display','show');

        if($display_style == 'show')
            wp_enqueue_style(
                'wprt-styles',
                $this->fileManager->locateAsset('frontend/css/wprt-styles.css'),
                array(),
                ResponsiveTablePlugin::VERSION
            );
        else
            wp_enqueue_style(
                'wprt',
                $this->fileManager->locateAsset('frontend/css/wprt-responsive-table.css'),
                array(),
                ResponsiveTablePlugin::VERSION
            );

        wp_enqueue_script(
            'wprt-script',
            $this->fileManager->locateAsset('frontend/js/wprt-script.js'),
            array('jquery'),
            ResponsiveTablePlugin::VERSION,
            true
        );


    }

    public function addContentWrapper($content)
    {

        if (get_theme_mod('wprt_row_colors', 1)) {
            $class = ' bg-even-rows';
        } else {
            $class = '';
        }

        $content = '<div class="wprt-container' . $class . '">' . $content . '</div>';

        return $content;

    }

    public function addSettingsStyles() {
        $width = get_theme_mod('wprt_width_on_large',100);
        $border = get_theme_mod('wprt_border',1);
        $vertical_padding = get_theme_mod('wprt_padding_vert',8);
        $horizontal_padding = get_theme_mod('wprt_padding_hor',8);
        $border_color = get_theme_mod('wprt_color_border','#dddddd');
        $vertical_align = get_theme_mod('wprt_vert_align','middle');
        $horizontal_align = get_theme_mod('wprt_hor_align','center');
        $display_style = get_theme_mod('wprt_style_display','show');
        $row_color = get_theme_mod('wprt_row_color_customize','#f9f9f9');

        if ($display_style == 'show') { ?>
            <style>
                @media screen and (min-width: 1200px) {
                    .table-responsive .table {
                        max-width: <?php echo $width; ?>%!important;
                    }
                }
                .wprt-container .table-bordered > thead > tr > th,
                .wprt-container .table-bordered > tbody > tr > th,
                .wprt-container .table-bordered > tfoot > tr > th,
                .wprt-container .table-bordered > thead > tr > td,
                .wprt-container .table-bordered > tbody > tr > td,
                .wprt-container .table-bordered > tfoot > tr > td {
                    border: <?php echo $border; ?>px solid <?php echo $border_color; ?>!important;
                }

                .wprt-container .table > thead > tr > th,
                .wprt-container .table > tbody > tr > th,
                .wprt-container .table > tfoot > tr > th,
                .wprt-container .table > thead > tr > td,
                .wprt-container .table > tbody > tr > td,
                .wprt-container .table > tfoot > tr > td {
                    padding-top: <?php echo $vertical_padding; ?>px!important;
                    padding-right: <?php echo $horizontal_padding; ?>px!important;
                    padding-bottom: <?php echo $vertical_padding; ?>px!important;
                    padding-left: <?php echo $horizontal_padding; ?>px!important;
                    line-height: 1.42857143;
                    vertical-align: middle;
                    text-align: <?php echo $horizontal_align; ?>;
                }
                <?php if(get_theme_mod('wprt_row_colors', 1)): ?>
                .wprt-container.bg-even-rows .table tr:nth-child(even){
                    background-color: <?php echo  $row_color; ?>!important;
                }
                .wprt-container.bg-even-rows .table tr:nth-child(odd) {
                    background: none!important;
                }
                <?php else: ?>
                .wprt-container .table tr:nth-child(even){
                    background: none!important;
                }
                .wprt-container .table tr:nth-child(odd) {
                    background: none!important;
                }
                <?php endif; ?>
            </style>
            <?php
        }

    }

}