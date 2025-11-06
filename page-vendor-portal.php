<?php
/**
 * Template Name: Vendor Portal
 *
 * @package SeedSpring
 */

get_header();
?>

<style>
  :root {
    --vendor-portal-main-color: #0084D1;
    --vendor-portal-secondary-color: #FF6900;
  }
</style>

<section class="py-10">
  <div class="container mx-auto flex flex-col md:flex-row gap-4">
    <div class="md:w-2/5 lg:w-1/2 flex justify-center items-center">
      <img src="https://assetwise.co.th/wp-content/uploads/2025/07/featured-image-left.svg" alt="Vendor Portal" class="w-1/2 md:w-4/5 md:mr-0 mx-auto">
    </div>
    <div class="md:w-3/5 lg:w-1/2 flex flex-col justify-center items-center">
      <h1 class="!text-5xl lg:!text-6xl font-bold uppercase text-center text-[var(--ci-blue-300)] leading-none mb-0"><?php pll_e('Vendor Portal', 'vendor-portal'); ?></h1>
      <h3 class="text-center text-2xl lg:text-4xl font-medium"><?php pll_e('ระบบลงทะเบียนคู่ค้า', 'vendor-portal'); ?></h3>
      <div class="h-5"></div>
      <p class="text-base lg:text-xl text-center leading-none">
        <?php pll_e('สำหรับผู้จำหน่าย / ผู้ออกแบบ / ผู้รับเหมาและผู้ให้บริการต่างๆ<br>
        ที่มีความประสงค์จะร่วมพัฒนาโครงการอสังหาริมทรัพย์กับแอสเซทไวส์<br>
        สามารถลงทะเบียนออนไลน์ตามช่องทางด้านล่าง<br>
        ซึ่งเมื่อฝ่ายจัดซื้อจัดจ้างโครงการได้รับข้อมูล<br>
        และพิจารณาแล้วว่าผ่านคุณสมบัติเบื้องต้น และจะดำเนินการติดต่อกลับไป<br>
        เพื่อขอนัดสัมภาษณ์และตรวจสอบคุณสมบัติตามขั้นตอนที่บริษัทกำหนด', 'vendor-portal'); ?>
      </p>
      <div class="h-5 lg:h-7"></div>
      <div class="btn-group flex flex-col gap-4 items-center">
        <a href="https://aswinno.assetwise.co.th/VendorPortal/Account/Login" title="เข้าสู่ระบบ" target="_blank" class="vendor-portal-btn border-[2px] border-[var(--vendor-portal-secondary-color)] text-[var(--vendor-portal-secondary-color)] border-solid rounded-lg font-medium text-2xl px-3 py-2 flex items-center gap-2 w-[250px] hover:bg-[var(--vendor-portal-secondary-color)] hover:text-white transition-all duration-300 justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-in-icon lucide-log-in"><path d="m10 17 5-5-5-5"/><path d="M15 12H3"/><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/></svg>
          <?php pll_e('เข้าสู่ระบบ Vendor Portal', 'vendor-portal'); ?>
        </a>
        <a href="https://aswinno.assetwise.co.th/VendorPortal/Vendor/Verify" title="ลงทะเบียนคู่ค้า" target="_blank" class="vendor-portal-btn bg-[var(--vendor-portal-main-color)] hover:bg-sky-700 transition-all duration-300 text-white font-medium text-3xl px-3 py-3 flex items-center gap-2 justify-center w-[250px] rounded-lg">
          <?php pll_e('ลงทะเบียนคู่ค้า', 'vendor-portal'); ?>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-arrow-right-icon lucide-circle-arrow-right"><circle cx="12" cy="12" r="10"/><path d="m12 16 4-4-4-4"/><path d="M8 12h8"/></svg>
        </a>
      </div>
    </div>
  </div>
</section>
<section id="tutorial" class="py-[60px] bg-[url('https://aswinno.assetwise.co.th/VendorPortal/theme/assets/images/background/auth.jpg')] bg-cover bg-center md:bg-auto md:bg-top">
  <div class="container mx-auto">
    <h2 class="text-center text-4xl text-white font-medium"><?php pll_e('คู่มือการใช้งาน', 'vendor-portal'); ?></h2>
    <div class="h-5"></div>
    <div class="video-container w-11/12 md:w-4/5 mx-auto">
      <video src="https://aswinno.assetwise.co.th/VendorPortal/upload/content/OnlineBilling.mp4" width="100%" controls class="rounded-lg shadow-lg" poster="https://assetwise.co.th/wp-content/uploads/2025/07/vendor-portal-poster.jpeg"></video>
    </div>
    <div class="h-7"></div>
    <div class="manual-dl flex justify-center">
      <a href="https://aswinno.assetwise.co.th/VendorPortal/Account/Login?ReturnUrl=%2FVendorPortal%2F#" class="bg-white text-black px-5 py-2 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-down-to-line-icon lucide-arrow-down-to-line"><path d="M12 17V3"/><path d="m6 11 6 6 6-6"/><path d="M19 21H5"/></svg>
        <?php pll_e('ดาวน์โหลดคู่มือการใช้งาน', 'vendor-portal'); ?>
      </a>
    </div>
  </div>
</section>

<?php get_footer(); ?>

