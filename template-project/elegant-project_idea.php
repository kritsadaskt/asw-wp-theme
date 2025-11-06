<?php
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
act_template_project_css($opt,$template_name,$layout);
$slide_size = 0;
if (is_array($content['idea'])) {
	$slide_size = ofsize($content['idea']);
}
?>
<section id="concept" class="is-on-nav is-on-nav-mob" data-slide-size="<?=$slide_size?>">
	<div class="idea-wraps">
		<?php
		foreach ($content['idea'] as $key => $v) {
			$bgd =  $v["background_image"]["sizes"]['1536x1536'];
			$bgm =  $v["background_image_mobile"]["sizes"]['1536x1536'];
			if ($bgm == '') {
				$bgm = $bgd;
			}
			?>
			<div class="idea-content <?= ($key == 0) ? '-active' : '' ?>">
				<div class="relative">
					<div class="bg-idea bg-cover absolute idea-elegant-img" style="--bg-d: url('<?= $bgd ?>');--bg-m:url('<?= $bgm ?>')"></div>
					<div class=" section-fade">
						<div class="idea-container container mx-auto">
							<h1 class="idea-elegant-title"><?= $v['title'] ?></h1>
							<div class="grid grid-cols-12 idea-elegant-body-wrap">
								<div class="idea-elegant-body md:col-span-7 xl:col-span-5">
									<div class="idea-elegant-subtitle py-4">
										<h2><?= $v['sub_title'] ?></h2>
									</div>
									<div class="sub-menu idea-elegant-body-text">
										<?= $v['description'] ?>
									</div>
									<sp style="height: 38px;"></sp>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php }
		?>
		<div class="-arr-wrap">
			<div class="-nav-wrap">
				<?php
				foreach ($content['idea'] as $key => $vv) {
					?>
					<div class="idea-nav -nav <?php if ($key == 0) {
						echo '-active';
					} ?>" onclick="ideaNavTo(<?= $key + 1 ?>)">
					<div></div>
				</div>
				<?php
			}
			?>
		</div>
		<div class="idea-arrow">
			<sp style="height: 20px;"></sp>
			<div class="flex flex-row ">
				<div class="facility-arrow -left" onclick="ideaNav(-1,this)"></div>
				<div class="facility-arrow" style="margin-left: 8px;" onclick="ideaNav(1,this)"></div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- For idea section -->
<script type="text/javascript">
	var chk_num_idea = 1

	function ideaNav(num, el) {
		let ideainfo = document.getElementsByClassName("idea-content")
		let ideanav = document.getElementsByClassName("idea-nav")
		let chk = 0
		for (let i of ideainfo) {
			chk++
		}
		// xconsolex.log(ideainfo)
		chk_num_idea += num
		if (chk_num_idea > chk) {
			chk_num_idea = 1
		} else if (chk_num_idea < 1) {
			chk_num_idea = chk
		}
		ideaNavTo(chk_num_idea)
	}

	function ideaNavTo(chk_num_idea) {
		let ideainfo = document.getElementsByClassName("idea-content")
		let ideanav = document.getElementsByClassName("idea-nav")

		for (let i of ideainfo) {
			i.classList.remove("-active")
		}
		for (i of ideanav) {
			i.classList.remove("-active")
		}

		ideainfo[chk_num_idea - 1].classList.add("-active")
		ideanav[chk_num_idea - 1].classList.add("-active")
	}
</script>

<script type="module">
	import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
	let el = $('.idea-wraps')
	let hammerTime = new Hammer(el);
	hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
	hammerTime.on("panend", function (ev) {

		let i = 0;
		var nav = $$('.idea-wraps .idea-nav');
		let max = nav.length;
		for(let b of nav){
			if (b.classList.contains('-active')) {
				break;
			}else{
				i++;
			}
		}


		let di = 0;
		if (ev.deltaX > 20) {
			di = -1;
		} else if (ev.deltaX < -20) {
			di = +1;
		}
		i = (((i+di)%max)+max)%max
		nav[i].click()

	})
</script>