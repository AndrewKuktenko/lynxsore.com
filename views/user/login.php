<?php include(ROOT.'/views/layouts/header.php'); ?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif;?>

                <div class="signup-form"><!--sign up form-->
                    <h2>Login</h2>
                    <form action="#" method="post">
                        <input type="email" placeholder="Email Address" name="email" value="<?php echo $email; ?>"/>
                        <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>"/>
                        <input type="submit" value="Submit" class="btn btn-default" name="submit"></input>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->


<?php include(ROOT.'/views/layouts/footer.php'); ?>
