<!-- page title -->
<section class="section section--first section--bg" data-bg="<?=base_url('_themes/')?>img/section/section.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__wrap">
                    <!-- section title -->
                    <h2 class="section__title">Animes All</h2>
                    <!-- end section title -->

                    <!-- breadcrumb -->
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a href="<?=base_url()?>">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">Animes</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->

<!-- pricing -->
<div class="section">
    <div class="container">
        <div class="row">
            <?php foreach($all as $rows) :?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card__content accordion" id="accordion">
                        <table class="accordion__list">
                       
                            <tbody>
                                <thead>
									<tr>
										<th>#</th>
										<th><?= $rows['letter']?></th>
										
									</tr>
                                </thead>
                                <?php $i = 1;foreach($rows['list'] as $list) :?>
                                <tr>
                                    <th><?=$i++?></th>
                                    <td><a href="<?=str_replace('https://animeindo.asia/',base_url(),$list['link'])?>"><span style="text-transform:capitalize; color:white;"><?=$list['title']?></span></a></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>