<?php
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
act_template_project_css($opt,$template_name,$layout);
$form_pattern = $content['form_pattern'];
$form_type = $content['form_type'];
$form_bg = $content['background_image']['sizes']['1536x1536'];
if ($form_pattern == 'float') {
	$form_bg = $content['promotion_image']['sizes']['1536x1536'];
}
$telephone_img = acf_img($content['tel_icon'], 'medium');
$contact_img = acf_img($content['contact_icon'], 'medium');

$tel_html = "<a href=\"tel:{$content['telephone_label']}\" class=\"form-icon inline-flex items-center content-center\" target=\"_blank\"><span class=\"pr-3\"><img src=\"{$telephone_img}\" ></span><span class=\"underline\">{$content['telephone_label']}</span></a>";
$con_html = "<a href=\"{$content['contact_url']}\" class=\"form-icon inline-flex items-center content-center\" target=\"_blank\"><span class=\"pr-3\"><img src=\"{$contact_img}\" alt=\"\"></span><span class=\"underline\">{$content['contact_label']}</span></a>";
?>
<div id="register_form"></div>
<section id="form" class="bg-cover lg:hidden form-mob">
	<div class="container mx-auto">
		<div class="form-pic-side">
			<img src="<?= $content['promotion_image']['sizes']['large'] ?>" class="w-full">
		</div>
		<div class="register_mobile_form px-8">
			<div class="form-template form-1">
				<h1 class="form-title"><?php pll_e('ลงทะเบียน')?></h1>
				<?= $content['form'] ?>
			</div>
			<div class="form-contact">
				<div class="-line"></div>
				<div class="-txt"><?php pll_e('หรือ')?></div>
				<div class="-line"></div>
			</div>
			<div class="grid grid-cols-12 pb-10 form-contact-footer" style="padding-bottom: 18px;padding-top: 20px">
				<div class="col-span-6 flex flex-row justify-center items-center">
					<?= $tel_html ?>
				</div>
				<div class="col-span-6 flex flex-row justify-center items-center">
					<?= $con_html ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="form" class="bg-cover hidden lg:block">
	<div class="section-fade">
		<?php
		if ($content['promotion_image']['id'] != '') {
			if ($form_pattern == 'fix' && $form_type != 'bottom') {
				?>
				<div class="container mx-auto">
					<div class="grid grid-cols-12 items-center">
						<?php if ($form_type == 'left'): ?>
							<div class="col-span-6 px-8 xl:px-0- bg-cover" style="background-image:url(<?= $content['form_bg']['sizes']['large'] ?>)">
								<div class="form-template form-1">
									<h2 class="form-title"><?php pll_e('ลงทะเบียน')?></h2>
									<?= $content['form'] ?>
								</div>
								<style>

								</style>
								<div class="-rotate">
									<div class="-txt">
										<?= $content['vertical_text'] ?>
									</div>
									<div class="-line"></div>
								</div>
								<div class="form-contact">
									<div class="-line"></div>
									<div class="-txt"><?php pll_e('หรือ')?></div>
									<div class="-line"></div>
								</div>
								<div class="grid grid-cols-12" style="padding-bottom: 18px;padding-top: 20px">
									<div class="col-span-6 flex flex-row justify-end items-center pr-25px">
										<?= $tel_html ?>
									</div>
									<div class="col-span-6 flex flex-row items-center pl-25px">
										<?= $con_html ?>
									</div>
								</div>
							</div>
						<?php endif ?>
						<div class="col-span-6 flex">
							<img src="<?= $content['promotion_image']['sizes']['large'] ?>" class="w-full">
						</div>
						<?php if ($form_type == 'right'): ?>
							<div class="col-span-6 px-8 xl:px-0- bg-cover" style="background-image:url(<?= $content['form_bg']['sizes']['large'] ?>)">
								<div class="form-template form-1">
									<h2 class="form-title"><?php pll_e('ลงทะเบียน')?></h2>
									<?= $content['form'] ?>
								</div>
								<div class="-rotate">
									<div class="-txt">
										<?= $content['vertical_text'] ?>
									</div>
									<div class="-line"></div>
								</div>
								<style>
									.-rotate {
										block-size: auto;
										writing-mode: vertical-lr;
										position: absolute;
										height: 100%;
										display: flex;
										top: 0;
										transform: rotateZ(180deg) translate(1rem);
										align-items: center;
									}
								</style>
								<div class="form-contact">
									<div class="-line"></div>
									<div class="-txt"><?php pll_e('หรือ')?></div>
									<div class="-line"></div>
								</div>
								<div class="grid grid-cols-12 pt-6" style="padding-bottom: 18px;padding-top: 20px">
									<div class="col-span-6 flex flex-row justify-end items-center pr-25px">
										<?= $tel_html ?>
									</div>
									<div class="col-span-6 flex flex-row items-center pl-25px">
										<?= $con_html ?>
									</div>
								</div>
							</div>
						<?php endif ?>
					</div>
				</div>
				<?php
			} else if ($form_pattern == 'fix' && $form_type == 'bottom') {
				?>
				<img src="<?= $content['promotion_image']['sizes']['large'] ?>" class="w-full" style="height: 100%;">
				<div class="col-span-6 px-8 xl:px-0- bg-cover">
					<div class="form-template form-1">
						<h2 class="form-title"><?php pll_e('ลงทะเบียน')?></h2>
						<?= $content['form'] ?>
					</div>
					<div class="form-contact">
						<div class="-line"></div>
						<div class="-txt"><?php pll_e('หรือ')?></div>
						<div class="-line"></div>
					</div>
					<div class="grid grid-cols-12 pt-6" style="padding-bottom: 18px;padding-top: 20px">
						<div class="col-span-6 flex flex-row justify-end items-center pr-25px">
							<?= $tel_html ?>
						</div>
						<div class="col-span-6 flex flex-row items-center pl-25px">
							<?= $con_html ?>
						</div>
					</div>
				</div>
				<?php
			} else if ($form_pattern == 'float') {
				?>
				<div class="container mx-auto">
					<div class="grid grid-cols-12">
						<?php if ($form_type == 'right'): ?>
							<div class="col-span-6"></div>
						<?php endif ?>
						<div class="col-span-6 bg-cover bg-center p-8"
						style="background-image:url('<?= $content['form_bg']['sizes']['large'] ?>')">
						<div class="form-template form-1">
							<h2 class="form-title"><?php pll_e('ลงทะเบียน')?></h2>
							<?= $content['form'] ?>
						</div>
						<div class="form-contact">
							<div class="-line"></div>
							<div class="-txt"><?php pll_e('หรือ')?></div>
							<div class="-line"></div>
						</div>
						<div class="grid grid-cols-12 pt-6" style="padding-bottom: 18px;padding-top: 20px">
							<div class="col-span-6 flex flex-row justify-end items-center pr-25px">
								<?= $tel_html ?>
							</div>
							<div class="col-span-6 flex flex-row items-center pl-25px">
								<?= $con_html ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	} else {
		?>
		<div class="container mx-auto mb-14">
			<div class="grid grid-cols-12 center">
				<div class="col-span-3"></div>
				<div class="col-span-6">
					<div class="form-template form-1">
						<h2 class="form-title"><?php pll_e('ลงทะเบียน')?></h2>
						<?= $content['form'] ?>
					</div>
					<div class="form-contact">
						<div class="-line"></div>
						<div class="-txt"><?php pll_e('หรือ')?></div>
						<div class="-line"></div>
					</div>
					<div class="grid grid-cols-12 pt-6" style="padding-bottom: 18px;padding-top: 20px">
						<div class="col-span-6 flex flex-row justify-end items-center pr-25px">
							<?= $tel_html ?>
						</div>
						<div class="col-span-6 flex flex-row items-center pl-25px">
							<?= $con_html ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>
</section>
<script type="text/javascript">
	function setFormLabel() {
		let el = $$('.form-column-2 label')
		for (let i of el) {
			i.setAttribute('onclick', `moveLabel(this)`);
		}

		let inp = $$(':is(.wpcf7-text,.wpcf7-date)')
		for (let i of inp) {
			i.setAttribute('onfocusout', `checkLabel(this)`);
			i.setAttribute('onfocusin', `moveLabelFromInput(this)`);
			i.setAttribute('onchange', `checkAllInputLabel()`);
		}
	}
	setFormLabel()

	function setFormSelector(){
		let parentSelector = ``
		parentSelector += `<div class="info-tab-options">`

		parentSelector += `</div>`
		let slt = $$('.form-template .wpcf7-select')
		let skey = 0;
		for(let s of slt){
			let toggle = `<input onchange="checkSpecialOption(${skey})" class="special-form-toggle" type='checkbox'><div class="special-form-bg"></div>`
			let optionsHtml = `<div class='special-form-option'>`
			let option = s.querySelectorAll('option')
			let okey = 0
			s.dataset.skey = skey
			for(let o of option){
				if (o.innerText == '—Please choose an option—') {
					o.innerText = '-- <?php pll_e('กรุณาเลือก')?> --'
				}
				o.dataset.sokey = `key-${skey}-${okey}`
				o.dataset.okey = okey
				optionsHtml += `<div class="-o" onclick="specialOptSelect(${skey},${okey})">${o.innerHTML}</div>`
				okey++;
			}
			optionsHtml += `</div>`
			wrap = s.parentElement;
			label = s.parentElement.parentElement;
			label.style.cursor = 'pointer' 
			wrap.innerHTML = toggle+optionsHtml+wrap.innerHTML;
			wrap.style.pointerEvents = 'none'
			skey++;
		}
	}
	function specialOptSelect(skey,okey){
		let thisO = $(`option[data-sokey="key-${skey}-${okey}"]`)
		let thisS = $(`.form-template .wpcf7-select[data-skey="${skey}"]`)
		thisO.selected = true
	}
	function checkSpecialOption(skey){
		let toggle = $$('.special-form-toggle')
		let tSize = toggle.length
		for(let i=0;i<tSize;i++){
			if (i != skey) {
				toggle[i].checked = false
			}
		}

	}
	setFormSelector()
	
	function moveLabel(el) {
		el.dataset.filled = "true"
	}

	function checkLabel(inp) {
		let label = inp.parentElement.parentElement
		if (inp.value == "") {
			label.dataset.filled = 0
		}else{
			label.dataset.filled = 'true'
		}
	}

	function moveLabelFromInput(inp){
		let el = inp.parentElement.parentElement
		el.dataset.filled = "true"
	}

	function checkAllInputLabel(){
		let inp = $$(':is(.wpcf7-text,.wpcf7-date)')
		for (let i of inp) {
			checkLabel(i)
		}
	}


</script>

<style type="text/css">
	.validate-consent[data-ispass="true"] {
		display: none;
	}
	<?php if ($content['text_color'] != ''): ?>
		#form  {
			--mc-main-5: <?=$content['text_color']?>
		}
	<?php endif ?>
</style>

<script type="text/javascript">

	for (let i = 0; i < 2; i++) {
		$$('#consent_label')[i].outerHTML += `<span class="wpcf7-not-valid-tip validate-consent" data-ispass="true">กรุณาเลือก</span>`
		$$('.wpcf7-submit')[i].addEventListener('click', validate_consent)
	}


	function validate_consent() {
		let el = $$('[name="consent[]"]');
		for (let i = 0; i < 2; i++) {
			$$('.validate-consent')[i].dataset.ispass = el[i].checked
		}
	}
</script>


<script type="text/javascript">
	
	for(let i of $$('[name="Tel"]')){
		i.addEventListener('change',(e)=>{
			let input = e.target
			let val = input.value
			if (val.length != 10) {
				e.target.value = ''
			}
		})
	}
	function checkTel(e){

	}
</script>

<script type="text/javascript">
	// setTimeout( function(){
	// 	$( '.my-form form' ).on( 'reset', function(e) {
	// 		e.preventDefault();
	// 	});
	// },500)
</script>

<?php if ($template_name == 'elegant')
: ?>
<script type="text/javascript">
	function moveLabel(el) {
		el.dataset.filled = "true"
		let another_div = document.createElement('div')
		another_div.classList.add('-absolute')
		another_div.classList.add('form_input_underline')
		another_div.style.setProperty('--w', el.offsetWidth - .5)
		el.appendChild(another_div)
	}
</script>
<?php endif ?>