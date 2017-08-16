
<?php 
global $portfolio_master;
global $template;

echo'['.$template.']ggg';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Well-Paid-Maids</title>

<!-- All CSS -->


<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
 <?php wp_head();?>
</head>
<body>

<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo">
        <a href="<?php get_field('logo_image_url','option');?>"><img src="<?php $logoimage = get_field('loogo_image','option');echo $logoimage['url'];?>" alt="" /></a>
                </div>
            </div>
            <div class="col-sm-8">
                <nav class="top_menu">
                    <div class="mobileMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                        </div>
                        <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'fallback_cb'=>'wellpaid_fallback_menu',
                        'container'=>'',
                        'menu_class'=>'top_menu'
                         ));?>
                         
                        <!--<ul>                                                                                               
                        <li class="current-menu-item"><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Products Used</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                         <li class="cmnBtn bookbtn"><a href="#">Book now</a></li>
                    </ul>-->
                </nav>
            </div>                    
        </div>
    </div>
</header>
    