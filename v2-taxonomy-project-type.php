

<?php get_header() ?>
<?php 
$tax_id = get_queried_object()->term_id;
$term_name = get_term( $tax_id )->name;
$banner = get_field('banner','project-type' . '_' . $tax_id);

$slider = $banner['home_banner'];

$slideSize = 0;
if (is_array($slider)) {
    $slideSize = ofsize($slider);
}
function pad($num){
    if ($num>9) {
        return $num;
    }else{
        return '0'.$num;
    }
}
$term_pj_location = asw_get_term_nest('project_location');
?>

<script type="text/javascript">
  function pad(num, size) {
   num = num.toString();
   while (num.length < size) num = "0" + num;
   return num;
}
</script>
<style type="text/css">
    .site{
        min-height: unset;
    }
    /* NEW */
    .card-project{
        will-change: transform, opacity;
        transition: transform .5s calc(var(--x) * .2s),opacity .5s calc(var(--x) * .2s);
        transform: translateY(100px);
        opacity: 0;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
    }
    .card-project[data-x="-1"]{
        transition: none;
    }
    .card-project[data-show="1"]{
        opacity: 1;
        transform: translateY(0px);
    }
    /* END NEW */

    .condo-pad-desc{
        font-weight: 300;
        padding: 0rem 22rem;
    }
    .condo-pad-desc p {
        font-weight: 300 !important;
        font-size: 26px !important;
        line-height: 32px !important;
    }
    .leaf14, .leaf12{
        right: 0 !important;
    }
    @media (max-width: 1024px) {
        .condo-pad-desc{
            padding: 0;
        }
    }
    @media (min-width: 768px) {
        .graylogo-size{
            width: 17%;
        }
    }
    @media (max-width: 767px) {
        .condo-pad-desc p {
            font-weight: 300 !important;
            font-size: 22px !important;
            line-height: 28px !important;
        }
    }
</style>
<style type="text/css">
  html, body{
   overflow: visible;
}
.leaf14, .leaf12{
   right: 0 !important;
}
.txt_120 {
   display: block;
   height: calc(28px * 2);
   overflow: hidden;
}
#txt_20 {
   height: calc(28px * 2);
   overflow: hidden;
}
#home-slider{
   width: 100%;
   padding-top: 41.111%;
   /*padding-top: 56.25%;*/
   position: relative;
   display: flex;
}
#home-slider-inner{
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   background-color: #000;
}
#home-slider-arrow{
   display: grid;
   grid-template-columns: 48px 48px;
   grid-column-gap: 8px ;
   position: absolute;
   left: 24px;
   bottom: 64px;
   z-index: 10;
}
#home-slider-arrow img{
   display: inline-block;
   border-radius: 100%;
   cursor: pointer;
   transition: all .2s;
   opacity: .7;
}
#home-slider-arrow img:hover{
   opacity: 1;
}
#home-slider-slides{
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
}
.home-slider-slide{
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   opacity: 0;
   transition: all .4s;
}
#home-slider-count{
   --i: 0;
   --z: 5;
   width: 240px;
   height: 30px;
   /*background-color: yellow;*/
   /* display: grid; */
   /* grid-template-columns: 1fr 4fr 1fr; */
   /* grid-column-gap: 12px; */
   left: -200px;
   top: 48px;
   z-index: 10;
   position: absolute;
   align-items: center;
   display: flex;
   /*justify-content: space-between;*/
   color: #fff;
   transform: rotate(-90deg);
   transform-origin: center right;
}
#home-slider-count .-num-bar{
   height: 2px;
   width: 93px;
   margin: 0 12px;
   background-color: #fff4;
   position: relative;
   display: flex;
}
#home-slider-count .-num-bar div{
   background-color: #fff;
   height: 100%;
   width: 0;
}
#home-slider-count .-num-bar div.go{
   width: 100%;
   transition: all 4.9s linear;
}
.home-slider-slide-video .plyr--video {
   max-height: 100% !important;
}
.home-news-date {
   position: absolute;
   bottom: 1.2rem;
   left: 1rem;
}
.home-news-date-sp {
   width: 100%;
   height: 30px;
}
#home-slider-count h3{
   font-size: 40px;
}
#home-slider-count p{
   font-size: 26px;
   position: relative;
   top: 4px;
   padding-left: 4px;
   color: #EDF2F7;
}
.plyr-slider-wrap{
   position: absolute;
   display: flex;
   width: 100%;
   height: 200%;
   /*background-color: yellow;*/
   left: 0;
   top: -50%;
}
.plyr__video-embed iframe{
   transform: scale(.75);
}
.home-slider-slide-video {
   overflow: hidden;
}
.promotion_vbar{
   width: 4px;
   height: 28px;
   position: absolute;
   left: -1px;
   top: 0;
   background-color: #F1683B;
   transition: all .2s;
}
#middle-news-pic {
   position: relative;
   width: calc(100% + 8px);
   padding-right: 8px;
   padding-bottom: 8px;
}
#middle-news-pic::before{
   content: " ";
   position: absolute;
   background-color:var(--ci-veri-500);
   width: 30%;
   height: 30%;
   right: 0;
   bottom: 0;
}
.home-blog-inner {
   position: relative;
}

.home-blog-inner::before {
   content: " ";
   position: absolute;
   left: 0;
   top: 0;
   background: var(--ci-orange-500);
   width: 4px;
   transition: all .8s;
   height: 0%;
}
.home-blog-card:hover .home-blog-inner::before {
   height: 100%;
}
#home-slider-inner-mob{
   display: none;
}
.home-slider-shadow{
   width: 200px;
   height: 100%;
   z-index: 2;
   position: absolute;
   left: 0;
   top: 0;
   background:linear-gradient(90deg, rgba(0,0,0,0.6) 0%, rgba(255,255,255,0) 100%) ;
}
@media (max-width: 768px) {
   .home-blog-inner {
    display: flex;
    align-items: center;
}
}
#home-slide-cmd-mob{
   display: none;
}

@media (max-width: 768px) {
   #home-slider-inner{
    display: none;
}
}

</style>
<script type="text/javascript">
  let allSlideVideo = []
  let allSlideVideoMob = []
</script>
<?php if ($slideSize>0): ?>
    <section id="home-slider">
      <div id="home-slider-inner">
       <div class="home-slider-shadow pointer-events-none"></div>
       <div id="home-slider-slides">
        <?php 
        foreach ($slider as $key => $v) {
         switch ($v['acf_fc_layout']) {
          case 'desktop_banner':
          $new_banner_onclick_condition = ' data-click="0" ';
          if ($v['url'] != '') {
              $new_banner_onclick_condition = ' onclick="window.open(`'.$v['url'].'`)" ';
          }
          ?>
          <div class="home-slider-slide bg-cover pointer" <?=$new_banner_onclick_condition?>  style="background-image:url('<?=$v['image']['sizes']['1536x1536']?>')"></div>
          <?php

          break;
          case 'video_banner':
          ?>
          <div class="home-slider-slide bg-cover home-slider-slide-video" style="background-color:#000;">
           <div class="plyr-slider-wrap">
            <div id="slide_player_<?=$key?>" loops data-plyr-provider="youtube" data-plyr-embed-id="<?=acf_oembed_to_youtubeID($v['video'])?>"></div>
        </div>
    </div>

    <script>
       const slide_player_<?=$key?> = new Plyr('#slide_player_<?=$key?>',{
        controls:['play-large'],
        loop:{ active: true}
    });
       allSlideVideo.push(slide_player_<?=$key?>)
   </script>
   <?php
   break;
}
}
?> 
</div>
<div id="home-slider-arrow">
    <img src="/wp-content/uploads/2022/09/slide-arrow-l.png" class="-l" onclick="changeSlider(-1);stopAutoplay()">
    <img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="-r" onclick="changeSlider(1);stopAutoplay()">
</div>
<div id="home-slider-count">
    <div >
     <h3 class="-num-min">01</h3>
 </div>
 <div class="-num-bar">
     <div class=""></div>
 </div>
 <div><h3 class="-num-next">02</h3></div>
 <div>
     <p style="margin-left: 3px;">/<span class="-num-max">06</span></p>
 </div>
</div>
</div>
<div id="home-slider-inner-mob">
   <style type="text/css">
    #home-slider-inner-mob .home-slider-slide[data-active="0"]{
     opacity: 1;
     z-index: 10;
 }
</style>
<div id="home-slider-slides-mob">
    <?php 
    $data_active = -1;
    foreach ($slider as $key => $v) {
     switch ($v['acf_fc_layout']) {
      case 'mobile_banner':
      $data_active++
      ?>
      <div class="home-slider-slide bg-cover pointer" onclick="location.href='<?=$v['url']?>'"  style="background-image:url('<?=$v['image']['sizes']['1536x1536']?>')" data-active="<?=$data_active?>" data-i="<?=$data_active?>"></div>
      <?php
      break;
      case 'video_banner':
      $data_active++
      ?>
      <div class="home-slider-slide bg-cover home-slider-slide-video" style="background-color:#000;" data-active="<?=$data_active?>" data-i="<?=$data_active?>" onclick="clearInterval(mhbannerInterval)">
       <div class="plyr-slider-wrap">
        <div id="slide_player_mob_<?=$key?>" loops data-plyr-provider="youtube" data-plyr-embed-id="<?=acf_oembed_to_youtubeID($v['video'])?>" data-active="<?=$data_active?>"></div>
    </div>
</div>

<script>
    const slide_player_mob_<?=$key?> = new Plyr('#slide_player_mob_<?=$key?>',{
        controls:['play-large'],
        loop:{ active: true}
    });
    allSlideVideoMob.push(slide_player_mob_<?=$key?>)
</script>
<?php
break;
}
}
?> 
</div>
</div>

