<html>
    <head>
        <?php $this->load->view('admin/head') ;?>
    </head>
    <body style="">
        <div class="log-w3">
            <div class="w3layouts-main">
                <h2>Sign In Now</h2>
                    <form action="#" method="post">
                        <input type="" class="ggg" name="username" placeholder="USERNAME" required="">
                        <input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
                        <span><input type="checkbox">Remember Me</span>
                        <h6><a href="#">Forgot Password?</a></h6>
                            <div class="clearfix"></div>
                            <div style="color:red"><?php echo form_error('login'); ?></div>
                            <input type="submit" value="Sign In" name="login">
                    </form>
                    <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p>
            </div>
        </div>
        <script src="<?php echo public_url('admin') ?>/js/bootstrap.js"></script>
        <script src="<?php echo public_url('admin') ?>/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="<?php echo public_url('admin') ?>/js/scripts.js"></script>
        <script src="<?php echo public_url('admin') ?>/js/jquery.slimscroll.js"></script>
        <script src="<?php echo public_url('admin') ?>/js/jquery.nicescroll.js"></script>
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
        <script src="<?php echo public_url('admin') ?>/js/jquery.scrollTo.js"></script>
    </body>
</html>