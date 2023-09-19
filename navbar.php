<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 0, 'stickyHeaderContainerHeight': 0}">
  <div class="header-body border-top-0">
    <div class="header-container container" style="height: 117px">
      <div class="header-row">
        <div class="header-column">
          <div class="header-row">
            <div class="header-logo">
              <a href="index">
                <img alt="Porto" width="270" height="27" src="img/demos/business-consulting-3/logo.png" />
              </a>
            </div>
          </div>
        </div>
        <div class="header-column justify-content-end w-100">
          <div class="header-row">
            <div class="header-nav header-nav-links order-2 order-lg-1">
              <div class="header-nav-main header-nav-main-square header-nav-main-text-capitalize header-nav-main-effect-1 header-nav-main-sub-effect-1">
                <nav class="collapse">
                  <ul class="nav nav-pills" id="mainNav">
                    <li>
                      <a <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active" style="color: #c6a265;"'; ?> class="nav-link" href="index">
                        Home
                      </a>
                    </li>

                    <li>
                      <a <?php if (basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active" style="color: #c6a265;"'; ?> class="nav-link" href="about">
                        About MAA
                      </a>
                    </li>
                    <li class="dropdown">
                      <a <?php if (basename($_SERVER['PHP_SELF']) == 'services.php' || basename($_SERVER['PHP_SELF']) == 'trading' || basename($_SERVER['PHP_SELF']) == 'shipping' || basename($_SERVER['PHP_SELF']) == 'stone-crusher' || basename($_SERVER['PHP_SELF']) == 'stone-mining' || basename($_SERVER['PHP_SELF']) == 'nickel-mining' || basename($_SERVER['PHP_SELF']) == 'mining-contractor' || basename($_SERVER['PHP_SELF']) == 'construction-services' || basename($_SERVER['PHP_SELF']) == 'investment') echo 'class="active" style="color: #c6a265;"'; ?> class="nav-link dropdown-toggle" href="services">
                        Our Business
                      </a>
                    </li>
                    <li>
                      <a <?php if (basename($_SERVER['PHP_SELF']) == 'mldp.php') echo 'class="active" style="color: #c6a265;"'; ?> class="nav-link" href="mldp">
                        MLDP
                      </a>
                    </li>
                    <li>
                      <a <?php if (basename($_SERVER['PHP_SELF']) == 'careers.php') echo 'class="active" style="color: #c6a265;"'; ?> class="nav-link" href="careers">
                        Career
                      </a>
                    </li>
                    <li>
                      <a <?php if (basename($_SERVER['PHP_SELF']) == 'news.php') echo 'class="active" style="color: #c6a265;"'; ?> class="nav-link" href="news.php">
                        News
                      </a>
                    </li>
                    <li class="d-lg-none">
                      <a <?php if (basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'class="active" style="color: #c6a265;"'; ?> class="nav-link" href="contact">
                        Contact Us
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="header-column header-column-search justify-content-end align-items-center d-flex w-auto flex-row">
          <?php
          if (basename($_SERVER['PHP_SELF']) == 'contact.php') {
          ?>
            <a href="contact" class="btn btn-primary custom-btn-style-1 font-weight-semibold text-3-5 btn-px-3 py-2 ws-nowrap ms-4 d-none d-lg-block" data-cursor-effect-hover="plus" data-cursor-effect-hover-color="light"><span>Contact Us</span></a>
            <div class="header-nav-features header-nav-features-no-border">
              <div class="header-nav-feature header-nav-features-search d-inline-flex">

              </div>
            </div>

          <?php
          } else {
          ?>
            <a href="contact" class="btn btn-dark custom-btn-style-1 font-weight-semibold text-3-5 btn-px-3 py-2 ws-nowrap ms-4 d-none d-lg-block" data-cursor-effect-hover="plus" data-cursor-effect-hover-color="light"><span>Contact Us</span></a>
            <div class="header-nav-features header-nav-features-no-border">

            </div>
        </div>
        <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
          <i class="fas fa-bars"></i>
        </button>
      <?php
          }
      ?>
      </div>
    </div>
  </div>
  </div>
</header