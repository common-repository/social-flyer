<?php
$size = get_option('sf_size');
$w = $size + 200;
$h = $size + 100;
$r = $w / 2;
$hh = $h / 2;
$Asdsquare = pow($r, 2);
$Bsdsquare = pow($hh, 2);
$D = $Asdsquare + $Bsdsquare;
$rs = sqrt($D);
$resultd = $rs / 2;
$resultd_height = $resultd - (($resultd * 30) / 100);
$cwhh = $resultd_height / 2;
$cwh = $resultd / 2;
$cen_h = $hh - $cwhh;
$cen_w = $r - $cwh;
$sepwh = $cwh + (($cwh * 48) / 100);
?>
<style type="text/css">

    .circlebot
    {
        width:<?php echo $w; ?>px;
        height:<?php echo $h; ?>px;
        background-color:#FF8000;
        border-radius:50%/20%;
        line-height:<?php echo $h; ?>px;

    }


    .circlebot1, .circlebot2, .circlebot3, .circlebot4,.circlebot5, .circlebot6,.circlebot7,.circlebot8
    {
        width:<?php echo $resultd; ?>px;
        height:<?php echo $resultd_height; ?>px;
        border-radius:50%/20%;
        position:absolute;
        text-align:center;
        line-height:<?php echo $resultd_height; ?>px;
    }
   #sf_close{
        border-radius:50%/20%;
        height:40px;
        line-height:40px;
    }

    .circlebot1
    {
        top:-<?php echo $resultd; ?>px;
        right:<?php echo $cen_w; ?>px;
    }
    .circlebot2
    {
        top:-<?php echo $sepwh; ?>px;
        right:-<?php echo $sepwh; ?>px;
    }

    .circlebot3
    {
        top:<?php echo $cen_h; ?>px;
        right:-<?php echo $resultd + 10; ?>px;
    }
    .circlebot4{
        bottom:-<?php echo $sepwh; ?>px;
        right:-<?php echo $sepwh; ?>px;
    }

    .circlebot5{
        bottom:-<?php echo $resultd; ?>px;
        right:<?php echo $cen_w; ?>px;
    }
    .circlebot6{
        bottom:-<?php echo $sepwh; ?>px;
        left:-<?php echo $sepwh; ?>px;
    }
    .circlebot7{
        bottom:<?php echo $cen_h; ?>px;
        left:-<?php echo $resultd + 10; ?>px;
    }
    .circlebot8{
        top:-<?php echo $sepwh; ?>px;
        left:-<?php echo $sepwh; ?>px;
    }

    <?php for ($i = 1; $i <= 8; $i++) {
        if ("yes" == get_option('sf_enable_border_hover' . $i)) {
            ?>
            .circlebot<?php echo $i; ?>:after{
                border-radius:50%/20%;
                background:rgba(255,255,255,0.1);
                border:2px solid <?php echo get_option('sf_each_color_hvr' . $i); ?>;
                position:absolute;
                content:"";
                z-index:-1;
                top:1px;
                left:1px;
                bottom:1px;
                right:1px;
                transition:all ease 0.3s;
            }
            .circlebot<?php echo $i; ?>:hover:after{
                top:-5px;
                bottom:-5px;
                right:-5px;
                left:-5px;
            }
    <?php }
} ?>
</style>


<?php $this->common_js_css(); ?>