<script type="text/javascript">
    home_slides = document.querySelector('#home-slider-inner #home-slider-slides')
    home_slide = document.querySelectorAll('#home-slider-inner .home-slider-slide')
    home_slide_active = 0;
    home_slide[0].style.opacity = 1;
    home_slide[0].style.zIndex = 1;
    home_slide_nex = get_home_slide_nex(1);
    let autoPlay = 1;
    document.querySelector('#home-slider-inner #home-slider-count .-num-min').innerText = pad(1,2)
    document.querySelector('#home-slider-inner #home-slider-count .-num-next').innerText = pad(home_slide_nex,2)
    document.querySelector('#home-slider-inner #home-slider-count .-num-max').innerText = pad(home_slide.length,2)
    document.querySelector('#home-slider-inner #home-slider-count').style.setProperty('--z',home_slide.length)
    function changeSlider(plus){
        document.querySelector('#home-slider-inner #home-slider-count .-num-bar div').classList.remove('go')
        if (autoPlay) {
         setTimeout(()=>{
          document.querySelector('#home-slider-inner #home-slider-count .-num-bar div').classList.add('go')
      },100)
     }
     for(let s of home_slide){
         s.style.opacity = 0;
         s.style.zIndex = -1;
     }
     home_slide_active += plus


     if ( home_slide_active >= home_slide.length) {
         home_slide_active = 0;
     }else if(home_slide_active < 0){
         home_slide_active = home_slide.length-1;
     }
     home_slide[home_slide_active].style.opacity = 1;
     home_slide[home_slide_active].style.zIndex = 1;
     document.querySelector('#home-slider-inner #home-slider-count .-num-min').innerText = pad(home_slide_active+1,2)
     document.querySelector('#home-slider-inner #home-slider-count .-num-next').innerText = pad(get_home_slide_nex(home_slide_active+1),2)
     document.querySelector('#home-slider-inner #home-slider-count').style.setProperty('--i',home_slide_active)
     for(let i of allSlideVideo){
         i.pause()
     }
 }

 autoPlaySlide = setInterval(()=>{
    if (autoPlay) {
     changeSlider(1);
 }

},5000)
 function stopAutoplay(){
    autoPlay = 0
}
function get_home_slide_nex(now){
    now++
    if (now>home_slide.length) {
        now = 1
    }
    return now
}
setTimeout(()=>{
    document.querySelector('#home-slider-inner #home-slider-count .-num-bar div').classList.add('go')
},100)
</script>
</section>
<?php endif ?>
<div id="home-slide-cmd-mob">
  <style type="text/css">
   /*-- Mobile Version --*/
   @media (max-width: 1024px) {


    #home-slider{
     padding-top:100%;
 }
 #home-slider-inner-mob{
     display: block;
 }
 #home-slide-cmd-mob {
     padding: 14px 15px;
     display: grid;
     grid-template-columns: 40px auto 40px;
     grid-column-gap: 40px;
     color: var(--ci-grey-100);
 }
 #home-slide-cmd-mob .-num-bar{
     width: 100%;
     height: 1px;
     background: var(--ci-blue-500);
     position: relative;
 }
 #home-slide-cmd-mob .-num-bar div{
     width: 100%;
     height: 2px;
     background: var(--ci-veri-500);
     position: absolute;
     top: -.5px;
     width: 0%;
     transition: 2950ms linear;
 }
 #home-slider-count-mob {
     display: flex;
     gap: 10px;
     justify-content: space-between;
     align-items: center;
 }
 .plyr__video-embed iframe {
     transform: scale(1.8);
 }

}
</style>
<div class="hsm-arrow -l" onclick="mhbanner_slide_plus(1);clearInterval(mhbannerInterval)">
   <img src="/wp-content/uploads/2022/09/slide-arrow-l.png" class="-l" onclick="">
</div>
<div id="home-slider-count-mob">
   <div >
    <h5 class="-num-min">01</h5>
</div>
<div class="-num-bar" data-play="0">
    <div class=""></div>
</div>
<div><h5 class="-num-next">
    <span class="-num-next-num">02</span><span style="margin-left: 3px;color: var(--ci-grey-400);font-weight: 300;font-size: 20px;">/<span class="-num-max"><?=pad($data_active+1)?></span></span></h5></div>
</div>
<div class="hsm-arrow -r" onclick="mhbanner_slide_plus(-1);clearInterval(mhbannerInterval)">
    <img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="-r" onclick="">
</div>
<script type="text/javascript">
    let mhbannerAutoPlay = 1;
    setTimeout(()=>{
     document.querySelector('#home-slider-count-mob .-num-bar div').style.width = "100%"
 },50)
    mhbannerInterval = setInterval(()=>{
     mhbanner_slide_plus(-1)
     document.querySelector('#home-slider-count-mob .-num-bar div').style.width = "0%"
     document.querySelector('#home-slider-count-mob .-num-bar div').style.transition = "0ms"
     setTimeout(()=>{
      document.querySelector('#home-slider-count-mob .-num-bar div').style.width = "100%"
      document.querySelector('#home-slider-count-mob .-num-bar div').style.transition = "2950ms linear"
  },50)

 },3000)
    function mhbanner_slide_plus(p){
     let x = document.querySelectorAll('#home-slider-inner-mob .home-slider-slide')
     let lim = x.length
     for(let i of x){
      i.dataset.active = (Number(i.dataset.active)+p)%lim
  }
  let now = Number(document.querySelector('#home-slider-inner-mob .home-slider-slide[data-active="0"]').dataset.i)
  document.querySelector('#home-slider-count-mob .-num-min').innerText = pad(now+1,2)
  let next = now+2
  if (next>lim) {
      next = 1
  }
  document.querySelector('#home-slider-count-mob .-num-next-num').innerText = pad(next,2)
  for(let i of allSlideVideoMob){
      i.pause()
  }
}
</script>
</div>
</div>
<?php
$term_parent = get_term($tax_id)->parent;
$type_name = get_term( $term_parent);


// $type_name = wp_get_object_terms( $post->ID, 'project-type');
// $name1 = "";
// $name2 = "";
// pre($term_parent);
// pre($type_name);
// pre(get_the_ID());
// pre($type_name);

if ($type_name->slug == 'condominium'){
  $name1 = "condominium";
  $name2 = $type_name->name;
}else if ($type_name->slug == 'house'){
  $name1 = "house";
  $name2 = $type_name->name;
}

// if($type_name[1]->slug == 'town-home'){
// 	$name1 = "townhome";
// 	$name2 = "บ้านและทาวน์โฮม";
// }
// else{
// 	$name1 = "condominium";
// 	$name2 = "คอนโดมิเนียม";
// }
?>
<div class="cont-pd py-6 flex flex-row items-center">
  <a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
  <img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
  <a href="/<?=pll_current_language()?>/<?=$name1?>" class="cl-ci-blue-400"><?=$name2?></a>
  <img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
  <?=$term_name?>
</div>
<sp class=""></sp>

<style type="text/css">
  .border-desc{
   border-left: 1px solid var(--ci-grey-700);
   padding-left: 32px;
}
.brand-logo{
   margin-right: 40px;
   height: 80px;
}
.line-right{
   position: absolute;
   right: 0;
   height: calc(100% - 16px - 56px);
   width: 8px;
   background-color: var(--ci-orange-500);
}
.line-left{
   position: absolute;
   left: 0;
   bottom: 0;
   height: 8px;
   width: 128px;
   background-color: var(--ci-veri-500);
}
@media (max-width: 767px) {
   .border-desc{
    border-left: 0px solid var(--ci-grey-700);
    padding-left: 0px;
}
.brand-logo{
    margin: 0px;
    margin-bottom: 30px;
    height: 80px;
}
.line-left{
    height: 4px;
    width: 92px;
}
.line-right{
    display: none;
}
}
</style>
<?php 
$terms = get_terms( array(
  'taxonomy' => 'project-type',
  'hide_empty' => false,
  'orderby'  => 'name'
) );
?>
<!--=== The Section Boxes : title ===-->
<section id="title" class="pt-4 pb-10 md:pb-14 relative">
  <div class="line-right"></div>
  <div class="line-left"></div>
  <img src="/wp-content/uploads/2022/11/leaves-shadow-1-2.png" class="absolute pointer-events-none leaf13">
  <img src="/wp-content/uploads/2022/11/shutterstock_1574382076-1-2.png" class="absolute hidden md:block pointer-events-none leaf12">
  <div class="cont-pd">
   <div class="flex justify-center md:px-40 lg:px-72">
    <div class="grid grid-flow-row md:grid-rows-1 md:grid-cols-3 gap-4">
     <?php 				
     $iconic = get_field('project_logo','project-type' . '_' . $tax_id);
     $heading = get_field('heading','project-type' . '_' . $tax_id);
     $description = get_field('description','project-type' . '_' . $tax_id);
     ?>
     <div class="row-span-1 md:col-span-1 flex justify-center md:block">
      <img src="<?=$iconic['url']?>" class="brand-logo">
  </div>
  <div class="row-span-1 md:col-span-2 flex flex-col justify-center md:block border-desc">
      <span class="f30-28 cl-ci-grey-200 text-center px-8 md:px-0" style="font-weight: 500;"><?=$heading?></span>
      <sp style="height: 10px;" ></sp>
      <span class="f26-22 cl-ci-grey-400 text-center px-4 md:px-0" style="font-weight: 300;"><?=$description?></span>
  </div>
</div>
</div>
</div>
</section>

