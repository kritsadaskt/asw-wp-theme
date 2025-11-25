<?php 
$f_footer = get_field('footer_code');
?><style type="text/css">
  .w-400{
    font-weight: 400;
  }
  .link-footer:hover{
    color: #fff !important;
  }

  
  .logo-footer:hover{
    opacity: 0.8;
    transition: .3s;
  }
  .foot-toggle{
    transition: .2s;
  }
  @media (max-width: 768px) {
    .foot-toggle{
      max-height: 0px;
      margin-left: 30px;
    }
    .foot-toggle p{
      max-height: 0px;
    }
    .link-footer{
      display: none;
    }
  }
  .social-hov{
    border-radius: 100%;
  }
  .social-hov:hover{
    filter: grayscale(80%);
    background-color: #3b3b3b;
  }
  .mob-footer-phone{
    display: block;
    padding-top: 1rem;
  }
  .asw-logo-footer{
    max-width: 200px;
  }
  #footer_img_btn{
    max-width: 250px;
  }


</style>
<footer id="site-footer" class="bg-ci-blue-100 cl-white">
  <sp class="vl desktop-only"></sp>
  <sp class="vl"></sp>
  
  <div class="cont-pd">
   <theboxes class="top spacing -clip">
     <box col="4"><inner class="">
       <a href="/<?=pll_current_language()?>/home" class="">
         <img src="/wp-content/themes/seed-spring/img/<?=pll_current_language()?>/logo-asw.png" width="45%" class="inline-block asw-logo-footer">
       </a>
       <div style="padding-top: 32px;">
         <h6 style="padding-bottom: 6px;"><?php pll_e('ติดตามแอสเซทไวส์')?></h6>
         <div class="flex">
          <a href="https://th-th.facebook.com/AssetWiseThailand/" target="_blank" class="logo-footer social-hov">
            <img src="https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2022/11/Social-media.png" style="width: 45px;height: 45px;">
          </a>
          &nbsp;&nbsp;&nbsp;
          <a href="https://page.line.me/assetwise?openQrModal=true" target="_blank" class="logo-footer social-hov">
           <img src="https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2022/11/Social-media-1.png" style="width: 45px;height: 45px;">
         </a>
         &nbsp;&nbsp;&nbsp;
         <a href="https://www.instagram.com/assetwisethailand/" target="_blank" class="logo-footer social-hov">
           <img src="https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2022/11/Social-media-2.png" style="width: 45px;height: 45px;">
         </a>
         &nbsp;&nbsp;&nbsp;
         <a href="https://www.youtube.com/c/AssetwiseChannel" target="_blank" class="logo-footer social-hov">
           <img src="https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2022/11/Social-media-3.png" style="width: 45px;height: 45px;">
         </a>
         &nbsp;&nbsp;&nbsp;
         <a href="https://www.tiktok.com/@assetwise?lang=th-TH" target="_blank" class="logo-footer social-hov">
          <img src="/wp-content/themes/seed-spring/img/tiktok-icon.svg" style="width: 45px;height: 45px;">
        </a>
      </div>
      <div class="mobile-only mob-footer-phone">
       <img src="https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2022/11/Vector.png" class="inline">
       <a href="tel:02-168-0000" class="inline" style="font-size: 24px;font-weight: 400;line-height: 28px;color: #47CBC7">02-168-0000</a>
     </div>
   </div>
   <div class="desktop-only">
     <sp class=""></sp>
     <a href="tel:02-168-0000" class="">
       <img src="https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2022/09/Call-1.png" class="inline-block" width="40%">
     </a>
   </div>

   <sp class=""></sp>
   <div class="pointer" onclick="show_sub()">
     <img id="footer_img_btn" src="/wp-content/themes/seed-spring/img/<?=pll_current_language()?>/subscribe.png" class="inline-block pointer" width="100%">
   </div>
 </inner></box>
 <sp class="l mobile-only"></sp>
 <box col="2"><inner class="">
  <sp class="mobile-only" style="height: 0.5px;background-color: #545E67"></sp>
  <div class="pt-3">
    <div class="flex justify-between items-center" onclick="footer_togg(0,this)" data-show="-1">
     <h6 class="" ><?php pll_e('แอสเซทไวส์')?></h6>
     <div id="arrow" class="mobile-only arrow_footer"></div>
   </div>
   <div class="foot-toggle">
     <p class="w-400 py-1"><a href="/<?=pll_current_language()?>/condominium" class="py-1 link-footer"><?php pll_e('คอนโดมิเนียม')?></a></p>
     <p class="w-400 py-1"><a href="/<?=pll_current_language()?>/house" class="py-1 link-footer"><?php pll_e('บ้านและทาวน์โฮม')?></a></p>
     <p class="w-400 py-1"><a href="/<?=pll_current_language()?>/promotion" class="py-1 link-footer"><?php pll_e('โปรโมชั่น')?></a></p>
     <p class="w-400 py-1"><a href="/<?=pll_current_language()?>/about-us" class="py-1 link-footer"><?php pll_e('รู้จักแอสเซทไวส์')?></a></p>
     <p class="w-400 py-1"><a target="_blank" href="https://investor.assetwise.co.th/th/home" class="py-1 link-footer"><?php pll_e('นักลงทุนสัมพันธ์')?></a></p>
     <p class="w-400 py-1"><a href="/<?=pll_current_language()?>/club" class="py-1 link-footer"><?php pll_e('แอสเซทไวส์คลับ')?></a></p>
     <p class="w-400 py-1"><a href="/<?=pll_current_language()?>/news" class="py-1 link-footer"><?php pll_e('ข่าวสาร')?></a></p>
     <p class="w-400 py-1"><a href="/<?=pll_current_language()?>/blog" class="py-1 link-footer"><?php pll_e('บล็อก')?></a></p>
   </div>
 </div>
