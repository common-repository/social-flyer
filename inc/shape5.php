<?php
$size = get_option('sf_size') * 2;
$w = $size + 120;
$h = $size + 120;
$r = $w / 2;
$Asdsquare = pow($r, 2);
$Bsdsquare = pow($r, 2);
$D = $Asdsquare + $Bsdsquare;
$rs = sqrt($D);
$resultd = $rs / 2;
$cwh = $resultd / 2;
$cen = $r - $cwh;
$sepwh = (($cwh * 25) / 100) + $cwh;
$sepwh4 = (($cwh * 102.5) / 100) + $cwh;
?>
<style type="text/css">

    .circlebot
    {
        width:<?php echo $w; ?>px;
        height:<?php echo $w; ?>px;
        background-color:#FF8000;
        border-radius:100%;
        border-top-left-radius:0;
        line-height:<?php echo $w; ?>px;
    }

    .circlebot1, .circlebot2, .circlebot3, .circlebot4,.circlebot5, .circlebot6,.circlebot7,.circlebot8
    {
        width:<?php echo $resultd; ?>px;
        height:<?php echo $resultd; ?>px;
        border-radius:100%;
        border-top-left-radius:0;
        position:absolute;
        text-align:center;
        line-height:<?php echo $resultd; ?>px;
    }
    #sf_close{
        border-radius:100%;
        border-top-left-radius:0;
    }
    <?php for ($i = 1; $i <= 8; $i++) {
        if ("yes" == get_option('sf_enable_border_hover' . $i)) {
            ?>
            .circlebot<?php echo $i; ?>:after{
                border-radius:100%;
                border-top-left-radius:0;
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
        <?php
        }
    }
    //for border spacing
    $resultd = $resultd + 10;
    $cwh = $cwh + 5;
    $sepwh4 = $sepwh4 + 5;
    $sepwh = $sepwh + 5;
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
        top:-<?php echo $cwh; ?>px;
        right:-<?php echo $cwh; ?>px;
    }

    .circlebot3
    {
        /*c7*/
        top:<?php echo $cen; ?>px;
        right:-<?php echo $resultd; ?>px;
    }
    .circlebot4{
        bottom:-<?php echo $sepwh; ?>px;
        right:-<?php echo $sepwh; ?>px;
    }

    .circlebot5{
        bottom:-<?php echo $resultd; ?>px;
        right:<?php echo $cen; ?>px;
    }
    .circlebot6{
        bottom:-<?php echo $cwh; ?>px;
        left:-<?php echo $cwh; ?>px;
    }
    .circlebot7{
        bottom:<?php echo $cen; ?>px;
        left:-<?php echo $resultd; ?>px;
    }
    .circlebot8{
        top:-<?php echo $sepwh4; ?>px;
        left:-<?php echo $sepwh4; ?>px;
    }


</style>


<?php $this->common_js_css(); ?>
