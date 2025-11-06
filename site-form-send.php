<script type="text/javascript">
  // xconsolex.log = (x)=>{
  //   return console.log(x)
  // }
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
        wpcf7_input_this_form_project = $$('#form input.wpcf7-text')
        for(let kk of wpcf7_input_this_form_project){
          let nn = kk.name
          kk.value = payload.form_value[nn]
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
        xconsolex.log(json)
        if (json.status == 200) {
          if (json.option_status == 200) {
            xconsolex.log('loop end')
            if (json.option_data.use_thank_you_redirection == 'enabled' && json.option_data.thank_you != '') {
              location.href = json.option_data.thank_you
              xconsolex.log('redirect ',json.option_data.thank_you)
            }
          }else{
            xconsolex.log('no option')  
          }
        }else{
          xconsolex.log('internal api error')
        }
      })
    }else{
      xconsolex.log('front not send yet')
    }
  }, false );
</script>



<script type="text/javascript">
  function jbtest(){
    for(let i of $$('input[type="email"]')){
      i.value = 'JJ@jj.com'
    }
    for(let i of $$('input[type="text"]')){
      i.value = 'Test'
    }
    for(let i of $$('input[type="tel"]')){
      i.value = '0123456789'
    }
    for(let i of $$('[type="checkbox"]')){
      i.checked = true
    }
  }
</script>
