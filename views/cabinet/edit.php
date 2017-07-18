<?php include(ROOT.'/views/layouts/header.php'); ?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <?php if ($result) : ?>
                    <p>Данные отредактированны!</p>
                <?php else : ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif;?>

                <div class="signup-form"><!--sign up form-->
                    <h2>Edit profile</h2>
                    <form action="#" method="post">
                        <input type="text" placeholder="Name" name="name" value="<?php echo $name; ?>"/>
                        <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>"/>
                        <input type="submit" value="Send" class="btn btn-default" name="submit"></input>
                    </form>
                </div><!--/sign up form-->
                <?php endif; ?>
            </div>
        </div>
    </div>
</section><!--/form-->


<?php include(ROOT.'/views/layouts/footer.php'); ?>
