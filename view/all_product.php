<?php
include('function/head.php');
include('function/navbar2.php');
?>
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Product<span>All</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">ProductAll</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                <?php
                                if (isset($_GET['q'])) {
                                    $count_product = $conn->query("SELECT count(Product_ID) as count FROM tb_product WHERE name LIKE '%$_GET[q]%'");
                                } else if (isset($_GET['q']) and isset($_GET['cat'])) {
                                    $count_product = $conn->query("SELECT count(Product_ID) as count FROM tb_product WHERE name LIKE '%$_GET[q]%' AND Category_ID = '$_GET[cat]'");
                                } else {
                                    $count_product = $conn->query("SELECT count(Product_ID) as count FROM tb_product");
                                }

                                $r_count_product = $count_product->fetch_array();
                                ?>
                                <span>ProductAll ( <?php echo $r_count_product['count'] ?> )</span>
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <!-- <label for="sortby">จัดลำดับราคาโดย:</label> -->
                                <!-- <div class="select-custom"> -->
                                    <!-- <select name="sortby" id="sortby" class="form-control">
                                        <option value="popularity" selected="selected" disabled>เลือกราคา</option>
                                        <option value="rating">จากมากไปน้อย</option>
                                        <option value="rating">จากน้อยไปมาก</option>
                                    </select> -->
                                <!-- </div> -->
                            </div><!-- End .toolbox-sort -->
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <?php
                        $perpage = 5;
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }

                        $start = ($page - 1) * $perpage;

                        if (isset($_GET['q'])) {
                            $all_products = $conn->query("SELECT * FROM tb_product WHERE name LIKE '%$_GET[q]%' LIMIT {$start},{$perpage}");
                        } else if (isset($_GET['q']) and isset($_GET['cat'])) {
                            $all_products = $conn->query("SELECT * FROM tb_product WHERE name LIKE '%$_GET[q]%' AND Category_ID = '$_GET[cat]' LIMIT {$start},{$perpage}");
                        } else {
                            $all_products = $conn->query("SELECT * FROM tb_product LIMIT {$start},{$perpage}");
                        }
                        foreach ($all_products as $row) :
                            $type = $conn->query("SELECT * FROM tb_type WHERE Type_ID = '$row[Type_ID]'");
                            $r_type = $type->fetch_array();
                            $color_type = 'style="background-color: ' . $r_type['color'] . ';"';
                            $name_type = $r_type['type'];
                            $category = $conn->query("SELECT * FROM tb_category WHERE Category_ID = '$row[Category_ID]'");
                            $row_category = $category->fetch_array();
                        ?>
                            <div class="product product-list">
                                <div class="row">
                                    <div class="col-6 col-lg-3">
                                        <figure class="product-media">
                                            <span class="product-label text-white" <?php echo $color_type; ?>><?php echo $name_type; ?></span>
                                            <a href="product?id=<?php echo $row['Product_ID'] ?>">
                                                <img src="admin/assets/<?php echo $row['img'] ?>" alt="Product image" class="product-image">
                                            </a>
                                        </figure><!-- End .product-media -->
                                    </div><!-- End .col-sm-6 col-lg-3 -->

                                    <div class="col-6 col-lg-3 order-lg-last">
                                        <div class="product-list-action">
                                            <div class="product-price d-block">
                                                <?php
                                                if ($row['Type_ID'] == 2) {
                                                    if ($row['price_discount'] != 0) :
                                                ?>
                                                        <span>฿ <?php echo number_format($row['price_discount']) ?> </span>
                                                        <p style="color: gray;"><S>฿ <?php echo number_format($row['price']) ?> Bath</S></p>
                                                    <?php
                                                    endif;
                                                } else { ?>
                                                    <span>฿ <?php echo number_format($row['price']) ?></span>
                                                <?php } ?>
                                            </div><!-- End .product-price -->
                                

                                            <div class="product-action">
                                                <!-- <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>ดูรายละเอียด</span></a> -->
                                            </div><!-- End .product-action -->

                                            <button class="btn-product btn-cart" <?php echo $row['count'] > 0 ? '' : 'disabled'; ?> title="Add to cart" onclick="addcart(<?php echo $row['Product_ID'] ?>)"><span> <?php echo $row['count'] > 0 ? 'Add to Cart' : 'Out of stock'; ?></span></button>
                                        </div><!-- End .product-list-action -->
                                    </div><!-- End .col-sm-6 col-lg-3 -->

                                    <div class="col-lg-6">
                                        <div class="product-body product-action-inner">
                                            <!-- <a href="#" class="btn-product btn-wishlist" title="Add to wishlist"><span>add to wishlist</span></a> -->
                                            <div class="product-cat">
                                                <a href="category?c=<?php echo $row['Category_ID']?>"><?php echo $row_category['category_name']?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product?id=<?php echo $row['Product_ID'] ?>"><?php echo $row['name'] ?></a></h3><!-- End .product-title -->

                                            <div class="product-content">
                                                <p><?php echo mb_strimwidth($row['detail'], 0, 20, '...') ?></p>
                                            </div><!-- End .product-content -->

                                            <!-- <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="assets/images/products/product-4-thumb.jpg" alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="assets/images/products/product-4-2-thumb.jpg" alt="product desc">
                                                    </a>

                                                    <a href="#">
                                                        <img src="assets/images/products/product-4-3-thumb.jpg" alt="product desc">
                                                    </a>
                                                </div> -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .product -->
                        <?php endforeach; ?>


                    </div><!-- End .products -->

                    <?php
                    if (isset($_GET['q'])) {
                        $sql2 = "SELECT * FROM tb_product WHERE name LIKE '%$_GET[q]%'";
                    } else if (isset($_GET['q']) and isset($_GET['cat'])) {
                        $sql2 = "SELECT * FROM tb_product WHERE name LIKE '%$_GET[q]%' AND Category_ID = '$_GET[cat]'";
                    } else {
                        $sql2 = "SELECT * FROM tb_product";
                    }
                    $query2 = $conn->query($sql2);
                    $total_record = mysqli_num_rows($query2);
                    $total_page = ceil($total_record / $perpage);
                    ?>

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?php echo isset($_GET['page']) && $_GET['page'] > 1 ? '' : 'disabled' ?>">
                                <a class="page-link page-link-prev" href="?page=1" aria-label="Previous">
                                    <span><i class="icon-long-arrow-left"></i></span>Home
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $total_page; $i++) {
                                if (isset($_GET['q'])) {
                                    echo '<li class="page-item active" aria-current="page"><a class="page-link" href="?q=' . $_GET["q"] . '&page=' . $i . '">' . $i . '</a></li>';
                                } else if (isset($_GET['q']) and isset($_GET['cat'])) {
                                    echo '<li class="page-item active" aria-current="page"><a class="page-link" href="?q=' . $_GET["q"] . '&cat=' . $_GET["cat"] . '&page=' . $i . '">' . $i . '</a></li>';
                                } else {
                                    echo '<li class="page-item active" aria-current="page"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                }
                            ?>
                            <?php } ?>
                            <li class="page-item <?php echo $total_page > 1 ? '' : 'disabled' ?>">
                                <a class="page-link page-link-next" href="?page=<?php echo $total_page; ?>" aria-label="Next">
                                    หน้าสุดท้าย <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Search:</label>
                            <a href="all_product" class="sidebar-filter-clear">All</a>
                        </div><!-- End .widget widget-clean -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Category
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        <?php
                                        $category_lists = $conn->query("SELECT * FROM tb_category");
                                        foreach ($category_lists as $row) :
                                            $sub = $conn->query("SELECT * FROM tb_product WHERE Category_ID = '$row[Category_ID]'");
                                            $row_sub = $sub->fetch_array();
                                            $count_sub = $sub->num_rows;
                                        ?>
                                            <div class="filter-item">
                                                <a href="category?c=<?php echo $row_sub['Category_ID'] ?>"><?php echo $row['category_name'] ?></a>
                                                <span class="item-count"><?php echo $count_sub; ?></span>
                                            </div><!-- End .filter-item -->
                                        <?php endforeach; ?>
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<?php require_once('function/footer2.php') ?>