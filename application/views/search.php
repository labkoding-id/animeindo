<section class="home home--bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="home__title">
                    <b>SEARCING ANIME  <?=$value?> </b></h1>

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
                        <div class="card__cover">
                            <img src="<?=$rows['images']?>" alt="<?= createSlug($rows['title'])?>">
                            <a href="<?=$rows['link']?>" class="card__play">
                                <i class="icon ion-md-list"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="<?=$rows['link']?>"><?=$rows['title']?></a>
                            </h3>
                            <span class="card__rate">
                            <i class="icon ion-md-bookmark"></i><?=$rows['type']?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
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
                        <a class="prev page-numbers" href="<?=$prev != "1" ? base_url('search/').$value.'/'.$prev : base_url() ?>">Prev</a>
                        <?php else:?>
                        <a class="prev page-numbers" href="javascript:void(0)">--</a>
                        <?php endif;?>
                        <span aria-current="page" class="page-numbers current"><?=$current?></span>
                        <?php for ($x = $next; $x <= $i; $x++):?>
                        <?php if($x <= $page):?>
                            <a class="page-numbers" href="<?=base_url('search/').$value.'/'.$x?>"><?=$x?></a>
                        <?php endif;?>
                        <?php endfor;?>
                        <?php if($current != $page): ?>
                        <a class="next page-numbers" href="<?=base_url('search/').$value.'/'.$next?>">Next</a>
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