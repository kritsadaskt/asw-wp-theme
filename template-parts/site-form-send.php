<!-- Use This -->
<style type="text/css">
  #form form.wpcf7-form[data-alreadysent="1"] .wpcf7-submit,
  #form form.wpcf7-form .wpcf7-submit[disabled="true"] {
    opacity: .5;
    pointer-events: none;
  }
</style>
<!-- <script type="text/javascript">
  $$('.wpcf7-form').forEach((elm)=>{
    addEventListener("submit", (elm) => {
      let btn = elm.target.querySelector('.wpcf7-submit')
      btn.setAttribute('disabled','true')
      console.log(btn)
    });
  })
</script> -->

<script>
  let aswFormOptions = [];
  let aswFormOptionsData = {};
  function renderAswFormOptions(){
    let el = $$('[name="_wpcf7"]')
    for(let e of el){
      if (aswFormOptions.indexOf(e.value) == -1) {
        aswFormOptions.push(e.value)
        aswFormOptionsData[e.value] = {id:e.value,option:{},isRedirect:false,redirect:''}
      }
    }
    for(let form_id of aswFormOptions){
      console.log(form_id)
      fetch('/api/api-internal-form-get-options/?form='+form_id)
      .then(response => response.json())
      .then(json => {
        aswFormOptionsData[form_id].option = json
        if (json.use_thank_you_redirection == 'enabled' && json.thank_you != '') {
          aswFormOptionsData[form_id].isRedirect = true
          aswFormOptionsData[form_id].redirect = json.thank_you
        }
      })
    }
  }
  renderAswFormOptions()
</script> 
<script>
  document.addEventListener( 'wpcf7submit', function( event ) {
    let is_send = 0;
    if (event.target.classList.contains("sent")) {
      console.log('sent')
      let form_id = event.detail.contactFormId;
      payload = {}
      payload.form_id = form_id;
      payload.form_data = event.detail;
      payload.form_value = {};
      for(let i of payload.form_data.inputs){
        payload.form_value[i.name] = i.value
      }
      if (aswFormOptionsData[form_id].isRedirect) {
        console.log('redirect')
        loadscreen.dataset.loaded = 0
        location.href = aswFormOptionsData[form_id].redirect
        setInterval(()=>{//ทำให้ยังเก็บข้อมูลที่ีกรอกไว้อยู่จนกว่าจะ Redirect
          wpcf7_input_this_form_project = $$('#form [data-status="sent"] input.wpcf7-text,#form [data-status="resetting"] input.wpcf7-text')
          for(let kk of wpcf7_input_this_form_project){
            let nn = kk.name
            console.log(nn)
            if (payload.form_value[nn] != undefined) {
              kk.value = payload.form_value[nn]
            }
          }
        },50)
      }else{
        console.log('no redirect')
      }

    }else{
      if(event.target.dataset.status == 'invalid'){
        let btn = event.target.querySelector('.wpcf7-submit')
        btn.removeAttribute('disabled')
      }
    }
  }, false );
</script> 



<script type="text/javascript">
  function jbtest(){
    let n = new Date()
    let ttt = n.getTime()
    for(let i of $$('#form input[type="email"]')){
      i.value = 'ibont.kurogo+asw'+ttt+'@gmail.com'
      i.click()
    }
    for(let i of $$('#form input[type="text"]')){
      i.value = 'RabbitTest '+ttt;
      i.click()
    }
    for(let i of $$('#form input[type="tel"]')){
      i.value = '0123456789'
      i.click()
    }
    for(let i of $$('#form [type="checkbox"]')){
      i.checked = true
    }
    for(let i of $$('.special-form-option .-o:nth-child(2)')){
      i.click()
    }
    // $('input.wpcf7-form-control.has-spinner.wpcf7-submit').click()
  }
</script>

<script>
  let intervalFormUrlTrack = setInterval(() => {
    let form_url_track = $$('[name="form_url_track"]');
    if (form_url_track.length > 0) {
      for(let i of form_url_track){
        i.value = location.href
      }
      console.log('[form_url_track]', form_url_track)
      clearInterval(intervalFormUrlTrack);
    }
  }, 2000);
  setTimeout(() => {
    if (intervalFormUrlTrack) console.log('form_url_track is not found')
    clearInterval(intervalFormUrlTrack);
  }, 20000);