</inner></box>
<box col="2"><inner class="">
  <sp class="mobile-only" style="height: 0.5px;background-color: #545E67"></sp>
  <div class="pt-3">
   <div class="flex justify-between items-center" onclick="footer_togg(1,this)" data-show="-1">
     <h6 class=""><?php pll_e('บริการ')?></h6>
     <div id="arrow" class="mobile-only arrow_footer"></div>
   </div>
   <div class="foot-toggle">
     <p class="w-400 py-1 hidden"><a  href="/<?=pll_current_language()?>/360-virtual-tour" class="link-footer">360 Virtual Gallery</a></p>
     <p class="w-400 py-1"><a target="_blank" href="https://aswinno.assetwise.co.th/bankmatching?utm_source=Website&utm_medium=HeroBanner&utm_campaign=Home_BankMatching" class="link-footer"><?php pll_e('Bank Matching') ?></a></p>
     <p class="w-400 py-1 hidden"><a  href="#!" class="link-footer">AssetWise Application</a></p>
     <!-- <p class="w-400 py-1 "><a href="/<?=pll_current_language()?>/customer-care" class="link-footer">AssetWise Customer Care</a></p> -->
   </div>
 </div>

</inner></box>
<box col="2"><inner class="">
  <sp class="mobile-only" style="height: 0.5px;background-color: #545E67"></sp>
  <div class="pt-3">
    <div class="flex justify-between items-center" onclick="footer_togg(2,this)" data-show="-1">
     <h6 class=""><?php pll_e('สนใจทำธุรกิจกับเรา')?></h6>
     <div id="arrow" class="mobile-only arrow_footer"></div>
   </div>
   <div class="foot-toggle">
    <p class="w-400 py-1"><a target="_blank" href="https://aswland.assetwise.co.th/" class="link-footer"><?php pll_e('เสนอขายที่ดิน')?></a></p>
    <!-- <p class="w-400 py-1"><a target="_blank" href="https://procurement.assetwise.co.th/" class="link-footer"><?php //pll_e('เสนอขายสินค้าและบริการ')?></a></p> -->
    <p class="w-400 py-1"><a target="_blank" href="https://www.assetaplus.com/" class="link-footer"><?php pll_e('ฝากขาย-ฝากเช่า')?></a></p>
    <p class="w-400 py-1"><a target="_blank" href="https://careers.assetwise.co.th/" class="link-footer"><?php pll_e('ร่วมงานกับเรา')?></a></p>
  </div>
