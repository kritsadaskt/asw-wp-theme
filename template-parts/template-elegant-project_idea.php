<?php
$content = $args[0];
$f = $args[1];
$bg_color = $content['bg_color'];
?>
<!-- For idea section -->
<style type="text/css">
	.idea-wraps {
		position: relative;
		transition: all .5s linear;
		background-color: <?=$bg_color?>;
		width: 100%;
	}

	.idea-content {
		width: 100%;
		height: 640px;
		position: absolute;
		left: 0;
		top: 0;
		opacity: 0;
		z-index: 1;
		transition: .75s ease-out;
	}

	.idea-content.-active {
		opacity: 1;
		z-index: 2;
	}

	.bg-idea {
		--j: 0;
		position: absolute;
		width: 100%;
		height: 100%;
		transition: .5s;
		top: 0;
	}

	.idea-wraps .-arr-wrap {
		display: flex;
		flex-direction: column;
		position: absolute;
		z-index: 3;
		bottom: 84px;
		left: 18.5rem;
	}

	.idea-wraps .-arr-wrap .-nav-wrap {
		display: flex;
		justify-content: flex-start;
	}

	.idea-wraps .-arr-wrap .-nav-wrap .-nav {
		width: 40px;
		height: 16px;
		display: flex;
		align-items: center;
		margin: 0 3px;
		cursor: pointer;
		transition: .75s;
	}

	.idea-wraps .-arr-wrap .-nav-wrap .-nav div {
		width: 100%;
		height: 2px;
		background: var(--ci-grey-600);
		transition: .75s;
	}

	.idea-wraps .-arr-wrap .-nav-wrap .-nav.-active div {
		height: 4px;
		background: var(--mc-gd);
	}

	.idea-wraps .-arr-l {
		width: 48px;
		height: 48px;
		transition: .5s;
		margin: 0;
		cursor: pointer;
	}

	.idea-wraps .-arr-r {
		width: 48px;
		height: 48px;
		transition: .5s;
		margin: 0;
		cursor: pointer;
		transform: rotate(180deg);
		margin-left: 8px;
	}

	.idea-wraps .-arr-r:hover,
	.idea-wraps .-arr-l:hover {
		filter: brightness(150%);
	}
</style>


<style>
	#concept .sub-menu {
		color: var(--mc-main-3);
		/*max-height: calc(32px * 6);*/
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 5;
		-webkit-box-orient: vertical;
	}

	.facility-arrow {
		width: 48px;
		height: 48px;
		cursor: pointer;
		transition: .5s;
		background-image: var(--mc-arrow-up);
		background-repeat: no-repeat;
		background-size: contain;
		cursor: pointer;
		transition: .5s;
		transform: rotate(90deg);
	}

	.facility-arrow:hover {
		filter: brightness(120%);
		transition: .5s;
	}

	.facility-arrow.-left {
		transform: rotate(-90deg);
	}

	.idea-elegant-subtitle {
		color: var(--text-color);
		line-height: 48px;
	}

	.idea-elegant-body-wrap {
		height: 288px;
	}

	.idea-elegant-img {
		height: 640px;
		background-image: var(--bg-d);
	}

	.idea-elegant-body-wrap {
		opacity: 1;
		isolation: isolate;
	}

	.idea-elegant-title {
		color: var(--mc-main-3);
		isolation: isolate;
	}

	.idea-container {
		padding-top: 4rem;
		padding-left: 14rem;
		padding-bottom: 6rem;
	}

	.idea-wraps {
		height: 640px;
	}

	@media (max-width: 1024px) {
		.idea-container{
			padding:0 2rem;
			padding-top: 42px;
		}
		.idea-wraps .-arr-wrap{
			left: 2rem;
		}
	}

	@media (max-width: 767px) {

		.idea-elegant-img,
		.idea-wraps {
			height: 162vw;
		}

		.idea-elegant-img {
			background-image: var(--bg-m);
		}

		.idea-container {
			padding-left: 1rem;
			padding-right: 1rem;
			padding-top: 42px;
		}

		.idea-arrow {
			display: none;
		}

		.idea-wraps .-arr-wrap {
			position: absolute;
			right: unset;
			left: 1rem;
		}

		.idea-elegant-body {
			grid-column: 1 / span 12;
		}

		h1.idea-elegant-title {
			font-size: 38px;
		}

		.idea-elegant-subtitle h2 {
			font-size: 36px;
			line-height: 42px;
		}
	}

	section#concept[data-slide-size="1"] .-arr-wrap {
		display: none;
	}


</style>

<?php 
$slide_size = 0;
if (is_array($content['idea'])) {
	$slide_size = ofsize($content['idea']);
}
?>
<section id="concept" class="is-on-nav is-on-nav-mob" data-slide-size="<?=$slide_size?>">
	<div class="idea-wraps">
		<?php
		foreach ($content['idea'] as $key => $value) {
			$bgd =  $value["background_image"]["sizes"]['1536x1536'];
			$bgm =  $value["background_image_mobile"]["sizes"]['1536x1536'];
			if ($bgm == '') {
				$bgm = $bgd;
			}
			?>
			<div class="idea-content <?= ($key == 0) ? '-active' : '' ?>">
				<div class="relative">
					<div class="bg-idea bg-cover absolute idea-elegant-img" style="--bg-d: url('<?= $bgd ?>');--bg-m:url('<?= $bgm ?>')"></div>
					<div class=" section-fade">
						<div class="idea-container container mx-auto">
							<h1 class="idea-elegant-title"><?= $value['title'] ?></h1>
							<div class="grid grid-cols-12 idea-elegant-body-wrap">
								<div class="idea-elegant-body md:col-span-7 xl:col-span-5">
									<div class="idea-elegant-subtitle py-4">
										<h2><?= $value['sub_title'] ?></h2>
									</div>
									<div class="sub-menu idea-elegant-body-text">
										<?= $value['description'] ?>
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
				foreach ($content['idea'] as $key => $value) {
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
<?php theme_overide_style($content) ?>