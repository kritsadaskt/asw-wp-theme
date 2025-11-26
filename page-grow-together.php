<?php get_header() ?>

<style>
  :root {
    --grow-together-blue: #1690D1;
  }
  #info, #form {
    background-color: var(--grow-together-blue);
  }
  #form .form-group {
    margin-bottom: 10px;
  }
  #form input, #form textarea {
    background-color: #fff;
    border: none;
    border-radius: 5px;
    width: 100%;
    box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
  }
  #form label {
    color: #fff;
    margin-bottom: 5px;
  }
</style>

<section id="heroBanner">
  <img src="https://assetwise.testhttps://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2025/04/asw-club_grow-together_desktop_banner.jpg" alt="Grow Together" class="img-fluid hidden md:block">
  <img src="https://assetwise.testhttps://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2025/04/asw-club_grow-together_mobile_banner.jpg" alt="Grow Together" class="img-fluid md:hidden">
</section>

<section id="info">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-white">Informations</h2>
      </div>
    </div>
  </div>
</section>

<section id="form">
  <div class="container mx-auto px-4 lg:px-0">
    <div class="col-12">
      <h2 class="text-white text-center font-medium text-[48px]">ลงทะเบียนร้านค้า</h2>
    </div>
    <div class="col-12 lg:w-3/5 mx-auto">
      <form id="growTogetherForm" action="" class="grid grid-cols-1 lg:grid-cols-2 gap-x-4 gap-y-0">
        <div class="form-group col-span-2">
          <label for="shopName">ชื่อร้านค้า <span>*</span></label>
          <input type="text" class="form-control" id="shopName" name="shopName">
        </div>
        <div class="form-group col-span-2 md:col-span-1">
          <label for="contactNumber">เบอร์ติดต่อ <span class="text-red-500">*</span></label>
          <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="089-999-9999" pattern="\d{3}-\d{3}-\d{4}">
        </div>
        <div class="form-group col-span-2 md:col-span-1">
          <label for="email">อีเมล <span class="text-red-500">*</span></label>
          <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
        </div>
        <div class="form-group col-span-2">
          <label for="address">ที่อยู่ร้านค้า <span class="text-red-500">*</span></label>
          <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="form-group col-span-2">
          <label for="productType">ประเภทผลิตภัณฑ์</label>
          <input type="text" class="form-control" id="productType" name="productType">
        </div>
        <div class="form-group col-span-2">
          <label for="promotion">โปรโมชั่นที่ต้องการให้ส่วนลด</label>
          <textarea class="form-control" id="promotion" name="promotion"></textarea>
        </div>
        <div class="form-group col-span-2">
          <label for="promotionPeriod">ระยะเวลาโปรโมชั่น</label>
          <input type="text" class="form-control" id="promotionPeriod" name="promotionPeriod">
        </div>
        <div class="form-group col-span-2">
          <button type="submit" class="btn btn-primary">ส่งข้อมูล</button>
        </div>
      </form>
    </div>
  </div>
</section>

<?php get_footer() ?>