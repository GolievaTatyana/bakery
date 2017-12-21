<?php $templateUri = get_template_directory_uri();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bakery</title>
  <link rel="shortcut icon" href="<?php echo $templateUri ?>/bread.ico" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo $templateUri ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $templateUri ?>/slick/slick/slick.css">
  <link rel="stylesheet" href="<?php echo $templateUri ?>/slick/slick/slick-theme.css">
  <link rel="stylesheet" href="<?php echo $templateUri ?>/style.css">
  <link rel="stylesheet" href="<?php echo $templateUri ?>/css/jquery.mCustomScrollbar.css" />
  <?php wp_head(); ?>
</head>
  <body>
    <header id="header">
      <div class="main-nav">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
              <nav class="navbar" role="navigation">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>

                  <a class="navbar-brand" href="#">G u s t r o</a>
                </div>
                <div class="collapse navbar-collapse top-menu" id="bs-example-navbar-collapse-1">
                  <?php
                    wp_nav_menu( array(
                      'theme_location'  => 'header_menu',
                      'container'       =>  false,
                      'container_id'    => 'bs-example-navbar-collapse-1',
                      'menu_class'      => 'nav navbar-nav',
                      )
                    );
                  ?>
                  <ul class="nav socio">
                    <?php
                      if ( function_exists('dynamic_sidebar') )
                        dynamic_sidebar('socio');
                    ?>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
