<html>
    <head>
        <?php $this->load->view('admin/head');?>
    </head>
    <body>
        <section id="container">
            <header class="header fixed-top clearfix">
                <?php $this->load->view('admin/header');?>
            </header>
            <aside>
                <?php $this->load->view('admin/aside') ?>
            </aside>
            <section id="main-content">
                <section class="wrapper">
                    <?php $this->load->view($temp);?>
                </section>
                <div class="footer">
                    <?php $this->load->view('admin/footer');?>
		        </div>
            </section>
        </section>
        <script src="<?php echo public_url('admin') ?>/js/bootstrap.js"></script>
        <script src="<?php echo public_url('admin') ?>/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="<?php echo public_url('admin') ?>/js/scripts.js"></script>
        <script src="<?php echo public_url('admin') ?>/js/jquery.slimscroll.js"></script>
        <script src="<?php echo public_url('admin') ?>/js/jquery.nicescroll.js"></script>
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
        <script src="<?php echo public_url('admin') ?>/js/jquery.scrollTo.js"></script>
        <script src="<?php echo public_url('admin') ?>/js/jquery.vmap.js"></script>
        <script src="<?php echo public_url('admin') ?>/js/jquery.vmap.world.js"></script>
        <script src="<?php echo public_url('admin') ?>/js/jquery.vmap.sampledata.js"></script>
        <script src="<?php echo public_url('admin') ?>/js/jquery.vmap.europe.js"></script>
        <script src="<?php echo public_url('admin') ?>/js/jquery.vmap.asia.js"></script>
        <script src="<?php echo public_url('admin') ?>/js/jquery.vmap.australia.js"></script>
    </body>
</html>