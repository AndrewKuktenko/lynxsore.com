
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
                <?php if ($result) : ?>
                    <p>Order is complete! We will call you!</p>
                <?php else: ?>
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Последние товары</h2>
                    </div><!--features_items-->
                    <h2>To accept your order fill the blank. Our managers will call you.</h2>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif;?>
                    <div class="signup-form"><!--sign up form-->
                        <h2>Your cart has <?php echo $totalQuantity; ?> products, with total price <?php echo $totalPrice; ?>$</h2>
                        <form action="#" method="post">
                            <p>Your name</p>
                            <input type="text" placeholder="Name" name="userName" value="<?php echo $userName; ?>"/>
                            <p>Mobile phone</p>
                            <input type="text" placeholder="Phone" name="userPhone" value="<?php echo $userPhone; ?>"/>
                            <p>Comment</p>
                            <input type="text" placeholder="Comment" name="userComment" value="<?php echo $userComment; ?>"/>
                            <input type="submit" value="Send" class="btn btn-default" name="submit"></input>
                        </form>
                    </div><!--/sign up form-->
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php include(ROOT.'/views/layouts/footer.php'); ?>