<!--=== The Section Boxes : condo-filter ===-->
<div style="overflow: visible;">
    <section id="condo-filter" class="pt-16 pb-6" style="background: linear-gradient(180deg, #EDF2F7 -4.71%, #FFFFFF 164.99%);">
        <h1 class="flex justify-center f40-30 cl-ci-grey-200" style="white-space: nowrap;"><?php pll_e('ค้นหาโครงการบ้านและทาวน์โฮม')?></h1>
        <sp class="xl"></sp>
        <sp class="xl"></sp>
        <div class="padding-xs-hzt pst -ab -left wide" style="z-index: 1000;top: 50%;">
            <div class="cont-pd">
                <div class="">
                    <theboxes class="middle center t-center- -clip round" style="margin-top: 10px;z-index: 10;border-radius: 8px;">
                        <box col="2.5"><inner id="filter_0" class="padding quick-filter v-middle-wrap pointer" onclick="filter_pop(1, this)">
                            <div class="quick-filter-inner cursor-pointer">
                                <span class="wide">
                                    <div class="grid grid-cols-5">
                                        <div class="col-span-1 flex items-center">
                                            <img src="/wp-content/uploads/2022/10/Icon-in-input-1.png" class="inline-block" style="height:2rem">
                                        </div>
                                        <div class="col-span-4">
                                            <span class="" style="font-size:26px;line-height:32px;" id="lo_pro">
                                                <?php pll_e('ทำเล')?>
                                            </span>
                                        </div>
                                    </div>
                                </span>
                                <img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" style="height:.5rem">
                            </div>
                        </inner></box>
                        <box col="2.5" style="display: none;"><inner id="filter_1" class="padding quick-filter v-middle-wrap pointer" onclick="filter_pop(2, this)" >
                            <div class="quick-filter-inner cursor-pointer">
                                <span class="wide">
                                    <div class="grid grid-cols-5">
                                        <div class="col-span-1 flex items-center">
                                            <img src="/wp-content/uploads/2022/10/Icon-in-input-2.png" class="inline-block" style="height:2rem">
                                        </div>
                                        <div class="col-span-4">
                                            <span class="" style="font-size:26px;line-height:32px;" id="brand_pro">
                                                <?php pll_e('แบรนด์')?>
                                            </span>
                                        </div>
                                    </div>
                                </span>
                                <img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" style="height:.5rem">
                            </div>
                        </inner></box>
                        <box col="2.5"><inner id="filter_2" class="padding quick-filter v-middle-wrap pointer" onclick="filter_pop(3, this);filter_pop_price(this)" data-price-min="<?=$pro_price_min?>" data-price-max="<?=$pro_price_max?>">
                            <div class="quick-filter-inner cursor-pointer">
                                <span class="wide">
                                    <div class="grid grid-cols-5">
                                        <div class="col-span-1 flex items-center">
                                            <img src="/wp-content/uploads/2022/10/Icon-in-input-3.png" class="inline-block" style="height:2rem">
                                        </div>
                                        <div class="col-span-4">
                                            <span class="" style="font-size:26px;line-height:32px;" id="price_pro">
                                                <?php pll_e('ช่วงราคา')?>
                                            </span>
                                        </div>
                                    </div>
                                </span>
                                <img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" style="height:.5rem">
                            </div>
                        </inner></box>
                        <box col="2.5"><inner id="filter_3" class="padding quick-filter v-middle-wrap pointer" onclick="filter_pop(0, this)">
                            <div class="quick-filter-inner cursor-pointer">
                                <span class="wide">
                                    <div class="grid grid-cols-5">
                                        <div class="col-span-1 flex items-center">
                                            <img src="/wp-content/uploads/2022/11/Group-908.png" style="height:2rem">
                                        </div>
                                        <div class="col-span-4">
                                            <span class="" style="font-size:26px;line-height:32px;" id="type_pro">
                                                <?php pll_e('สถานะโครงการ')?>
                                            </span>
                                        </div>
                                    </div>
                                </span>
                                <img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" style="height:.5rem">
                            </div>
                        </inner></box>
                    </theboxes>
                    <style type="text/css">
                        .input-width{
                            width: 30px;
                            margin-left: 5px;
                            margin-right: 5px;
                        }
                        .check-wrap {
                            display: block;
                            position: relative;
                            padding-left: 35px;
                            cursor: pointer;
                            font-size: 22px;
                            line-height: 28px;
                            font-weight: 400;
                            color: var(--ci-grey-300);
                            -webkit-user-select: none;
                            -moz-user-select: none;
                            -ms-user-select: none;
                            user-select: none;
                            padding-right: 12px;
                            margin-bottom: 4px;
                        }
                        .check-wrap input {
                            position: absolute;
                            opacity: 0;
                            cursor: pointer;
                            height: 0;
                            width: 0;
                        }
                        .checkmark {
                            transition: .5s;
                            position: absolute;
                            top: 3px;
                            left: 0;
                            height: 16px;
                            width: 16px;
                            border-radius: 4px;
                            border:1px solid var(--ci-blue-600);
                            background-color: white;
                            margin-left: 7px;
                            margin-top: 2px;
                        }
                        .check-wrap input:checked ~ .checkmark {
                            background-color: var(--ci-veri-400);
                        }
                        .checkmark:after {
                            content: "";
                            position: absolute;
                            display: none;
                        }
                        .check-wrap input:checked ~ .checkmark:after {
                            display: block;
                        }
                        .check-wrap .checkmark:after {
                            left: 4.5px;
                            top: 2px;
                            width: 5px;
                            height: 8px;
                            border: solid white;
                            border-width: 0 2px 2px 0;
                            -webkit-transform: rotate(45deg);
                            -ms-transform: rotate(45deg);
                            transform: rotate(45deg);
                        }
                        .popup-filter{
                            transition: .5s;
                            border: 1px solid var(--ci-blue-600);
                            border-radius: 24px;
                            padding: 0.75rem;
                            padding-bottom: 0;
                            align-items: center;
                            margin-top: 10px;
                            margin-right: 3px;
                            width: fit-content;
                            padding-top: 4px;
                        }
                        .popup-filter:hover{
                            border:1px solid var(--ci-veri-400);
                            background-color: var(--ci-veri-900);
                        }
                        #filter-selected{
                            color: var(--ci-veri-200);
                            font-weight: 500;
                        }
                        .popup-select{
                            transition: .5s;
                            border: 1px solid var(--ci-veri-400);
                            background-color: var(--ci-veri-900);
                            border-radius: 30px;
                            padding-left: 1rem;
                            padding-right: 0.75rem;
                            padding-top: 0.25rem;
                            padding-bottom: 0.25rem;
                            align-items: center;
                            margin-top: 8px;
                            margin-bottom: 8px;
                            margin-right: 8px;
                            white-space: nowrap;
                        }
                        .popup-select label{
                            color: var(--ci-veri-200);
                            font-weight: 400;
                            margin-bottom: 0;
                        }
                        .filter-bet-line{
                            border: 1px solid #CFD4D9;
                            width: 0;
                            height: 30px;
                            margin-left:20px;
                            margin-right:20px;
                        }
                        .quick-filter-toggle-2{
                            top: 5px;
                            left: 8.5%;
                            width: 36em;
                        }
                        .quick-filter-toggle-3{
                            top: 5px;
                            width: 30em;
                            left: 29.2%;
                            float: unset;
                        }
                        @media (max-width: 1024px) {
                            .quick-filter-toggle-2{
                                width: 27em;
                            }
                            .quick-filter-toggle-3{
                                width: 90vw;
                            }
                        }
                        @media (max-width: 768px) {
                            .popup-select{
                                padding-right: 1.5rem;
                            }
                        }
                        .popup-filter-price{
                            font-size: 22px;
                            line-height: 28px;
                            font-weight: 400;
                            color: var(--ci-grey-300);
                            transition: .5s;
                        }
                        .popup-filter-price:hover{
                            background-color: var(--ci-blue-900);
                        }
                        .popup-filter-price:hover.-mini{
                            background-color: unset;
                        }
                        .popup-filter-price label{
                            margin-bottom: 0;
                        }
                    </style>
                    <div id="filter_type" class="quick-filter-toggle-1" style="top: 5px;left: 71%;width: 12em;">
                        <div class="bg-white round" style="padding:24px 12px;padding-right: 0;">
                            <?php

                            $terms = get_terms( array(
                                'taxonomy' => 'project_status',
                                'hide_empty' => false,
                            ) );
                            foreach ($terms as $key => $value){
                                $stat_label = get_field('label',$value->taxonomy . '_' . $value->term_id); ?>
                                <div class="flex inline popup-filter" num="0" onclick="check_chk(this, 0);sort_info()">
                                    <label class="check-wrap" name="<?=$stat_label?>" termId="<?=$value->term_id?>"><?=$stat_label?>
                                    <input type="checkbox" name="<?=$stat_label?>">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
                <div id="filter_location" class="quick-filter-toggle-2">
                    <div class="bg-white round" style="padding:45px 24px;padding-top: 30px;">
                        <span class="cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('ในกรุงเทพฯ')?></span>
                        <sp style="height: 8px;" ></sp>
                        <?php
                        
                        foreach ($term_pj_location['in-bangkok']->child as $key => $value) { 
                            ?>
                            <div class="flex inline-flex popup-filter" slug="<?=$value->slug?>" num="1" onclick="check_chk(this, 1);sort_info()">
                                <label class="check-wrap" termId="<?=$value->term_id?>" name="<?=$value->name?>"><?=$value->name?>
                                <input type="checkbox" name="<?=$value->name?>">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <?php 
                    }
                    ?>

                    <div style="padding-top: 42px;padding-bottom: 22px;">
                        <hr style="width: 80px;background-color: var(--cl-ci-grey-900);">
                    </div>
                    <span class="cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('ต่างจังหวัด')?></span>
                    <sp style="height: 8px;" ></sp>
                    <?php
                    foreach ($term_pj_location['upcountry']->child as $key => $value) { 

                        ?>
                        <div class="flex inline-flex popup-filter" slug="<?=$value->slug?>" num="1" onclick="check_chk(this, 1);sort_info()">
                            <label class="check-wrap" termId="<?=$value->term_id?>" name="<?=$value->name?>"><?=$value->name?>
                            <input type="checkbox" name="<?=$value->name?>">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <?php 
                }
                ?>
            </div>
        </div>
        <div id="filter_project" class="quick-filter-toggle-3">
            <div class="bg-white round" style="padding:48px 32px;padding-top: 30px;">
                <span class="cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('คอนโดมิเนียม')?></span>
                <sp style="height: 8px;" ></sp>
                <?php
                $terms = get_terms( array(
                    'taxonomy' => 'project-type',
                    'hide_empty' => false,
                ) );
                foreach ($terms as $key => $value) {
                    if ($value->parent == 35) {
                        $iconic = get_field('project_logo',$value->taxonomy . '_' . $value->term_id); 
                        $is_show = get_field('is_show',$value->taxonomy . '_' . $value->term_id);
                        if ($is_show != 'hide') {
                            ?>
                            <div class="flex inline-flex popup-filter" slug="<?=$value->slug?>" num="2" onclick="check_chk(this, 2);sort_info()">
                                <label class="check-wrap" termId="<?=$value->term_id?>" name="<?= $value->name ?>">
                                    <input type="checkbox" name="<?= $value->name ?>">
                                    <img src="<?=$iconic['url']?>" style="width: auto;height: 30px;margin-right: 5px;" >

                                    <span class="checkmark" style="margin-top: 4px;"></span>
                                </label>
                            </div>
                        <?php }
                    }
                }
                ?>
            </div>
        </div>
        <?php 
        if (pll_current_language()=='en') {
            $filter_price = get_field('filter_price_range',39867);
        }else if(pll_current_language()=='cn') {
            $filter_price = get_field('filter_price_range',39868);
        }else{
            $filter_price = get_field('filter_price_range',2);
        }
        ?>
        <style type="text/css">
            #filter_cost[data-open="-1"]{
                display: none !important;
            }
            #filter_cost[data-open="1"]{
                display: block !important;
            }
            #filter_2[data-open="1"] .quick-filter-arrow{
                transform: rotate(-180deg) !important;
            }
        </style>

        <div id="filter_cost" class="quick-filter-toggle-4" data-open="-1" style="top: 5px; left: 40%;">
            <div class="bg-white round py-4 relative z-10">
                <?php 
                foreach ($filter_price as $key => $value) {
                    ?>
                    <div class="flex inline popup-filter-price p-2 pointer pl-6" onclick="filter_price_select(this)" data-price-max="<?=$value['max']?>" data-price-min="<?=$value['min']?>">
                        <label class="pointer" for="type_condo"><?=$value['label']?></label>
                        <div class="ratio-box" style="display:none;">
                            <div class="ratio-box-inner-x"></div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
</section>


<style type="text/css">

    #filter-mini{
        display: none;
    }

    #filter-head{
        display: none;

    }
    #filter-select .cont-pd {
        max-width: 1320px;
        min-width: 320px;
        display: block;
        position: relative;
        margin: auto;
        padding: 0 16px;
    }
    #filter{
        position: static;
    }
    @media (max-width: 1023px) {
        #filter{
            border-bottom: 1px solid var(--ci-blue-800);
            position: sticky;
            top: calc(50px);
        }
    }
    @media (max-width: 1116px) {
        #filter-mini{
            display: block;
        }
        #filter-head{
            z-index: 1;
            background-color: white;
            padding-top: 1rem;
            border-top: 1px solid var(--ci-blue-800);
            display: block;
        }

        #condo-filter{
            display: none;
        }
        #filter-select .cont-pd {
            margin: 0;
            padding: 0 0 0 1rem;
        }

    }
    .filter-cards-wrap{
        position: relative;
        transition: all .5s cubic-bezier(0, 0, 0.3, 1.07);
        width: 100%;
        height: 70%;
    }
    .filter-inner-mini{
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        padding: 16px 26px;
        border-radius: 16px;
        border: 1px solid var(--ci-blue-800);
        box-shadow: 0px 0px 30px rgba(98, 137, 177, 0.4);
        max-width: 420px;
        margin: auto;
    }
    .txt-selected{
        margin-right: 12px;
        display: flex;
        align-items: center;
        white-space: nowrap;
    }
    .quick-filter{
        transition: .2s all;
    }
    .quick-filter:hover {
        transition: .2s all;
        background: var(--ci-blue-900) !important;
    }
    .hidescroll::-webkit-scrollbar {
        display: none;
    }
    .hidescroll{
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
    .clear-all{
        color: var(--ci-orange-500);
        padding-left: 22px;
        padding-right: 16px;
        transition: .5s;
        border-radius: 8px;
        height: 48px;
    }
    .clear-all:hover{
        background-color: var(--ci-orange-900);
    }
    .price-bg-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #f000;
    }
</style>
<!--=== The Section Boxes : filter-mini ===-->
<section id="filter-head"class="">
    <h3 style="font-weight: 400;font-size: 30px;line-height: 36px;text-align: center" ><?php pll_e('ค้นหาโครงการคอนโดมิเนียม')?></h3>
