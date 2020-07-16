<html>
    <head>
        <?php $this->load->view('site/head');?>
    </head>
    <body>
        <header id="header"><!--header-->
            <?php $this->load->view('site/header'); ?>
        </header>
        <section id="slider"><!--slider-->
            <?php $this->load->view('site/section_slider');?>
	    </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <?php $this->load->view('site/left_slidebar'); ?>
                        </div>
                    </div>
                    <div class="col-sm-9 padding-right">
                        <?php $this->load->view($temp) ;?>

                    </div>
                </div>
            </div>
	    </section>
        <footer id="footer"><!--Footer-->
            <?php $this->load->view('site/footer');?>
	    </footer>
        <script src="<?php echo public_url() ?>js/jquery.js"></script>
        <script src="<?php echo public_url() ?>js/bootstrap.min.js"></script>
        <script src="<?php echo public_url() ?>js/jquery.scrollUp.min.js"></script>
        <script src="<?php echo public_url() ?>js/price-range.js"></script>
        <script src="<?php echo public_url() ?>js/jquery.prettyPhoto.js"></script>
        <script src="<?php echo public_url() ?>js/main.js"></script>
        <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: none;"><i class="fa fa-angle-up"></i></a>   
    </body>
</html>