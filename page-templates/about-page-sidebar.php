<?php
  $current_page = basename(get_permalink());
?>
<script>
  function handle_about_menu(index) {
    let path = '';
    switch (index) {
      case 0:
        path = '/20th-anniversary';
        break;
      case 1:
        path = '/about-us';
        break;
      case 2:
        path = '/award';
        break;
      case 3:
        path = '/recent-projects';
        break;
    }

    if (path === window.location.pathname.replace(/\/$/, '')) {
      console.log('same path');
      return;
    } else {
      window.location.href = path;
    }
  }
</script>
<style>
  .about-active-menu-item {
    color: var(--ci-orange-500);
    font-weight: 600;
  }
  @media screen and (max-width: 768px) {
    #menu-about {
      gap: 10px;
      justify-content: center;
    }
    .about-menu {
      font-size: 18px;
      padding: 0 8px;
      z-index: 2;
    }
    .about-active-menu-item {
      border-bottom: 4.2px solid var(--ci-orange-500);
    }
  }
</style>
<section id="about-menu" class="lg:pl-6 lg:pb-10 about-page-sidebar">
  <h1><?= pll__('รู้จักแอสเซทไวส์') ?></h1>
  <div id="menu-about" class="flex flex-row lg:flex-col side-nav-menu-about relative pt-5 md:pt-9 pb-2.5 lg:py-0 scroll-hid lg:mt-8">
    <div onclick="handle_about_menu(0)" class="about-menu px-0 lg:px-3 <?= $current_page === '20th-anniversary' ? 'font-medium about-active-menu-item' : '' ?>">
      20<sup>th</sup> Anniversary
    </div>
    <sp class="hidden lg:block" style="height: 1rem;"></sp>
    <div onclick="handle_about_menu(1)" class="about-menu px-0 lg:px-3 <?= $current_page === 'about-us' ? 'font-medium about-active-menu-item' : '' ?>">
      <?= pll__('เกี่ยวกับแอสเซทไวส์') ?>
    </div>
    <sp class="hidden lg:block" style="height: 1rem;"></sp>

    <div onclick="handle_about_menu(2)" class="about-menu px-0 lg:px-3 <?= $current_page === 'award' ? 'font-medium about-active-menu-item' : '' ?>">
      <?= pll__('รางวัลและความสำเร็จ') ?>
    </div>
    <!-- <sp class="hidden lg:block" style="height: 1rem;"></sp>

    <div onclick="handle_about_menu(2)" class="about-menu px-0 lg:px-3 <?= $current_page === 'recent-projects' ? 'font-medium about-active-menu-item' : '' ?>">
      โครงการที่ผ่านมา
    </div> -->

    <div class="hidden lg:block absolute bg-ci-grey-900" style="width: 2.5px;height: 100%;left: 1.15px;z-index: 1;">
      <div class="about_vbar"></div>
    </div>
    <div class="block lg:hidden absolute bg-ci-grey-900 about_hline w-full" style="height: 2px;bottom: 11px;z-index: 1;">
      <!-- <div class="about_hbar"></div> -->
    </div>
  </div>
</section>