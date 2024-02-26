<div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                          <i class="ti-menu"></i>
                      </a>
                      <div class="mobile-search waves-effect waves-light">
                          <div class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control" placeholder="Enter Keyword">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <a href="index">
                          <img class="img-fluid" src="" alt="" />
                      </a>
                      <a class="mobile-options waves-effect waves-light">
                          <i class="ti-more"></i>
                      </a>
                  </div>
                
                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">
                          <li>
                              <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                          </li>
                          <li class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control">
                                  </div>
                              </div>
                          </li>
                          <li>
                              <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                  <i class="ti-fullscreen"></i>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav-right">

                          <li class="user-profile header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                  <img src="assets/<?php echo $row_img['user_img']?>" class="img-radius" alt="User-Profile-Image">
                                  <span><?php echo $_SESSION['user_username']?></span>
                                  <i class="ti-angle-down"></i>
                              </a>
                              <ul class="show-notification profile-notification">
                                  <li class="waves-effect waves-light">
                                      <a href="seting">
                                          <i class="ti-settings"></i> ตั้งค่า
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="user">
                                          <i class="ti-user"></i> สมาชิก
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="user_contact">
                                          <i class="ti-email"></i> การติดต่อ
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="#" onclick="logout()">
                                          <i class="ti-layout-sidebar-left"></i> ออกจากระบบ
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>