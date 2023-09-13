<?php session_start(); ?>
<!DOCTYPE html>
    <html lang="en">
        <head>
          <?php
              include("resources/connection.php"); 
              include("functions.php"); 
              //  include("/api_config.php"); 
              include("resources/pageInfo.php"); 
          ?>
              <title><?= $_SESSION['CurrentPage']; ?></title>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <meta name='description' content="<?= $_SESSION['Description']; ?>">            
              <meta name="author" content="<?= $_SESSION['ArticleAuthor']; ?>">
              <link rel="icon" href="images/halfLogo.png">
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
              <link href="style/bootstrap.css" rel="stylesheet">
              <link href="style/main.css" rel="stylesheet">
              <script src="script/jquery-3.4.1.js"></script>
              <script src="script/bootstrap.js"></script>
              <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-152462977-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', 'UA-152462977-1');
            </script>
            <script data-ad-client="pub-2101096746164261" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        </head>
    <body>
        <div class="container-fluid" id="mainPageContainer">
          <nav class="navbar navbar-expand-lg" id="mainNav">
            <!-- Navbar Logo Image -->
            <div id="navImgContainer">
              <a href="/index.php">
                <img src="images/fullLogo.png" id="navLogoImg">
              </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fa fa-bars fa-2x"></i>
            </button>
            <div id="navbarNav">
              <ul class="navbar-nav" id="navbarMenu">
                <!-- <li class="nav-item">
                  <a class="nav-link navMenuLink" href="/index.php">Home</a>
                </li> -->
                <li class="nav-item active">
                  <a class="nav-link navMenuLink active" href="layout/anime.php">anime</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link navMenuLink" href="layout/lifestyle.php">lifestyle</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link navMenuLink" href="layout/manga.php">manga</a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link navMenuLink" href="layout/news.php">news</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link navMenuLink" href="layout/apps.php">apps</a>
                </li> -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle navMenuLink" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">apps</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="apps/randomNameGenerator.php">Name Generator</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link navMenuLink" href="/layout/about.php">about</a>
                </li> -->
                <!-- <li class="nav-item">
                  <a class="nav-link navMenuLink" href="/layout/contact.php">contact</a>
                </li> -->
                <?php
                if(isset($_SESSION['IsAdmin'])){
                ?>
                <li class="nav-item">
                  <a class="nav-link navMenuLink" href="/admin/index.php">Admin</a>
                </li>
                <?php
                }
                ?>
              </ul>
            </div>
          </nav>
        </div>
        <script src="script/main.js"></script>

      <!-- <div class="modal fade" id="newsletterModal" tabindex="-1" role="dialog" aria-labelledby="newsletterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="container">
              <div class="newsletterModalContent">
                <div class="row">
                  <div class="col-sm-12">
                    <button type="button" class="close" style="font-size: 30px; float:right;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <br>
                    <h4 class="newsletterModalHeader">Subscribe to our newsletter</h4>
                    <br>
                    <h4 class="newsletterModalPrompt"><b>Hey!</b> before you go would you like to sign up for updates to our new posts?</h4>
                  </div>
                </div>
                <form>
                  <div class="input-group">
                    <input id="email" type="text" class="form-control" maxlength="75" name="email" placeholder="Email">
                    <div class="input-group-append">
                      <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div> -->
