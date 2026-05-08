<?php
$content = $args[0];
$f = $args[1];
$form_pattern = $content['form_pattern'];
$form_type = $content['form_type'];
$form_bg = $content['background_image']['sizes']['1536x1536'];
if ($form_pattern == 'float') {
	$form_bg = $content['promotion_image']['sizes']['1536x1536'];
}
$template = $args[2];
$telephone_img = acf_img($content['tel_icon'], 'medium');
$contact_img = acf_img($content['contact_icon'], 'medium');

$tel_html = "<a href=\"tel:{$content['telephone_label']}\" class=\"form-icon inline-flex items-center content-center\" target=\"_blank\"><span class=\"p-3\"><img src=\"{$telephone_img}\" ></span><span class=\"underline\">{$content['telephone_label']}</span></a>";
$con_html = "<a href=\"{$content['contact_url']}\" class=\"form-icon inline-flex items-center content-center\" target=\"_blank\"><span class=\"p-3\"><img src=\"{$contact_img}\" alt=\"\"></span><span class=\"underline\">{$content['contact_label']}</span></a>";
?>


<div id="register_form"></div>
<style type="text/css">
	#consent_label .wpcf7-not-valid-tip {
		display: none
	}
	.wpcf7 form.sent .wpcf7-response-output{
		display: none;
	}

	#form {
		background-position: center;
		background-color: var(--mc-main-3);
		background-size: cover;
		color: #fff;
	}

	.form-icon img {
		height: 20px;
		width: auto;
	}

	.form-contact {
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.form-contact .-txt {
		width: 3em;
		text-align: center;
	}

	.form-contact .-line {
		height: 1px;
		background: var(--text-color);
		width: calc(40% - 2em);
	}


	.form-template {
		display: block;
		margin: auto;
		margin-top: 52px;
	}

	.form-template label span {
		font-weight: 700;
		font-size: 18px;
		line-height: 20px;
	}

	.form-template :is(.wpcf7-text,.wpcf7-date) {
		padding: 6px 16px;
		background: rgba(255, 255, 255, 0.1);
		border: 1px solid rgba(255, 255, 255, 0.3);
		backdrop-filter: blur(10px);
		border-radius: 24px;
		transition: all .3s;
		height: 40px;
		font-weight: 400;
		font-size: 22px;
		line-height: 28px;
		width: 100%;
		max-width: 100% !important;
	}

	.form-template :is(.wpcf7-text,.wpcf7-date):hover {
		background: rgba(255, 255, 255, 0.3);
	}

	#consent_label {
		margin-top: 14px;
		padding-top: 20px !important;
	}

	#consent_label a {
		color: var(--mc-main-1);
		text-decoration: underline;
	}

	.wpcf7 form.invalid .wpcf7-response-output {
		display: none;
	}

	.form-template .wpcf7-list-item label span {
		font-size: 22px;
		font-weight: 400;
	}

	.wpcf7-spinner {
		margin: 1em auto;
		background: #1de3e388;
		display: block;
		margin: auto;
	}

	.form-template .wpcf7-submit {
		padding: 6px 65px;
		display: inline-block;
		background: var(--mc-main-1);
		border-radius: 32px;
		color: var(--mc-main-3);
		border: none;
		height: auto;
		line-height: 28px;
		font-size: 22px;
		font-weight: 500;
		box-sizing: border-box;
		width: auto;
		display: block;
		margin: auto;
		cursor: pointer;
		margin-top: 28px;
		transition: all 0.5s;
	}


	.wpcf7-submit:hover {
		background: var(--mc-main-2);
	}

	.wpcf7-not-valid-tip {
		display: inline-block;
		margin-right: 0.5em;
	}

	.form-template .wpcf7-list-item {
		display: inline-block;
		margin: 0;
	}

	.form-template .wpcf7-list-item input[type=checkbox] {
		display: inline-block;
		width: auto;
		margin-right: 0.2em;
		accent-color: var(--mc-main-1);
		width: 1rem;
	}
	.form-template .wpcf7-list-item input[type=checkbox]:checked {
		background-color: var(--mc-main-1);
	}
	.form-template .wpcf7-list-item input[type=checkbox]:focus {
		outline-offset: 0px;
		box-shadow: unset;
	}

	.wpcf7-list-item label {
		display: inline-block;
		margin: 0;
	}

	.form-template :is(.wpcf7-text,.wpcf7-date):focus {
		border: 2px solid var(--mc-main-5);
		height: 40px;
	}

	.form-title {
		font-style: normal;
		font-weight: 400;
		font-size: 56px;
		line-height: 56px;
		color: #FFFFFF;
		-webkit-text-stroke: 1px var(--mc-main-1);
		text-shadow: 0px 1px 12px var(--mc-main-5);
		text-align: center;
		padding-bottom: 16px;
	}

	.form-template .form-column-2 {
		display: grid;
		grid-template-columns: 1fr 1fr;
		grid-gap: 8px 16px;
	}

	.form-column-2 label {
		position: relative;
		width: 100%;
	}

	.form-column-2 label>span {
		position: absolute;
		top: 0;
		left: 0;
		z-index: 10;
		white-space: nowrap;
	}

	.form-column-2 label>span.wpcf7-form-control-wrap {
		position: static;
	}

	.form-column-2 label>span {
		position: absolute;
		top: 2.1rem;
		left: 1rem;
		color: var(--text-color);
		transition: all .3s;
		font-size: 22px;
		line-height: 28px;
		font-weight: 400;
	}

	.form-column-2 label[data-filled="true"]>span {
		top: 0;
		left: 0;
		color: var(--text-color);
		font-size: 18px;
		line-height: 20px;
		font-weight: 700;
	}

	.-rotate {
		display: none;
	}

	#form .wpcf7-not-valid-tip {
		position: absolute !important;
		color: #e24646 !important;
		font-weight: 400;
		font-size: 20px;
		line-height: 28px;
		position: relative;
		padding-left: calc(8px + 16px);
	}

	#consent_label .wpcf7-not-valid-tip {
		width: 100%;
		left: 0;
		/*top: 3lh;*/
	}

	#form .wpcf7-not-valid-tip::before {
		content: " ";
		background-image: url('/wp-content/uploads/2023/03/invalid.png');
		width: 16px;
		height: 16px;
		background-size: contain;
		background-position: center;
		background-repeat: no-repeat;
		position: absolute;
		left: 0;
		top: calc((1lh - 16px) / 2);
	}

	.img-height {
		height: auto;
	}

	select.wpcf7-form-control.wpcf7-select{
		width: 100%;
		padding: 6px 16px;
		background-color: rgba(255, 255, 255, 0.1);
		border: 1px solid rgba(255, 255, 255, 0.3);
		backdrop-filter: blur(10px);
		border-radius: 24px;
		transition: all .3s;
		height: 40px;
		font-weight: 400;
		font-size: 22px;
		line-height: 28px;
		width: 100%;
	}

	.form-column-2 label:not([data-filled="true"]) select.wpcf7-form-control.wpcf7-select{
		color: transparent;
	}
	input:focus,
	select:focus{
		box-shadow:none !important;
	}
	.form-template .wpcf7-date{
		color: transparent !important;
	}
	.form-template label[data-filled="true"] .wpcf7-date{
		color: inherit !important;
	}
	input::-webkit-calendar-picker-indicator {
		background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="%23bbbbbb" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>');
	}

	/*-- Mobile Version --*/
	@media (max-width: 1319px) {
		.form-template .form-column-2 {
			grid-template-columns: 1fr;
			grid-gap: 8px;
		}

		.form-template :is(.wpcf7-text,.wpcf7-date) {
			width: 100%;
		}

		.form-column-2 label {
			width: 100%;
		}

		.form-title {
			padding-bottom: 0px;
		}

		.form-template {
			margin-top: 0px;
		}
	}
	/*-- Mobile Version --*/
	@media (max-width: 1023px) {
		.form-pic-side{
			max-width: 400px;
			margin: auto;
		}
	}
