<div class="header-bottom sticky-header">
    <div class="container">
        <div class="header-left">
            <div class="dropdown category-dropdown is-on" data-visible="true">
                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" data-display="static" title="Browse Categories">
                Category
                </a>

                <div class="dropdown-menu">
                    <nav class="side-nav">
                        <ul class="menu-vertical sf-arrows">
                            <?php
                            $sql = "SELECT * FROM tb_category";
                            $query = $conn->query($sql);
                            foreach ($query as $row) :
                            ?>
                                <li class="megamenu-container">
                                    <a class="sf-with-ul" href="category?c=<?php echo $row['Category_ID'] ?>"><?php echo $row['category_name'] ?></a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="header-center">
            <nav class="main-nav">
                <ul class="menu sf-arrows">
                    <li class="megamenu-container active">
                        <a href="index">Home</a>
                    </li>
                    <li class="megamenu-container">
                        <a href="all_product">All Product</a>
                    </li>
                    <li>
                        <a href="checkorder">Check Order</a>
                    </li>
                    <li>
                        <a href="story">Order history</a>
                    </li>
                    <li>
                        <a href="contact">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
</header>