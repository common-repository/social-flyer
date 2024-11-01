<!--ajax for stats -->
<script type="text/javascript">
    jQuery(document).ready(function(){
        
        for(var i=1;i<=8;i++){
            sf_social_clicks(i);
        }
             
        function sf_social_clicks(i){
            jQuery('.circlebot'+i).click(function(){
                if(getCookie('sf_unique_click'+i) == false){
                    createCookie('sf_unique_click'+i,'clicked',800);
                    var data = {
                        action:"sf_social_stat",
                        clicked:"sf_"+i,
                        unique:"yes"
                    };
                }else{
                    var data = {
                        action:"sf_social_stat",
                        clicked:"sf_"+i,
                        unique:"no"
                    };
                }
                // console.log(getCookie('unique_click'+i));
                jQuery('#sf-ajax-load').show();
                jQuery.ajax({
                    url:"<?php echo admin_url('admin-ajax.php'); ?>",
                    type:"POST",
                    data:data
                }).done(function(res){
                    // console.log(res);
                    window.location = jQuery('.circlebot'+i).data('url');
                });  
       
            });
        }
<?php
if ("yes" == get_option('sf_enable_ttip_hover1')) {
    $tooltip_msg = get_option('sf_enable_ttip_msg1');
    $uclick = (get_option('sf_1_uclick_count') != false) ? get_option('sf_1_uclick_count') : 0;
    $click = (get_option('sf_1_click_count') != false) ? get_option('sf_1_click_count') : 0;
    $tooltip_msg = str_replace("[sf_uclick]", $uclick, $tooltip_msg);
    $tooltip_msg = str_replace("[sf_click]", $click, $tooltip_msg);
    ?>
                       jQuery('.circlebot1').tipsy({'fallback':'<?php echo $tooltip_msg; ?>','gravity':'s'});
<?php } ?>
<?php
if ("yes" == get_option('sf_enable_ttip_hover2')) {
    $tooltip_msg = get_option('sf_enable_ttip_msg2');
    $uclick = (get_option('sf_2_uclick_count') != false) ? get_option('sf_2_uclick_count') : 0;
    $click = (get_option('sf_2_click_count') != false) ? get_option('sf_2_click_count') : 0;
    $tooltip_msg = str_replace("[sf_uclick]", $uclick, $tooltip_msg);
    $tooltip_msg = str_replace("[sf_click]", $click, $tooltip_msg);
    ?>
                       jQuery('.circlebot2').tipsy({'fallback':'<?php echo $tooltip_msg; ?>','gravity':'w'});
<?php } ?>
<?php
if ("yes" == get_option('sf_enable_ttip_hover3')) {
    $tooltip_msg = get_option('sf_enable_ttip_msg3');
    $uclick = (get_option('sf_3_uclick_count') != false) ? get_option('sf_3_uclick_count') : 0;
    $click = (get_option('sf_3_click_count') != false) ? get_option('sf_3_click_count') : 0;
    $tooltip_msg = str_replace("[sf_uclick]", $uclick, $tooltip_msg);
    $tooltip_msg = str_replace("[sf_click]", $click, $tooltip_msg);
    ?>
                       jQuery('.circlebot3').tipsy({'fallback':'<?php echo $tooltip_msg; ?>','gravity':'w'});
<?php } ?>
<?php
if ("yes" == get_option('sf_enable_ttip_hover4')) {
    $tooltip_msg = get_option('sf_enable_ttip_msg4');
    $uclick = (get_option('sf_4_uclick_count') != false) ? get_option('sf_4_uclick_count') : 0;
    $click = (get_option('sf_4_click_count') != false) ? get_option('sf_4_click_count') : 0;
    $tooltip_msg = str_replace("[sf_uclick]", $uclick, $tooltip_msg);
    $tooltip_msg = str_replace("[sf_click]", $click, $tooltip_msg);
    ?>
                       jQuery('.circlebot4').tipsy({'fallback':'<?php echo $tooltip_msg; ?>','gravity':'nw'});
<?php } ?>
<?php
if ("yes" == get_option('sf_enable_ttip_hover5')) {
    $tooltip_msg = get_option('sf_enable_ttip_msg5');
    $uclick = (get_option('sf_5_uclick_count') != false) ? get_option('sf_5_uclick_count') : 0;
    $click = (get_option('sf_5_click_count') != false) ? get_option('sf_5_click_count') : 0;
    $tooltip_msg = str_replace("[sf_uclick]", $uclick, $tooltip_msg);
    $tooltip_msg = str_replace("[sf_click]", $click, $tooltip_msg);
    ?>
                       jQuery('.circlebot5').tipsy({'fallback':'<?php echo $tooltip_msg; ?>','gravity':'n'});
<?php } ?>
<?php
if ("yes" == get_option('sf_enable_ttip_hover6')) {
    $tooltip_msg = get_option('sf_enable_ttip_msg6');
    $uclick = (get_option('sf_6_uclick_count') != false) ? get_option('sf_6_uclick_count') : 0;
    $click = (get_option('sf_6_click_count') != false) ? get_option('sf_6_click_count') : 0;
    $tooltip_msg = str_replace("[sf_uclick]", $uclick, $tooltip_msg);
    $tooltip_msg = str_replace("[sf_click]", $click, $tooltip_msg);
    ?>
                       jQuery('.circlebot6').tipsy({'fallback':'<?php echo $tooltip_msg; ?>','gravity':'ne'});
<?php } ?>
<?php
if ("yes" == get_option('sf_enable_ttip_hover7')) {
    $tooltip_msg = get_option('sf_enable_ttip_msg7');
    $uclick = (get_option('sf_7_uclick_count') != false) ? get_option('sf_7_uclick_count') : 0;
    $click = (get_option('sf_7_click_count') != false) ? get_option('sf_7_click_count') : 0;
    $tooltip_msg = str_replace("[sf_uclick]", $uclick, $tooltip_msg);
    $tooltip_msg = str_replace("[sf_click]", $click, $tooltip_msg);
    ?>
                       jQuery('.circlebot7').tipsy({'fallback':'<?php echo $tooltip_msg; ?>','gravity':'e'});
<?php } ?>
<?php
if ("yes" == get_option('sf_enable_ttip_hover8')) {
    $tooltip_msg = get_option('sf_enable_ttip_msg8');
    $uclick = (get_option('sf_8_uclick_count') != false) ? get_option('sf_8_uclick_count') : 0;
    $click = (get_option('sf_8_click_count') != false) ? get_option('sf_8_click_count') : 0;
    $tooltip_msg = str_replace("[sf_uclick]", $uclick, $tooltip_msg);
    $tooltip_msg = str_replace("[sf_click]", $click, $tooltip_msg);
    ?>
                       jQuery('.circlebot8').tipsy({'fallback':'<?php echo $tooltip_msg; ?>','gravity':'se'});
<?php } ?>
        
           });
