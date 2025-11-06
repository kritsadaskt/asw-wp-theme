<style type="text/css">
 .sub-card {
  position: fixed;
  z-index: 10000;
  display: flex;
  background-color: #2228;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  justify-content: center;
  align-items: center;
  opacity: 1;
  transition: opacity .5s;
}
.sub-card[data-toggle="-1"]{
  pointer-events: none;
  opacity: 0;
}
.sub-close{
  background: url('/wp-content/uploads/2023/05/menu-1.png');
  width: 1.5rem;
  height: 1.5rem;
  position: absolute;
  top: 1rem;
  right: 1rem;
  cursor: pointer;
  background-size: cover;
}
.child-sub-card{
  position: relative;
  border-radius: 5px;
  width: 100%;
  margin:1rem;
  max-width: 600px;
}
.subcription-block{
}

.sub-card  span.wpcf7-not-valid-tip{
  display: none;
}
.sub-card .wpcf7 form.invalid .wpcf7-response-output {
  margin: 1rem 0;
  padding: 0;
  border:none !important;
  color: #dc3232;
}
.sub-check{
  width: 24px;
  height: 24px;
  background: #FFFFFF;
  border: 1px solid #DFE3E8;
  border-radius: 4px;
  margin-right: 1rem;
  position: relative;
  top: 4px;
  --tw-ring-color:transparent !important;
  cursor: pointer;
  color: var(--ci-blue-300);
}
.sub-card .-consent{
  display: grid;
  grid-template-columns: 34px auto;
  font-weight: 400;
  font-size: 22px;
  color: #828A92;
  margin-top: 1rem;
}
.sub-card .wpcf7-submit{
  display: none;
}
.sub-card .wpcf7 input[type="email"] {
 width: 100% !important;
 max-width: 100% !important;
 margin: 0;
 height: 48px;
 background: #FFFFFF;
 border: 1px solid #DFE3E8;
 border-radius: 8px;
 font-size: 22px;
}
.sub-card .wpcf7-spinner{
  display: none;
  margin: 1rem 0;
}
.sub-card form.submitting .wpcf7-spinner{
  display: block;
}
.sub-card .wpcf7 form.sent .wpcf7-response-output {
  padding: 0;
  margin: 1rem 0;
  border: none;
  color: var(--ci-blue-300);
  font-weight: bold;
}
#sent-sub span::before{
  content: " ";
  background-image: url(/wp-content/uploads/2023/05/Vector.png);
  width: 1em;
  height: 1em;
  position: relative;
  display: inline-block;
  background-position: center;
  background-size: contain;
  background-repeat: no-repeat;
  vertical-align: sub;
  margin-right: 0.5em;
}

#sent-sub{
  background-color: var(--ci-blue-300);
  color: #BFC4C8;
  padding: 10px 20px;
  border-radius: 5px;
  margin: auto;
  display: block;
  transition: all .3s;
}
#subcription-block[data-ready="false"] #sent-sub{
  background-color: #828A92;
  pointer-events: none;
}
</style>

<script>
  function show_sub(){
    $('.sub-card').dataset.toggle = 1
  }
  function close_sub(){
    $('.sub-card').dataset.toggle = -1
  }
  function subsc_send(){
    $('.sub-card .wpcf7-submit').click();
  }
</script> 


<div id="subcription-block" class="sub-card" data-toggle="-1" data-ready="false">
  <div class="bg-white text-black p-10 child-sub-card">
    <div class="sub-close" onclick="close_sub()"></div>
    <h2><?php pll_e('สมัครรับข่าวสารและสิทธิพิเศษ')?></h2>
    <sp class=""></sp>
    <p><?php pll_e('กรุณาระบุอีเมลของคุณ')?></p>
    <sp class=""></sp>
    <div>
      <div class="-form">
        <?=do_shortcode('[contact-form-7 id="11105" title="Subscriber"]')?>
      </div>
      <label class="-consent">
        <input type="checkbox" class="sub-check">
        <span><?php pll_e('เพื่อให้ไม่พลาดข้อมูลข่าวสาร และโอกาสรับข้อเสนอที่สำคัญฉันยินยอมรับข้อมูลข่าวสารโปรโมชันและข่าวสารจาก')?></span>
      </label>
    </div>
    <sp class="l"></sp>
    <button id="sent-sub" onclick="subsc_send()">
      <span><?php pll_e('ส่ง')?></span>
    </button>
  </div>
</div>

<script type="text/javascript">

  $('.sub-check').onchange = ()=>{
    $('#subcription-block').dataset.ready = $('.sub-check').checked
  }
</script>