<?php

if (!isset($_SESSION)) {
    session_start();
}
include('function/head.php');
include('function/navbar2.php');
if (!isset($_GET['id'])) {
    echo '<script>location.href="index"</script>';
}
$id = $_GET['id'];
$sql = "SELECT * FROM tb_product p LEFT JOIN tb_category c ON p.Category_ID = c.Category_ID WHERE Product_ID = '$id'";
$query = $conn->query($sql);
$row = $query->fetch_array();
$product_id = $row['Product_ID'];
$category = $row['Category_ID'];
$type = $row['Type_ID'];
// $sub = $row['Sub_ID'];

$product_name = $row['name'];
$price = $row['price'];
$price_discount = $row['price_discount'];
$img = $row['img'];
$r_category = $row['category_name'];
$description = $row['detail'];
$count_qty = $row['count'];
$sub = $conn->query("SELECT * FROM tb_product p LEFT JOIN tb_sub_category s ON p.Sub_ID = s.Sub_ID WHERE Product_ID = '$id'");
$row_sub = $sub->fetch_array();
// print_r($_SESSION['shopping_cart']);
$count_product = $conn->query("SELECT * FROM tb_product WHERE Product_ID = '$id'");
$rows = $count_product->fetch_array();
?>
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">หน้าหลัก</a></li>
                <li class="breadcrumb-item"><a href="all_product">สินค้า</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $product_name; ?></li>
            </ol>

        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top mb-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery">
                            <figure class="product-main-image">
                                <img id="product-zoom" src="admin/assets/<?php echo $img; ?>" alt="product image">

                                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                    <i class="icon-arrows"></i>
                                </a>
                            </figure><!-- End .product-main-image -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title"><?php echo $product_name; ?></h1><!-- End .product-title -->
                            <div class="product-price">
                                <?php
                                if ($type == 2) {
                                    if ($price_discount != 0) :
                                ?>
                                        <span class="new-price">฿ <?php echo number_format($price_discount) ?></span>
                                        <span class="old-price"><S>฿ <?php echo number_format($price) ?> บาท</S></span>
                                    <?php
                                    endif;
                                } else { ?>
                                    <span class="new-price">฿ <?php echo number_format($price) ?></span>
                                <?php } ?>
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p>จำนวนในสต็อก <?php echo $count_qty; ?> ชิ้น</p>
                            </div><!-- End .product-content -->



                            <div class="details-filter-row details-row-size">
                                <label for="qty">จำนวน:</label>
                                <div class="product-details-quantity">
                                    <input type="number" id="qty" class="form-control" value="1" min="1" max="<?php echo $count_qty; ?>" step="1" data-decimals="0" required>
                                </div><!-- End .product-details-quantity -->
                            </div><!-- End .details-filter-row -->

                            <div class="product-details-action">
                                <button class="btn-product btn-cart" <?php echo $rows['count'] > 0 ? '' : 'disabled'; ?> title="Add to cart" onclick="addCart(<?php echo $product_id ?>)"><span> <?php echo $rows['count'] > 0 ? 'เพิ่มสินค้าลงตะกร้า' : 'สินค้าหมด'; ?></span></button>


                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>ประเภท:</span>
                                    <a href="category?c=<?php echo $category; ?>"><?php echo $r_category; ?></a>,
                                    <a href="category?c=<?php echo $category; ?>&s=<?php echo $row_sub['Sub_ID'] ?>"><?php echo $row_sub['sub_name'] ?></a>
                                </div><!-- End .product-cat -->
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <?php include('function/description.php'); ?>
            <?php include('function/footer.php'); ?>
            <script>
                function addCart(id) {
                    let qty = $('#qty').val();
                    let option = {
                        url: 'function/action.php',
                        type: 'post',
                        data: {
                            id: id,
                            qty: qty,
                            addcart: 1
                        },
                        success: function(res) {
                            if (res != 1) {
                                location.href = "login"
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'เพิ่มสินค้าลงตะกร้าเรียบร้อย',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                setTimeout(() => {
                                    location.href = "cart"
                                }, 900)
                            }
                        }
                    }
                    $.ajax(option)
                }

                function addWishlist(id) {
                    let option = {
                        url: 'function/action.php',
                        type: 'post',
                        data: {
                            id: id,
                            addWishlist: 1
                        },
                        success: function(res) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'เพิ่มสินค้าสินค้าถูกใจ',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout(() => {
                                location.href = "wishlist"
                            }, 900)
                        }
                    }
                    $.ajax(option)
                }
            </script>