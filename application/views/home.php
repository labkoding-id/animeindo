<!-- home -->
<section class="home home--bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="home__title">
                    <b><?= $this->uri->segment(1) == 'page' ? 'PAGE ANIME '. $number : 'LATEST ANIME '?> </b></h1>

                <button class="home__nav home__nav--prev" type="button">
                    <i class="icon ion-ios-arrow-round-back"></i>
                </button>
                <button class="home__nav home__nav--next" type="button">
                    <i class="icon ion-ios-arrow-round-forward"></i>
                </button>
            </div>

            <div class="col-12">
                <div class="owl-carousel home__carousel">
                    <?php foreach($anime as $rows):?>
                    <div class="item">
                        <div class="card card--big">
                            <div class="card__cover">
                                <img src="<?=$rows['image']?>" alt="<?= createSlug($rows['title'])?>">
                                <a href="<?=str_replace("https://animeindo.asia/", base_url('stream/'), $rows['link'])?>"
                                    class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a
                                        href="<?=str_replace("https://animeindo.asia/", base_url('stream/'), $rows['link'])?>"><?= $rows['title']?></a>
                                </h3>
                                <span class="card__rate">
                                    Subtitle Indonesia
                                </span><br>
                                <span class="card__rate"><i class="icon ion-md-alarm"></i><?=$rows['publish']?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="col-12">
                <div class="pagination-wrapper">
                    <div class="pagination">
                        <?php 
                        $next = $current+1;
                        $prev = $current-1;
                        $page = str_replace('Page '.$number.' of ', '', $pages);
                        $page = str_replace('.', '', $page);
                        $i    = $number + 5;
                        ?>
                        <?php if($current != 1): ?>
                        <a class="prev page-numbers" href="<?=$prev != "1" ? base_url('page/').$prev : base_url() ?>">Prev</a>
                        <?php else:?>
                        <a class="prev page-numbers" href="javascript:void(0)">--</a>
                        <?php endif;?>

                        <span aria-current="page" class="page-numbers current"><?=$current?></span>
                        <?php for ($x = $current+1; $x <= $i; $x++):?>
                        <?php if($x <= $page):?>
                        <a class="page-numbers" href="<?=base_url('page/').$x?>"><?=$x?></a>
                        <?php endif;?>
                        <?php endfor;?>

                        <?php if($current != $page): ?>
                        <a class="next page-numbers" href="<?=base_url('page/').$next?>">Next</a>
                        <?php else:?>
                        <a class="prev page-numbers" href="javascript:void(0)">--</a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="content__head">
</div>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="home__title">
                    <b>Anime Airing</b></h1>

                <button class="home__nav home__nav--prev" type="button">
                    <i class="icon ion-ios-arrow-round-back"></i>
                </button>
                <button class="home__nav home__nav--next" type="button">
                    <i class="icon ion-ios-arrow-round-forward"></i>
                </button>
            </div>
            <div class="col-12">
                <div class="owl-carousel home__carousel">
                <?php foreach($airing as $rows):?>
                    <div class="item">
                        <div class="card card--big">
                            <div class="card__cover">
                                <img src="<?=$rows['image']?>" alt="<?= createSlug($rows['title'])?>">
                                <a href="<?=str_replace("https://animeindo.asia/anime/", base_url('anime/'), $rows['link'])?>"
                                    class="card__play">
                                    <i class="icon ion-md-list"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a
                                        href="<?=str_replace("https://animeindo.asia/anime/", base_url('anime/'), $rows['link'])?>"><?= $rows['title']?></a>
                                </h3>
                                <span class="card__rate">
                                    Subtitle Indonesia
                                </span><br>
                                <span class="card__rate"><i class="icon ion-md-bookmark"></i><?=$rows['tipe']?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>
