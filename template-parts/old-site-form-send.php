<script type="text/javascript">
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
      var date = new Date();
      var utc = date.getTime() - (date.getTimezoneOffset() * 60000);
      var date = new Date(utc)
      dateref = date.toISOString().substring(0, 10) + " " + date.toISOString().substring(11, 19)
      payload = {}
      payload.form_id = form_id;
      payload.page_title = '<?=get_the_title()?>';
      payload.project_id = project_id;
      payload.form_data = event.detail;
      payload.date_ref = dateref;
      payload.hash_value = 'hash';
      payload.form_value = {};
      
      let hash_value = '_';

      xconsolex.log(payload.form_data.inputs)
      for(let i of payload.form_data.inputs){
        payload.form_value[i.name] = i.value
        hash_value += i.value
      }
      // xconsolex.log(hash)
      // hash = encodeURIComponent(hash)
      // xconsolex.log(hash)
      // hash = sha256(hash);
      // xconsolex.log(hash)
      // hash = hash.substring(0,51);
      // xconsolex.log(hash)
      payload.hash_value = hash_value;
      xconsolex.log(payload)
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
          xconsolex.log(json)
          if (json.option_status == 200) {
            if (json.option_data.is_send_api == "enabled") {
              let _data = {
                "ProjectID":project_id,
                "ContactChannelID":21,
                "ContactTypeID":35,
                "RefID":form_id,
                "Fname":payload.form_value.fname,
                "Lname":payload.form_value.lname,
                "Tel":payload.form_value.tel,
                "Email":payload.form_value.email,
                "Ref":"<?=get_the_title()?>",
                "RefDate":dateref,
                "FollowUpID":42,
                "utm_source":null,
                "utm_medium":null,
                "utm_campaign":null,
                "utm_term":null,
                "utm_content":null,
                "PriceInterest":payload.form_value.priceInterest,
                "ModelInterest":null,
                "PromoCode":null,
                "PurchasePurpose":null,
                "FlagPersonalAccept":true,
                "FlagContactAccept":true,
                "AppointDate":null,
                "AppointTime":null,
                "AppointTimeEnd":null,
              }
              fetch('https://aswinno.assetwise.co.th/CISUAT/api/Customer/SaveOtherSource/', {
                method: "POST",
                body: JSON.stringify(_data),
                headers: {
                  "Content-type": "application/json; charset=UTF-8",
                  "Authorization": "Basic Y3VzdG9tZXJtYW5hZ2VtZW50OmN1c3RvbWVybWFuYWdlbWVudEAyMDE4",
                }
              })
              .then(response => response.json()) 
              .then(json2 => {
                xconsolex.log('hoorey')
                xconsolex.log(json2)
                xconsolex.log(json)
                if (json.option_data.use_thank_you_redirection == 'enabled' && json.option_data.thank_you != '') {
                  // location.href = json.option_data.thank_you
                  xconsolex.log('redirect ',json.option_data.thank_you)
                }
              })
            }else{
              if (json.option_data.use_thank_you_redirection == 'enabled' && json.option_data.thank_you != '') {
                // location.href = json.option_data.thank_you
                xconsolex.log('redirect ',json.option_data.thank_you)
              }
            }
          }else{
            xconsolex.log('no option')  
          }
        }else{
          xconsolex.log('form api error')
        }
      })
    }else{
      xconsolex.log('not send yet')
    }
  }, false );
</script>

