<?php
/*
  Plugin Name: Social Flyer
  Plugin URI:http://wptowncenter.com
  Description: Social Flyer is a WordPress Social Follow Plugin which is Facny in Design and Get Visitor attention by fly in to the center of the site.
  Version: 1.0.1
  License: GPLv2
  Author: wptowncenter
  Author URI:http://wptowncenter.com
 */

class SocialFlyer {

    function __construct() {
        add_action('wp_head', array($this, 'process'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_req_script'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_req_script'));

        add_action('admin_init', array($this, 'register_sf_options'));
        add_action('admin_menu', array($this, 'display_admin_menu'));
        register_activation_hook(__FILE__, array($this, 'sf_default_options'));


        add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
        add_action('wp_ajax_sf_social_stat', array($this, 'count_social_clicks'));
        add_action('wp_ajax_nopriv_sf_social_stat', array($this, 'count_social_clicks'));
    }

    function process() {
        if ("all" == get_option('sf_display_page')) {
            if ('yes' == get_option('sf_enable_member')) {
                if (is_user_logged_in()) {
                    require_once('inc/flyerprocess.php');
                }
            }
            if ('yes' == get_option('sf_enable_guest')) {
                if (!is_user_logged_in()) {
                    require_once('inc/flyerprocess.php');
                }
            }
        } elseif ("home" == get_option('sf_display_page')) {
            if (is_home() || is_front_page()) {
                if ('yes' == get_option('sf_enable_member')) {
                    if (is_user_logged_in()) {
                        require_once('inc/flyerprocess.php');
                    }
                }
                if ('yes' == get_option('sf_enable_guest')) {
                    if (!is_user_logged_in()) {
                        require_once('inc/flyerprocess.php');
                    }
                }
            }
        } else {
            $page_ids = get_option('sf_page_id');
            $post_ids = get_option('sf_post_id');
            $ex_page_id = explode("&", $page_ids);
            $ex_post_id = explode("&", $post_ids);
            if (is_page($ex_page_id)) {
                if ('yes' == get_option('sf_enable_member')) {
                    if (is_user_logged_in()) {
                        require_once('inc/flyerprocess.php');
                    }
                }
                if ('yes' == get_option('sf_enable_guest')) {
                    if (!is_user_logged_in()) {
                        require_once('inc/flyerprocess.php');
                    }
                }
            }
            if (is_single($ex_post_id)) {
                if ('yes' == get_option('sf_enable_member')) {
                    if (is_user_logged_in()) {
                        require_once('inc/flyerprocess.php');
                    }
                }
                if ('yes' == get_option('sf_enable_guest')) {
                    if (!is_user_logged_in()) {
                        require_once('inc/flyerprocess.php');
                    }
                }
            }
        }
    }

    function display_admin_menu() {
        add_options_page('Social Follow Flyer', 'Social Follow Flyer', 'manage_options', 'followshape', array($this, 'add_admin_menu'));
    }

    function enqueue_req_script() {
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-effects-core');
        wp_register_style('icons_font', plugins_url('/css/font-awesome.min.css', __FILE__));
        wp_enqueue_style('icons_font');
        wp_enqueue_script('tipsy', plugins_url('/js/jquery.tipsy.js', __FILE__), array('jquery'));
        wp_enqueue_style('tipsy-css', plugins_url('/css/tipsy.css', __FILE__));
    }

    function add_admin_menu() {
        require_once 'inc/adminui.php';
    }

    function register_sf_options() {
        register_setting('sf_general', 'sf_appear_percent');
        register_setting('sf_general', 'sf_fly_from');
        register_setting('sf_general', 'sf_enable_member');
        register_setting('sf_general', 'sf_enable_guest');
        register_setting('sf_general', 'sf_close_duration');
        register_setting('shapetype', 'sf_display_page');
        register_setting('shapetype', 'sf_page_id');
        register_setting('shapetype', 'sf_post_id');
        register_setting('shapetype', 'selectshape');
        register_setting('shapetype', 'sf_cent_bg_img_en');
        register_setting('shapetype', 'sf_main_text_en');
        register_setting('shapetype', 'sf_main_text');
        register_setting('shapetype', 'sf_main_font_color');
        register_setting('shapetype', 'sf_main_font_size');
        register_setting('shapetype', 'sh_color');
        register_setting('shapetype', 'sf_cent_bg_img');
        register_setting('shapetype', 'sh_aftereffects');
        register_setting('shapetype', 'sf_size');
        for ($i = 1; $i <= 8; $i++) {
            register_setting('socialuname', 'sfsocial_net' . $i);
            register_setting('socialuname', 'sfsocial_net_show' . $i);
        }
        for ($i = 1; $i <= 8; $i++) {
            register_setting('shapetype', 'sfsocial_each_color' . $i);
            register_setting('shapetype', 'sf_social_font_color' . $i);
            register_setting('shapetype', 'sf_social_font_size' . $i);
            register_setting('shapetype', 'sfsocial_each_img_en' . $i);
            register_setting('shapetype', 'sfsocial_each_img' . $i);
            register_setting('shapetype', 'sf_content_type' . $i);
            register_setting('shapetype', 'sfsocial_lable' . $i);
            register_setting('shapetype', 'sf_scoial_icon_fa' . $i);
            register_setting('shapetype', 'sf_social_icon_color' . $i);
            register_setting('shapetype', 'sf_social_icon_size' . $i);
            register_setting('shapetype', 'sf_enable_border_hover' . $i);
            register_setting('shapetype', 'sf_enable_ttip_hover' . $i);
            register_setting('shapetype', 'sf_enable_ttip_msg' . $i);
            register_setting('shapetype', 'sf_each_color_hvr' . $i);

            register_setting('sf_stats', 'sf_' . $i . '_click_count');
        }
        register_setting('shapetype', 'sf_close_position');
        register_setting('shapetype', 'sf_redirection_en');

        register_setting('stat', 'facebookun');

        register_setting('sf_animation', 'sf_easing_type');
        register_setting('sf_animation', 'sf_animation_time');
    }

