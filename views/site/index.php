
<?php include(ROOT.'/views/layouts/header.php'); ?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products">


                                <?php foreach ($categories as $categoryItem): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="/category/<?php echo $categoryItem['id'];?>"><?php echo $categoryItem['name'] ?></a></h4>
                                    </div>
                                </div>
                                <?php endforeach; ?>


                            </div>

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Последние товары</h2>

<!--                            <div class="col-sm-4">-->
<!--                                <div class="product-image-wrapper">-->
<!--                                    <div class="single-products">-->
<!--                                        <div class="productinfo text-center">-->
<!--                                            <img src="/template/images/home/product4.jpg" alt="" />-->
<!--                                            <h2>$56</h2>-->
<!--                                            <p>Easy Polo Black Edition</p>-->
<!--                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>-->
<!--                                        </div>-->
<!--                                        <img src="/template/images/home/new.png" class="new" alt="" />-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                            <?php foreach ($latestProducts as $productItem) : ?>
<!--                                <div class="col-sm-4">-->
<!--                                    <div class="product-image-wrapper">-->
<!--                                        <div class="single-products">-->
<!--                                            <div class="productinfo text-center">-->
<!--                                                <img src="/template/images/home/product1.jpg" alt="" />-->
<!--                                                <h2>--><?php //echo $productItem['price'];?><!--$</h2>-->
<!--                                                <p><a href="/product/--><?php //echo $productItem['id']?><!--">--><?php //echo $productItem['name'];?><!--</a></p>-->
<!--                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>-->
<!--                                            </div>-->
<!--                                            --><?php //if ($productItem['is_new']) :?>
<!--                                                <img src="/template/images/home/new.png" class="new" alt=""/>-->
<!--                                            --><?php //endif; ?>
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo Product::getImage($productItem['id']); ?>" width="200" alt="" />
                                                <h2><?php echo $productItem['price'];?>$</h2>
                                                <p><a href="/product/<?php echo $productItem['id'];?>"><?php echo $productItem['name'];?></a></p>
                                                <a href="#" data-id="<?php echo $productItem['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                            <?php if ($productItem['is_new']) :?>
                                                <img src="/template/images/home/new.png" class="new" alt=""/>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div><!--features_items-->

                        <?php echo $pagination->get(); ?>

<!--                        <div class="recommended_items"><!--recommended_items-->
<!--                            <h2 class="title text-center">Рекомендуемые товары</h2>-->
<!---->
<!--                            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">-->
<!--                                <div class="carousel-inner">-->
<!--                                    --><?php //foreach ($recommended as $recommendedItem): ?>
<!--                                    <div class="item active">-->
<!--                                        <div class="col-sm-4">-->
<!--                                            <div class="product-image-wrapper">-->
<!--                                                <div class="single-products">-->
<!--                                                    <div class="productinfo text-center">-->
<!--                                                        <img src="/template/images/home/recommend3.jpg" alt="" />-->
<!--                                                        <h2>$--><?php //echo $recommendedItem['price']; ?><!--</h2>-->
<!--                                                        <p>--><?php //echo $recommendedItem['name']; ?><!--</p>-->
<!--                                                        <a href="#" data-id="--><?php //echo $recommendedItem['id'];?><!--" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    --><?php //endforeach; ?>
<!--                                    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">-->
<!--                                    <i class="fa fa-angle-left"></i>-->
<!--                                    </a>-->
<!--                                    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">-->
<!--                                    <i class="fa fa-angle-right"></i>-->
<!--                                    </a>-->
<!--                                </div>-->
<!--                            </div><!--/recommended_items-->
<!--                        </div>-->
                        <div class="cycle-slideshow"
                             data-cycle-fx=carousel
                             data-cycle-timeout=5000
                             data-cycle-carousel-visible=3
                             data-cycle-carousel-fluid=true
                             data-cycle-slides="div.item"
                             data-cycle-next="#next"
                             data-cycle-prev="#prev"

                             id="recommended-item-carousel"
                        >
                            <?php foreach ($recommended as $recommendedItem): ?>
                                <div class="item">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo Product::getImage($recommendedItem['id']); ?>" width="200" alt="" />
                                                <h2>$<?php echo $recommendedItem['price']; ?></h2>
                                                <p><?php echo $recommendedItem['name']; ?></p>
                                                <a href="#" data-id="<?php echo $recommendedItem['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <a class="left recommended-item-control" href="#recommended-item-carousel" id="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" id="next">
                                <i class="fa fa-angle-right"></i>
                            </a>

                        </div>
                     </div>
                </div>
            </div>
        </section>

<?php include(ROOT.'/views/layouts/footer.php'); ?>

