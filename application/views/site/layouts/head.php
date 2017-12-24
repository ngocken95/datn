<!DOCTYPE html>
<html lang="vi">
<head>
    <title><?php echo $active['name'];?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('template/frontend/css/bootstrap.min.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('template/frontend/css/bootstrap-theme.min.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('template/frontend/css/wolf-animation.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('template/frontend/css/wolf-animation-style-demo.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('template/frontend/css/style.css');?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url('template/frontend/css/font-awesome.min.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('template/frontend/css/magiczoomplus.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('template/frontend/css/morris.css');?>" type="text/css">
<!--    <link rel="stylesheet" href="--><?php //echo base_url('template/frontend/css/jquery.bxslider.css');?><!--" type="text/css">-->

    <script src="<?php echo base_url('template/frontend/js/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('template/frontend/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('template/frontend/js/sidebarmenu.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('template/frontend/js/magiczoomplus.js');?>" type="text/javascript"></script>
<!--    <script src="--><?php //echo base_url('template/frontend/js/jquery.bxslider.js');?><!--" type="text/javascript"></script>-->

    <script src="<?php echo base_url(); ?>template/backend/js/jquery.validate.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('template/frontend/css/owl.carousel.css');?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('template/frontend/css/owl.theme.css');?>"/>
    <script type="text/javascript" src="<?php echo base_url('template/frontend/js/owl.carousel.js');?>"></script>
    <script src="<?php echo base_url('template/frontend/price_format/jquery.priceformat.min.js'); ?>"></script>
    <!--    <script src="http://uhchat.net/code.php?f=1e12f1"></script>-->
    <link href="<?php echo base_url('template/frontend/css/font-roboto.css');?>" type="text/css" rel="stylesheet">

    <style>
        .ribbon-wrapper {
            width: 75px;
            height: 88px;
            overflow: hidden;
            position: absolute;
            top: -3px;
            left: -3px;
            z-index:1;
        }
        .ribbon {
            font: bold 11px sans-serif;
            color: #333;
            text-align: center;
            -webkit-transform: rotate(-45deg);
            -moz-transform:    rotate(-45deg);
            -ms-transform:     rotate(-45deg);
            -o-transform:      rotate(-45deg);
            position: relative;
            padding: 7px 0;
            top: 15px;
            left: -30px;
            width: 120px;
        }
        .hot{
            background-color: #eb811d;
            color: #fff;
        }
        .new{
            background-color: #dceb0f;
            color: #0300ff;
        }
        .discout-ele {
            background-color: #fff;
            font-size: 13px;
            color: #e5101d;
            text-align: center;
            font-weight: 300;
            position: absolute;
            width: 52px;
            height: 22px;
            line-height: 20px;
            border-radius: 2px;
            border: 1px solid #e5101d;
            right: 5px;
            top: 5px;
            z-index: 1;
        }

        .product-buttons {
            margin: 0;
            position: absolute;
            right: 5px;
            top: 35px;
            width: 50px;
            display: none;
            z-index: 1;
        }

        .product-buttons .btn-pro {
            float: left;
            margin: 0 0 8px;
            width: 50px;
            height: 50px;
        }

        .product-buttons .btn-pro a {
            width: 50px;
            height: 50px;
            text-align: center;
            display: inline-block;
            line-height: 50px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            background: #f48eb1;
            color: #fff;
            font-size: 17px;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('.product-item').hover(function () {
                $(this).children('.product-buttons').css('display', 'block');
            }, function () {
                $(this).children('.product-buttons').css('display', 'none');
            })
        })
    </script>
</head>
