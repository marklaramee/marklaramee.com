<!doctype html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-32733537-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-32733537-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/styles.css" />
    <?php
      if(empty($title)) {
        $title = "";
      } else {
        $title = " | " . $title;
      }
      echo "<title>Mark Laramee" . $title . "</title>";
      
      if($activeNav == "contact") {
        echo "<script src='https://www.google.com/recaptcha/api.js'></script>";
      }
    ?>
  </head>
  <body>
    <div class="container-fluid container--meifier">
      <div id="meifier" class="container--body"></div>
    </div>
    <div class="container-fluid container--nav-outer">
      <?php include 'navigation.php'; ?>
    </div>
    <div class="container-fluid container--main-outer">
      <div class="container--main container--body">