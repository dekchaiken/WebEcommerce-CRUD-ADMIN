<?php
require_once('function/head.php');
require_once('function/navbar2.php');
if (!isset($_SESSION['login']) && !isset($_REQUEST['order'])) {
    echo '<script>location.href="login"</script>';
}
?>

<main class="main">
    <div class="page-content">
        <div class="dashboard">
            <div class="container p-5">
               <h3 class="text-center">Thank you for the order</h3>
               <p class="text-center">Your order number #<?php echo $_REQUEST['order'] ?></p>
               <div class="d-flex justify-content-center mt-1">
                   <img src="https://cdn-icons-png.flaticon.com/512/8654/8654153.png" alt="" style="width:150px;height:150px;">
               </div> 
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->



<?php require_once('function/footer2.php'); ?>
<script src="assets/jquery/profile.js"></script>