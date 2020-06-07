<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= !empty($title) ? $title : "Animeindo - Nonton Film Anime Terbaik  Dan terupdate" ?></title>
    <meta name="author" content="Admin Animeindo">
    <meta name="description" content="<?= !empty($description) ? $description : "Animeindo Tempat Nonton Film Anime Terbaik  Dan terupdate Dengan Subtitile Indonesia" ?>" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="video.movie.artikel" />
    <meta property="og:title" content="<?= !empty($og_title) ? $og_title : "Animeindo - Nonton Film Anime Terbaik  Dan terupdate" ?>" />
    <meta property="og:description" content="<?= !empty($description) ? $description : "Animeindo Tempat Nonton Film Anime Terbaik  Dan terupdate Dengan Subtitile Indonesia" ?>" />
    <meta property="og:url" content="<?= !empty($og_url) ? $og_url : base_url() ?>" />
    <meta property="og:site_name" content="Animeindo.link" />
    <meta property="article:publisher" content="Admin Animeindo" />
    <meta property="article:section" content="<?= !empty($article_section) ? $article_section : date('Y-m-d : h:i') ?>" />
    <meta property="article:published_time" content="<?= !empty($article_p_time) ? $article_p_time : date('Y-m-d : h:i') ?>" />
    <meta property="article:modified_time" content="<?= !empty($article_m_time) ? $article_m_time : date('Y-m-d : h:i') ?>" />
    <meta property="og:updated_time" content="<?= !empty($article_u_time) ? $article_u_time : date('Y-m-d : h:i') ?>" />
    <meta property="og:image" content="<?=base_url('_themes/')?>meta_image.jpg" />
    <meta property="og:image:width" content="850">
    <meta property="og:image:height" content="450">
    <meta property="og:image:type" content="image/png" />
    <meta name="twitter:description" content="<?= !empty($description) ? $description : "Animeindo Tempat Nonton Film Anime Terbaik  Dan terupdate Dengan Subtitile Indonesia" ?>" />
    <meta name="twitter:title" content="<?= !empty($title) ? $title : "Animeindo - Nonton Film Anime Terbaik  Dan terupdate" ?>" />
    <meta name="twitter:site" content="@animeindo_link" />
    <meta name="twitter:image" content="<?=base_url('_themes/')?>meta_image.jpg"/>
    <link rel="icon" type="image/png" href="<?=base_url('_themes/')?>icon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="<?=base_url('_themes/')?>icon/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('_themes/')?>icon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('_themes/')?>icon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=base_url('_themes/')?>icon/apple-touch-icon-144x144.png">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="<?=base_url('_themes/')?>css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?=base_url('_themes/')?>css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?=base_url('_themes/')?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url('_themes/')?>css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?=base_url('_themes/')?>css/nouislider.min.css">
    <link rel="stylesheet" href="<?=base_url('_themes/')?>css/ionicons.min.css">
    <link rel="stylesheet" href="<?=base_url('_themes/')?>css/plyr.css">
    <link rel="stylesheet" href="<?=base_url('_themes/')?>css/photoswipe.css">
    <link rel="stylesheet" href="<?=base_url('_themes/')?>css/default-skin.css">
    <link rel="stylesheet" href="<?=base_url('_themes/')?>css/main.css">

    <!-- Favicons -->
    

    <style>
    .iframe-container {
        overflow: hidden;
        padding-top: 56.25%;
        position: relative;
        margin-bottom: 10px;
    }

    .iframe-container iframe {
        border: 0;
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        width: 100%;
    }

    .player-button {
        color: #de4f91;
        margin-right: 10px;
        font-size: 30px;
    }

    .player-quality {
        color: #de4f91;
        margin-right: 10px;
        font-size: 20px;
    }

    .player-quality i:before {
        background-image: -webkit-linear-gradient(0deg, #ff55a5 0%, #ff5860 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        color: #ff5860;
    }

    .card__noimage {
        position: relative;
        -webkit-box-shadow: none;
        box-shadow: none;
        -webkit-transition: 0.4s ease;
        -moz-transition: 0.4s ease;
        transition: 0.4s ease;
    
    }

    .card__tnoimage {
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 60px;
        height: 60px;
        top: 50%;
        left: 50%;
        margin: -30px 0 0 -30px;
        z-index: 2;
        font-size: 30px;
        color: #fff;
    }

    </style>
</head>