</section>
<section id="filter" class="" style="z-index: 99;">
    <section id="filter-mini" class="">
        <div class="cont-pd py-4 bg-white">
            <div class="flex items-center justify-center mini-filter relative mob-no-pd">
                <div class="filter-cards-wrap">
                    <div class="filter-inner-mini pointer bg-white" onclick="openPopFilter()">
                        <!-- onclick test is "openPopFilter()" -->
                        <span class="wide">
                            <div class="grid grid-cols-5 gap-0 flex items-center">
                                <div class="col-span-1 flex items-center">
                                    <img src="/wp-content/uploads/2022/10/Icon-in-input.png" class="inline-block" style="height:2.5rem;margin:0;">
                                </div>
                                <div class="col-span-4">
                                    <h6 class="filter-select" id="">
                                        <div class="grid-rows-2 flex flex-row">
                                            <div class="row-span-1" style="font-size: 24px;line-height: 26px;font-weight: 500;"><?php pll_e('ค้นหา')?></div>
                                            <div class="row-span-1" style="font-size: 24px;line-height: 26px;font-weight: 400;"><?php pll_e('ที่อยู่โครงการในแบบคุณ')?></div>
                                        </div>
                                    </h6>
                                </div>
                            </div>
                        </span>
                        <img src="/wp-content/uploads/2022/11/arrow.png" style="height: 15px;">
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <section id="filter-select" class="" style="background-color: white;display: none;">
        <div class="pl-4 cont-pd" style="padding-top: 8px;padding-bottom: 8px;">
            <div class="hidescroll flex flex-row overflow-y-scroll md:overflow-y-hidden md:grid md:grid-cols-6 md:gap-2">
                <div class="col-span-5">
                    <div id="filter-selected" class="relative flex items-center md:flex-wrap" style="width: 100%;">
                    </div>
                </div>
                <div class="col-span-1 flex justify-end mx-4 md:mx-0 items-start">
                    <div class="clear-all inline-flex items-center pointer" onclick="remove_price();filter_pop(999, this);check_chk('clear', 999)" style="white-space: nowrap;">
                        <img src="/wp-content/uploads/2022/11/Vector-10.png" style="width: 21px;height: 21px;">&ensp;<?php pll_e('ล้างทั้งหมด')?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<style type="text/css">
    .mini-filter-popup{
        position: fixed;
        right: 120%;
        opacity: 0;
        top: 0;
        width: 100%;
        /*min-height: 100%;*/
        z-index: 10000;
        background: linear-gradient(360deg, #EDF2F7 0%, #FDFDFE 13.24%, #FFFFFF 103.44%);
        transition: .5s;

        height: calc(100%);
        /*overflow: scroll;*/
    }
    .close-filter {
        color: var(--ci-grey-100);
        position: fixed;
        top: 27.5px;
        right: 16px;
        font-size: 45px;
        transition: .3s;
        display: none;
        cursor: pointer;
    }
    .popup-filter-inner{
        display: block;
        cursor: pointer;
    }
    .clear-wrap-mini{
        background-color: #f5f7fa;
        position: fixed;
        width: calc(100% - 32px);
        bottom: 10px;
    }
    .sp-mini{
        height: 40px;
    }
    .quick-filter-arrow-mini{
        transition: .5s;
        height: 0.5rem;
        margin-right: 0;
    }
    .ratio-box{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 22px;
        height: 22px;
        background-color: white;
        border:1px solid var(--ci-grey-600);
        border-radius: 25px;
    }
    .ratio-box-inner{
        width: 12px;
        height: 12px;
        background-color: var(--ci-veri-500);
        border-radius: 25px;
        opacity: 0;
        transition: .25s;
    }
</style>
<div class="mini-filter-popup">
    <div class="cont-pd" style="height: calc(100% - 60px);
    overflow: scroll;">
    <span class="close-filter" onclick="closePopFilter()" style="">&times;</span>
    <h3 style="color: #374151;font-size: 30px;line-height: 36px;font-weight: 400;margin-top: 27.5px;"><?php pll_e('ค้นหาคอนโดมิเนียมในแบบคุณ')?></h3>
    <sp class="" style="height: 32px;" ></sp>
    <div class="popup-filter-inner" onclick="filter_pop_mini(0)">
        <div class="grid grid-cols-12">
            <div class="col-span-1 flex items-center">
                <img src="/wp-content/uploads/2022/10/Icon-in-input-1.png" class="inline-block" style="height:2rem;margin:0;">
            </div>
            <div class="col-span-10 pl-3">
                <h6 class="" id="loca_pro_mini" style="font-size: 24px;line-height: 32px;font-weight: 400;">
                    <?php pll_e('ทำเล')?>
                </h6>
                <h6 class="" id="brand_pro_mini" style="display: none;"></h6>
            </div>
            <div class="col-span-1 flex items-center">
                <img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow-mini">
            </div>
        </div>
    </div>
    <sp class="sp-mini"></sp>
    <div id="filter_loca_mini" class="mini-filter-toggle-1">
        <div class="bg-white">
            <span class="pl-3 cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('ในกรุงเทพฯ')?></span>
            <br>
            <?php
            foreach ($term_pj_location['in-bangkok']->child as $key => $value) { 
                ?>
                <div class="flex inline-flex popup-filter" slug="<?=$value->slug?>" num="1" onclick="check_chk(this, 1);sort_info()">
                    <label class="check-wrap" termId="<?=$value->term_id?>" name="<?=$value->name?>"><?=$value->name?>
                    <input type="checkbox" name="<?=$value->name?>">
                    <span class="checkmark"></span>
                </label>
            </div>
            <?php 
        }
        ?>
        <sp style="height: 20px;"></sp>
        <span class="pl-3 cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('ต่างจังหวัด')?></span>
        <br>
        <?php
        foreach ($term_pj_location['upcountry']->child as $key => $value) { 
            ?>
            <div class="flex inline-flex popup-filter" slug="<?=$value->slug?>" num="1" onclick="check_chk(this, 1);sort_info()">
                <label class="check-wrap" termId="<?=$value->term_id?>" name="<?=$value->name?>"><?=$value->name?>
                <input type="checkbox" name="<?=$value->name?>">
                <span class="checkmark"></span>
            </label>
        </div>
        <?php 
    }
    ?>
</div>
<sp style="height: 20px;"></sp>
<hr style="color: var(--cl-ci-grey-900);width: 100%;">
</div>
<div id="filter_brand_mini" class="mini-filter-toggle-2">
    <div class="bg-white">
        <span class="pl-3 cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('คอนโดมิเนียม')?></span>
        <br>
    </div>
    <sp style="height: 20px;"></sp>
    <hr style="color: var(--cl-ci-grey-900);width: 100%;">
</div>
<div class="popup-filter-inner" onclick="filter_pop_mini(2)">
    <div class="grid grid-cols-12">
        <div class="col-span-1 flex items-center">
            <img src="/wp-content/uploads/2022/10/Icon-in-input-3.png" class="inline-block" style="height:2rem;margin:0;">
        </div>
        <div class="col-span-10 pl-3">
            <h6 class="" id="cost_pro_mini" style="font-size: 24px;line-height: 32px;font-weight: 400;">
                <?php pll_e('ช่วงราคา')?>
            </h6>
        </div>
        <div class="col-span-1 flex items-center">
            <img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow-mini">
        </div>
    </div>
</div>

<sp class="sp-mini"></sp>
<!-- new price -->
<div id="filter_cost_mini" class="mini-filter-toggle-3">
    <div class="bg-white pl-5">
        <?php 
        foreach ($filter_price as $key => $value) {
            ?>
            <div class="flex inline popup-filter-price -mini p-2 pointer justify-between pr-0" onclick="filter_price_select(this)" data-price-max="<?=$value['max']?>" data-price-min="<?=$value['min']?>">
                <label class="pointer" for="type_condo"><?=$value['label']?></label>
                <div class="ratio-box">
                    <div class="ratio-box-inner"></div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<!-- new price end -->
<div class="popup-filter-inner" onclick="filter_pop_mini(3)">
    <div class="grid grid-cols-12">
        <div class="col-span-1 flex items-center">
            <img src="/wp-content/uploads/2022/11/Group-908.png" class="inline-block" style="height:2rem;margin:0;">
        </div>
        <div class="col-span-10 pl-3">
            <h6 class="" id="stat_pro_mini" style="font-size: 24px;line-height: 32px;font-weight: 400;">
                <?php pll_e('สถานะโครงการ')?>
            </h6>
        </div>
        <div class="col-span-1 flex items-center">
            <img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow-mini">
        </div>
    </div>
</div>
<sp class="sp-mini"></sp>
<div id="filter_stat_mini" class="mini-filter-toggle-4">
    <div class="bg-white">
        <?php
        $terms = get_terms( array(
            'taxonomy' => 'project_status',
            'hide_empty' => false,
        ) );
        foreach ($terms as $key => $value){
            $stat_label = get_field('label',$value->taxonomy . '_' . $value->term_id); ?>
            <div class="flex inline-flex popup-filter" num="0" onclick="check_chk(this, 0);sort_info()">
                <label class="check-wrap" name="<?=$stat_label?>" termId="<?=$value->term_id?>"><?=$stat_label?>
                <input type="checkbox" name="<?=$stat_label?>">
                <span class="checkmark"></span>
            </label>
        </div>
    <?php }
    ?>
</div>
</div>
<div class="grid grid-cols-2 gap-4 clear-wrap-mini">
    <div class="col-span-1 cl-ci-blue-300 flex items-center justify-center">
        <div class="clear-all-mini flex items-center justify-center" onclick="remove_price();filter_pop(999, this);check_chk('clear', 999)">
            <h6 style="font-size: 24px;line-height: 32px;font-weight: 400;"><?php pll_e('ล้างทั้งหมด')?></h6>
        </div>
    </div>
    <div class="col-span-1 flex items-center justify-center">
        <button class="quick-filter-btn" style="width: 100%;" onclick="closePopFilter()">
            <h6 style="font-size: 24px;line-height: 32px;font-weight: 400;"><?php pll_e('ค้นหา')?></h6>
        </button>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
    const popup = document.getElementsByClassName("mini-filter-popup")[0];
    function openPopFilter(){
        popup.style.opacity = "1";
        popup.style.right = "0";
        document.getElementsByClassName("close-filter")[0].style.display = "block";
    }
    function closePopFilter(){
        popup.style.opacity = "0";
        popup.style.right = "120%";
        document.getElementsByClassName("close-filter")[0].style.display = "none";
    }
    var recent_pop_mini = -1;
    function filter_pop_mini(num){
        let sp = document.getElementsByClassName("sp-mini");
        let arrow = document.getElementsByClassName("quick-filter-arrow-mini");
        for(let i of sp){
            i.style.height = "40px";
        }
        for(i of arrow){
            i.style.transform = "rotate(0deg)";
        }
        filter_stat_mini.style.display='none';
        filter_loca_mini.style.display='none';
        filter_brand_mini.style.display='none';
        filter_cost_mini.style.display='none';
        if(num != recent_pop_mini){
            switch (num) {
            case 0:
                filter_loca_mini.style.display='block';
                sp[0].style.height = "20px";
                arrow[0].style.transform = "rotate(-180deg)";
                break;
            case 1:
                filter_brand_mini.style.display='block';
                sp[1].style.height = "20px";
                arrow[1].style.transform = "rotate(-180deg)";
                break;
            case 2:
                filter_cost_mini.style.display='block';
                sp[2].style.height = "20px";
                arrow[2].style.transform = "rotate(-180deg)";
                break;
            case 3:
                filter_stat_mini.style.display='block';
                sp[3].style.height = "20px";
                arrow[3].style.transform = "rotate(-180deg)";
                break;
            }
            recent_pop_mini = num;
        }
        else{
            recent_pop_mini = -1;
        }
    }
</script>

<?php 
$pro_type = explode(",", $_GET['type']);
$pro_loca = explode(",", $_GET['location']);
$pro_brand = explode(",", $_GET['brand']);
$pro_price = ($_GET['price']);

// new price
$pro_price_max = ($_GET['price_max']);
$pro_price_min = ($_GET['price_min']);
// end new price

$lis_type = array();
$lis_loca = array();
$lis_brand = array();

foreach ($pro_type as $key => $value) {
    $stat_label = get_field('label','project_status' . '_' . $value);
    array_push($lis_type, $stat_label);
}
foreach ($pro_loca as $key => $value) {
    array_push($lis_loca, get_term($value)->name);
}
foreach ($pro_brand as $key => $value) {
    array_push($lis_brand, get_term($value)->name);
}

?>
<script type="text/javascript">

    function sort_info(){
        let allcard = document.getElementsByClassName("project-card");
        var chk_display = 0
        var chk_price = 0

        // new price
        var chk_price_max = 999
        var chk_price_min = 0
        // end new price

        var chk_type = 0

        for(let i of allcard){
            chk_price = 0
            chk_type = 0
            i.style.display = "none"
            if (txtt_brand.includes(i.getAttribute("cate")) && txtt_loca.includes(i.getAttribute("loca"))) {
                i.style.display = "grid"
                chk_display++
                chk_price = 1
                chk_type = 1
            }
            else if(txtt_brand.length == 0 && txtt_loca.includes(i.getAttribute("loca"))){
                i.style.display = "grid"
                chk_display++
                chk_price = 1
                chk_type = 1
            }
            else if(txtt_brand.includes(i.getAttribute("cate")) && txtt_loca.length == 0){
                i.style.display = "grid"
                chk_display++
                chk_price = 1
                chk_type = 1
            }
            else if(txtt_brand.length == 0 && txtt_loca.length == 0){
                i.style.display = "grid"
                chk_display++
                chk_price = 1
                chk_type = 1
            }
            // if(((parseFloat(i.getAttribute("data-price"))/100).toFixed(2) > parseInt(txt_price.split(" ")[1])) && chk_price){
            //  i.style.display = "none"
            //  chk_display--
            //  chk_type = 0
            // }
            if(txtt_type.length == 0){
            }
            else if(!(txtt_type.includes(i.getAttribute("type"))) && chk_type){
                i.style.display = "none"
                chk_display--
            }

            // new price
            let set_filter_price_max = parseFloat(document.querySelector('#filter_2').dataset.priceMax)
            set_filter_price_max *= 100

            let set_filter_price_min = parseFloat(document.querySelector('#filter_2').dataset.priceMin)
            set_filter_price_min *= 100

            if (isNaN(set_filter_price_max)) {
                set_filter_price_max = 999*100000
            }
            if (isNaN(set_filter_price_min)) {
                set_filter_price_min = 0
            }

            if(parseFloat(i.dataset.price)>=set_filter_price_min &&  parseFloat(i.dataset.price)<=set_filter_price_max){

            }else{
                i.style.display = "none"
                chk_display--
            }
            // end new price
        }
        document.getElementById("num-con").innerHTML = "- "+chk_display+" <?php pll_e('รายการ') ?>";
        if (chk_display == 0) {
            document.getElementById("condo-info").style.display = "none"
            document.getElementById("notfound").style.display = "flex"
        }
        else{
            document.getElementById("condo-info").style.display = "grid"
            document.getElementById("notfound").style.display = "none"
        }
        restartSort()
    }

    var recent_pop = -1;
    var blue900 = getComputedStyle(document.querySelector(':root')).getPropertyValue('--ci-blue-900')

    function filter_pop(num, ele){
        close_price_pop()
        filter_type.style.display='none';
        filter_location.style.display='none';
        filter_project.style.display='none';
        filter_cost.style.display='none';
        let arrw = document.getElementsByClassName("quick-filter-arrow");
        for(let i of arrw){
            i.style.transform = "rotate(0deg)";
        }
        let bgc = document.getElementsByClassName("quick-filter");
        for(let j of bgc){
            j.style.backgroundColor = "white";
        }
        if(num != recent_pop && num != 999){
            switch (num) {
            case 0:
                filter_type.style.display='block';
                break;
            case 1:
                filter_location.style.display='block';
                break;
            case 2:
                filter_project.style.display='block';
                break;
            case 3:
                filter_cost.style.display='block';
                break;
            }
            ele.style.backgroundColor = blue900;
            ele.children[0].children[1].style.transform = "rotate(-180deg)"
            recent_pop = num;
        }
        else{
            recent_pop = -1;
        }
    }

    var ver400 = getComputedStyle(document.querySelector(':root')).getPropertyValue('--ci-veri-400')
    var ver900 = getComputedStyle(document.querySelector(':root')).getPropertyValue('--ci-veri-900')
    var blue800 = getComputedStyle(document.querySelector(':root')).getPropertyValue('--ci-blue-600')

    var pro_type = new Set(<?php echo json_encode($lis_type); ?>)
    var pro_loca = new Set(<?php echo json_encode($lis_loca); ?>)
    var pro_pro = new Set(<?php echo json_encode($lis_brand); ?>)

    var filt_type = new Set(<?php echo json_encode($pro_type); ?>)
    var filt_loca = new Set(<?php echo json_encode($pro_loca); ?>)
    var filt_pro = new Set(<?php echo json_encode($pro_brand); ?>)

    var id_type = ""
    var id_loca = ""
    var id_brand = ""
    var id_price = "<?=$pro_price?>";

    var txt_type = "<?php pll_e('สถานะโครงการ') ?> "
    var txt_loca = "<?php pll_e('ทำเล') ?> "
    var txt_brand = "<?php pll_e('แบรนด์') ?> "
    var txt_price = "<?php pll_e('ช่วงราคา') ?> "

    var txtt_type = []
    var txtt_loca = []
    var txtt_brand = []
    var txtt_price = []

    var num_type = 0
    var num_loca = 0
    var num_brand = 0

    var numm_type = 0
    var numm_loca = 0
    var numm_brand = 0

    var clearAll = ""



    first_load()
    function first_load(){
        pro_type.delete(null)
        pro_loca.delete(null)
        pro_pro.delete(null)
        filt_type.delete(null)
        filt_loca.delete(null)
        filt_pro.delete(null)

        for(let i of document.getElementsByClassName("popup-filter")){
            // i.children[0].children[0].checked
            if (pro_type.has(i.children[0].getAttribute("name")) || pro_loca.has(i.children[0].getAttribute("name")) || pro_pro.has(i.children[0].getAttribute("name"))) {
                // xconsolex.log(i.children[0].getAttribute("name"))
                i.children[0].children[0].checked = true;
                i.style.border = "1px solid "+ver400
                i.style.backgroundColor = ver900
            }
        }

        //new price

        // if (id_price != "") {
        //  txt_price = "ไม่เกิน " + id_price + " ล้านบาท"
        //  let rati = document.getElementsByClassName("ratio-box-inner");
        //  rati[parseInt(id_price)-1].style.opacity = "1"
        // }
        
        
        last_min = $(`#filter_2`).dataset.priceMin
        last_max = $(`#filter_2`).dataset.priceMax
        if ($(`.popup-filter-price[data-price-min="${last_min}"][data-price-max="${last_max}"]`) != null) {
            txt_price = $(`.popup-filter-price[data-price-min="${last_min}"][data-price-max="${last_max}"]`).innerHTML
        }
        //end new price

        check_chk('first', -1)
    }


    function check_chk(ele, num){
        if(ele == "clear"){
            pro_type.clear()
            pro_loca.clear()
            pro_pro.clear()

            txt_type = "<?php pll_e('สถานะโครงการ') ?> "
            txt_loca = "<?php pll_e('ทำเล') ?> "
            txt_brand = "<?php pll_e('แบรนด์') ?> "
            txt_price = "<?php pll_e('ช่วงราคา') ?> "

            filt_type = new Set()
            filt_loca = new Set()
            filt_pro = new Set()

            id_type = ""
            id_loca = ""
            id_brand = ""
            id_price = ""

            txtt_type = []
            txtt_loca = []
            txtt_brand = []
            txtt_price = []

            clearAll = document.getElementsByClassName("popup-filter")
            for (var i of clearAll) {
                i.children[0].children[0].checked = false;
                check_chk(i, 999);
            }
            let rati = document.getElementsByClassName("ratio-box-inner");
            for(let z of rati){
                z.style.opacity = 0;
            }
            clearAll = ""
            sort_info()
        }
        else if(num == 3){
            txt_price = ele.children[0].getAttribute("name")
            txtt_price = txt_price
            id_price = ele.children[0].getAttribute("price")
        }
        else if(num == 33){
            txt_price = "<?php pll_e('ช่วงราคา') ?> "
            txtt_price = txt_price
            id_price = ""
        }
        else if(num == -1){

        }
        else if(ele.children[0].children[0].checked == true){
            let allEle = document.getElementsByClassName("popup-filter")
            for(let j of allEle){
                if (j.children[0].getAttribute("name") == ele.children[0].getAttribute("name")) {
                    j.style.border = "1px solid "+ver400
                    j.style.backgroundColor = ver900
                    j.children[0].children[0].checked = true
                }
            }
            switch (num) {
            case 0:
                pro_type.add(ele.children[0].getAttribute("name"))
                filt_type.add(ele.children[0].getAttribute("termID"))
                break;
            case 1:
                pro_loca.add(ele.children[0].getAttribute("name"))
                filt_loca.add(ele.children[0].getAttribute("termID"))
                break;
            case 2:
                pro_pro.add(ele.children[0].getAttribute("name"))
                filt_pro.add(ele.children[0].getAttribute("termID"))
                break;
            }
        }
        else{
            let allEle = document.getElementsByClassName("popup-filter")
            for(let j of allEle){
                if (j.children[0].getAttribute("name") == ele.children[0].getAttribute("name")) {
                    j.style.border = "1px solid "+blue800
                    j.style.backgroundColor = "white"
                    j.children[0].children[0].checked = false
                }
            }
            switch (num) {
            case 0:
                pro_type.delete(ele.children[0].getAttribute("name"))
                filt_type.delete(ele.children[0].getAttribute("termID"))
                break;
            case 1:
                pro_loca.delete(ele.children[0].getAttribute("name"))
                filt_loca.delete(ele.children[0].getAttribute("termID"))
                break;
            case 2:
                pro_pro.delete(ele.children[0].getAttribute("name"))
                filt_pro.delete(ele.children[0].getAttribute("termID"))
                break;
            }
        }
        if(ele != "clear"){
            txt_type = ""
            txt_loca = ""
            txt_brand = ""

            id_type = ""
            id_loca = ""
            id_brand = ""

            txtt_type = []
            txtt_loca = []
            txtt_brand = []
            txtt_price = []

            num_type = 0
            num_loca = 0
            num_brand = 0

            numm_type = 0
            numm_loca = 0
            numm_brand = 0

            pro_type.forEach (function(value) {
                if(num_type == 0){
                    txt_type += value;
                }
                else{
                    txt_type += ", " + value;
                }
                txtt_type.push(value)
                num_type++;
            })
            pro_loca.forEach (function(value) {
                if(num_loca == 0){
                    txt_loca += value;
                }
                else{
                    txt_loca += ", " + value;
                }
                txtt_loca.push(value)
                num_loca++;
            })
            pro_pro.forEach (function(value) {
                if(num_brand == 0){
                    txt_brand += value;
                }
                else{
                    txt_brand += ", " + value;
                }
                txtt_brand.push(value)
                num_brand++;
            })
            filt_type.forEach (function(value) {
                if(numm_type == 0){
                    id_type += value;
                }
                else{
                    id_type += "," + value;
                }
                numm_type++;
            })
            filt_loca.forEach (function(value) {
                if(numm_loca == 0){
                    id_loca += value;
                }
                else{
                    id_loca += "," + value;
                }
                numm_loca++;
            })
            filt_pro.forEach (function(value) {
                if(numm_brand == 0){
                    id_brand += value;
                }
                else{
                    id_brand += "," + value;
                }
                numm_brand++;
            })
            if (txt_type == "") {txt_type = "<?php pll_e('สถานะโครงการ') ?> ";}
            else{
                txt_type = `
                <div class="grid grid-rows-2">
                <div class="row-span-1" style="font-weight:700;font-size:18px;line-height:20px">
                สถานะโครงการ
                </div>
                <div class="row-span-1" style="font-weight:400;font-size:26px;line-height:22px">
                <?php pll_e('เลือกแล้ว') ?>  `+ pro_type.size +` <?php pll_e('สถานะ') ?> 
                </div>
                </div>
                `
            }
            if (txt_loca == "") {txt_loca = "<?php pll_e('ทำเล') ?> ";}
            else{
                txt_loca = `
                <div class="grid grid-rows-2">
                <div class="row-span-1" style="font-weight:700;font-size:18px;line-height:20px">
                <?php pll_e('ทำเล') ?> 
                </div>
                <div class="row-span-1" style="font-weight:400;font-size:26px;line-height:22px">
                <?php pll_e('เลือกแล้ว') ?>  `+ pro_loca.size +` <?php pll_e('ทำเล') ?> 
                </div>
                </div>
                `
            }
            if (txt_brand == "") {txt_brand = "<?php pll_e('แบรนด์') ?> ";}
            else{
                txt_brand = `
                <div class="grid grid-rows-2">
                <div class="row-span-1" style="font-weight:700;font-size:18px;line-height:20px">
                <?php pll_e('แบรนด์') ?> 
                </div>
                <div class="row-span-1" style="font-weight:400;font-size:26px;line-height:22px">
                เลือกแล้ว `+ pro_pro.size +` <?php pll_e('แบรนด์') ?> 
                </div>
                </div>
                `
            }
            if(num == 3){
                txt_price = ele.children[0].getAttribute("name")
                txtt_price = txt_price
                id_price = ele.children[0].getAttribute("price")
                let rati = document.getElementsByClassName("ratio-box-inner");
                for(let z of rati){
                    z.style.opacity = 0;
                }
                ele.children[1].children[0].style.opacity = 1;
            }
            else if(num == 33){
                txt_price = "<?php pll_e('ช่วงราคา') ?> "
                txtt_price = txt_price
                id_price = ""
                let rati = document.getElementsByClassName("ratio-box-inner");
                for(let z of rati){
                    z.style.opacity = 0;
                }
            }

            xconsolex.log('end')
        }

        // new price
        last_min = $(`#filter_2`).dataset.priceMin
        last_max = $(`#filter_2`).dataset.priceMax
        if ($(`.popup-filter-price[data-price-min="${last_min}"][data-price-max="${last_max}"]`) != null) {
            txt_price = $(`.popup-filter-price[data-price-min="${last_min}"][data-price-max="${last_max}"]`).innerText
        }else{
            txt_price = "<?php pll_e('ช่วงราคา') ?>"
            $(`#filter_2`).dataset.priceMin = ''
            $(`#filter_2`).dataset.priceMax = ''
        }
        // end new price

        document.getElementById("type_pro").innerHTML = txt_type;
        document.getElementById("lo_pro").innerHTML = txt_loca;
        document.getElementById("brand_pro").innerHTML = txt_brand;
        document.getElementById("price_pro").innerHTML = txt_price;

        document.getElementById("stat_pro_mini").innerHTML = txt_type;
        document.getElementById("loca_pro_mini").innerHTML = txt_loca;
        document.getElementById("brand_pro_mini").innerHTML = txt_brand;
        document.getElementById("cost_pro_mini").innerHTML = txt_price;

        var text_type = ""
        var text_loca = ""
        var text_price = ""
        var text_brand = ""

        if(txtt_loca.length != 0) {
            for (var i = 0; i < txtt_loca.length ; i++) {
                if (i == 0) {text_loca += `<div class='txt-selected'><?php pll_e('ทำเล') ?> :</div>`}
                    text_loca += `
                <div class="flex inline-flex items-center popup-select" onclick="close_pop_select(this)">
                <label class="">`+txtt_loca[i]+`
                </label>
                <img src="/wp-content/uploads/2023/01/x-1.png" class="pointer" style="margin-bottom:0;margin-left:0.5rem;width:16px;height:16px;" >
                </div>
                `
            }
            clearAll += text_loca;
        }

        if(txtt_brand.length != 0) {
            if(txtt_loca.length != 0){text_brand += `<div class="filter-bet-line"></div>`};
            for (var i = 0; i < txtt_brand.length ; i++) {
                if (i == 0) {text_brand += `<div class='txt-selected'><?php pll_e('แบรนด์') ?> :</div>`}
                    text_brand += `
                <div class="flex inline-flex items-center popup-select" onclick="close_pop_select(this)">
                <label class="">`+txtt_brand[i]+`
                </label>
                <img src="/wp-content/uploads/2023/01/x-1.png" class="pointer" style="margin-bottom:0;margin-left:0.5rem;width:16px;height:16px;" >
                </div>
                `
            }
            clearAll += text_brand;
        }
        //new price check
        if(txt_price != "<?php pll_e('ช่วงราคา') ?>") {
            if(txtt_loca.length != 0 || txtt_brand.length != 0){text_price += `<div class="filter-bet-line"></div>`};
            text_price += `<div class='txt-selected'><?php pll_e('ช่วงราคา') ?> :</div>`
            text_price += `
            <div class="flex inline-flex items-center popup-select"  onclick="remove_price()">
            <label class="">`+txt_price+`
            </label>
            <img src="/wp-content/uploads/2023/01/x-1.png" class="pointer" style="margin-bottom:0;margin-left:0.5rem;width:16px;height:16px;" >
            </div>
            `

            clearAll += text_price;
        }
        if(txtt_type.length != 0) {
            if(txtt_loca.length != 0 || txtt_brand.length != 0 || txt_price != "<?php pll_e('ช่วงราคา') ?> "){text_type += `<div class="filter-bet-line"></div>`};
            for (var i = 0; i < txtt_type.length ; i++) {
                if (i == 0) {text_type += `<div class='txt-selected'><?php pll_e('สถานะโครงการ') ?> :</div>`}
                    text_type += `
                <div class="flex inline-flex items-center popup-select" onclick="close_pop_select(this)">
                <label class="">`+txtt_type[i]+`
                </label>
                <img src="/wp-content/uploads/2023/01/x-1.png" class="pointer" style="margin-bottom:0;margin-left:0.5rem;width:16px;height:16px;" >
                </div>
                `
            }
            clearAll += text_type;
        }
        if (clearAll == "") {
            document.getElementById("filter-select").style.display = "none";
        }
        else{
            document.getElementById("filter-select").style.display = "block";
        }
        document.getElementById("filter-selected").innerHTML = clearAll;
        clearAll = "";

        // new price edit
        for(let rb of $$('.ratio-box-inner')){
            rb_parent = rb.parentElement.parentElement;
            if (rb_parent.dataset.priceMin == last_min && rb_parent.dataset.priceMax == last_max) {
                rb.style.opacity = 1
            }else{
                rb.style.opacity = 0
            }
        }
        
        if (last_min == undefined) {
            last_min = '<?=$pro_price_min?>'
        }
        if (last_max == undefined) {
            last_max = '<?=$pro_price_max?>'
        }

        var refresh = window.location.protocol + "//" + window.location.host + window.location.pathname + "?type=" +id_type + "&location=" + id_loca + "&price_min=" + last_min + "&price_max=" + last_max;
        window.history.pushState({ path: refresh }, '', refresh);
        // end new price
    }
    function close_pop_select(ele){
        let chk = document.getElementsByClassName("popup-filter")
        for (var i of chk) {
            if(i.children[0].children[0].name == ele.children[0].innerHTML.trim()){
                i.children[0].children[0].checked = false;
                check_chk(i, parseInt(i.getAttribute('num')))
                sort_info()
            }
        }
        let chk1 = document.getElementsByClassName("popup-filter-price")
        if (ele.children[0].innerHTML.trim().includes("<?php pll_e('ไม่เกิน') ?> ")) {
            for (var i of chk1) {
                if(i.children[0].getAttribute('name') == ele.children[0].innerHTML.trim()){
                    check_chk(i, 33)
                    sort_info()
                }
            }
        }
    }
</script>

<!--=== The Section Boxes : condo-show ===-->
<style type="text/css">
    .card-img .bg-cover{
        transform: scale(1);
        transition: all .8s;
    }
    .card-img:hover .bg-cover{
        transform: scale(1.15);
        transition: all .8s;
    }
    .project-card{
    }
    .project-card-image{
        overflow: hidden;
        transition: .5s;
    }
    .project-card-logo{
        width: auto;
        height:50px;
        margin-right: 10px;
    }
    .project-card:hover .project-card-image{
        background-size: 115% 115%;
    }
    .project-card-icon{
        filter: brightness(0) invert(1);
        height:1rem;
        margin:0;
        margin-right: 5px;
    }
    .project-card-info-2{
        text-align: right;
        font-weight: 400;
        font-size: 17px;
        line-height: 20px;
        color: white;
    }
    .project-card-info-2 .-mobile{
        display: none;
    }
    .txt-price{
        font-size: 32px;
    }
    .box-fil-date{
        border: 1px solid var(--ci-grey-800);
        border-radius: 8px;
        background-color: white;
        color: var(--ci-grey-100);
        padding: 10px 16px;
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .box-fil-date .-arrow{
        height: .5rem;
        margin-left: 40px;
        transition: .5s;
    }
    .box-fil-date .-choise{
        position: absolute;
        top: 52px;
        left: 0;
        z-index: 10;
        width: 100%;
        background-color: white;
        padding: 16px 0px;
        color: var(--ci-grey-100);
        border-radius: 8px;
        border: 1px solid var(--ci-grey-800);
        display: none;
    }
    .box-fil-date .-choise div{
        padding:8px 16px;
    }
    .-choise-1, .-choise-2, .-choise-3, .-choise-4{
        transition: .5s;
    }
    .-choise-1:hover, .-choise-2:hover, .-choise-3:hover, .-choise-4:hover{
        background-color: var(--ci-blue-900);
    }
    @media (max-width: 767px) {
        .project-card-logo{
            /*          height: 35px;*/
            margin: 0px;
            margin-left: 16px;
            margin-bottom: 8px;
        }
        .project-card-info-1{
            bottom: 31%;
            left: calc(50% + 16px);
            color: var(--ci-grey-200);
        }
        .project-card-info-1 div{
            margin-top: 0 !important;
        }
        .project-card-icon{
            filter: brightness(0) invert(0);
            margin-right: 12px;
        }
        .project-card-icon.-condo{
            filter: brightness(0.9) invert(0) !important;
        }
        .project-card-info-2{
            text-align: left;
            bottom: 4px;
            right: unset;
            left: calc(50% + 16px);
            font-size: 20px;
            line-height: 28px;
            color: var(--ci-grey-200);
        }
        .project-card-info-2 .-desktop{
            display: none;
        }
        .project-card-info-2 .-mobile{
            display: block;
        }
        .box-fil-date{
            width: 100%;
        }
        .box-fil-date .-arrow{
            margin-right: 0;
            margin-left: auto;
        }
    }
    @media (max-width: 640px) {
        .project-card-info-1{
            bottom: 36%;
        }
        .project-card-info-2{
            bottom: 12px;
        }
        .txt-price{
            line-height: 40px;
        }
        .project-card-logo{
            height: 55px;
            margin-bottom: 16px;
        }
    }
    @media (max-width: 490px) {
        .project-card-logo{
            height: 40px;
            margin: 0px;
            margin-left: 16px;
            margin-bottom: 8px;
        }
    }
    @media (max-width: 768px){
        #condo-info{
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }
    @media (max-width: 640px){
        #condo-info{
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }
    }
    html, body{
        overflow: visible;
    }
    .sortby-box{
        display: none;
    }
    #sortby-box-wrap[data-sorttype="date"][data-sortby="1"] .sortby-box[data-sorttype="date"][data-sortby="1"],
    #sortby-box-wrap[data-sorttype="date"][data-sortby="-1"] .sortby-box[data-sorttype="date"][data-sortby="-1"],
    #sortby-box-wrap[data-sorttype="price"][data-sortby="-1"] .sortby-box[data-sorttype="price"][data-sortby="-1"],
    #sortby-box-wrap[data-sorttype="price"][data-sortby="1"] .sortby-box[data-sorttype="price"][data-sortby="1"]{
        display: block;
    }
    #condo-info{
        --sortby:-1;
    }
    #condo-info[data-sortby="1"]{
        --sortby:1;
    }
