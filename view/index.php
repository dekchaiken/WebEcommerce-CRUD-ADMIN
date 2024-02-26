<?php
require_once('function/head.php');
require_once('function/navbar2.php');

?>

<main class="main">
    <div class="intro-slider-container">
        <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                        "nav": false,
                        "responsive": {
                            "1500": {
                                "nav": true
                            }
                        }
                    }'>

            <?php
            $banner = $conn->query("SELECT * FROM tb_banner");
            foreach ($banner as $data) :
            ?>

                <div class="intro-slide" style="background-image: url(admin/assets/<?php echo $data['img'] ?>);">
                    <div class="container intro-content">
                        <div class="row">
                            <div class="col-auto offset-lg-3 intro-col">
                                <h3 class="intro-subtitle"><?php echo $data['sub_title'] ?></h3> <!--End .h3 intro-subtitle -->
                                <h1 class="intro-title"><?php echo $data['title'] ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <span class="slider-loader"></span>
    </div>
    <div class="mb-4"></div>

    <div class="mb-2"></div>

    

    <div class="mb-3"></div><!-- End .mb-3 -->

    <div class="bg-light pt-3 pb-5">
        <div class="container">
            <div class="heading heading-flex heading-border mb-3">
                <div class="heading-left">
                    <h2 class="title">New Product</h2><!-- End .title -->
                </div><!-- End .heading-left -->

                <div class="heading-right">
                    <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="all_product" data-toggle="tab" href="all_product" role="tab" aria-controls="all_product" aria-selected="true">All</a>
                        </li>
                    </ul>
                </div><!-- End .heading-right -->
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="hot-all-tab" role="tabpanel" aria-labelledby="hot-all-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                    "nav": false, 
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1280": {
                                            "items":5,
                                            "nav": true
                                        }
                                    }
                                }'>
                        <?php
                        $all_product = $conn->query("SELECT * FROM tb_product ORDER BY Product_ID Desc");
                        foreach ($all_product as $product) :
                            $type = $conn->query("SELECT * FROM tb_type WHERE Type_ID = '$product[Type_ID]'");
                            $r_type = $type->fetch_array();
                            $color_type = 'style="background-color: ' . $r_type['color'] . ';"';
                            $name_type = $r_type['type'];

                            $category = $conn->query("SELECT * FROM tb_category WHERE Category_ID = '$product[Category_ID]'");
                            $r_category = $category->fetch_array();
                            $name_category = $r_category['category_name'];

                            $count_product = $conn->query("SELECT * FROM tb_product WHERE Product_ID = '$product[Product_ID]'");
                            $row = $count_product->fetch_array();
                        ?>
                            <div class="product">
                                <figure class="product-media">
                                    <span class="product-label text-white" <?php echo $color_type; ?>><?php echo $name_type; ?></span>
                                    <a href="product?id=<?php echo $product['Product_ID'] ?>">
                                        <img src="admin/assets/<?php echo $product['img'] ?>" alt="Product image" class="product-image">
                                    </a>

                                    
                                    <div class="product-action">
                                        <button class="btn-product btn-cart" <?php echo $row['count'] > 0 ? '' : 'disabled'; ?> title="Add to cart" onclick="addcart(<?php echo $product['Product_ID'] ?>)"><span> <?php echo $row['count'] > 0 ? 'Add to Cart' : 'Out of stock'; ?></span></button>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="category?c=<?php echo $product['Category_ID']?>"><?php echo $name_category; ?></a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product?id=<?php echo $product['Product_ID'] ?>"><?php echo $product['name'] ?></a></h3><!-- End .product-title -->
                                    <div class="product-price">

                                        <?php
                                        if ($product['Type_ID'] == 2) {
                                            if ($product['price_discount'] != 0) :
                                        ?>
                                                <span class="new-price">฿ <?php echo number_format($product['price_discount']) ?></span>
                                                <span class="old-price"><S>฿ <?php echo number_format($product['price']) ?> Bath</S></span>
                                            <?php
                                            endif;
                                        } else { ?>
                                            <span class="new-price">฿ <?php echo number_format($product['price']) ?></span>
                                        <?php } ?>
                                    </div><!-- End .product-price -->
                                
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        <?php endforeach; ?>

                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->


            </div><!-- End .tab-content -->
        </div><!-- End .container -->
    </div><!-- End .bg-light pt-5 pb-5 -->

    <div class="mb-3"></div><!-- End .mb-3 -->

    <div class="container electronics">
        <div class="heading heading-flex heading-border mb-3">
            <div class="heading-left">
                <h2 class="title">Sale Product</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="elec-new-link" data-toggle="tab" href="#elec-new-tab" role="tab" aria-controls="elec-new-tab" aria-selected="true">All</a>
                    </li>
                </ul>
            </div><!-- End .heading-right -->
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="elec-new-tab" role="tabpanel" aria-labelledby="elec-new-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1280": {
                                        "items":5,
                                        "nav": true
                                    }
                                }
                            }'>
                    <?php
                    $all_product = $conn->query("SELECT * FROM tb_product WHERE Type_ID = 2");
                    foreach ($all_product as $product) :
                        $type = $conn->query("SELECT * FROM tb_type WHERE Type_ID = '$product[Type_ID]'");
                        $r_type = $type->fetch_array();
                        $color_type = 'style="background-color: ' . $r_type['color'] . ';"';
                        $name_type = $r_type['type'];

                        $category = $conn->query("SELECT * FROM tb_category WHERE Category_ID = '$product[Category_ID]'");
                        $r_category = $category->fetch_array();
                        $name_category = $r_category['category_name'];
                    ?>
                        <div class="product">
                            <figure class="product-media">
                                <span class="product-label text-white" <?php echo $color_type; ?>><?php echo $name_type; ?></span>
                                <a href="product?id=<?php echo $product['Product_ID'] ?>">
                                    <img src="admin/assets/<?php echo $product['img'] ?>" alt="Product image" class="product-image">
                                </a>
                                <div class="product-action">
                                    <button class="btn-product btn-cart" title="Add to cart" onclick="addcart(<?php echo $product['Product_ID'] ?>)"><span>Add to Cart</span></button>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="category?c=<?php echo $product['Category_ID']?>"><?php echo $name_category; ?></a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product?id=<?php echo $product['Product_ID'] ?>"><?php echo $product['name'] ?></a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <?php
                                    if ($product['Type_ID'] == 2) {
                                        if ($product['price_discount'] != 0) :
                                    ?>
                                            <span class="new-price">฿ <?php echo number_format($product['price_discount']) ?></span>
                                            <span class="old-price"><S>฿ <?php echo number_format($product['price']) ?> Bath</S></span>
                                        <?php
                                        endif;
                                    } else { ?>
                                        <span class="new-price">฿ <?php echo number_format($product['price']) ?></span>
                                    <?php } ?>
                                </div><!-- End .product-price -->
                        
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    <?php endforeach; ?>

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .container -->

    <div class="mb-3"></div><!-- End .mb-3 -->


    <div class="mb-1"></div><!-- End .mb-1 -->


    <div class="mb-3"></div><!-- End .mb-3 -->

    <div class="container clothing ">
        <div class="heading heading-flex heading-border mb-3">
            <div class="heading-left">
                <h2 class="title">All Product</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="clot-new-link" data-toggle="tab" href="#clot-new-tab" role="tab" aria-controls="clot-new-tab" aria-selected="true">All</a>
                    </li>
                </ul>
            </div><!-- End .heading-right -->
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="clot-new-tab" role="tabpanel" aria-labelledby="clot-new-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1280": {
                                        "items":5,
                                        "nav": true
                                    }
                                }
                            }'>
                    <?php
                    $all_product = $conn->query("SELECT * FROM tb_product");
                    foreach ($all_product as $product) :
                        $type = $conn->query("SELECT * FROM tb_type WHERE Type_ID = '$product[Type_ID]'");
                        $r_type = $type->fetch_array();
                        $color_type = 'style="background-color: ' . $r_type['color'] . ';"';
                        $name_type = $r_type['type'];

                        $category = $conn->query("SELECT * FROM tb_category WHERE Category_ID = '$product[Category_ID]'");
                        $r_category = $category->fetch_array();
                        $name_category = $r_category['category_name'];
                    ?>
                        <div class="product">
                            <figure class="product-media">
                                <span class="product-label text-white" <?php echo $color_type; ?>><?php echo $name_type; ?></span>
                                <a href="product?id=<?php echo $product['Product_ID'] ?>">
                                    <img src="admin/assets/<?php echo $product['img'] ?>" alt="Product image" class="product-image">
                                </a>


                                <div class="product-action">
                                    <button class="btn-product btn-cart" title="Add to cart" onclick="addcart(<?php echo $product['Product_ID'] ?>)"><span>Add to Cart</span></button>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="category?c=<?php echo $product['Category_ID']?>"><?php echo $name_category; ?></a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product?id=<?php echo $product['Product_ID'] ?>"><?php echo $product['name'] ?></a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <?php
                                    if ($product['Type_ID'] == 2) {
                                        if ($product['price_discount'] != 0) :
                                    ?>
                                            <span class="new-price"><?php echo number_format($product['price_discount']) ?></span>
                                            <span class="old-price"><S>฿ <?php echo number_format($product['price']) ?> Bath</S></span>
                                        <?php
                                        endif;
                                    } else { ?>
                                        <span class="new-price">฿ <?php echo number_format($product['price']) ?></span>
                                    <?php } ?>
                                </div><!-- End .product-price -->
                            
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    <?php endforeach; ?>

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .container -->

    <div class="mb-3"></div><!-- End .mb-3 -->

    <div class="container">
        <h2 class="title title-border mb-5">Category</h2><!-- End .title -->
        <div class="owl-carousel mb-5 owl-simple" data-toggle="owl" data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            },
                            "1280": {
                                "items":6,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
            <?php
            $footer_category = $conn->query("SELECT * FROM tb_category");
            foreach ($footer_category as $row) :
            ?>
                <a href="category?c=<?php echo $row['Category_ID'] ?>" class="brand">
                    <img src="admin/assets/<?php echo $row['category_img'] ?>" style="height: 70px; width:70px" alt="Brand Name">
                </a>
            <?php endforeach; ?>
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->

    <div class="cta cta-horizontal cta-horizontal-box bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2xl-5col">
                    <h3 class="cta-title text-white">TEST นะจ้ะ</h3><!-- End .cta-title -->
                    <p class="cta-desc text-white">ผ่านสอบเมื่อไหร่จะทำให้เสร็จ</p><!-- End .cta-desc -->
                </div><!-- End .col-lg-5 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cta -->

    
</main><!-- End .main -->
<?php require_once('function/footer2.php'); ?>