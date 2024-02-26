<?php
include('function/head.php');
include('function/navbar2.php');
if (!isset($_SESSION['login'])) {
    echo '<script>location.href="login"</script>';
}
?>

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Order history<span>All</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item"><a href="cart">Cart</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order history</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <table class="table text-center" id="myTable">
                <thead>
                    <tr class="text-dark">
                        <th style="text-align: center;">Order</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;">Order date</th>
                        <th style="text-align: center;">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $order = $conn->query("SELECT * FROM tb_delivery WHERE User_ID = '$_SESSION[user_id]'");
                    foreach ($order as $row) {
                    ?>
                        <tr>
                            <td><?php echo $row['track'] ?></td>
                            <td><span class="p-3 alert
                        <?php
                        $color = '';
                        if ($row['status'] == 0) {
                            $color = 'alert-secondary';
                        } else if ($row['status'] == 1) {
                            $color = 'alert-info';
                        } else if ($row['status'] == 2) {
                            $color = 'alert-primary';
                        } else if ($row['status'] == 3) {
                            $color = 'alert-success';
                        } else {
                            $color = 'alert-danger';
                        }
                        echo $color;
                        ?>">
                                    <?php
                                    $reult = '';
                                    if ($row['status'] == 0) {
                                        $reult = 'Checking';
                                    } else if ($row['status'] == 1) {
                                        $reult = 'Preparing';
                                    } else if ($row['status'] == 2) {
                                        $reult = 'Delivery in progress';
                                    } else if ($row['status'] == 3) {
                                        $reult = 'successfully delivered';
                                    } else {
                                        $reult = 'The order was unsuccessful.';
                                    }
                                    echo $reult;
                                    ?>
                                </span>
                            </td>
                            <td><?php echo date_format(date_create($row['by_date']), "d/m/Y H:i"); ?></td>
                            <td>
                                <button onclick="showDetail(<?php echo $row['Delivery_ID'] ?>)" style="border:none; background:#4287f5; color:#fff; border-radius:5px;"><i class="fa-solid fa-magnifying-glass"></i></button>
                                <?php if ($row['status'] != 3 AND $row['status'] != 999) { ?>
                                    <button onclick="cancelOrder(<?php echo $row['Delivery_ID'] ?>)" style="border:none; background:red; color:#fff; border-radius:5px;"><i class="fa-solid fa-trash"></i></button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

<?php require_once('function/footer2.php'); ?>