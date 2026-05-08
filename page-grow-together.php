<?php 
get_header(); 
wp_enqueue_script('momentjs-min', 'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js', array(), '', array('strategy' => 'defer'));
wp_enqueue_script('datepickerjs-min', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js', array(), '', array('strategy' => 'defer'));
wp_enqueue_style('datepickercss', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css', array(), '', 'all');
wp_enqueue_script('swal', 'https://cdn.jsdelivr.net/npm/sweetalert2@11', array(), '', array('strategy' => 'defer'));
$image_path = 'https://assetwise.co.th/wp-content/themes/seed-spring/img/asw-club-grow-together';
?>

<style>
  :root {
    --grow-together-blue: #1690D1;
    --btn-bg: #FFCA5F;
  }
  #info, #form, #intro {
    background-color: var(--grow-together-blue);
  }
  #form input, #form textarea {
    background-color: #fff;
    font-size: 22px;
    border: none;
    border-radius: 5px;
    width: 100%;
    box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
  }
  #form {
    background: #aecab8;
    background-image: url('<?php echo $image_path ?>/bg-02-3.png');
    background-size: 100% 100%;
    background-position: center bottom;
    background-repeat: no-repeat;
    padding: 3rem 0 4rem;
  }
  #form label {
    color: #fff;
    margin-bottom: 5px;
  }
  #form #submit {
    background-color: var(--btn-bg);
    color: #032855;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
  }
  #form #submit:disabled {
    background-color: #ccc;
    color: #fff;
  }
  #info {
    background-image: url('<?php echo $image_path ?>/bg-01-2.png');
    background-size: 100% 100%;
    background-position: center bottom;
    background-repeat: no-repeat;
    min-height: 70vh;
    display: flex;
    align-items: center;
  }

  .swal2-container .swal2-html-container {
    font-size: 24px;
    padding-top: 10px;
  }

  .swal2-container .swal2-confirm {
    background-color: var(--btn-bg);
    color: #032855;
    font-size: 24px;
    padding: 5px 10px;
    width: 100px;
  }

  .daterangepicker .prev, .daterangepicker .next {
    position: relative;
  }
  .daterangepicker .drp-buttons button.btn {
    color: #032855;
    font-size: 24px;
  }

  @media screen and (max-width: 520px) {
    #info {
      background-image: url('<?php echo $image_path ?>/bg-info-m-2.png');
      padding-bottom: 2rem;
    }
    #form {
      padding: 20px 0 60px;
      background-image: url('<?php echo $image_path ?>/bg-form-m-2.png');
    }
  }
</style>

<section id="heroBanner">
  <img src="<?php echo $image_path ?>/asw-club_grow-together_desktop_banner.jpg" alt="Grow Together" class="img-fluid hidden md:block">
  <img src="<?php echo $image_path ?>/asw-club_grow-together_mobile_banner.jpg" alt="Grow Together" class="img-fluid md:hidden">
</section>

<section id="intro" class="pt-[5rem] pb-[2rem]">
  <div class="container mx-auto px-4 lg:px-0 text-white">
    <div class="w-full md:w-3/4 mx-auto flex flex-col gap-y-5">
      <div class="flex flex-col">
        <h3 class="text-center font-medium text-[52px]">GrowTogether</h3>
        <h3 class="text-center font-medium text-[32px]">เติบโตไปด้วยกัน กับ AssetWise Club</h3>
      </div>
      <p class="text-center font-light text-[24px]">แคมเปญ Grow Together คือการสร้าง “คอมมูนิตี้แห่งสิทธิพิเศษ”ที่เชื่อมต่อระหว่างร้านค้าหลากหลายประเภท — ทั้งรายเล็ก รายใหญ่ ไปจนถึงร้านดัง ครอบคลุมหมวดหมู่ที่ตอบโจทย์ไลฟ์สไตล์ของลูกบ้านAssetWise Club ไม่ว่าจะเป็นอาหาร คาเฟ่ ไลฟ์สไตล์ สุขภาพการพัฒนาด้านต่างๆ รวมไปถึงสัตว์เลี้ยง และบริการอีกมากมาย สิทธิพิเศษที่เราคัดสรรมาโดยเฉพาะ ช่วยให้ลูกบ้านใช้ชีวิตได้อย่างเต็มที่ สนุกกับทุกกิจกรรมที่ชอบ และคุ้มค่าทุกครั้งที่ใช้บริการ ในขณะเดียวกันร้านค้าพันธมิตรเองก็ได้มีโอกาสขยายฐานลูกค้า เข้าถึงครอบครัวคุณภาพกว่า 60,000 ครอบครัว สร้างโอกาสใหม่ ๆ ในการเติบโตไปพร้อมกับเรา บนแพลตฟอร์มของ AssetWise Club</p>
      <h3 class="text-center font-medium text-[30px]">
        AssetWise Club เรามุ่งมั่นที่จะเชื่อมโยงสิ่งดี ๆ<br/>
        ระหว่างลูกบ้านและร้านค้าพันธมิตร<br/>
        เพื่อสร้างคอมมูนิตี้แห่งความสุข<br/>
        ที่เติบโตไปด้วยกันอย่างแข็งแรงและยั่งยืน
      </h3>
    </div>
  </div>
</section>

<section id="info" class="pt-10 pb-20">
  <div class="container mx-auto px-4 lg:px-0">
    <img src="<?php echo $image_path ?>/aswClub_grow-together-benefit_d.png" alt="" class="hidden md:block">
    <img src="<?php echo $image_path ?>/aswClub_grow-together-benefit_m.png" alt="" class="md:hidden">
  </div>
</section>

