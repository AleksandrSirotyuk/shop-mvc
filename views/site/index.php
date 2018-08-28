<?php require ROOT.'/views/layouts/header.php'; ?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products">
                                <?php for($i = 0; $i < count($categoriesList); $i++){?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a href="/category/<?php echo $categoriesList[$i]["id"]; ?>"><?php echo $categoriesList[$i]["name"]; ?></a></h4>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Последние товары</h2>
                            <?php for($i = 0; $i < count($latestProducts); $i++){?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo $latestProducts[$i]["image"]; ?>" alt="" />
                                            <h2><?php echo $latestProducts[$i]["price"] ?></h2>
                                            <p><a href="/product/<?php echo $latestProducts[$i]["id"] ?>"><?php echo $latestProducts[$i]["name"] ?></a></p>
                                            <a href="/cart/add/<?php echo $latestProducts[$i]["id"] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <?php if($latestProducts[$i]["is_new"] == 1){ ?>
                                            <img src="/template/images/home/new.png" class="new" alt="" />
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                        </div><!--features_items-->

                        <div class="recommended_items"><!--recommended_items-->
                            <h2 class="title text-center">Рекомендуемые товары</h2>
                                    <?php for ($i=0; $i<3; $i++){ ?>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img height="180px" width="20px" src="<?php echo $recommededProducts[$i]['image'] ?>" alt="" />
                                                        <h2><?php echo $recommededProducts[$i]['price']; ?></h2>
                                                        <p><?php echo $recommededProducts[$i]['name']; ?></p>
                                                        <a href="/cart/add/<?php echo $recommededProducts[$i]["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>		
                            </div>
                        </div><!--/recommended_items-->
                    </div>
                </div>
            </div>
        </section>
<?php require ROOT.'/views/layouts/footer.php'; ?>
      