</style>
<section id="form" class="bg-cover lg:hidden form-mob">
	<div class="container mx-auto">
		<div class="form-pic-side">
			<img src="<?= $content['promotion_image']['sizes']['large'] ?>" class="w-full">
		</div>
		<div class="register_mobile_form px-8">
			<div class="form-template form-1">
				<h1 class="form-title">ลงทะเบียน</h1>
				<?= $content['form'] ?>
			</div>
			< class="form-contact">
				<div class="-line"></div>
				<div class="-txt"><?php pll_e('หรือ')?></div>
				<div class="-line"></div>
			</>
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
									<h2 class="form-title">ลงทะเบียน</h2>
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
									<h2 class="form-title">ลงทะเบียน</h2>
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
						<h2 class="form-title">ลงทะเบียน</h2>
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
							<h2 class="form-title">ลงทะเบียน</h2>
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
						<h2 class="form-title">ลงทะเบียน</h2>
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
<style type="text/css">
	.special-form-option {
		position: absolute;
		top: 4.5rem;
		left: 0;
		width: 100%;
		background: #fffd;
		z-index: 1000000;
		display: none;
		font-size: 22px;
		pointer-events: auto;
		font-weight: 400;
		line-height: 1.5;
		border-radius: 5px;
		color: #333;
		box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.35);
		backdrop-filter: blur(10px);
		padding: 6px 0;
	}
	.special-form-option .-o{
		padding: 10px;
	}
	.special-form-option .-o:hover{
		background-color: #0001;
	}
	.special-form-toggle{
		display: none !important;
	}
	.special-form-toggle:checked ~ .special-form-option{
		display: block;
	}
	.special-form-bg{
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		z-index: 10000;
		pointer-events: auto;
		display: none;
	}
	.special-form-toggle:checked ~ .special-form-bg{
		display: block;
	}