<section id="form">
  <div class="container mx-auto px-4 lg:px-0">
    <div class="col-12">
      <h2 class="text-white text-center font-medium text-[48px]">ลงทะเบียนร้านค้า</h2>
    </div>
    <div class="col-12 lg:w-3/5 mx-auto">
      <form method="POST" id="growTogetherForm" action="" class="grid grid-cols-1 lg:grid-cols-2 gap-x-0 md:gap-x-4 gap-y-5">
        <div class="form-group col-span-2">
          <label for="shopName">ชื่อร้านค้า <span class="text-red-500" style="font-size: 32px;">*</span></label>
          <input type="text" class="form-control" id="shopName" name="shopName" required>
        </div>
        <div class="form-group col-span-2 md:col-span-1">
          <label for="contactNumber">เบอร์ติดต่อ <span class="text-red-500" style="font-size: 32px;">*</span></label>
          <input type="tel" class="form-control" id="contactNumber" name="contactNumber" placeholder="089-999-9999" required pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        </div>
        <div class="form-group col-span-2 md:col-span-1">
          <label for="email">อีเมล <span class="text-red-500" style="font-size: 32px;">*</span></label>
          <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>
        </div>
        <div class="form-group col-span-2">
          <label for="address">ที่อยู่ร้านค้า</label>
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
        <div class="form-group col-span-2 mb-3">
          <label for="promotionPeriod">ระยะเวลาโปรโมชั่น</label>
          <input type="text" class="form-control" id="promotionPeriod" name="promotionPeriod">
        </div>
        <input type="hidden" name="g-recaptcha-response" id="growTogetherRecaptchaToken">
        <div class="form-group col-span-2">
          <small class="text-white/80 leading-snug block">
            This site is protected by reCAPTCHA and the Google
            <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer" class="underline">Privacy Policy</a>
            and
            <a href="https://policies.google.com/terms" target="_blank" rel="noopener noreferrer" class="underline">Terms of Service</a>
            apply.
          </small>
        </div>
        <div class="form-group col-span-2">
          <div id="growTogetherFormMessage" class="text-white"></div>
        </div>
        <div class="form-group col-span-2 mb-0">
          <button id="submit" type="submit" class="btn btn-primary w-[200px] block mx-auto">
            <span id="submitSpinner" style="display:none; vertical-align:middle;">
              <svg class="animate-spin inline-block w-5 h-5 mr-1 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"/>
              </svg>
            </span>
            ส่งข้อมูล
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

<script type="text/javascript">
  (function() {
    const form = document.getElementById('growTogetherForm');
    if (!form) return;

    const messageEl = document.getElementById('growTogetherFormMessage');
    const submitBtn = form.querySelector('button[type="submit"]');
    const recaptchaInput = document.getElementById('growTogetherRecaptchaToken');
    const apiUrl = "<?php echo esc_url( home_url( '/api-grow-together-form/' ) ); ?>";
    const siteKey = "<?php echo esc_js( asw_recaptcha_get_site_key() ); ?>";

    function setMessage(type, text) {
      if (!messageEl) return;
      messageEl.innerHTML = '';
      if (!text) return;
      const div = document.createElement('div');
      div.className = type === 'error' ? 'form-error' : 'form-success';
      div.textContent = text;
      messageEl.appendChild(div);
    }

    function validateForm() {
      const requiredIds = ['shopName', 'contactNumber', 'email', 'address'];
      for (const id of requiredIds) {
        const input = document.getElementById(id);
        if (!input) continue;
        if (!input.value.trim()) {
          input.focus();
          return { valid: false, message: 'กรุณากรอกข้อมูลที่จำเป็นให้ครบถ้วน' };
        }
      }
      return { valid: true };
    }

    form.addEventListener('submit', function(e) {
      e.preventDefault();

      setMessage('', '');

      const validation = validateForm();
      if (!validation.valid) {
        setMessage('error', validation.message);
        return;
      }

      if (!siteKey || typeof grecaptcha === 'undefined') {
        setMessage('error', 'ไม่สามารถยืนยัน reCAPTCHA ได้ กรุณาลองใหม่ภายหลัง');
        return;
      }

      if (submitBtn) {
        submitBtn.disabled = true;
        document.getElementById('submitSpinner').style.display = 'inline-block';
      }

      grecaptcha.ready(function() {
        grecaptcha.execute(siteKey, { action: 'grow_together' }).then(function(token) {
          if (recaptchaInput) {
            recaptchaInput.value = token;
          }

          const formData = new FormData(form);
          const payload = {
            token: token,
            action: 'grow_together',
            form_values: {}
          };

          formData.forEach(function(value, key) {
            payload.form_values[key] = value;
          });

          const data = new FormData();
          data.append('json', JSON.stringify(payload));

          fetch(apiUrl, {
            method: 'POST',
            credentials: 'same-origin',
            body: data
          })
          .then(function(res) { return res.json(); })
          .then(function(json) {
            if (json && json.status === 'success') {
              setMessage('success', 'ส่งข้อมูลเรียบร้อย');
              form.reset();
            } else if (json && json.reason === 'recaptcha_failed') {
              setMessage('error', 'การยืนยันตัวตนล้มเหลว กรุณาลองใหม่อีกครั้ง');
            } else if (json && json.reason === 'validation_failed' && json.message) {
              setMessage('error', json.message);
            } else {
              setMessage('error', 'เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาลองใหม่ภายหลัง');
            }
          })
          .catch(function() {
            setMessage('error', 'เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาลองใหม่ภายหลัง');
          })
          .finally(function() {
            if (submitBtn) {
              submitBtn.disabled = false;
              document.getElementById('submitSpinner').style.display = 'none';
            }
          });
        });
      });
    });
  })();
</script>

<?php get_footer() ?>