<?php include(ROOT.'/views/layouts/header.php'); ?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <?php if ($result) : ?>
                    <p>Письмо отправленно!</p>
                <?php else : ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif;?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Send message</h2>
                        <form action="#" method="post">
                            <input type="email" name="userEmail" placeholder="E-mail" value="<?php echo $userEmail; ?>"/>
                            <input type="text" name="userText" placeholder="Text" value="<?php echo $userText; ?>"/>
                            <input type="submit" class="btn btn-default" name="submit" value="Send"/>
                        </form>
                    </div><!--/sign up form-->
                <?php endif; ?>
            </div>
        </div>
    </div>
</section><!--/form-->


<?php include(ROOT.'/views/layouts/footer.php'); ?>
