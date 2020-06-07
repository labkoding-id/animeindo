<section class="section details">
    <!-- details background -->
    <div class="details__bg" data-bg="<?=$poster?>"></div>
    <!-- end details background -->

    <!-- details content -->
    <div class="container">
        <div class="row">
            <!-- title -->
            <div class="col-12">
                <h1 class="details__title"><?=$title?></h1>
            </div>
            <!-- end title -->

            <!-- content -->
            <div class="col-12 col-xl-6">
                <div class="card card--details">
                    <div class="row">
                        <!-- card cover -->
                        <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
                            <div class="card__cover">
                                <img src="<?=$poster?>" alt="">
                            </div>
                        </div>
                        <!-- end card cover -->

                        <!-- card content -->
                        <div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
                            <div class="card__content">
                                <div class="card__wrap">
                                    <span class="card__rate"><i class="icon ion-ios-videocam"></i>PLAY</span>
                                    <ul class="card__list">
                                        <li><?=$qual?></li>
                                    </ul>
                                </div>

                                <ul class="card__meta">
                                    
                                </ul>
                                <div class="card__description card__description--details">
                                    <?=$sinopsis?>
                                </div>
                            </div>
                        </div>
                        <!-- end card content -->
                    </div>
                </div>
            </div>
            <!-- end content -->

            <!-- player -->
            <div class="col-12 col-xl-6">
                <div class="iframe-container">
                    <iframe class="responsive-iframe" width="540" height="303" id="video" src="<?=$video?>"
                        sandbox="allow-forms allow-pointer-lock allow-same-origin allow-scripts allow-top-navigation"
                        frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                </div>
                <hr>
                <div style="float: right;">
                    <span class="player-quality"><i class="icon ion-ios-videocam"></i></span>
                    <span ><a style="<?= $qual != "SD" ? 'color:white;' : 'color:#ff5860'?>" href="<?=base_url('stream/play/').$slug?>">SD |</a></span>
                    <span ><a style="<?= $qual != "sockshare" ? 'color:white;' : 'color:#ff5860' ?>" href="<?=base_url('stream/playQuality/').$slug.'/sockshare'?>">HD |</a></span>
                    <span ><a style="<?= $qual != "mp4upload" ? 'color:white;' : 'color:#ff5860' ?>" href="<?=base_url('stream/playQuality/').$slug.'/mp4upload'?>">MU |</a></span>
                    <span ><a style="<?= $qual != "dailymotion" ? 'color:white;' : 'color:#ff5860' ?>" href="<?=base_url('stream/playQuality/').$slug.'/dailymotion'?>">AP |</a></span>
                </div>
                <div style="float: left;">
                    <?php if($prev != "#"):?>
                    <a href="<?=str_replace('https://animeindo.asia/', base_url('anime/get/'), $prev)?>"><span
                            class="player-button"><i class="icon ion-ios-arrow-back"></i></span></a>
                    <?php endif;?>
                    <a href="<?=str_replace('https://animeindo.asia/anime/', base_url('anime/'), $list)?>"><span
                            class="player-button"><i class="icon ion-md-list"></i></span></a>
                    <?php if($next != "#"):?>
                    <a href="<?=str_replace('https://animeindo.asia/', base_url('anime/get/'), $next)?>"><span
                            class="player-button"><i class="icon ion-ios-arrow-forward"></i></span></a><?php endif;?>
                </div>
            </div>
            <!-- end player -->
        </div>
    </div>
    <!-- end details content -->
</section>
<!-- end details -->
<div class="content__head">
</div>
<!-- content -->
<section class="content">
    <div class="container">
        <div class="col-12">
            <h2 style="padding-top:30px;" class="section__title">Komentar <?=$title?></h2>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12">
                <div id="disqus_thread"></div>
                <script>
                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document,
                        s = d.createElement('script');
                    s.src = 'https://unipo-ac-id.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                        powered by
                        Disqus.</a></noscript>
            </div>

        </div>
    </div>
</section>
