<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no" />
    <title><?php echo $title; ?></title>
    <!-- Base URL to use for all relative URLs contained within the document -->
    <base href="<?php echo base_url(); ?>">


    <meta name="description" content="A guestbook application to write a new entry in the guestbook which consists of two types of users. Guests and Administrator." />
    <!-- Control the behavior of search engine crawling and indexing -->
    <meta name="robots" content="index,follow"><!-- All Search Engines -->
    <meta name="googlebot" content="index,follow"><!-- Google Specific -->
    <meta name="robots" content="index, follow" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="guestbook.ico">
    <link rel="icon" type="image/png" href="guestbook-32x32.ico" sizes="32x32">
    <link rel="icon" type="image/png" href="guestbook-16x16.ico" sizes="16x16">
    <link rel="shortcut icon" href="guestbook.ico">

    <!-- Verify website ownership -->
    <meta name="google-site-verification" content="***************************"><!-- Google Search Console -->
    <meta name="msvalidate.01" content="*******************************"><!-- Bing Webmaster Center -->
    <meta name="keywords" content="Guestbook" />
    <meta name="author" content="Shital Patil" />

    <!-- Points to an external CSS style sheet -->
    <link rel="canonical" href="<?php echo base_url(); ?>">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/compiled.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row header">
            <div class="col-sm-10 pt-5">
                <?php $this->load->view("templates/header"); ?>
            </div>
        </div>
    
        <div class="row">
            <div class="col-sm-10 m-auto">
                <?php
                if (isset($content)) {
                    echo $content; // document pages
                } else {
                    $this->load->view($viewFile); // other pages
                }
                ?>
            </div>
        </div>
        
        <hr>
        <div class="row footer">
            <div class="col-sm-10 ">
                <?php $this->load->view("templates/footer"); ?>
            </div>
        </div>
    </div>
</body>

</html>