<script type="text/javascript">
  function sha256(ascii) {
    function rightRotate(value, amount) {
      return (value >>> amount) | (value << (32 - amount));
    }

    var mathPow = Math.pow;
    var maxWord = mathPow(2, 32);
    var lengthProperty = 'length';
    var i, j; // Used as a counter across the whole file
    var result = '';
    var words = [];
    var asciiBitLength = ascii[lengthProperty] * 8;
    var hash = (sha256.h = sha256.h || []);
    var k = (sha256.k = sha256.k || []);
    var primeCounter = k[lengthProperty];

    var isComposite = {};
    for (var candidate = 2; primeCounter < 64; candidate++) {
      if (!isComposite[candidate]) {
        for (i = 0; i < 313; i += candidate) {
          isComposite[i] = candidate;
        }
        hash[primeCounter] = (mathPow(candidate, 0.5) * maxWord) | 0;
        k[primeCounter++] = (mathPow(candidate, 1 / 3) * maxWord) | 0;
      }
    }

    ascii += '\x80'; // Append Ƈ' bit (plus zero padding)
    while ((ascii[lengthProperty] % 64) - 56) ascii += '\x00'; // More zero padding
    for (i = 0; i < ascii[lengthProperty]; i++) {
      j = ascii.charCodeAt(i);
        if (j >> 8) return; // ASCII check: only accept characters in range 0-255
        words[i >> 2] |= j << (((3 - i) % 4) * 8);
      }
      words[words[lengthProperty]] = (asciiBitLength / maxWord) | 0;
      words[words[lengthProperty]] = asciiBitLength;

      for (j = 0; j < words[lengthProperty]; ) {
        var w = words.slice(j, (j += 16)); // The message is expanded into 64 words as part of the iteration
        var oldHash = hash;
        // This is now the undefinedworking hash", often labelled as variables a...g
        // (we have to truncate as well, otherwise extra entries at the end accumulate
        hash = hash.slice(0, 8);

        for (i = 0; i < 64; i++) {
          var i2 = i + j;
            // Expand the message into 64 words
            // Used below if
          var w15 = w[i - 15],
          w2 = w[i - 2];

            // Iterate
          var a = hash[0],
          e = hash[4];
          var temp1 =
          hash[7] +
                (rightRotate(e, 6) ^ rightRotate(e, 11) ^ rightRotate(e, 25)) + // S1
                ((e & hash[5]) ^ (~e & hash[6])) + // ch
                k[i] +
                // Expand the message schedule if needed
                (w[i] =
                  i < 16
                  ? w[i]
                  : (w[i - 16] +
                              (rightRotate(w15, 7) ^ rightRotate(w15, 18) ^ (w15 >>> 3)) + // s0
                              w[i - 7] +
                              (rightRotate(w2, 17) ^ rightRotate(w2, 19) ^ (w2 >>> 10))) | // s1
                  0);
            // This is only used once, so *could* be moved below, but it only saves 4 bytes and makes things unreadble
                var temp2 =
                (rightRotate(a, 2) ^ rightRotate(a, 13) ^ rightRotate(a, 22)) + // S0
                ((a & hash[1]) ^ (a & hash[2]) ^ (hash[1] & hash[2])); // maj

            hash = [(temp1 + temp2) | 0].concat(hash); // We don't bother trimming off the extra ones, they're harmless as long as we're truncating when we do the slice()
            hash[4] = (hash[4] + temp1) | 0;
          }

          for (i = 0; i < 8; i++) {
            hash[i] = (hash[i] + oldHash[i]) | 0;
          }
        }

        for (i = 0; i < 8; i++) {
          for (j = 3; j + 1; j--) {
            var b = (hash[i] >> (j * 8)) & 255;
            result += (b < 16 ? 0 : '') + b.toString(16);
          }
        }
        return result;
      }
    </script>

    <script type="text/javascript">
      function jbtest(){
        for(let i of $$('input[type="email"]')){
          i.value = 'JJ@jj.com'
        }
        for(let i of $$('input[type="text"]')){
          i.value = 'xxxxxxx'
        }
        for(let i of $$('input[type="tel"]')){
          i.value = '0123456789'
        }
        for(let i of $$('[type="checkbox"]')){
          i.checked = true
        }
      }
      window.addEventListener("load", (event) => {
        jbtest()
      });
      jbtest()
    </script>