    function sf_default_options() {
        add_option('sf_enable_member', 'yes');
        add_option('sf_enable_guest', 'yes');
        add_option('sf_appear_percent', '85');
        add_option('sf_fly_from', 'rb');
        add_option('sf_close_duration', '7');

        add_option('sf_display_page', 'all');
        add_option('selectshape', '1');
        add_option('sf_main_text_en', 'yes');
        add_option('sf_main_text', 'Follow Me');
        add_option('sf_main_font_color', '#ffffff');
        add_option('sf_main_font_size', '20');
        add_option('sf_size', '25');
        add_option('sh_color', '#3fc388');
        $network_names = array('1' => 'Facebook', '2' => 'Twitter', '3' => 'Google +', '4' => 'Tumblr', '5' => 'Instagram', '6' => 'Pinterest', '7' => 'Github', '8' => 'Flickr');
        $network_icons = array('1' => 'facebook', '2' => 'twitter', '3' => 'google-plus', '4' => 'tumblr', '5' => 'instagram', '6' => 'pinterest', '7' => 'github', '8' => 'flickr');
        $network_color = array('1' => '#3b5998', '2' => '#55acee', '3' => '#dd4b39', '4' => '#35465c', '5' => '#3f729b', '6' => '#cc2127', '7' => '#ff9933', '8' => '#ff0084');
        for ($i = 1; $i <= 8; $i++) {
            add_option('sfsocial_each_color' . $i, $network_color[$i]);
            add_option('sf_social_font_color' . $i, '#ffffff');
            add_option('sf_social_font_size' . $i, "12");
            add_option('sf_content_type' . $i, 'icon');
            add_option('sfsocial_lable' . $i, $network_names[$i]);
            add_option('sf_scoial_icon_fa' . $i, $network_icons[$i]);
            add_option('sf_social_icon_color' . $i, '#ffffff');
            add_option('sf_social_icon_size' . $i, '24');
            add_option('sf_enable_border_hover' . $i, 'yes');
            add_option('sf_enable_ttip_hover' . $i, 'yes');
            add_option('sf_enable_ttip_msg' . $i, '[sf_click] Click Through');
            add_option('sf_each_color_hvr' . $i, $network_color[$i]);

            //social settings
            add_option('sfsocial_net_show' . $i, '1');
        }
        add_option('sf_close_position', 'tr');
        add_option('sf_redirection_en', 'yes');

        //animation
        add_option('sf_easing_type', 'easeOutQuad');
        add_option('sf_animation_time', '1');
    }

    function admin_scripts() {
        wp_register_style('jquery-ui-my', plugins_url('css/jquery-ui-my.css', __FILE__));
        wp_enqueue_style('jquery-ui-my');
        wp_enqueue_script('jquery-effects-core');

        if (function_exists('wp_enqueue_media')) {
            wp_enqueue_media();
        } else {
            wp_enqueue_style('thickbox');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
        }
        wp_enqueue_script('jplotjs', plugins_url('/js/jquery.jqplot.min.js', __FILE__), array('jquery'));
        wp_enqueue_script('jplotbarjs', plugins_url('/js/jqplot.barRenderer.min.js', __FILE__), array('jplotjs'));
        wp_enqueue_script('jplotcatjs', plugins_url('/js/jqplot.categoryAxisRenderer.min.js', __FILE__), array('jplotjs'));
        wp_enqueue_style('jplotcss', plugins_url('/css/jquery.jqplot.min.css', __FILE__));
        wp_enqueue_script('jplotpointjs', plugins_url('/js/jqplot.pointLabels.min.js', __FILE__), array('jplotjs'));

        //colorpicker
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker-script-handle', plugins_url('js/colorpicker.js', __FILE__), array('wp-color-picker'), false, true);
    }

