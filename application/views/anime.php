<section class="section details">
    <!-- details background -->
    <div class="details__bg" data-bg="<?=$poster?>"></div>
    <!-- end details background -->

    <!-- details content -->
    <div class="container">
        <div class="row">

            <!-- content -->
            <div class="col-12 col-xl-12">
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
                                <h1 class="details__title"><?=$title?></h1>
                                <ul class="card__meta">
                                    <?php foreach($desc as $row=>$key){
                                        echo '<li><span>'.$key.'</span></li>';
                                    }?>

                                </ul>
                                <div class="card__description card__description--details">
                                    <b>SINOPSIS :</b><br>
                                    <?=$sinopsis?>
                                </div>
                            </div>
                        </div>
                        <!-- end card content -->
                    </div>
                </div>
            </div>
            <!-- end content -->
            <!-- end player -->
        </div>
    </div>
    <!-- end details content -->
</section>
<div class="content__head">
</div>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="home__title">
                    <b>Episode List</b></h1>

                <button class="home__nav home__nav--prev" type="button">
                    <i class="icon ion-ios-arrow-round-back"></i>
                </button>
                <button class="home__nav home__nav--next" type="button">
                    <i class="icon ion-ios-arrow-round-forward"></i>
                </button>
            </div>
            <div class="col-12">
                <div class="owl-carousel home__carousel">
                <?php foreach($episode as $rows):?>
                    <div class="item">
                        <div class="card card--big">
                            <div class="card__cover">
                                <img src="<?=$poster?>" alt="<?= createSlug($rows['title'])?>">
                                <a href="<?=str_replace("https://animeindo.asia/", base_url('stream/'), $rows['link'])?>"
                                    class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a
                                        href="<?=str_replace("https://animeindo.asia/", base_url('stream/'), $rows['link'])?>"><?= str_replace('Subtitle Indonesia','',$rows['title'])?></a>
                                </h3>
                                <span class="card__rate">
                                   Subbbed Indo
                                </span><br>
                                
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>
