<?php
$size = get_option('sf_size') * 2;
$w = $size + 155;
$h = $size + 200;
$r = $w / 2;
$Asdsquare = pow($r, 2);
$Bsdsquare = pow($r, 2);
$D = $Asdsquare + $Bsdsquare;
$rs = sqrt($D);
$resultd = $rs / 2;
$cwh = $resultd / 2;
$sepwh2_right = $cwh + (($cwh * 20) / 100);
$sepwh2_top = ($cwh * 25) / 100;
$cen = $r - $cwh;
$mr_top = $cen + (($cen * 66) / 100);
$c6 = $cen - (($cen * 35) / 100);
?>
<style type="text/css">

    .circlebot
    {
        width:<?php echo $w; ?>px;
        height:<?php echo $h; ?>px;
        background-color:#FF8000;
        border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;	
        line-height:<?php echo $h; ?>px;
    }

    .circlebot1, .circlebot2, .circlebot3, .circlebot4,.circlebot5, .circlebot6,.circlebot7,.circlebot8
    {
        width:<?php echo $resultd; ?>px;
        height:<?php echo $resultd; ?>px;
        border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
        position:absolute;
        text-align:center;
        line-height:<?php echo $resultd; ?>px;
    }
    #sf_close{
        border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
    }
    <?php
    //for border spacing
    $resultd = $resultd + 10;
    $cwh = $cwh + 5;
    $sepwh2_top = $sepwh2_top + 3;
    $sepwh2_right = $sepwh2_right + 3;
    ?>
    .circlebot1
    {
        /*c5*/
        top:-<?php echo $resultd; ?>px;
        right:<?php echo $cen; ?>px;
    }
    .circlebot2
    {
        /*c4*/
        top:-<?php echo $sepwh2_top; ?>px;
        right:-<?php echo $sepwh2_right; ?>px;
    }

    .circlebot3
    {
        /*c7*/
        top:<?php echo $mr_top; ?>px;
        right:-<?php echo $resultd; ?>px;
    }
    .circlebot4{
        /*c1*/
        bottom:-<?php echo $c6; ?>px;
        right:-<?php echo $c6; ?>px;
    }

    .circlebot5{
        bottom:-<?php echo $resultd; ?>px;
        right:<?php echo $cen; ?>px;
    }
    .circlebot6{
        bottom:-<?php echo $c6; ?>px;
        left:-<?php echo $c6; ?>px;

    }
    .circlebot7{
        top:<?php echo $mr_top; ?>px;
        left:-<?php echo $resultd; ?>px;
    }
    .circlebot8{
        top:-<?php echo $sepwh2_top; ?>px;
        left:-<?php echo $sepwh2_right; ?>px;
    }

    <?php for ($i = 1; $i <= 8; $i++) {
        if ("yes" == get_option('sf_enable_border_hover' . $i)) {
            ?>
            .circlebot<?php echo $i; ?>:after{
                border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
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