</div>

</inner></box>
<box col="2"><inner class="">
  <sp class="mobile-only" style="height: 0.5px;background-color: #545E67"></sp>
  <div class="pt-3 pb-3">
    <div class="flex justify-between items-center" onclick="footer_togg(3,this)" data-show="-1">
     <h6 class=""><?php pll_e('ติดต่อ')?></h6>
     <div id="arrow" class="mobile-only arrow_footer"></div>
   </div>
   <div class="foot-toggle">
    <p class="w-400 py-1 "><a href="/<?=pll_current_language()?>/contact" class="link-footer"><?php pll_e('ติดต่อเรา')?></a></p>
    <p class="w-400 py-1 hidden"><a href="#!" class="link-footer"><?php pll_e('ร่วมงานกับเรา')?></a></p>
    <p class="w-400 py-1 "><a href="/<?=pll_current_language()?>/appeal-form" class="link-footer"><?php pll_e('ร้องเรียนธรรมาภิบาล')?></a></p>
    <p class="w-400 py-1"><a target="_blank" href="https://services.assetwise.co.th/DSRM/DSRForm" class="link-footer"><?php pll_e('ติดต่อผู้คุ้มครองข้อมูลส่วนบุคคล')?></a></p>
    <p class="w-400 py-1 "><a href="/<?=pll_current_language()?>/privacy-policy" class="link-footer"><?php pll_e('นโยบายข้อมูลส่วนบุคคล')?></a></p>
  </div>
</div>
</inner></box>
</theboxes>
</div>
<sp class="vl desktop-only"></sp>
<div class="cont-pd">
  <sp class="px" style="background:#828A92"></sp>
  <sp class="l desktop-only"></sp>
  <sp class="mobile-only" style="height: 20px"></sp>
  <div class="desktop-only">
    <theboxes class="top spacing -clip">
      <box col="6"><inner class="" style="font-weight: 700;">
        <?php pll_e('© สงวนลิขสิทธิ์ พ.ศ. 2565 บริษัท แอสเซทไวส์ จำกัด (มหาชน)')?>
      </inner></box>
      <box col="6" ><inner class="text-right hidden" style="font-weight: 700;">
        <span><a href="/<?=pll_current_language()?>/privacy-policy" class=""><?php pll_e('นโยบายความเป็นส่วนตัว')?> </a></span>
        <span class="px-6">&nbsp;|&nbsp;</span>
        <span> <a href="/<?=pll_current_language()?>/privacy-policy" class=""><?php pll_e('ข้อตกลงและเงื่อนไข')?></a></span>
      </inner></box>
    </theboxes>
  </div>
  <div class="mobile-only">
    <theboxes class="top spacing -clip">
    <!--   <box col="6" ><inner class="text-center" style="font-weight: 700;font-size: 18px;">
        <span>นโยบายความเป็นส่วนตัว </span>
        <span class="px-6">&nbsp;|&nbsp;</span>
        <span> ข้อตกลงและเงื่อนไข</span>
      </inner></box> -->
      <box col="6"><inner class="text-center" style="font-weight: 700;font-size: 18px;">
        <?php pll_e('© สงวนลิขสิทธิ์ พ.ศ. 2565 บริษัท แอสเซทไวส์ จำกัด (มหาชน)')?>
      </inner></box>
    </theboxes>
  </div>
  <sp class="l desktop-only"></sp>
  <sp class="mobile-only" style="height: 20px"></sp>
</div>
</footer>

</div>
<!--#page-->
<script type="text/javascript">
  function footer_togg(num,el){
    var elem = document.getElementsByClassName("foot-toggle");
    let chevron = document.getElementsByClassName("arrow_footer");
    let datashow = parseInt(el.dataset.show)
    datashow *= -1
    el.dataset.show = datashow
    
    elem[num].style.maxHeight = "999px"
    if(datashow == 1){
      chevron[num].style.transform = "rotate(-135deg)"
      for(let k of elem[num].children){
        k.style.maxHeight = "999px"
        k.children[0].style.display = "block"
      }
    }
    else{
      chevron[num].style.transform = "rotate(45deg)"
      for(let i of elem){
        i.style.maxHeight = "0px"
        for(let j of i.children){
          j.style.maxHeight = "0px"
          j.children[0].style.display = "none"
        }
      }
    }
  }
