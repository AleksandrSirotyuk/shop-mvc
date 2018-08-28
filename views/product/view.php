<?php require ROOT.'/views/layouts/header.php'; ?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                                <?php for($i = 0; $i < count($categoriesList); $i++){?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a href="/category/<?php echo $categoriesList[$i]["id"]; ?>"
                                                class="<?php if($categoryId == $categoriesList[$i]["id"]) echo 'active'; ?>"><?php echo $categoriesList[$i]["name"]; ?></a></h4>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div><!--/category-products-->

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="<?php echo $getProduct["image"]; ?>" alt="" />
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->
                                        <img src="/template/images/product-details/new.jpg" class="newarrival" alt="" />
                                        <h2><?php echo $getProduct["name"]; ?></h2>
                                        <p>Код товара: <?php echo $getProduct["code"]; ?></p>
                                        <span>
                                            <span>US $<?php echo $getProduct["price"]; ?></span>
                                            <label>Количество:</label>
                                            <input type="text" value="3" />
                                            <button type="button" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </button>
                                        </span>
                                        <p><b>Наличие:</b> На складе <?php echo $getProduct["availability"]; ?></p>
                                        <? if ($getProduct["is_new"] == 1){ ?>
                                        <p><b>Состояние:</b> <?php echo "Новинка"; ?></p>
                                        <?php } ?>
                                        <p><b>Производитель:</b> <?php echo $getProduct["brand"]; ?></p>
                                    </div><!--/product-information-->
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-sm-12">
                                    <h5>Описание товара</h5>
                                    <?php echo $getProduct["description"]; ?>
                                </div>
                            </div>
                        </div><!--/product-details-->

                    </div>
                </div>
            </div>
        </section>
        

        <br/>
        <br/>
<?php require ROOT.'/views/layouts/footer.php'; ?>
      