</style>
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
					o.innerText = '-- กรุณาเลือก --'
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

<?php theme_overide_style($content) ?>

<?php
switch ($template) {
	case 'modern':
	?>
	<style type="text/css">
		.form-title {
			color: var(--mc-main-4);
			-webkit-text-stroke: 0px;
			text-shadow: none;
		}

		.-rotate {
			display: none;
		}

		.form-template {
			background-image: url('');
		}

		#consent_label {
			color: black;
		}

		#form .form-column-2 label span,
		#form p {
			color: var(--text-color);
		}

		.form-template :is(.wpcf7-text,.wpcf7-date) {
			border: 0.5px solid var(--text-color);
			border-radius: 0;

		}

		.form-template :is(.wpcf7-text,.wpcf7-date):focus {
			border: 2px solid var(--mc-main-1);
		}

		.form-column-2 p label span {
			color: var(--text-color);
		}

		.form-column-2 label[data-filled="true"]>span {
			color: #202831;
			font-size: 22px;
			line-height: 28px;
			font-weight: 400;
		}

		.form-template .wpcf7-submit {
			border-radius: 4px;
			padding: 6px 85px;
		}

		.form-contact .-txt {
			color: var(--text-color);
		}

		.form-contact .-line {
			background: var(--text-color);
			width: calc(50% - 2rem);
		}

		.form-icon span.underline {
			text-decoration-line: underline;
		}

		.wpcf7-submit:hover {
			background: var(--mc-main-2);
		}

		div.col-span-6.flex span {
			color: var(--text-color);
		}

		.pr-25px {
			margin-right: 30px;
		}

		.pl-25px {
			margin-left: 15px;
		}

		.col-span-6>img {
			width: 90%;
			margin-top: 45px;
			box-shadow: 0px 60px 40px -40px #0006;
		}

		#form .grid.grid-cols-12.pt-6 {
			padding-bottom: 56px;
		}

		@media (max-width: 1319px) {
			.form-title {
				padding-top: 61px;
				font-weight: 400;
				font-size: 38px !important;
				line-height: 40px;
			}

			#form img.w-full {
				width: calc(100% - 32px);
				margin-top: 32px;
				margin-bottom: 24px;
				box-shadow: 0px 60px 40px -40px #0006;
			}
		}

		select.wpcf7-form-control.wpcf7-select{
			border: 0.5px solid var(--text-color);
			border-radius: 0;
		}
	</style>
	<?php
	break;





	case 'dynamic':
	?>
	<style type="text/css">
		.-rotate {
			display: none;
		}
		select.wpcf7-form-control.wpcf7-select{
			background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23ffffff88' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
		}
	</style>
	<?php
	break;




	case 'elegant':
	?>
	<style type="text/css">
		/*-- Mobile Version --*/
		@media (max-width: 1023px) {
			.form-pic-side{
				margin-top: 2rem;
			}
		}
		#consent_label {
			padding-top: 10px;
		}

		.img-height {
			height: 100%;
		}

		#form .container {
			max-width: 100% !important;
		}

		.form-contact .-line {
			background: var(--text-color);
		}

		.form-title {
			color: var(--mc-main-1);
			-webkit-text-stroke: 0;
			text-shadow: none;
			padding-bottom: 13px;
		}

		.form-template :is(.wpcf7-text,.wpcf7-date) {
			border-radius: 0px;
			border: 0px solid rgba(255, 255, 255, 0.3);
			border-bottom: 1px solid rgba(255, 255, 255, 0.3);
			;
		}

		.-rotate {
			display: none;
		}

		.form-template .wpcf7-submit {
			border-radius: 0px;
		}

		.-absolute.form_input_underline {
			bottom: 0;
			transition: none;
		}

		.form-template :is(.wpcf7-text,.wpcf7-date):focus {
			border: 0px solid rgba(255, 255, 255, 0.3);
			/*height: 0px;*/
		}

		.pr-25px {
			margin-right: 30px;
		}

		.pl-25px {
			margin-left: 15px;
		}

		.form-contact {
			align-items: unset;
		}
		select.wpcf7-form-control.wpcf7-select{
			border-radius: 0px;
			border: 0px solid rgba(255, 255, 255, 0.3);
			border-bottom: 1px solid rgba(255, 255, 255, 0.3);
			background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23ffffff88' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
		}

		/*-- Mobile Version --*/
		@media (max-width: 1319px) {
			#consent_label {
				margin-top: 22px;
			}

			.form-template .wpcf7-submit {
				width: 100%;
			}

			.form-contact .-line {
				width: calc(55% - 2em);
			}

			.form-title {
				font-size: 38px !important;
				line-height: 40px;
				padding-top: 44px;
			}

			.underline-m {
				text-decoration: underline;
			}
		}
	</style>
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
	<?php
	break;




	case 'delight':
	?>
	<style type="text/css">
		#form {
			padding-bottom: 0;
		}

		.form-contact-footer {
			padding-bottom: 36px;
		}

		.form-column-2 label>span {
			left: 0rem;
			white-space: nowrap;
		}

		.form-mob .container>img {
			padding-top: 1.5rem;
			padding: 0 1.5rem;
		}

		#consent_label {
			margin-top: 24px;
			padding-top: 20px;
		}

		.form-template .wpcf7-submit {
			padding: 6px 32px;
			font-weight: 400;
		}

		.pr-25px {
			margin-right: 30px;
		}

		.pl-25px {
			margin-left: 15px;
		}

		.form-mob {
			background-color: transparent !important;
		}

		.form-title {
			color: var(--mc-main-5);
			-webkit-text-stroke: 0;
			text-shadow: none;
			padding-bottom: 22px;
		}

		#form .form-column-2 label[data-filled="true"] span {
			color: var(--mc-main-1);
		}

		#form .form-column-2 label span,
		#form p {
			color: var(--mc-main-5);
		}

		.form-template :is(.wpcf7-text,.wpcf7-date) {
			border-radius: 0;
			padding: 6px 16px;
			background: transparent;
			border: 0;
			border-bottom: 1px solid var(--mc-main-5);
			backdrop-filter: none;
			transition: all .3s;
			height: 40px;
			font-weight: 400;
			font-size: 22px;
			line-height: 28px;
			width: 100%;
			padding-left: 0;
		}

		.form-template :is(.wpcf7-text,.wpcf7-date):focus {
			box-shadow: none;
		}

		.form-template :is(.wpcf7-text,.wpcf7-date):hover {
			background: transparent
		}

		.form-template :is(.wpcf7-text,.wpcf7-date):focus {
			border: 0;
			border-bottom: 1px solid var(--mc-main-5);
		}

		.form-template .wpcf7-submit {
			border-radius: 0;
		}

		.form-contact {
			color: var(--mc-main-5);
		}

		.form-contact .-line {
			height: 1px;
			background: var(--text-color);
			width: calc(40% - 2em);
		}

		#form .grid .grid-cols-12,
		#form .register_mobile_form {
			color: var(--mc-main-1);
		}

		.-rotate {
			block-size: auto;
			writing-mode: vertical-lr;
			position: absolute;
			height: 100%;
			top: 0;
			left: 50%;
			transform: rotateZ(180deg) translate(1rem);
			align-items: center;
		}

		.-rotate {
			display: flex;
			pointer-events: none;
			color: var(--mc-main-5);
		}

		.-rotate .-line {
			background: var(--mc-main-5);
			height: calc(45% - 2rem);
			width: 1px;
		}

		.-rotate .-txt {
			white-space: nowrap;
			padding-bottom: 4%;
			padding-top: 8%;
		}

		.col-span-6>img {
			width: 75%;
			margin-top: 70px;
		}

		#form .underline-m {
			text-decoration: underline;
		}

		@media (max-width: 1319px) {
			#form {
				padding-bottom: unset;
			}

			#consent_label {
				margin-top: 0;
				padding-top: 20px;
			}

			.form-title {
				font-weight: 400 !important;
				font-size: 38px !important;
				line-height: 40px !important;
				padding-top: 44px;
			}

			.form-template .wpcf7-submit {
				width: 100%;
			}

			.form-contact .-line {
				width: calc(50% - 1em);
			}

			#form .form-contact-footer {
				padding-top: 30px !important;
			}

			#form .underline-m {
				text-decoration: underline;
			}

			#form>div {
				padding-top: 20px;
			}

		}

		select.wpcf7-form-control.wpcf7-select{
			border-radius: 0;
			padding: 6px 16px;
			background-color: transparent;
			border: 0;
			border-bottom: 1px solid var(--mc-main-5);
			backdrop-filter: none;
			transition: all .3s;
			height: 40px;
			font-weight: 400;
			font-size: 22px;
			line-height: 28px;
			width: 100%;
			padding-left: 0;
		}

	</style>
	<?php
	break;
}
?>

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

