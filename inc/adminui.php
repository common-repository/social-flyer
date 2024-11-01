<!-- Default WordPress 'wrap' container -->  
<div class="wrap">  

    <div id="icon-themes" class="icon32"></div>  
    <h2>Social Flyer Options</h2>   
    <?php $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'general_options'; ?>
    <h2 class="nav-tab-wrapper">  
        <a href="?page=followshape&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>">General Settings</a> 
        <a href="?page=followshape&tab=display_options" class="nav-tab <?php echo $active_tab == 'display_options' ? 'nav-tab-active' : ''; ?>">Display Settings</a>  
        <a href="?page=followshape&tab=social_options" class="nav-tab <?php echo $active_tab == 'social_options' ? 'nav-tab-active' : ''; ?>">Social Settings</a> 
        <a href="?page=followshape&tab=animation" class="nav-tab <?php echo $active_tab == 'animation' ? 'nav-tab-active' : ''; ?>">Animation Settings</a> 
        <a href="?page=followshape&tab=statistics" class="nav-tab <?php echo $active_tab == 'statistics' ? 'nav-tab-active' : ''; ?>">Statistics</a>
        <a href="?page=followshape&tab=support" class="nav-tab <?php echo $active_tab == 'support' ? 'nav-tab-active' : ''; ?>">Support</a>
    </h2>


    <form method="post" action="options.php">
        <?php if ($active_tab == 'general_options') { ?>
            <!-- Style -->
            <style type="text/css">
                tr#sf_fly_from td input[type=radio]
                {
                    display:none;
                }


                input[type=radio]:checked + label { 

                    background-color:#d0d0d0;
                    border: solid;
                    border-color: #000000;
                }
                input[type=radio] + label {
                    display:inline-block;
                    padding: 4px 12px;
                    margin:-2px;

                }
                #sf_app_range{
                    width:300px;
                }
            </style>
            <!-- Style Closing -->
            <!-- Input Event Scripts -->
            <script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery('#sf_app_range').slider({
                        value:<?php echo get_option('sf_appear_percent'); ?>,
                        min: 10,
                        max: 100,
                        step: 1,
                        range: "min",
                        slide: function( event, ui ) {
                            jQuery( "#sf_appear_percent" ).val( ui.value );
                        }
                    });
                    jQuery( "#sf_appear_percent" ).val( jQuery( "#sf_app_range" ).slider( "value" ) );
                });
            </script>
            <!-- Input Event Scripts END -->

            <?php
            settings_fields('sf_general');
            ?>
            <table class="form-table">
                <tr>
                    <th>
                        Enable Social Flyer for Member
                    </th>
                    <td>
                        <input type="checkbox" name="sf_enable_member" value="yes"<?php checked("yes", get_option('sf_enable_member')); ?>/>
                    </td>
                </tr>
                <tr>
                    <th>
                        Enable Social Flyer for Guest
                    </th>
                    <td>
                        <input type="checkbox" name="sf_enable_guest" value="yes"<?php checked("yes", get_option('sf_enable_guest')); ?>/>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label>Social Flyer Fly In Position</label>
                    </th>

                    <td>
                        <input type="text" name="sf_appear_percent" id="sf_appear_percent" value="<?php echo get_option('sf_appear_percent'); ?>"><label style="font-size:11px;">&nbsp0 will start immediately 100 will start at the end of Website(document)</label><div id="sf_app_range"></div>
                    </td>

                </tr>
                <tr id="sf_fly_from">
                    <th>Fly From Direction</th>
                    <td>                                    
                        <input type="radio" id="radio1" name="sf_fly_from"  value="tc"<?php checked("tc", get_option('sf_fly_from')); ?>/>
                        <label for="radio1"><img src="<?php echo plugins_url(); ?>/social-flyer/images/opt/tc.png" alt="top-center" title="top-center" /></label>
                        <input type="radio" id="radio2" name="sf_fly_from"  value="tr"<?php checked("tr", get_option('sf_fly_from')); ?>/>
                        <label for="radio2"><img src="<?php echo plugins_url(); ?>/social-flyer/images/opt/tr.png" alt="top-right" title="top-right" /></label>
                        <input type="radio" id="radio3" name="sf_fly_from"  value="rc"<?php checked("rc", get_option('sf_fly_from')); ?>/>
                        <label for="radio3"><img src="<?php echo plugins_url(); ?>/social-flyer/images/opt/rc.png" alt="right-center" title="right-center" /></label>
                        <input type="radio" id="radio4" name="sf_fly_from"  value="rb"<?php checked("rb", get_option('sf_fly_from')); ?>/>
                        <label for="radio4"><img src="<?php echo plugins_url(); ?>/social-flyer/images/opt/rb.png" alt="right-bottom" title="right-bottom" /></label>
                        <input type="radio" id="radio5" name="sf_fly_from"  value="bc"<?php checked("bc", get_option('sf_fly_from')); ?>/>
                        <label for="radio5"><img src="<?php echo plugins_url(); ?>/social-flyer/images/opt/bc.png" alt="bottom-center" title="bottom-center" /></label>
                        <input type="radio" id="radio6" name="sf_fly_from"  value="bl"<?php checked("bl", get_option('sf_fly_from')); ?>/>
                        <label for="radio6"><img src="<?php echo plugins_url(); ?>/social-flyer/images/opt/bl.png" alt="bottom-left" title="bottom-left" /></label>
                        <input type="radio" id="radio7" name="sf_fly_from"  value="lc"<?php checked("lc", get_option('sf_fly_from')); ?>/>
                        <label for="radio7"><img src="<?php echo plugins_url(); ?>/social-flyer/images/opt/lc.png" alt="left-center" title="left-center" /></label>
                        <input type="radio" id="radio8" name="sf_fly_from"  value="lt"<?php checked("lt", get_option('sf_fly_from')); ?>/>
                        <label for="radio8"><img src="<?php echo plugins_url(); ?>/social-flyer/images/opt/lt.png" alt="left-top" title="left-top" /></label>



                    </td>
                </tr>
                <tr>
                    <th>
                        Show Social Follow Flyer after X days when it is closed
                    </th>
                    <td>
                        <input type="text" name="sf_close_duration" value="<?php echo get_option('sf_close_duration'); ?>" /><label style="font-size:11px;">&nbsp Input value 0 will make Flyer to be shown on every visit</label>
                    </td>
                </tr>

            </table>


            <?php } elseif ($active_tab == 'display_options') {
            ?>
            <!-- Style -->
            <style type="text/css">
                tr.show_type td input[type=radio]
                {
                    display:none;
                }


                tr.show_type input[type=radio]:checked + label { 

                    background-color:#d0d0d0;
                    border: solid;
                    border-color: #636363;
                }
                tr.show_type input[type=radio] + label {
                    display:inline-block;
                    padding: 4px 12px;
                    margin:-2px;

                }
                .wp-picker-container{
                    display: inline-flex;
                }

                .fa_icon_container{
                    height:350px;
                    width:600px;
                    overflow:scroll;
                    background-color:white;
                }
                .fa_icon_container ul{
                    overflow:hidden;
                    margin:0 auto;
                }
                .fa_icon_container li{
                    float:left;
                    margin:0 auto;
                    border:1px dotted;
                    width:40px;
                    text-align:center;
                    padding:8px;
                    cursor:pointer;
                }
                .sf_icon_selected{
                    background-color:#888;
                }
                <?php if ("yes" == get_option('sf_cent_bg_img_en')) { ?>
                    #bg_image{
                        display:table-row;
                    }
                <?php } else { ?>
                    #bg_image{
                        display:none;
                    }
                <?php } ?>
                <?php if ("custom" == get_option('sf_display_page')) { ?>
                    .page_post{
                        display:table-row;
                    }
                <?php } else { ?>
                    .page_post{
                        display:none;
                    }
                <?php } ?>
                <?php if ("yes" == get_option('sf_main_text_en')) { ?>
                    .lobby_text{
                        display:table-row;
                    }
                <?php } else { ?>
                    .lobby_text{
                        display:none;
                    }
                <?php } ?>
                <?php
                for ($i = 1; $i <= 8; $i++) {
                    if ("yes" == get_option('sfsocial_each_img_en' . $i)) {
                        echo '#sf_social_img' . $i . 'wrap {
display:table-row;                
}';
                    } else {
                        echo '#sf_social_img' . $i . 'wrap {
display:none;                
}';
                    }
                    //for content type
                    if ("text" == get_option('sf_content_type'.$i)) {
                        echo '.sf_text_wrap' . $i . ' {
                  display:table-row;
                  }';
                        echo '.sf_icon_wrap' . $i . ' {
                  display:none;
                  }';
                    } elseif ("icon" == get_option('sf_content_type'.$i)) {
                        echo '.sf_text_wrap' . $i . ' {
                  display:none;
                  }';
                        echo '.sf_icon_wrap' . $i . ' {
                  display:table-row;
                  }';
                    } else {
                        echo '.sf_text_wrap' . $i . ' {
                  display:none;
                  }';
                        echo '.sf_icon_wrap' . $i . ' {
                  display:none;
                  }';
                    }
                }
                ?>
            </style>
            <!-- Style Closing -->

            <!-- Input Event Scripts END -->

            <?php
            settings_fields('shapetype');
            $font_awesome_file = WP_PLUGIN_DIR . '/socialflyer/css/font-awesome.min.css';
            $font_awesome_css = file_get_contents($font_awesome_file);
            $regex = '~\.fa-\K[^{|:\s]+(?=\s*{|:)~';
            preg_match_all($regex, $font_awesome_css, $font_clses);
            $added_unwanted = array("lg", "2x", "3x", "4x", "5x", "fw", "ul", "ul>li", "li", "li.fa-lg", "border", "spin",
                "rotate-90", "rotate-180", "rotate-270", "flip-horizontal", "flip-vertical", "stack",
                "stack-1x,.fa-stack-2x", "stack-1x", "stack-2x", "inverse");
            ?>
            <table class="form-table">
                <tr>
                    <th>
                        Display Page 
                    </th>
                    <td>
                        <fieldset>
                            <input type="radio" name="sf_display_page" value="all"<?php checked("all", get_option('sf_display_page')); ?> />All Page/Post<br/>
                            <input type="radio" name="sf_display_page" value="home"<?php checked("home", get_option('sf_display_page')); ?> />Home page<br/>
                            <input type="radio" name="sf_display_page" value="custom"<?php checked("custom", get_option('sf_display_page')); ?> />Custom <br/>  
                        </fieldset>
                    </td>
                </tr>
                <tr class="page_post">
                    <th>
                        Page ID/Title
                    </th>
                    <td>
                        <input type="text" name="sf_page_id" value="<?php echo get_option('sf_page_id'); ?>" /><label style="font-size:11px;">&nbsp You can enter multiple ID/Title with each separated by & Example: 10&11 </label>
                    </td>
                </tr>
                <tr class="page_post">
                    <th>
                        Post ID/Title
                    </th>
                    <td>
                        <input type="text" name="sf_post_id" value="<?php echo get_option('sf_post_id'); ?>" /><label style="font-size:11px;">&nbsp You can enter multiple ID/Title with each separated by & Example: 10&11 </label>
                    </td>
                </tr>
                <div class="show_type">
                    <tr class="show_type"><th>Design Type</th>
                        <td>
                            <input type="radio" name="selectshape" id="radio1" value="1"<?php checked(1, get_option('selectshape')); ?>/>
                            <label for="radio1"><img src="<?php echo plugins_url(); ?>/social-flyer/images/circle.png" alt="circle" title="circle"></label>

                            <input type="radio" id="radio2" name="selectshape" value="2"<?php checked(2, get_option('selectshape')); ?> />
                            <label for="radio2"><img src="<?php echo plugins_url(); ?>/social-flyer/images/leaf.png" alt="leaf" title="leaf"></label>
                            
                            <input type="radio" id="radio3" name="selectshape" value="3"<?php checked(3, get_option('selectshape')); ?> />
                            <label for="radio3"><img src="<?php echo plugins_url(); ?>/social-flyer/images/leaf2.png" alt="leaf" title="leaf"></label>
                            
                            <input type="radio" id="radio4" name="selectshape" value="4"<?php checked(4, get_option('selectshape')); ?> />
                            <label for="radio4"><img src="<?php echo plugins_url(); ?>/social-flyer/images/leaf3.png" alt="leaf" title="leaf"></label>
                            
                            <input type="radio" id="radio5" name="selectshape" value="5"<?php checked(5, get_option('selectshape')); ?> />
                            <label for="radio5"><img src="<?php echo plugins_url(); ?>/social-flyer/images/leaf4.png" alt="leaf" title="leaf"></label>

                            <input type="radio" id="radio6" name="selectshape" value="6"<?php checked(6, get_option('selectshape')); ?> />
                            <label for="radio6"><img src="<?php echo plugins_url(); ?>/social-flyer/images/milestone.png" alt="milestone" title="milestone"></label>

                            <input type="radio" id="radio7" name="selectshape" value="7"<?php checked(7, get_option('selectshape')); ?> />
                            <label for="radio7"><img src="<?php echo plugins_url(); ?>/social-flyer/images/egg.png" alt="egg" title="egg"></label>

                            <input type="radio" id="radio8" name="selectshape" value="8"<?php checked(8, get_option('selectshape')); ?> />
                            <label for="radio8"><img src="<?php echo plugins_url(); ?>/social-flyer/images/vintage-monitor.png" alt="vintage-monitor" title="vintage-monitor"></label>


                        </td>
                    </tr>
                </div>

                <tr id="bg_color">
                    <th>
                        <label>Lobby(Center DIV) Background Color</label>
                    </th>
                    <td>
                        <input type="text" name="sh_color" value="<?php echo get_option('sh_color'); ?>" class="ir" />
                    </td>
                </tr>
                <tr>
                    <th>
                        <label>Enable Lobby(Center DIV) Background Image</label>
                    </th>
                    <td>
                        <input type="checkbox" id="sf_cent_bg_img_en" name="sf_cent_bg_img_en" value="yes" <?php checked("yes", get_option('sf_cent_bg_img_en')); ?>/> 
                    </td>
                </tr>
                <tr id="bg_image">
                    <th>
                        <label>Lobby(Center DIV) Background Image</label>
                    </th>
                    <td>
                        <input type="text" id="sf_cent_bg_img" name="sf_cent_bg_img" value="<?php echo get_option('sf_cent_bg_img'); ?>"/> <span class="button" id="cent_img_upload">Upload Image</span> 
                    </td>
                </tr>
                <tr>
                    <th>
                        Enable Lobby(Center DIV) Text(Message) 
                    </th>
                    <td>
                        <input type="checkbox" id="sf_main_text_en" name="sf_main_text_en" value="yes" <?php checked('yes', get_option('sf_main_text_en')); ?> />
                    </td>
                </tr>
                <tr class="lobby_text">
                    <th>
                        <label>Lobby(Center DIV) Text(Message)</label>
                    </th>
                    <td>
                        <input type="text"  name="sf_main_text" value="<?php echo get_option('sf_main_text'); ?>"/>  
                    </td>
                </tr>
                <tr class="lobby_text">
                    <th>
                        Font Color at Lobby(Center DIV)
                    </th>
                    <td>
                        <input type="text" name="sf_main_font_color" value="<?php echo get_option('sf_main_font_color'); ?>" class="ir" />      
                    </td>
                </tr>
                <tr class="lobby_text">
                    <th>
                        <label>Font Size at Lobby(Center DIV)</label>
                    </th>
                    <td>
                        <input type="text"  name="sf_main_font_size" value="<?php echo get_option('sf_main_font_size'); ?>"/>px 
                    </td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td>
                        <input type="text" name="sf_size" id="sf_size" value="<?php echo get_option('sf_size'); ?>"><div id="range"></div>
                    </td>
                </tr>
    <?php for ($i = 1; $i <= 8; $i++) { ?>
                    <tr>
                        <th>
                            Social Network <?php echo $i; ?> Options
                        </th>
                        <td>
                            <span id="more_<?php echo $i; ?>" data-id="<?php echo $i; ?>" class="button">Show</span>
                            <table id="more_opt_<?php echo $i; ?>" style="display: none;">
                                <tr>
                                    <th>
                                        Background Color
                                    </th>
                                    <td>
                                        <input type="text" name="sfsocial_each_color<?php echo $i; ?>" value="<?php echo get_option('sfsocial_each_color' . $i); ?>" class="ir" />    
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Enable Background Image
                                    </th>
                                    <td>
                                        <input type="checkbox" name="sfsocial_each_img_en<?php echo $i; ?>" id="sfsocial_each_img_en<?php echo $i; ?>" value="yes" <?php checked("yes", get_option('sfsocial_each_img_en' . $i)); ?> />    
                                    </td>
                                </tr>
                                <tr id="sf_social_img<?php echo $i; ?>wrap">
                                    <th>
                                        Background Image
                                    </th>
                                    <td>
                                        <input type="text" name="sfsocial_each_img<?php echo $i; ?>" id="sf_social_img<?php echo $i; ?>" value="<?php echo get_option('sfsocial_each_img' . $i); ?>" /><span class="button" id="social_img_upload<?php echo $i; ?>">Upload Image</span>     
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Content
                                    </th>
                                    <td>
                                        <input type="radio" name="sf_content_type<?php echo $i; ?>" value="text" <?php checked('text', get_option('sf_content_type' . $i)); ?>/><label>Text</label><br/>
                                        <input type="radio" name="sf_content_type<?php echo $i; ?>" value="icon" <?php checked('icon', get_option('sf_content_type' . $i)); ?>/><label>Icon</label><br/>
                                        <input type="radio" name="sf_content_type<?php echo $i; ?>" value="nocontent" <?php checked('nocontent', get_option('sf_content_type' . $i)); ?>/><label>No Content (useful when you use Image BG)</label><br/>
                                    </td>
                                </tr>
                                <tr class="sf_text_wrap<?php echo $i; ?>">
                                    <th>
                                        Enter Label Text
                                    </th>
                                    <th>
                                        <input type="text" name="sfsocial_lable<?php echo $i; ?>" value="<?php echo get_option('sfsocial_lable' . $i); ?>" />
                                    </th>
                                </tr>
                                <tr class="sf_text_wrap<?php echo $i; ?>">
                                    <th>
                                        Font Color
                                    </th>
                                    <td>
                                        <input type="text" name="sf_social_font_color<?php echo $i; ?>" value="<?php echo get_option('sf_social_font_color' . $i); ?>" class="ir" />      
                                    </td>
                                </tr>
                                <tr class="sf_text_wrap<?php echo $i; ?>">
                                    <th>
                                        Font Size
                                    </th>
                                    <td>
                                        <input type="text" name="sf_social_font_size<?php echo $i; ?>" value="<?php echo get_option('sf_social_font_size' . $i); ?>" />px
                                    </td>
                                </tr>
                                <tr class="sf_icon_wrap<?php echo $i; ?>">
                                    <th>
                                        Select Icon
                                    </th>
                                    <td>
                                        <input type="text" name="sf_scoial_icon_fa<?php echo $i; ?>" data-optnum="<?php echo $i; ?>" id="sf_scoial_icon_fa<?php echo $i; ?>" value="<?php echo get_option('sf_scoial_icon_fa' . $i); ?>"/>
                                        <div class="fa_icon_container" id="fa_icon_container<?php echo $i; ?>">
                                            <ul>      
                                                <?php
                                                foreach ($font_clses[0] as $icons) {
                                                    if (!in_array($icons, $added_unwanted)) {
                                                        ?>

                                                        <li data-icon="<?php echo $icons; ?>" <?php echo ($icons == get_option('sf_scoial_icon_fa' . $i)) ? 'class="sf_icon_selected"' : ''; ?>>
                                                            <i class="fa fa-<?php echo $icons; ?> fa-2x"></i>
                                                        </li>

                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="sf_icon_wrap<?php echo $i; ?>">
                                    <th>
                                        Icon Color
                                    </th>
                                    <td>
                                        <input type="text" name="sf_social_icon_color<?php echo $i; ?>" value="<?php echo get_option('sf_social_icon_color' . $i); ?>" class="ir" />
                                    </td>
                                </tr>
                                <tr class="sf_icon_wrap<?php echo $i; ?>">
                                    <th>
                                        Icon Size
                                    </th>
                                    <td>
                                        <input type="text" name="sf_social_icon_size<?php echo $i; ?>" value="<?php echo get_option('sf_social_icon_size' . $i); ?>"  />px
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Enable Border Effect on Hover
                                    </th>
                                    <td>
                                        <input type="checkbox" name="sf_enable_border_hover<?php echo $i; ?>" value="yes" <?php checked('yes', get_option('sf_enable_border_hover' . $i)); ?> />
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Enable tooltip on Hover
                                    </th>
                                    <td>
                                        <input type="checkbox" name="sf_enable_ttip_hover<?php echo $i; ?>" value="yes" <?php checked('yes', get_option('sf_enable_ttip_hover' . $i)); ?> />
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Tool Tip Message
                                    </th>
                                    <td>
                                        <input type="text" name="sf_enable_ttip_msg<?php echo $i; ?>" value="<?php echo get_option('sf_enable_ttip_msg' . $i); ?>"  />
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Background Color on Hover
                                    </th>
                                    <td>
                                        <input type="text" name="sf_each_color_hvr<?php echo $i; ?>" value="<?php echo get_option('sf_each_color_hvr' . $i); ?>" class="ir" />    
                                    </td>
                                </tr>

                            </table>  
                        </td>
                    </tr>

                <?php } ?>

                <tr>
                    <th>
                        Close Button Position
                    </th>
                    <td>
                        <input type="radio" name="sf_close_position" value="tl" <?php checked("tl", get_option('sf_close_position')); ?> />Top Left<br/>
                        <input type="radio" name="sf_close_position" value="tr" <?php checked("tr", get_option('sf_close_position')); ?> />Top Right<br/>
                        <input type="radio" name="sf_close_position" value="bl" <?php checked("bl", get_option('sf_close_position')); ?> />Bottom Left<br/>
                        <input type="radio" name="sf_close_position" value="br" <?php checked("br", get_option('sf_close_position')); ?> />Bottom Right<br/>
                    </td>
                </tr>
                <tr>
                    <th>
                        Enable Redirection Indicator
                    </th>
                    <td>
                        <input type="checkbox" name="sf_redirection_en" value="yes" <?php checked('yes', get_option('sf_redirection_en')); ?> />
                    </td>
                </tr>
            </table>


            <script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery('#range').slider({
                        value:<?php echo get_option('sf_size'); ?>,
                        min: 0,
                        max: 100,
                        step: 1,
                        range: "min",
                        slide: function( event, ui ) {
                            jQuery( "#sf_size" ).val( ui.value );
                        }
                    });
                    jQuery( "#sf_size" ).val( jQuery( "#range" ).slider( "value" ) );
                });
            </script>
            <style type="text/css">

                .ui-slider-horizontal
                {
                    width:250px;

                }

            </style>

            <!-- Input Event Scripts -->
            <script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery("#sf_cent_bg_img_en").change(function(){
                        if(jQuery("#sf_cent_bg_img_en")[0].checked){
                            jQuery('#bg_image').css('display','table-row');
                        }else{
                            jQuery('#bg_image').css('display','none');
                        }   
                    })
        
                    jQuery("input[name='sf_display_page']").change(function(){
                        if(jQuery(this).val() == 'custom'){
                            jQuery(".page_post").css('display','table-row');
                        }else{
                            jQuery(".page_post").css('display','none');     
                        }
                    });
        
                    jQuery("#sf_main_text_en").change(function(){
                        if(jQuery("#sf_main_text_en")[0].checked){
                            jQuery('.lobby_text').css('display','table-row');
                        }else{
                            jQuery('.lobby_text').css('display','none');    
                        } 
                    });
        

        
                    //toggle
                    for(var i=1; i<=8;i++){
                        jQuery("#more_"+i).click(function(){
                            var id = jQuery(this).data('id');
                            jQuery("#more_opt_"+id).toggle();
                            var text = (jQuery(this).html() == "Show") ? "Hide" : "Show";
                            jQuery(this).html(text);
                       
                        });             
                    }
                    var isSearching = false;
                    for(var i=1;i<=8;i++){
                        jQuery('#sf_scoial_icon_fa'+i).keyup(function(){
                      
                            var typing_val = jQuery(this).val();
                            var id = jQuery(this).data('optnum');
                                   
                            jQuery("#fa_icon_container"+id+' li').each(function(index, item) {
                                jQuery(this).show();
                            })
        
                            var hide_element = jQuery("#fa_icon_container"+id).find('li').not(function(index) {
                                var current_element = jQuery(this).html();       
           
                                return current_element.match(new RegExp(typing_val, 'gi'));
                            });
        
                            hide_element.each(function(index) {
                                jQuery(this).hide();
                            }); });

                        dynamic_selection(i); // for icon selection in multiple list

                    }

                    function dynamic_selection(i){
                        jQuery("#fa_icon_container"+i+" li").click(function(){
                            jQuery("#sf_scoial_icon_fa"+i).val(jQuery(this).data('icon'));
                            jQuery("#fa_icon_container"+i+" li.sf_icon_selected").removeAttr('class');
                            jQuery(this).addClass('sf_icon_selected');
                        });  
                    }

                    for(var j=1; j<=8;j++){
                        each_image_en(j);
                        each_content_type(j);  
                    }

                    function each_image_en(j){
                        jQuery('#sfsocial_each_img_en'+j).change(function(){
                            if(jQuery(this).prop('checked')){
                                jQuery('#sf_social_img'+j+'wrap').css('display','table-row');   
                            }else{
                                jQuery('#sf_social_img'+j+'wrap').css('display','none');   
                            }
                        });
                    }

                    function each_content_type(j){
                        jQuery("input[name='sf_content_type"+j+"']").change(function(){
                            if(jQuery(this).val() == 'text'){
                                jQuery('.sf_text_wrap'+j).css('display','table-row');
                                jQuery('.sf_icon_wrap'+j).css('display','none');   
                            }else if(jQuery(this).val() == 'icon'){
                                jQuery('.sf_icon_wrap'+j).css('display','table-row');
                                jQuery('.sf_text_wrap'+j).css('display','none');
                            }else{
                                jQuery('.sf_text_wrap'+j).css('display','none');
                                jQuery('.sf_icon_wrap'+j).css('display','none');  
                            } 
                        });
                    }


                                   
                                   

        
                    //image uploader
                    var center_img_uploader;
                    jQuery('#cent_img_upload').click(function(e) {
                        e.preventDefault();
                        if (center_img_uploader) {
                            center_img_uploader.open();
                            return;
                        }
                        center_img_uploader = wp.media.frames.file_frame = wp.media({
                            title: 'Choose Image',
                            button: {
                                text: 'Choose Image'
                            },
                            multiple: false
                        });
                        center_img_uploader.on('select', function() {
                            attachment = center_img_uploader.state().get('selection').first().toJSON();
                            jQuery('#sf_cent_bg_img').val(attachment.url);
                        });
                        center_img_uploader.open();
                    }); 
                    for(var i=1;i<=8;i++){
                        img_uploader_all(i);
                    }
                    function img_uploader_all(i){
                        var img_uploader;
                        jQuery('#social_img_upload'+i).click(function(e) {
                            e.preventDefault();
                            if (img_uploader) {
                                img_uploader.open();
                                return;
                            }
                            img_uploader = wp.media.frames.file_frame = wp.media({
                                title: 'Choose Image',
                                button: {
                                    text: 'Choose Image'
                                },
                                multiple: false
                            });
                            img_uploader.on('select', function() {
                                attachment = img_uploader.state().get('selection').first().toJSON();
                                jQuery('#sf_social_img'+i).val(attachment.url);
                            });
                            img_uploader.open();
                        });
                    }
                    

     
                });
            </script>


            <?php
        } else if ($active_tab == 'social_options') {
            settings_fields('socialuname');
            ?>

            <table class="form-table">
                <?php for ($i = 1; $i <= 8; $i++) { ?>
                    <tr><td>
                    <lable>Enable Social Network <?php echo $i; ?> </lable><input type="checkbox" name="sfsocial_net_show<?php echo $i; ?>" value="1"<?php checked(1, get_option('sfsocial_net_show' . $i)); ?> />
                    <lable>Social Network URL </lable><input type="text" name="sfsocial_net<?php echo $i; ?>" value="<?php echo get_option('sfsocial_net' . $i); ?>"/>

                    </td></tr>
                <?php }
                ?>
            </table>


        <?php } else if ($active_tab == 'statistics') { ?>
            <script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery.jqplot.config.enablePlugins = true; 
                    var labels = ["Unique Clicks","Clicks"];        
    <?php
    for ($i = 1; $i <= 8; $i++) {
        $current = get_option('sf_' . $i . '_click_count');
        $current_u = get_option('sf_' . $i . '_uclick_count');
        if (!empty($current)) {
            $s2_array[] = get_option('sf_' . $i . '_click_count');
        } else {
            $s2_array[] = 0;
        }
        if (!empty($current_u)) {
            $s1_array[] = get_option('sf_' . $i . '_uclick_count');
        } else {
            $s1_array[] = 0;
        }
    }
    ?>
                        var s2 = <?php echo json_encode($s2_array); ?>;
                        var s1 = <?php echo json_encode($s1_array); ?>;//unique clicks
                        var ticks = ['Social Network 1', 'Social Network 2', 'Social Network 3', 'Social Network 4','Social Network 5', 'Social Network 6', 'Social Network 7', 'Social Network 8'];
             
                        var plot1 = jQuery.jqplot('sf_stat', [s1, s2], {
                            title:'Social Networks Click Through Count',
                            seriesColors:['#C7754C', '#00749F'],
                            seriesDefaults: {
                                renderer:jQuery.jqplot.BarRenderer,
                                pointLabels: { show: true },
                                rendererOptions: {
                                    animation: {
                                        speed: 10000
                                    }
                                }
                            },
                            axes: {
                                xaxis: {
                                    renderer: jQuery.jqplot.CategoryAxisRenderer,
                                    ticks: ticks
                                }
                            },
                            highlighter: { show: false
                            },
                            legend: {
                                show: true,
                                location: 'e',
                                placement: 'inside',
                                labels:labels
                            },
                            animate: true,
                            animateReplot: true
                        });
            
                    });

            </script>
            <div id="sf_stat" style="height:410px; margin-top:30px;"></div>


        <?php
        } else if ($active_tab == 'animation') {
            settings_fields('sf_animation');
            $easing_array = array("linear", "swing", "easeInQuad", "easeOutQuad", "easeInOutQuad",
                "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeInQuart", "easeOutQuart",
                "easeInOutQuart", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInExpo",
                "easeOutExpo", "easeInOutExpo", "easeInSine", "easeOutSine", "easeInOutSine",
                "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInElastic", "easeOutElastic",
                "easeInOutElastic", "easeInBack", "easeOutBack", "easeInOutBack", "easeInBounce",
                "easeOutBounce", "easeInOutBounce");
            ?>
            <table class="form-table">
                <tr>
                    <th> Fly In/Out Animation Easing Effect</th>

                    <td>
                        <select name="sf_easing_type">
                            <?php foreach ($easing_array as $easing) { ?>
                                <option value="<?php echo $easing; ?>" <?php selected($easing, get_option('sf_easing_type')); ?> ><?php echo $easing; ?></option>
    <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>
                        Animation Duration
                    </th>
                    <td>
                        <input type="text" name="sf_animation_time" value="<?php echo get_option('sf_animation_time'); ?>" /><label style="font-size:11px;">&nbsp Seconds</label>
                    </td>
                </tr>
            </table>
        <?php
        }else if ($active_tab == 'support') {
            ?>
            <h3>If you need any support. Its very easy, Post your topic in plugin <a href="https://wordpress.org/support/plugin/social-flyer">support</a> page or Just shoot a mail to <a href="mailto:support@wptowncenter.com">support@wptowncenter.com</a> We will be happy to help :)</h3>
            <h4>Please don't forgot to give <a href="https://wordpress.org/support/view/plugin-reviews/social-flyer?rate=5#postform" target="_blank">review</a> for this plugin at wordpress.org social flyer plugin page.</h4>
            <?php
        }
        
        
        
        if ($active_tab != 'statistics' && $active_tab != 'support') {
            submit_button();
        }
        ?>
    </form>




</div><!-- /.wrap -->