</style>
<script type="text/javascript">
    var turn_tog = -1;
    function turnon_sorting(){
        let choise = document.querySelector('.-choise')
        let arr = document.querySelector('.-arrow')
        turn_tog *= -1
        if (turn_tog == 1) {
            choise.style.display = "block"
            arr.style.transform = "rotate(-180deg)"
        }
        else{
            choise.style.display = "none"
            arr.style.transform = "rotate(-0deg)"
        }
    }
    function sorting_project(num){
        let cards = document.querySelectorAll('.project-card')
        for(let i of cards){
            i.style.setProperty('--i',i.dataset.date)
        }
        document.querySelector('#sortby-box-wrap').dataset.sortby = num
        document.querySelector('#sortby-box-wrap').dataset.sorttype = 'date'
        document.querySelector('#condo-info').dataset.sortby = num
        restartSort();
    }
    function sorting_price(num){
        let cards = document.querySelectorAll('.project-card')
        for(let i of cards){
            i.style.setProperty('--i',i.dataset.price)
        }
        document.querySelector('#sortby-box-wrap').dataset.sortby = num
        document.querySelector('#sortby-box-wrap').dataset.sorttype = 'price'
        document.querySelector('#condo-info').dataset.sortby = num
        restartSort();
    }

    document.addEventListener("click", (evt) => {
        let sort_box = document.getElementById("sortby-box-wrap")
        let choise = document.querySelector('.-choise')
        let arr = document.querySelector('.-arrow')
        let targetEl = evt.target;  
        do {
            if(targetEl == sort_box) {
                return;
            }
            if(targetEl == filter_type || targetEl == filter_location || targetEl == filter_project || targetEl == filter_cost || targetEl == filter_0 || targetEl == filter_1 || targetEl == filter_2 || targetEl == filter_3){
                return;
            }
            targetEl = targetEl.parentNode;
        } while (targetEl);
        filter_pop(999, 'clear')
        turn_tog = -1
        choise.style.display = "none"
        arr.style.transform = "rotate(-0deg)"
        xconsolex.log(targetEl)
    });

    window.addEventListener('scroll', () => {
        document.body.style.setProperty('--scroll',window.pageYOffset / (document.body.offsetHeight - window.innerHeight));
    }, false);
    window.onscroll = function() {scrollFunction()};
    function scrollFunction(){
        let choise = document.querySelector('.-choise')
        let arr = document.querySelector('.-arrow')
        if(document.documentElement.scrollTop == 0){
            turn_tog = -1
            choise.style.display = "none"
            arr.style.transform = "rotate(-0deg)"
        }
        else if(window.innerWidth >= 1169 && document.documentElement.scrollTop > 1600){
            turn_tog = -1
            choise.style.display = "none"
            arr.style.transform = "rotate(-0deg)"
        }
        else if(window.innerWidth > 769 && window.innerWidth < 1169 && document.documentElement.scrollTop > 2100){
            turn_tog = -1
            choise.style.display = "none"
            arr.style.transform = "rotate(-0deg)"
        }
        else if(window.innerWidth > 468 && window.innerWidth <= 769 && document.documentElement.scrollTop > 1900){
            turn_tog = -1
            choise.style.display = "none"
            arr.style.transform = "rotate(-0deg)"
        }
        else if(window.innerWidth <= 468 && document.documentElement.scrollTop > 1700){
            turn_tog = -1
            choise.style.display = "none"
            arr.style.transform = "rotate(-0deg)"
        }
    }