</script>
<script>
  let form_meta_track_promotion = [];
  form_meta_track_promotion['project_title'] = [];
  form_meta_track_promotion['project_wp_id'] = [];
  form_meta_track_promotion['project_id'] = [];
</script>
<script>
  let intervalFormMetaTrack = setInterval(() => {
    let form_meta_track = $$('[name="form_meta_track"]');
    if (form_meta_track.length > 0) {
      console.log('[form_meta_track]', form_meta_track)
      for(let i of form_meta_track){
        let v = {}
        v['post_type'] = `<?=get_post_type()?>`.replace(/"/g, '\\"');
        v['page_title'] = `<?=get_the_title()?>`.replace(/"/g, '\\"');
        <?php if (get_post_type() == 'house' OR get_post_type() == 'condominium') {
          ?>
          v['project_title'] = [`<?=get_the_title()?>`.replace(/"/g, '\\"')]
          v['project_wp_id'] = [`<?=get_the_ID()?>`.replace(/"/g, '\\"')]
          v['project_id'] = [`<?=get_field('project_id',get_the_ID())?>`.replace(/"/g, '\\"')]
          <?php
        } else if(get_post_type() == 'promotion'){
          ?>
          v['project_title'] = []
          v['project_wp_id'] = []
          v['project_id'] = []
          <?php
        }?>
        v = JSON.stringify(v)
        i.value = v
      }
      clearInterval(intervalFormMetaTrack);
    }
  }, 2000);
  setTimeout(() => {
    if (intervalFormMetaTrack) console.log('form_meta_track is not found')
    clearInterval(intervalFormMetaTrack);
  }, 20000);
</script>
<script>
  let form_utm_source = $$(`[name="utm_source"]`)
  let form_utm_medium = $$(`[name="utm_medium"]`)
  let form_utm_campaign = $$(`[name="utm_campaign"]`)
  let form_utm_keyword = $$(`[name="utm_keyword"]`)
  let form_utm_content = $$(`[name="utm_content"]`)
  let form_utm_term = $$(`[name="utm_term"]`)
  for(let i of form_utm_source){
    if (getAllUrlParams().utm_source != undefined) {
      i.value = getAllUrlParams().utm_source
    }
  }
  for(let i of form_utm_medium){
    if (getAllUrlParams().utm_medium != undefined) {
      i.value = getAllUrlParams().utm_medium
    }
  }
  for(let i of form_utm_campaign){
    if (getAllUrlParams().utm_campaign != undefined) {
      i.value = getAllUrlParams().utm_campaign
    }
  }
  for(let i of form_utm_keyword){
    if (getAllUrlParams().utm_keyword != undefined) {
      i.value = getAllUrlParams().utm_keyword
    }
  }
  for(let i of form_utm_content){
    if (getAllUrlParams().utm_content != undefined) {
      i.value = getAllUrlParams().utm_content
    }
  }
  for(let i of form_utm_term){
    if (getAllUrlParams().utm_term != undefined) {
      i.value = getAllUrlParams().utm_term
    }
  }

  function getAllUrlParams(url) {
    var queryString = url ? url.split('?')[1] : window.location.search.slice(1);var obj = {};if (queryString) {  queryString = queryString.split('#')[0];  var arr = queryString.split('&');  for (var i = 0; i < arr.length; i++) {
      var a = arr[i].split('=');    var paramName = a[0];
      var paramValue = typeof (a[1]) === 'undefined' ? true : a[1];    paramName = paramName.toLowerCase();
      if (typeof paramValue === 'string') paramValue = paramValue.toLowerCase();    if (paramName.match(/\[(\d+)?\]$/)) {      var key = paramName.replace(/\[(\d+)?\]/, '');
      if (!obj[key]) obj[key] = [];      if (paramName.match(/\[\d+\]$/)) {
        var index = /\[(\d+)\]/.exec(paramName)[1];
        obj[key][index] = paramValue;
      } else {
        obj[key].push(paramValue);
      }
    } else {
      if (!obj[paramName]) {
        obj[paramName] = paramValue;
      } else if (obj[paramName] && typeof obj[paramName] === 'string'){
        obj[paramName] = [obj[paramName]];
        obj[paramName].push(paramValue);
      } else {
        obj[paramName].push(paramValue);
      }
    }
  }
}return obj;
}
</script>