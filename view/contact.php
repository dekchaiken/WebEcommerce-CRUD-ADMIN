<?php
include('function/head.php');
include('function/navbar2.php');
?>
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Contact<span> </span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->


    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-2 mb-lg-0">
                    <h2 class="title mb-1">Contact information</h2><!-- End .title mb-2 -->
                    <!-- <p class="mb-3">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p> -->
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="contact-info">
                                <h3>Address</h3>

                                <ul class="contact-list">
                                    <li>
                                        <i class="icon-map-marker"></i>
                                        <?php echo $address;?>
                                    </li>
                                    <li>
                                        <i class="icon-phone"></i>
                                        <a href="tel:#"><?php echo $phone;?></a>
                                    </li>
                                    <li>
                                        <i class="icon-envelope"></i>
                                        <a href="mailto:#"><?php echo $email;?></a>
                                    </li>
                                </ul><!-- End .contact-list -->
                            </div><!-- End .contact-info -->
                        </div><!-- End .col-sm-7 -->

                        <div class="col-sm-5">
                            <div class="contact-info">
                                <h3>Office hours</h3>

                                <ul class="contact-list">
                                    <li>
                                        <i class="icon-clock-o"></i>
                                        <span class="text-dark">Office day</span> <br><?php echo $time_work?>
                                    </li>
                                    <li>
                                        <i class="icon-calendar"></i>
                                        <span class="text-dark">Day off</span> <br><?php echo $time_special?>
                                    </li>
                                </ul><!-- End .contact-list -->
                            </div><!-- End .contact-info -->
                        </div><!-- End .col-sm-5 -->
                    </div><!-- End .row -->
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->

            <hr class="mt-4 mb-5">

          
        </div><!-- End .container -->

    </div><!-- End .page-content -->
</main><!-- End .main -->
<?php require_once('function/footer2.php'); ?>