</script>

<section id="condo-show" class="pt-8 pb-20 md:pb-16 relative" style="background: linear-gradient(180deg, #EDF2F7 -4.71%, #FFFFFF 164.99%); z-index: 10;">
    <img src="/wp-content/uploads/2022/11/shutterstock_1574382076-1-2.png" class="absolute pointer-events-none leaf14">
    <div class="cont-pd">
        <?php

        $args = array(
            'post_type' => ['condominium','house'],
            'post_status' => 'publish',
            'posts_per_page' => 100, 
            'orderby' => 'date', 
            'order' => 'DESC',
            'post_parent' => 0,
            'tax_query' => array(
                array(
                    'taxonomy' => 'project-type',
                    'field' => 'id',
                    'terms' => $tax_id
                )
            )
        );
        $loop = new WP_Query( $args );
        // die();
        $terms = get_terms( array(
            'taxonomy' => 'project-type',
            'hide_empty' => false,
        ) );
        $count_num = array();
        foreach ($terms as $key => $value) {
            $count_num[$value->slug] = $value->count;
        }
        ?>
        <div class="grid grid-rows-2 md:grid-rows-1 md:grid-cols-2 flex items-center">
            <div class="row-span-1 md:col-span-1">
                <h5 class="f30-28 cl-ci-grey-100"><?php pll_e('คอนโดมิเนียมทั้งหมด')?> <span id="num-con" class="cl-ci-grey-400">- <?=$count_num['condominium']?> <?php pll_e('รายการ')?></span></h5>
            </div>
            <div class="row-span-1 md:col-span-1 flex justify-end">
                <div  id="sortby-box-wrap" class="box-fil-date pointer relative" data-sortby="-1" data-sorttype="date" onclick="turnon_sorting()">
                    <span class="sortby-box" data-sortby="-1" data-sorttype="date">
                        <?php pll_e('เรียงลำดับโครงการ')?>&nbsp;&nbsp;&nbsp;&nbsp;
                    </span>
                    <span class="sortby-box" data-sortby="1" data-sorttype="date">
                        <?php pll_e('เรียงตามโครงการเก่า')?> <img src="/wp-content/uploads/2022/10/Vector.png" style="height: .3rem;transform:rotate(-90deg);display: inline-block;"> <?php pll_e('ใหม่')?>
                    </span>
                    <span class="sortby-box" data-sortby="1" data-sorttype="price">
                        <?php pll_e('เรียงตามราคาเริ่มต้นสูง')?> <img src="/wp-content/uploads/2022/10/Vector.png" style="height: .3rem;transform:rotate(-90deg);display: inline-block;"> <?php pll_e('ต่ำ')?>
                    </span>
                    <span class="sortby-box" data-sortby="-1" data-sorttype="price">
                        <?php pll_e('เรียงตามราคาเริ่มต้นต่ำ')?> <img src="/wp-content/uploads/2022/10/Vector.png" style="height: .3rem;transform:rotate(-90deg);display: inline-block;"> <?php pll_e('สูง')?>
                    </span>
                    <img src="/wp-content/uploads/2022/10/Vector.png" class="-arrow">
                    <div class="-choise">
                        <!-- <div class="-choise-1" onclick="sorting_project(-1)">
                            เรียงตามโครงการใหม่ <img src="/wp-content/uploads/2022/10/Vector.png" style="height: .3rem;transform:rotate(-90deg);display: inline-block;"> เก่า
                        </div>

                        <div class="-choise-2" onclick="sorting_project(1)">
                            เรียงตามโครงการเก่า <img src="/wp-content/uploads/2022/10/Vector.png" style="height: .3rem;transform:rotate(-90deg);display: inline-block;"> ใหม่
                        </div> -->

                        <div class="-choise-3" onclick="sorting_price(1)">
                            <?php pll_e('เรียงตามราคาเริ่มต้นสูง')?> <img src="/wp-content/uploads/2022/10/Vector.png" style="height: .3rem;transform:rotate(-90deg);display: inline-block;"> <?php pll_e('ต่ำ')?>
                        </div>

                        <div class="-choise-4" onclick="sorting_price(-1)">
                            <?php pll_e('เรียงตามราคาเริ่มต้นต่ำ')?> <img src="/wp-content/uploads/2022/10/Vector.png" style="height: .3rem;transform:rotate(-90deg);display: inline-block;"> <?php pll_e('สูง')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <sp class="vl"></sp>
        <div id="condo-info" class="whitespace-nowrap grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8" data-sortby="-1" >
            <?php
            $order = 0;
            while ( $loop->have_posts() ) : $loop->the_post(); {
                $featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                $cate_name = wp_get_object_terms( $post->ID, 'project-type');
                foreach ($cate_name as $pjt_k => $pjt_v) {
                    if ($pjt_v->parent == 0) {
                        $cate_parent = $pjt_v;
                    }else{
                        $cate_brand = $pjt_v;
                    }
                }
                $loca_name = wp_get_object_terms( $post->ID, 'project_location');
                foreach ($loca_name as $pjt_k => $pjt_v) {
                    if ($pjt_v->parent == 0) {
                        $loca_parent = $pjt_v;
                    }else{
                        $loca_child = $pjt_v;
                    }
                }
                
                $stat_name = wp_get_object_terms( $post->ID, 'project_status');
                $cate_icon = get_field('icon','project-type' . '_' . $cate_parent->term_id);
                $stat_color = get_field('color','project_status' . '_' . $stat_name[0]->term_id);
                $stat_label = get_field('label','project_status' . '_' . $stat_name[0]->term_id);
                $price = get_field('price');
                $order++;
                $pj_price = 0;
                $float_value = (float) $price;
                if (strval($float_value) == $price) {
                    $pj_price = floatval($price)*100;
                }
                $logo = get_field('logo')['sizes']['large'];
                ?>
                <div data-compare-id="<?=$post->ID?>" data-compare-selected="0" the="<?=$cate_parent->name?>" cate="<?=$cate_brand->name?>" data-price="<?=$pj_price?>" data-date="<?=$order?>" loca="<?=$loca_child->name?>" type="<?=$stat_label?>" class="home-project-card col-span-1 project-card card-img" style="--i:<?=$order?>;order:calc( var(--i) * var(--sortby) * -1);display: grid;">
                    <a href="<?=get_the_permalink()?>" class="" target="_blank">
                        <div data-compare-id="<?=$post->ID?>" class="card-project relative pointer grid grid-cols-2 md:block" data-show="0" data-x="null">
                            <div class="py-4 col-start-2 col-span-1" style="padding-right: 12px;background-color: white;">
                                <div class="grid grid-rows-2 md:grid-rows-1 md:grid-cols-2">
                                    <div class="row-span-1 md:col-span-1 pl-4 flex items-center" style="color: <?= $stat_color ?>;border-left: 4px solid <?= $stat_color ?>;">
                                        <span class="" style="font-weight: 700;font-size: 18px;line-height: 20px;"><?=$stat_name[0]->name?></span>
                                    </div>
                                    <div class="row-start-1 row-span-1 md:col-start-2 md:col-span-1">
                                        <img src="<?= $logo?>" class="project-card-logo">
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-hidden row-start-1 col-span-1">
                                <div class="bg-cover blank project-card-image" ratio="2:3" style="background-image:linear-gradient(0deg, #000c,#0008,#0001, transparent,transparent,transparent),url('<?php echo get_the_post_thumbnail_url($post->ID, '2048x2048') ?>');">
                                </div>
                            </div>
                            <div class="bottom-left project-card-info-1">
                                <div class="flex flex-row items-center" class="f22-20">
                                    <img src="<?=$cate_icon['url']?>" class="project-card-icon -condo"><?=$cate_parent->name?>
                                </div>
                                <div class="flex flex-row items-center" class="f22-20" style="margin-top: 6px;">
                                    <img src="/wp-content/uploads/2022/10/Icon-in-input-1.png" class="project-card-icon -loca"><?=$loca_child->name?>
                                </div>
                            </div>
                            <div class="bottom-right project-card-info-2">
                                <div class="-desktop">
                                    <?php pll_e('เริ่มต้น')?>
                                    <div class="txt-price"><?=$price?></div>
                                    <?php pll_e('ล้านบาท')?>
                                </div>
                                <div class="-mobile">
                                    <div><?php pll_e('เริ่มต้น')?></div>
                                    <span class="txt-price" style="margin-right: 9px;"><?=$price?></span><?php pll_e('ล้านบาท')?>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="-pj-cp" data-show="0" data-compare-id="<?=$post->ID?>" onclick="cp_add_project(`<?=$post->ID?>`,`<?=$post->post_name?>`,`<?=$post->post_title?>`)">
                        <div class="-s0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.22505 7.10838C0.980973 6.86431 0.980973 6.46858 1.22505 6.2245L5.20253 2.24702C5.4466 2.00295 5.84233 2.00295 6.08641 2.24702C6.33049 2.4911 6.33049 2.88683 6.08641 3.13091L3.17588 6.04144H18.3337C18.6788 6.04144 18.9587 6.32126 18.9587 6.66644C18.9587 7.01162 18.6788 7.29144 18.3337 7.29144H3.17588L6.08641 10.202C6.33049 10.4461 6.33049 10.8418 6.08641 11.0859C5.84233 11.3299 5.4466 11.3299 5.20253 11.0859L1.22505 7.10838Z" fill="white"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7749 15.0254C19.019 14.7813 19.019 14.3856 18.7749 14.1415L14.7975 10.164C14.5534 9.91994 14.1577 9.91994 13.9136 10.164C13.6695 10.4081 13.6695 10.8038 13.9136 11.0479L16.8241 13.9584H1.66634C1.32116 13.9584 1.04134 14.2383 1.04134 14.5834C1.04134 14.9286 1.32116 15.2084 1.66634 15.2084H16.8241L13.9136 18.119C13.6695 18.363 13.6695 18.7588 13.9136 19.0029C14.1577 19.2469 14.5534 19.2469 14.7975 19.0029L18.7749 15.0254Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="-s1">

                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.22505 11.1084C0.980973 10.8643 0.980973 10.4686 1.22505 10.2245L5.20253 6.24702C5.4466 6.00295 5.84233 6.00295 6.08641 6.24702C6.33049 6.4911 6.33049 6.88683 6.08641 7.13091L3.17588 10.0414H18.3337C18.6788 10.0414 18.9587 10.3213 18.9587 10.6664C18.9587 11.0116 18.6788 11.2914 18.3337 11.2914H3.17588L6.08641 14.202C6.33049 14.4461 6.33049 14.8418 6.08641 15.0859C5.84233 15.3299 5.4466 15.3299 5.20253 15.0859L1.22505 11.1084Z" fill="white"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7749 19.0254C19.019 18.7813 19.019 18.3856 18.7749 18.1415L14.7975 14.164C14.5534 13.9199 14.1577 13.9199 13.9136 14.164C13.6695 14.4081 13.6695 14.8038 13.9136 15.0479L16.8241 17.9584H1.66634C1.32116 17.9584 1.04134 18.2383 1.04134 18.5834C1.04134 18.9286 1.32116 19.2084 1.66634 19.2084H16.8241L13.9136 22.119C13.6695 22.363 13.6695 22.7588 13.9136 23.0029C14.1577 23.2469 14.5534 23.2469 14.7975 23.0029L18.7749 19.0254Z" fill="white"/>
                                <ellipse cx="18.3337" cy="7.33317" rx="6.66667" ry="6.66667" fill="#1D9F9B"/>
                                <path d="M15.833 7.33317L17.4997 8.99984L20.833 5.6665" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </div>
                    </div>
                </div>
                <?php 
            }endwhile;
            wp_reset_postdata();
            ?>
        </div>
        <div id="notfound" class="flex flex-col justify-center items-center hidden">
            <sp class="rem-5"></sp>
            <img src="/wp-content/uploads/2022/12/Group-937.png" style="margin-bottom: 30px;">
            <h5 class="f30-28" style="font-weight: 500;margin-bottom: 12px;text-align: center;"><?php pll_e('ไม่พบโครงการที่คุณต้องการ?')?></h5>
            <p style="margin-bottom: 26px;text-align: center;"><?php pll_e('ลองปรับรายละเอียดการค้นหา หรือลบตัวกรองและลองใหม่อีกครั้ง')?></p>
            <button style="border-radius: 8px;color: white;background-color: var(--ci-blue-300);padding:8px 24px;" onclick="remove_price();filter_pop(999, this);check_chk('clear', 999)">
                <h6><?php pll_e('ล้างทั้งหมด')?></h6>
            </button>
            <sp class="rem-6"></sp>
        </div>
    </div>
