<section class="page_breadcrumbs cs gradient background_cover color_overlay section_padding_top_65 section_padding_bottom_65">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
    <h2>Store<br>Launching soon</h2>
</div>
        </div>
    </div>
</section>
<section class="ls section section_padding_bottom_130">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="shop-sorting">
                    <form class="form-inline content-justify vertical-center content-margins">
                        <div>  </div> 
                        <select aria-required="true" id="date" name="date" class="form-control wrap-select-group">
                            <option value="">Default Sorting</option>
                            <option value="value">by Value</option>
                            <option value="date">by Date</option>
                            <option value="popular">by Popularity</option>
                        </select> 
                    </form>
                </div>
                <div class="columns-3">
                    <ul id="products" class="products list-unstyled">
                        <?php foreach($results as $row){ ?>
                        <li class="product type-product">
                            <div class="vertical-item content-padding text-center with_border">
                                <div class="item-media with_background bottommargin_30"> <img src="http://grabcryptocoins.com/images/shop/01.png" alt="" /> </div>
                                <div class="item-content with_overlapped_button"> <a href="#" class="theme_button round_button color1">
                                        <span class="sr-only">Add to cart</span>
                                        <i class="rt-icon2-shopping-cart"></i>
                                    </a>
                                    <h4 class="entry-title"> <a href="#"><?php echo $row->title; ?></a> </h4>
                                    <?php echo $row->content; ?>
                                    <div class="small-text no-spacing content-justify vertical-center">
                                        <div class="star-rating" title="Rated 4.0 out of 5"> <span style="width:80%">
                                                <strong class="rating">4.0</strong> out of 5
                                            </span> </div>
                                        <div class="price"> <ins>
                                                <span class="amount">$900,99</span>
                                            </ins> </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
<!--                        <li class="product type-product">
                            <div class="vertical-item content-padding text-center with_border">
                                <div class="item-media with_background bottommargin_30"> <img src="http://grabcryptocoins.com/images/shop/02.png" alt="" /> </div>
                                <div class="item-content with_overlapped_button"> <a href="#" class="theme_button round_button color1">
                                        <span class="sr-only">Add to cart</span>
                                        <i class="rt-icon2-shopping-cart"></i>
                                    </a>
                                    <h4 class="entry-title"> <a href="#">Magnum - Nvida GeForce GTX Ti 4GB</a> </h4>
                                    <p class="content-3lines-ellipsis">Kielbasa ribeye bacon boudin drumstick cupim flank sausage short loin shoulder pork belly.</p>
                                    <div class="small-text no-spacing content-justify vertical-center">
                                        <div class="star-rating" title="Rated 3.0 out of 5"> <span style="width:60%">
                                                <strong class="rating">3.0</strong> out of 5
                                            </span> </div>
                                        <div class="price"> <ins>
                                                <span class="amount">$580,99</span>
                                            </ins> </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product type-product">
                            <div class="vertical-item content-padding text-center with_border">
                                <div class="item-media with_background bottommargin_30"> <img src="http://grabcryptocoins.com/images/shop/03.png" alt="" /> </div>
                                <div class="item-content with_overlapped_button"> <a href="#" class="theme_button round_button color1">
                                        <span class="sr-only">Add to cart</span>
                                        <i class="rt-icon2-shopping-cart"></i>
                                    </a>
                                    <h4 class="entry-title"> <a href="#">One - XLR8 Nvida GeForce GDDR</a> </h4>
                                    <p class="content-3lines-ellipsis">Jowl strip steak bacon tenderloin venison short ribs. Pancetta pork loin kielbasa venison turducken.</p>
                                    <div class="small-text no-spacing content-justify vertical-center">
                                        <div class="star-rating" title="Rated 4.5 out of 5"> <span style="width:90%">
                                                <strong class="rating">4.5</strong> out of 5
                                            </span> </div>
                                        <div class="price"> <ins>
                                                <span class="amount">$439,99</span>
                                            </ins> </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product type-product">
                            <div class="vertical-item content-padding text-center with_border">
                                <div class="item-media with_background bottommargin_30"> <img src="http://grabcryptocoins.com/images/shop/04.png" alt="" /> </div>
                                <div class="item-content with_overlapped_button"> <a href="#" class="theme_button round_button color1">
                                        <span class="sr-only">Add to cart</span>
                                        <i class="rt-icon2-shopping-cart"></i>
                                    </a>
                                    <h4 class="entry-title"> <a href="#">XFX - AMD Rameon RX 4GB </a> </h4>
                                    <p class="content-3lines-ellipsis">Pig shank pork belly ham frankfurter. Capicola flank boudin picanha sausage landjaeger. doner salami.</p>
                                    <div class="small-text no-spacing content-justify vertical-center">
                                        <div class="star-rating" title="Rated 4.0 out of 5"> <span style="width:80%">
                                                <strong class="rating">4.0</strong> out of 5
                                            </span> </div>
                                        <div class="price"> <ins>
                                                <span class="amount">$300,99</span>
                                            </ins> </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product type-product">
                            <div class="vertical-item content-padding text-center with_border">
                                <div class="item-media with_background bottommargin_30"> <img src="http://grabcryptocoins.com/images/shop/05.png" alt="" /> </div>
                                <div class="item-content with_overlapped_button"> <a href="#" class="theme_button round_button color1">
                                        <span class="sr-only">Add to cart</span>
                                        <i class="rt-icon2-shopping-cart"></i>
                                    </a>
                                    <h4 class="entry-title"> <a href="#">PNY - Nvida GeForce GT  2GB</a> </h4>
                                    <p class="content-3lines-ellipsis">Boudin bacon frankfurter beef ribs, capicola shank jerky spare ribs pastrami ground round.</p>
                                    <div class="small-text no-spacing content-justify vertical-center">
                                        <div class="star-rating" title="Rated 5.0 out of 5"> <span style="width:100%">
                                                <strong class="rating">5.0</strong> out of 5
                                            </span> </div>
                                        <div class="price"> <ins>
                                                <span class="amount">$879,99</span>
                                            </ins> </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product type-product">
                            <div class="vertical-item content-padding text-center with_border">
                                <div class="item-media with_background bottommargin_30"> <img src="http://grabcryptocoins.com/images/shop/01.png" alt="" /> </div>
                                <div class="item-content with_overlapped_button"> <a href="#" class="theme_button round_button color1">
                                        <span class="sr-only">Add to cart</span>
                                        <i class="rt-icon2-shopping-cart"></i>
                                    </a>
                                    <h4 class="entry-title"> <a href="#">PNY - Ventu Nvida GeForce GT</a> </h4>
                                    <p class="content-3lines-ellipsis">Boudin meatball sirloin, drumstick strip steak turducken venison shankle pig. Short loin capicola pancetta.</p>
                                    <div class="small-text no-spacing content-justify vertical-center">
                                        <div class="star-rating" title="Rated 2.0 out of 5"> <span style="width:40%">
                                                <strong class="rating">2.0</strong> out of 5
                                            </span> </div>
                                        <div class="price"> <ins>
                                                <span class="amount">$522,99</span>
                                            </ins> </div>
                                    </div>
                                </div>
                            </div>
                        </li>-->
                    </ul>
                </div>
                <!-- eof .columns-* -->
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <!--<ul class="pagination">-->
                            <?php echo $links;?>
<!--                            <li class="disabled"><a href="#"><span class="sr-only">Prev</span><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><span class="sr-only">Next</span><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>-->
                        <!--</ul>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>