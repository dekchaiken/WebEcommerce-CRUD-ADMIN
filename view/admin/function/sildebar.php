<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
            <div class="pcoded-inner-navbar main-menu">
                <div class="">
                    <div class="main-menu-header">
                        <img class="img-80 img-radius" src="assets/<?php echo $row_img['user_img']?>" alt="User-Profile-Image">
                        <div class="user-details">
                            <span id="more-details"><?php echo $_SESSION['user_username'] ?><i class="fa fa-caret-down"></i></span>
                        </div>
                    </div>
                    <div class="main-menu-content">
                        <ul>
                            <li class="more-details">
                                <a href="user"><i class="ti-user"></i>Member</a>
                                <a href="seting"><i class="ti-settings"></i>Setting</a>
                                <a href="#" onclick="logout()"><i class="ti-layout-sidebar-left"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">System management</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="active">
                        <a href="index.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Home</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
                <div class="pcoded-navigation-label">Products & orders</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Manage Product</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li>
                                <a href="product" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Product</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="category" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Manage category</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="subCategory" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Manage type</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class='bx bx-package'></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Order management</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li>
                                <a href="allorder" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-clipboard"></i><b>FC</b></span>
                                    <?php
                                    //$query_all_delivery = $conn->query("SELECT * FROM tb_delivery");
                                    //$count_all_delivery = $query_all_delivery->num_rows;
                                    ?>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">All orders</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="order" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-clipboard"></i><b>FC</b></span>
                                    <?php
                                    //$query_pay = $conn->query("SELECT * FROM tb_delivery WHERE status = 0");
                                    //$count_pay = $query_pay->num_rows;
                                    ?>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">waiting for confirmation</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="orderdelivery" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-truck"></i><b>FC</b></span>
                                    <?php
                                    //$query_delivery = $conn->query("SELECT * FROM tb_delivery WHERE status = 2");
                                    //$count_delivery = $query_delivery->num_rows;
                                    ?>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">to be delivered</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="ordersuccess" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-check-box"></i><b>FC</b></span>
                                    <?php
                                    //$query_delivery_success = $conn->query("SELECT * FROM tb_delivery WHERE status = 3");
                                    //$count_delivery_success = $query_delivery_success->num_rows;
                                    ?>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Orders succeed</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>


                        </ul>
                    </li>




                </ul>

                <div class="pcoded-navigation-label">Banner</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu">
                    </li>
                    <li>
                        <a href="link" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class='bx bx-link-alt'></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Manage links</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="banner" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class='bx bx-image-add'></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Manage banners</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>

                <div class="pcoded-navigation-label">Manage other</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li>
                        <a href="express" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class='bx bx-store-alt'></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Transport service</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="type" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class='bx bx-category'></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Manage price categories</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="contact" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class='bx bxs-contact'></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Contact management</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="money" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-credit-card"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Payment method</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                </ul>

                <div class="pcoded-navigation-label">Member system</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li>
                        <a href="user" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Member</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                </ul>

                <!-- <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Chart &amp; Maps</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li>
                                  <a href="chart.html" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Chart</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li>
                                  <a href="map-google.html" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Maps</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Pages</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                      <li class=" ">
                                          <a href="auth-normal-sign-in.html" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Login</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class=" ">
                                          <a href="auth-sign-up.html" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Register</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class=" ">
                                          <a href="sample-page.html" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Sample Page</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
        
                          </ul>
        
                          <div class="pcoded-navigation-label" data-i18n="nav.category.other">Other</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li class="pcoded-hasmenu ">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Menu Levels</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                      <li class="">
                                          <a href="javascript:void(0)" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Menu Level 2.1</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class="pcoded-hasmenu ">
                                          <a href="javascript:void(0)" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Menu Level 2.2</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                          <ul class="pcoded-submenu">
                                              <li class="">
                                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                      <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                      <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Menu Level 3.1</span>
                                                      <span class="pcoded-mcaret"></span>
                                                  </a>
                                              </li>
                                          </ul>
                                      </li>
                                      <li class="">
                                          <a href="javascript:void(0)" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Menu Level 2.3</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                
                                  </ul>
                              </li>
                          </ul>
                      </div> -->
        </nav>
        <div class="pcoded-content">
            <!-- Page-header end -->
            <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                                <!--  project and team member start -->
                                <div class="col-xl-12 col-md-12 ">