</section>
</div>

<script type="text/javascript">
    function remove_price(){
        document.querySelector('#filter_2').dataset.priceMin = 0
        document.querySelector('#filter_2').dataset.priceMax = 999
        check_chk('first', -1)
        sort_info()
        
    }

    function close_price_pop(){
        $('#filter_2').dataset.open = -1
        $('#filter_cost').dataset.open = -1
    }

    function close_other_pop(){
        if ($('#filter_0').style.backgroundColor == 'rgb(243, 249, 255)') {
            $('#filter_0').click()
        }
        if ($('#filter_1').style.backgroundColor == 'rgb(243, 249, 255)') {
            $('#filter_1').click()
        }
        if ($('#filter_3').style.backgroundColor == 'rgb(243, 249, 255)') {
            $('#filter_3').click()
        }
    }
</script>

<script>
    function conscroll(num) {
        const left = document.querySelector(".scroll-condo");
        left.scrollBy(num, 0);
    }

    function onMouseOver(event) {
        this.style.outlineWidth = "2px"
        this.children[0].style.filter = "grayscale(0%)"
    }
    function onMouseOut(event) {
        this.style.outlineWidth = "1px"
        this.children[0].style.filter = "grayscale(100%)"
    }
    for (let e of document.getElementsByClassName('graylogo')) {
        e.addEventListener('mouseover',onMouseOver,true);
        e.addEventListener('mouseout',onMouseOut,true);
    }