</script>

<!--common CSS -->
<style type="text/css">
<?php
for ($i = 1; $i <= 8; $i++) {
    echo ".circlebot" . $i . " { ";
//             $color = str_split(ltrim(get_option('sfsocial_each_color'.$i),"#"),2);
//            list($r,$g,$b) = array_map('hexdec', $color);
    echo "background-color:" . get_option('sfsocial_each_color' . $i) . ";";
    if ('yes' == get_option('sfsocial_each_img_en' . $i)) {
        echo "background-image:url(" . get_option('sfsocial_each_img' . $i) . ");";
        echo 'background-size: cover;';
        echo 'background-repeat: no-repeat;';
        echo 'background-position: center;';
    }
    if ("text" == get_option("sf_content_type" . $i)) {
        echo "font-size:" . get_option('sf_social_font_size' . $i) . "px;";
        echo "color:" . get_option('sf_social_font_color' . $i) . ";";
    } elseif ("icon" == get_option('sf_content_type' . $i)) {
        echo "font-size:" . get_option('sf_social_icon_size' . $i) . "px;";
        echo "color:" . get_option('sf_social_icon_color' . $i) . ";";
    }
    echo 'cursor:pointer;';
    echo 'transition:all ease 0.3s;';
    echo " }";
    if (get_option('sf_each_color_hvr' . $i) != false) {
        echo ".circlebot" . $i . ":hover{";
        echo 'background-color:' . get_option('sf_each_color_hvr' . $i) . ';';
        echo "}";
    }
}
?>

    #sf_close
    {
        position:fixed;
        width:50px;
        height:50px;
        line-height:50px;
        text-align:center;
        font-size:22px;
        background-color: #000000;
        cursor:pointer;
        color:white;
        display:none;
<?php
if ("tl" == get_option("sf_close_position")) {
    echo 'top:5%;
                     left:5%;';
} elseif ("tr" == get_option("sf_close_position")) {
    echo 'top:5%;
                      right:5%;';
} elseif ("bl" == get_option("sf_close_position")) {
    echo 'bottom:5%;
                     left:5%;';
} elseif ("br" == get_option("sf_close_position")) {
    echo 'bottom:5%;
                     right:5%;';
}
?>

        z-index:666666;
    }
</style>

<?php
if (1 == get_option('selectshape')) {
    require_once 'shape1.php';
} elseif (2 == get_option('selectshape')) {
    require_once 'shape2.php';
} elseif (3 == get_option('selectshape')) {
    require_once 'shape3.php';
} elseif (4 == get_option('selectshape')) {
    require_once 'shape4.php';
} elseif (5 == get_option('selectshape')) {
    require_once 'shape5.php';
} elseif (6 == get_option('selectshape')) {
    require_once 'shape6.php';
} elseif (7 == get_option('selectshape')) {
    require_once 'shape7.php';
} elseif (8 == get_option('selectshape')) {
    require_once 'shape8.php';
}
?>


<!-- HTML -->