    function common_js_css() {
        $size = get_option('sf_size') * 2;
        $w = $size + 120;
        $h = $size + 120;
        $r = $w / 2;
        ?>
        <!-- Script -->

        <script type="text/javascript">
            jQuery(document).ready(function($)
            {
                var wwidth = jQuery(window).width();
                var wheight = jQuery(window).height();
                var wwidthhalf = (wwidth/2);
                var wheighthalf=(wheight/2);
                var top_bottom_center = wheighthalf-(jQuery("#circlebot").height()/2); // derived from height
                var left_right_center = wwidthhalf-(jQuery("#circlebot").width()/2); // derived from width
                var top_bottom_exact = wheighthalf*2;
                var left_right_exact = wwidthhalf*2;
                console.log("<?php echo $w + (($w * 70) / 100); ?>,<?php echo $w * 2; ?>");
                var sf_document_percent = (jQuery(document).height()*<?php echo get_option("sf_appear_percent"); ?>)/100;
                var easing_effect = "<?php echo get_option('sf_easing_type'); ?>";
                var animation_time = <?php echo get_option('sf_animation_time') * 1000; ?>;
                console.log(animation_time);
        <?php
        if ("tc" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").css({"top": -top_bottom_exact,"left":left_right_center});';
        } else if ("tr" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").css({"top": -top_bottom_exact,"right":-left_right_exact});';
        } else if ("rc" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").css({"right": -left_right_exact,"top":top_bottom_center});';
        } else if ("rb" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").css({"right": -left_right_exact,"bottom":-top_bottom_exact});';
        } else if ("bc" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").css({"bottom": -top_bottom_exact,"left":left_right_center});';
        } else if ("bl" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").css({"bottom": -top_bottom_exact,"left":-left_right_exact});';
        } else if ("lc" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").css({"left": -left_right_exact,"top":top_bottom_center});';
        } else if ("lt" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").css({"left": -left_right_exact,"top":-top_bottom_exact});';
        }
        ?>
                                               
                jQuery(document).scroll(function()
                {
                    if(getCookie('sf_close') != true){
                        var sctop = jQuery(document).scrollTop();
                        var scrolled = sctop+jQuery(window).height();
                        if(scrolled >= sf_document_percent)
                        {
        <?php
        if ("tc" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({top:top_bottom_center},animation_time,easing_effect);';
        } else if ("tr" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({top:top_bottom_center,right:left_right_center},animation_time,easing_effect);';
        } else if ("rc" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({right:left_right_center},1000,easing_effect);';
        } else if ("rb" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({right:left_right_center,bottom:top_bottom_center},animation_time,easing_effect);';
        } else if ("bc" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({bottom:top_bottom_center,left:left_right_center},animation_time,easing_effect);';
        } else if ("bl" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({bottom:top_bottom_center,left:left_right_center},animation_time,easing_effect);';
        } else if ("lc" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({left:left_right_center},animation_time,easing_effect);';
        } else if ("lt" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({left:left_right_center,top:top_bottom_center},animation_time,easing_effect);';
        }
        ?> 
                            jQuery("#sf_close").fadeIn();              		
                                                       
                                           
                                                
                        }
                        else
                        {
        <?php
        if ("tc" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({top:-top_bottom_exact},animation_time,easing_effect);';
        } else if ("tr" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({"top": -top_bottom_exact,"right":-left_right_exact},animation_time,easing_effect);';
        } else if ("rc" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({right:-left_right_exact},1000,easing_effect);';
        } else if ("rb" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({right:-left_right_exact,bottom:-top_bottom_exact},animation_time,easing_effect);';
        } else if ("bc" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({bottom:-top_bottom_exact},1000,easing_effect);';
        } else if ("bl" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({bottom:-top_bottom_exact,left:-left_right_exact},animation_time,easing_effect);';
        } else if ("lc" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({left:-left_right_exact},animation_time,easing_effect);';
        } else if ("lt" == get_option("sf_fly_from")) {
            echo 'jQuery(".circlebot").stop().animate({left:-left_right_exact,top:-top_bottom_exact},animation_time,easing_effect);';
        }
        ?>   
                            // jQuery('.circlebot').stop().animate({right:-<?php echo $w; ?>,bottom:-<?php echo $w; ?>},1000);
                            jQuery("#sf_close").fadeOut();                    
                        }
                    }
                });
            });

        </script>
        <?php
    }

    function count_social_clicks() {
        $clicked_div = $_POST['clicked'];
        $unique_click = $_POST['unique'];
        // echo $clicked_div;
        if ($unique_click == 'yes') {
            $pre_unique = get_option($clicked_div . '_uclick_count');
            $unique_counted = ($pre_unique == 0 || empty($pre_unique) || $pre_unique == false) ? 1 : ++$pre_unique;
            update_option($clicked_div . '_uclick_count', $unique_counted);

            $previous_count = get_option($clicked_div . '_click_count');
            $counted = ($previous_count == 0 || empty($previous_count) || $previous_count == false) ? 1 : ++$previous_count;
            update_option($clicked_div . '_click_count', $counted);
        } elseif ($unique_click == 'no') {
            $previous_count = get_option($clicked_div . '_click_count');
            $counted = ($previous_count == 0 || empty($previous_count) || $previous_count == false) ? 1 : ++$previous_count;
            update_option($clicked_div . '_click_count', $counted);
        }
        exit();
    }

}

$obj = new SocialFlyer();
?>