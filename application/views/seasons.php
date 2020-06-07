<section class="home home--bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="home__title">
                    <b>ANIME SESSION'S</b></h1>

                <button class="home__nav home__nav--prev" type="button">
                    <i class="icon ion-ios-arrow-round-back"></i>
                </button>
                <button class="home__nav home__nav--next" type="button">
                    <i class="icon ion-ios-arrow-round-forward"></i>
                </button>
            </div>
            <div class="owl-carousel home__carousel">
                <?php foreach($result as $rows):?>
                <div class="item">
                    <div class="card card--big">
                        <div class="card__noimage">
                            <img src="<?=base_url('_themes/')?>genses.jpg" alt="<?= createSlug($rows['name'])?>">
                            <a href="<?=$rows['link']?>" class="card__tnoimage">
                                <?=$rows['name']?>
                            </a>
                        </div>
                        <div class="card__content">
                            <span class="card__rate">
                                Season
                            </span><br>
                            <h3 class="card__title"><a href="<?=$rows['link']?>"><?=$rows['name']?></a>
                            </h3>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>
<div class="content__head">
</div>