<div id="circlebot" class="circlebot">
        <?php if ("yes" == get_option('sf_main_text_en')) { ?>
        <span><?php echo get_option('sf_main_text'); ?></span>
    <?php } ?>
    <?php for ($i = 1; $i <= 8; $i++) {
        if (1 == get_option('sfsocial_net_show' . $i)) { ?>

            <div class="circlebot<?php echo $i; ?>" data-url="<?php echo get_option('sfsocial_net' . $i); ?>">
        <?php
        if ("text" == get_option('sf_content_type' . $i)) {
            echo get_option('sfsocial_lable' . $i);
        } elseif ("icon" == get_option('sf_content_type' . $i)) {
            $icon = get_option('sf_scoial_icon_fa' . $i);
            echo "<i class='fa fa-$icon'></i>";
        }
        ?>
            </div>

    <?php }
} ?>

</div>
<?php if ("yes" == get_option('sf_redirection_en')) { ?>
    <!-- ajax load indicator -->
    <div id="sf-ajax-load"></div>
<?php } ?>
<!--close -->
<div id="sf_close">
    <i class="fa fa-times-circle"></i>
</div>
<!-- cookies -->
<script type="text/javascript">
    //Create Cookie Function
    function createCookie(name,value,days) {
        if (days) {
            var d = new Date();
            d.setTime(d.getTime()+(days*24*60*60*1000));
            var expires = " expires="+d.toGMTString()+";";
        }
        else{
            var expires = "";
        }
        document.cookie = name+"="+value+";"+expires+" path=/";
    }
    //read cookie
    function getCookie(name) {
        var name_to_check = name + "=";
        var ca_str = document.cookie.split(';');
        for(var i=0;i < ca_str.length;i++) {
            var c = ca_str[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(name_to_check) == 0) return true;
        }
        return false;
    }
    jQuery('#sf_close').click(function(){
<?php echo (get_option('sf_close_duration') != 0) ? "createCookie('sf_close','yes'," . get_option('sf_close_duration') . ");" : "createCookie('sf_close','yes');"; ?>
            jQuery('#circlebot').hide();
            jQuery(this).hide();
        });
        //console.log(getCookie('sf_close'));
</script>
<!-- cookied END -->

<style type="text/css">




    .circlebot span{
        display: inline-block;
        vertical-align: middle;
        line-height: normal;
        color:<?php echo get_option('sf_main_font_color'); ?>;
        font-size:<?php echo get_option('sf_main_font_size'); ?>px;
    }


    .circlebot{
        position:fixed;
        z-index:9999999;
        text-align:center;
<?php
echo 'background-color:' . get_option("sh_color") . ';';
if ("yes" == get_option('sf_cent_bg_img_en')) {
    echo 'background-image:url("' . get_option("sf_cent_bg_img") . '");';
    echo 'background-size: cover;';
    echo 'background-repeat: no-repeat;';
    echo 'background-position: center;';
}
?>

    }


<?php if ("yes" == get_option('sf_redirection_en')) { ?>
        #sf-ajax-load{
            left:0;
            top:0;
            position: fixed;    
            width:100%;
            height:6px;
            z-index:9999999;
            display:none;


            background: repeating-linear-gradient(45deg,#66cc66 6px,#17ad49 6px,#17ad49 12px,#66cc66 12px,#66cc66 24px);
            -webkit-animation-name: sfajaxload;
            -webkit-animation-duration: 25s;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-timing-function: linear;
            -moz-animation-name: sfajaxload;
            -moz-animation-duration: 25s;
            -moz-animation-iteration-count: infinite;
            -moz-animation-timing-function: linear;
            -o-animation-name: sfajaxload;
            -o-animation-duration: 25s;
            -o-animation-iteration-count: infinite;
            -o-animation-timing-function: linear;
            -ms-animation-name: sfajaxload;
            -ms-animation-duration: 25s;
            -ms-animation-iteration-count: infinite;
            -ms-animation-timing-function: linear;
            -wap-animation-name: sfajaxload;
            -wap-animation-duration: 25s;
            -wap-animation-iteration-count: infinite;
            -wap-animation-timing-function: linear;
            -khtml-animation-name: sfajaxload;
            -khtml-animation-duration: 25s;
            -khtml-animation-iteration-count: infinite;
            -khtml-animation-timing-function: linear;
            animation-name: sfajaxload;
            animation-duration: 25s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }


        @-webkit-keyframes sfajaxload {
            from {
            background-position: 0 0;
        }
        to {
            background-position: 1500px 0;
        }
        }
        @-moz-keyframes sfajaxload {
            from {
            background-position: 0 0;
        }
        to {
            background-position: 1500px 0;
        }
        }
        @-o-keyframes sfajaxload {
            from {
            background-position: 0 0;
        }
        to {
            background-position: 1500px 0;
        }
        }
        @-ms-keyframes sfajaxload {
            from {
            background-position: 0 0;
        }
        to {
            background-position: 1500px 0;
        }
        }
        @-wap-keyframes sfajaxload {
            from {
            background-position: 0 0;
        }
        to {
            background-position: 1500px 0;
        }
        }
        @-khtml-keyframes sfajaxload {
            from {
            background-position: 0 0;
        }
        to {
            background-position: 1500px 0;
        }
        }
        @keyframes sfajaxload {
            from {
            background-position: 0 0;
        }
        to {
            background-position: 1500px 0;
        }
        }
<?php } ?>
</style>
<?php require_once('responsive-css.php');?>