</script>


<script type="text/javascript">
    function filter_pop_price(el){
        close_other_pop()
        el.dataset.open *= -1
        filter_cost.dataset.open = el.dataset.open
    }
    function filter_price_select(el){
        let min = el.dataset.priceMin
        let max = el.dataset.priceMax
        $('#filter_2').dataset.priceMin = min
        $('#filter_2').dataset.priceMax = max
        close_price_pop()
        $('#price_pro').innerHTML = el.innerText
        check_chk('first', -1)
        sort_info()
        $('#condo-show').click()
    }

</script>

<script type="text/javascript">
    url_min = "<?=$_GET['price_min']?>"
    url_max = "<?=$_GET['price_max']?>"
    if ($(`[data-price-max="${url_max}"][data-price-min="${url_min}"]`)) {
        $(`[data-price-max="${url_max}"][data-price-min="${url_min}"]`).click()
    }
    document.querySelector('#filter_2').dataset.open = -1
    document.querySelector('#filter_cost').dataset.open = -1
</script>

<script type="text/javascript">
    if ($('#filter_2').style.backgroundColor == 'rgb(243, 249, 255)') {
        $('#filter_2').style.backgroundColor = ''
    }
</script>


<script type="text/javascript">
    // NEW 
    let card_arr_x = []
    function scrollCard(){
        card_arr_x = []
        let h = window.innerHeight
        let cards = document.querySelectorAll('.card-project')
        let offset = 200
        let delay = 0
        let chktop = 0

        for(let i of cards){
            let react = i.getBoundingClientRect()
            if (card_arr_x.indexOf(react.x) == -1) {
                card_arr_x.push(react.x)
            }
        }
        // xconsolex.log(card_arr_x)
        card_arr_x = card_arr_x.sort(function (a, b) {  return a - b;  })
        let index = card_arr_x.indexOf(0);
        if (index !== -1) {
            card_arr_x.splice(index, 1);
        }
        for(let i of cards){
            let cp_btn = i.parentNode.parentNode.getElementsByClassName('-pj-cp')[0]
            let react = i.getBoundingClientRect()
            let point = react.y-h+offset
            i.dataset.x = card_arr_x.indexOf(react.x)
            i.style.setProperty('--x',i.dataset.x)
            if (cp_btn != undefined) {
                cp_btn.style.setProperty('--x',i.dataset.x)
            }
            if (point<0) {
                i.dataset.show = 1
                if (cp_btn != undefined) {
                    cp_btn.dataset.show = 1
                }
            }
        }
    }

    function forScrollCard(){

    }


    //new price change
    function restartSort(){
        let cards = document.querySelectorAll('.card-project')
        for(let i of cards){
            i.dataset.show = 0
            i.dataset.x = -1
            let cp_btn = i.parentNode.parentNode.getElementsByClassName('-pj-cp')[0]
            if (cp_btn != undefined) {
                cp_btn.dataset.show = 0
            }
        }
        pjc = $$('.project-card')
        pjc_count = 0
        for(let i of pjc){
            if (i.style.display != 'none') {
                pjc_count++
            }
        }
        xconsolex.log(pjc_count)
        $('#num-con').innerText = `- ${pjc_count} <?php pll_e('รายการ') ?>`
        scrollCard()
    }
    // new price end

    sort_info()
    window.onscroll = ()=>{
        scrollCard()
    }
    // scrollCard()
    forScrollCard()
    // END NEW 
</script>

<?php get_footer() ?>