</script>

<?php /* FOR SITE-MEMBER */ ?>
<div class="s-modal-bg"></div>
<?php if($GLOBALS['s_member_url'] != 'none') : ?>
  <div class="s-modal s-modal-login" data-s-modal="site-login">
    <span class="s-modal-close"><i class="si-cross-o"></i></span>
    <?php get_template_part( 'template-parts/account', 'login' ); ?>
  </div>

<?php endif; ?>
<footer class="entry-footer">
  <?php
  edit_post_link(sprintf(
    esc_html__( 'Edit %s', 'seed' ),
    the_title( '<span class="screen-reader-text">"', '"</span>', false )
  ),
  '<span class="edit-link">',
  '</span>'
);
?>
</footer>
<?php get_template_part( 'template-parts/element', 'lightbox'); ?>
<?php get_template_part( 'template-parts/site', 'search-popup'); ?>
<?php get_template_part( 'template-parts/site', 'subscriber'); ?>
<?php wp_footer(); ?>
<script type="text/javascript">
  window.addEventListener('load', () => {
    AOS.init({
      once: true
    });
  });
</script>


<script type="text/javascript">
  render_dynamicNav()
  window.addEventListener("resize", render_dynamicNav);
  function render_dynamicNav(){
    let parent = $$('.dynamic-side-nav')
    c = 0;
    for(let i of parent){
      let id = `dynamicSideNav_`+c
      i.id = id;
      let cssStyle = $(`#${id}_css`)
      let css = ``
      let temp_css = `.dsntemp`;
      let li = i.querySelectorAll('li')
      k = 0
      for(let l of li){
        l.dataset.i = k
        l.setAttribute('onclick',(`dynamicNavClick(this)`))
        let y = l.offsetTop;
        let h = l.offsetHeight;
        let x = l.offsetLeft;
        let w = l.offsetWidth;
        css += `#${id}[data-selected="${k}"]{--dsn-y:${y}px;--dsn-h:${h}px;--dsn-w:${w}px;--dsn-x:${x}px}`
        temp_css += `,#${id}[data-selected="${k}"] li:nth-child(${k+1})`
        k++
      }
      css += temp_css+`{color:var(--ci-nav)}`;
      if (cssStyle == undefined) {
        i.outerHTML += `<style id="${id}_css">${css}</stlye>`
        
      }else{
        cssStyle.innerHTML = css
      }
      
      c++;
    }
  }
  function dynamicNavClick(el){
    el.parentElement.parentElement.dataset.selected = el.dataset.i
  }
</script>

<script type="text/javascript">
  let el_onclick = $$(`[onclick][data-clickblank]`) 
  for(let iel of el_onclick){
    let x = iel.getAttribute('onclick')
    if (x.search("location.href") != -1) {
      let url  = x.split(`=`)[1]
      url = url.split(';')[0]
      iel.setAttribute('onclick',`window.open(${url})`)
    }
  }

  (function($){
      var wpcf7_class = '.wpcf7-form'
      var pathname = window.location.pathname;
      var search = window.location.search;
      var fullPath = pathname + search;
      var queryString = fullPath.split('?')[1];
      var params = new URLSearchParams(queryString);
      $('.wpcf7-form').attr('action', fullPath);
      $('.wpcf7-form input[type="hidden"][name^="utm_"]').val('');
      params.forEach((value, key) => {
          $('.wpcf7-form input[type="hidden"][name="'+key+'"]').val(value);
      });
  })(jQuery);
</script>

<?= get_template_part('template-parts/site', 'form-send'); ?>
<?= get_template_part('template-parts/site', 'compare'); ?>
<?=$f_footer?>
</body>
</html>