<style type="text/css">
	#form .underline{
		text-decoration: none;
	}
</style>

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
<style type="text/css">
	#form form.wpcf7-form:where([data-status="submitting"],[data-status="sent"],[data-status="resetting"]) .wpcf7-submit {
		opacity: .5;
		pointer-events: none;
	}
	#form form.wpcf7-form:where([data-status="submitting"],[data-status="sent"],[data-status="resetting"]) .wpcf7-spinner {
		display: block !important;
		visibility: visible !important;
	}
</style>
<script type="text/javascript">
	setTimeout( function(){
		$( '.my-form form' ).on( 'reset', function(e) {
			e.preventDefault();
		});
	},500)
	// function checkLoadingForm(){
	// 	let el = $$('#form form');
	// 	for(let f of el){
	// 		if (f.dataset.status == `submitting` || f.dataset.status == `sent` || f.dataset.status == `resetting`) {
	// 			$('#contact-form .-body .-button').dataset.submit = 1
	// 		}else{
	// 			$('#contact-form .-body .-button').dataset.submit = 0
	// 		}
	// 	}
	// }
	// let form_submit_button = $$('.wpcf7-submit')
	// for(let bt of form_submit_button){
	// 	form_submit_button
	// }

	// setInterval(()=>{
	// 	if ($('.wpcf7-form').dataset.status == `submitting` || $('.wpcf7-form').dataset.status == `sent` || $('.wpcf7-form').dataset.status == `resetting`) {
	// 		$('#contact-form .-body .-button').dataset.submit = 1
	// 	}else{
	// 		$('#contact-form .-body .-button').dataset.submit = 0
	// 	}
	// },20)
</script>