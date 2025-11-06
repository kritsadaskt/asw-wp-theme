<script type="text/javascript">
  xconsolex.log = (x)=>{
    return xconsolex.log(x)
  }
  let countTiming = 0;
  let logTime = ''
  document.addEventListener( 'wpcf7submit', function( event ) {
    xconsolex.log('ct7')
    let form_id = event.detail.contactFormId;
    let is_send = 0;
    let project_id = '<?=get_field('project_id')?>';
    if (project_id == '') {
      project_id = 0;
    }
    if (event.target.classList.contains("sent")) {
      xconsolex.log('send')
      xconsolex.log(form_id)
      payload = {}
      payload.form_id = form_id;
      payload.post_type = '<?=get_post_type()?>';
      payload.page_title = '<?=get_the_title()?>';
      payload.project_title = '<?=get_the_title()?>';
      payload.project_id = project_id;
      payload.project_wp_id = '<?=get_the_ID()?>';
      payload.form_data = event.detail;
      payload.form_value = {};
      for(let i of payload.form_data.inputs){
        payload.form_value[i.name] = i.value
      }
      xconsolex.log(payload)

      setInterval(()=>{
        wpcf7_input_this_form_project = $$('#form [data-status="sent"] input.wpcf7-text,#form [data-status="resetting"] input.wpcf7-text')
        for(let kk of wpcf7_input_this_form_project){
          let nn = kk.name
          if (payload.form_value[nn] != undefined) {
            kk.value = payload.form_value[nn]
          }
        }
      },50)


      payload.page_url = location.href;
      var data = new FormData();
      data.append( "json", JSON.stringify( payload ) );
      fetch("/api-internal-send-form?t=<?=time()?>",
      {
        method: "POST",
        cache: "no-cache", 
        credentials: "same-origin", 
        body: data
      })
      .then(function(res){ return res.json(); })
      .then(function(json){
        fetch("/api-form-auto-cron/")
        xconsolex.log(json)
        if (json.status == 200) {
          if (json.option_status == 200) {
            xconsolex.log('loop end')
            if (json.option_data.use_thank_you_redirection == 'enabled' && json.option_data.thank_you != '') {
              location.href = json.option_data.thank_you
              // document.body.style.opacity = 0
              loadscreen.dataset.loaded = 0
              xconsolex.log('redirect ',json.option_data.thank_you)
            }
            clearInterval(logTime)
            xconsolex.log('--- countTiming End: ',countTiming)
          }else{
            xconsolex.log('no option')  
            clearInterval(logTime)
            xconsolex.log('--- countTiming End: ',countTiming)
          }
        }else{
          xconsolex.log('internal api error')
          clearInterval(logTime)
          xconsolex.log('--- countTiming End: ',countTiming)
        }
      })
    }else{
      xconsolex.log('front not send yet')
      clearInterval(logTime)
      xconsolex.log('--- countTiming End: ',countTiming)
    }
  }, false );
</script>



<script type="text/javascript">
  function jbtest(){
    let n = new Date()
    let ttt = n.getTime()
    for(let i of $$('#form input[type="email"]')){
      i.value = ttt+'@jj.com'
      i.click()
    }
    for(let i of $$('#form input[type="text"]')){
      i.value = 'Test '+ttt;
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
    $('input.wpcf7-form-control.has-spinner.wpcf7-submit').click()
    xconsolex.log('--- countTiming: ',countTiming)
    logTime = setInterval(()=>{
      countTiming++
      xconsolex.log('--- countTiming: ',countTiming)
    },1000)
  }
</script>
