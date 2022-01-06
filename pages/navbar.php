<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
        <span>HTQLNS</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Trang Chủ</li>
          <li class="nav-item">
            <a href="<?php homePath();?>home" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Trang Chủ</span>
            </a>
          </li>
          <li class="nav-item nav-category">Quản lý</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#account" role="button" aria-expanded="false" aria-controls="account">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Quản lý</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="account">
              <ul class="nav sub-menu">
                <?php if (checkPermission("god")) 
                  {
                ?>
                  <li class="nav-item">
                    <a href="<?php homePath();?>pages/account/accountlist" class="nav-link">Quản lý tài khoản</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php homePath();?>pages/account/phongban" class="nav-link">Quản lý phòng ban</a>
                  </li>
                <?php
                  }
                ?>

                <?php if (checkPermission("user")) 
                  {
                ?>
                  <li class="nav-item">
                    <a href="<?php homePath();?>pages/account/editprofile" class="nav-link">Sửa thông tin tài khoản</a>
                  </li>
                <?php
                  }
                ?>
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
              <i class="link-icon" data-feather="anchor"></i>
              <span class="link-title">In-Game</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="<?php homePath();?>pages/auction/auctionlist" class="nav-link">Đấu giá</a>
                </li>
                <li class="nav-item">
                  <a href="<?php homePath();?>pages/package/packagelist" class="nav-link">Danh sách Gói</a>
                </li>
              </ul>
            </div>
          </li> -->
        </ul>
      </div>
    </nav>