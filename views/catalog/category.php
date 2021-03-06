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
                                            <h4 class="panel-title"><a href="/category/<?php echo $categoriesList[$i]["id"]; ?>"
                                                class="<?php if($categoryId == $categoriesList[$i]["id"]) echo 'active'; ?>"><?php echo $categoriesList[$i]["name"]; ?></a></h4>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Каталог товаров</h2>
                            <?php for($i = 0; $i < count($productsByCategory); $i++){?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo $productsByCategory[$i]["image"]; ?>" alt="" />
                                            <h2><?php echo $productsByCategory[$i]["price"] ?></h2>
                                            <p><a href="/product/<?php echo $productsByCategory[$i]["id"] ?>"><?php echo $productsByCategory[$i]["name"] ?></a></p>
                                            <a href="/cart/add/<?php echo $productsByCategory[$i]["id"] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <?php if($productsByCategory[$i]["is_new"] == 1){ ?>
                                            <img src="/template/images/home/new.png" class="new" alt="" />
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                        </div><!--features_items-->
                    </div>
                </div>
            </div>
        </section>
<?php require ROOT.'/views/layouts/header.php'; ?>
      