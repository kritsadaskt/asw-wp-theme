<?php
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
act_template_project_css($opt,$template_name,$layout);
// pre($content);
$mtp_gll = $content['multiple_gallery'];
?>
<script>
	function gallery_change() {
		xconsolex.log()
		let section = document.querySelector('.gallery-rail')
		let i = document.querySelector('#gallery')
		i.style.setProperty('--i', i.dataset.i)
        // section.style.setProperty('--i', section.dataset.i)
    }

    function gallery_arrow(plus) {
    	let section = document.querySelector('.gallery-rail')
    	let i = document.querySelector('#gallery')

    	let end = parseInt(section.dataset.max)
    	let now = parseInt(i.dataset.i)
    	let next = now + plus

    	let arrow_right = document.querySelector('.gallery-arrow-right');
    	let arrow_left = document.querySelector('.gallery-arrow-left');

    	xconsolex.log('next a', next)
        // gallery.dataset.i = next

        if (next < 0) {
        	next = end

        } else if (next > end) {
        	next = 0
        }
        xconsolex.log('next', next, 'end', end)

        if (next >= 0 && next <= end) {
        	arrow_right.classList.remove('-active');
        	arrow_left.classList.remove('-active');
        }
        if (next == end) {
        	arrow_right.classList.add('-active');
        	section.dataset.end = '1';
        	i.dataset.end = '1';
        } else {
        	section.dataset.end = '0';
        	i.dataset.end = '0';
        }
        if (next == 0) {
        	arrow_left.classList.add('-active');
        }
        i.dataset.i = next

        gallery_change()
    }

    function gallery_mobile(plus) {
    	let section = document.querySelector('.gallery-m-wrap .gallery-rail')
    	let i = document.querySelector('#gallery')

    	let end = parseInt(section.dataset.max)
    	let now = parseInt(i.dataset.i)

    	let navAll = document.querySelectorAll('.gallery-nav-dot')
    	let nav = document.querySelector('.gallery-nav-dot.-active');

    	xconsolex.log('next a', plus)
    	xconsolex.log('nav', navAll[plus])

    	nav.classList.remove('-active');
    	navAll[plus].classList.add('-active');
    	i.dataset.i = plus
    	section.dataset.end = 0;
    	if (plus + 1 == end) {
    		section.dataset.end = 1;
    	}
    	gallery_change()
    }
</script>
<section id="gallery" data-i="0" class="is-on-nav is-on-nav-mob" style="--i:0; --g: <?= ceil(ofsize($content['gallery']) / 3) ?>;">
	<div class="-cont-pd py-10 section-fade gallery-main-wrap">
		<div class="container mx-auto relative">
			<h1 class="text-center"><?php pll_e('แกลเลอรี')?></h1>

			<!-- <div class="gallery-ast">
				<img src="/wp-content/uploads/2023/03/la-galleria.png" alt="">
			</div> -->
		</div>
		<div class="gallery-wrap">
			<?php switch (ofsize($content['gallery'])):
				case 1:
				?>
				<style>
					.gallery-group {
						width: calc(var(--container) * 0.8);
						aspect-ratio: 905/505;
					}

					.gallery-group-item {
						display: block;
					}
				</style>
				<div class="gallery-norail cont-pd">
					<div class="gallery-group">
						<div class="gallery-group-item">
							<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content["gallery"][0]['url'] ?>);"></div>
						</div>
					</div>
				</div>
				<!-- </div> -->
				<?php
				break;
				case 2:
				?>
				<style>
					.gallery-nav-wrap {
						--g: 2;
						--max: <?= ceil((ofsize($content['gallery']) / 3)) ?>;
					}

					.gallery-nav-line-bar {
						width: calc(50% / (var(--max)));
						left: calc(50% / (var(--max)) * var(--i));
					}

					.gallery-rail {
                            /*width: calc(140% * var(--g));
            transform: translateX(calc((var(--container) * -0.45 * var(--i)) - var(--i) * 0.7rem));
            */
            --w: calc(var(--container) * var(--g) / (100/85));
            width: var(--w);
        }

        .gallery-rail[data-end="1"] {
        	left: 207px;
        }

        .gallery-group-items {
        	width: 100%;
        	display: grid;
        	gap: 20px;
        	grid-template-columns: repeat(1, 1fr);
        	grid-template-rows: repeat(1, 1fr);
        }
    </style>
    <div class="gallery-rail" data-end="0" data-end="" data-i="0" data-max="<?= ceil((ofsize($content['gallery']) / 3)) ?>" style="--g:2; --max: <?= ceil((ofsize($content['gallery']) / 3)) ?>;--shift:<?= $shift ?> ">
    	<div class="gallery-group-items">
    		<div class="gallery-group-item">
    			<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][0]['url'] ?>);"></div>
    		</div>
    	</div>
    	<div class="gallery-group-items">
    		<div class="gallery-group-item">
    			<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][1]['url'] ?>);"></div>
    		</div>
    	</div>
    </div>
    <?php
    break;
    case 3:
    ?>
    <style>
    	.gallery-nav-wrap {
    		--g: <?= ceil(ofsize($content['gallery']) / 3) ?>;
    		--max: <?= ceil((ofsize($content['gallery']) / 3)) ?>;
    	}

    	.gallery-nav-line-bar {
    		width: calc(50% / (var(--max)));
    		left: calc(50% / (var(--max)) * var(--i));
    	}

    	.gallery-rail {
    		/*width: calc(115% * var(--g));*/
    		--w: calc(var(--container) * var(--g) / (100/62));
    		width: var(--w);
    		/*transform: translateX(calc((var(--container) * -0.25 * var(--i)) - var(--i) * -6.2rem));*/
    		/*transform: translateX(calc(var(--i) * var(--b) * -1));*/
    	}

    	.gallery-rail[data-end="1"] {
    		left: 592px;
    	}

    	.gallery-group-items:nth-child(2) {
    		width: 100%;
    		grid-template-columns: repeat(3, 1fr);
    		grid-template-rows: repeat(3, 1fr);
    	}

    	.gallery-group-items:nth-child(1) {
    		width: 200%;
    		display: grid;
    		gap: 20px;
    		grid-template-columns: repeat(3, 1fr);
    		grid-template-rows: repeat(3, 1fr);
    	}

    	.gallery-group-item {
    		grid-column: span 3;
    		grid-row: span 3;
    	}
    </style>
    <div class="gallery-rail" data-end="0" data-i="0" data-max="<?= ceil((ofsize($content['gallery']) / 3)) ?>" style="--g:2 ;--max: <?= ceil((ofsize($content['gallery']) / 3)) ?>; ">
    	<div class="gallery-group-items">
    		<div class="gallery-group-item">
    			<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][0]['url'] ?>);"></div>
    		</div>
    	</div>
    	<div class="gallery-group-items">
    		<div class="gallery-group-item">
    			<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][1]['url'] ?>);"></div>
    		</div>
    		<div class="gallery-group-item">
    			<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][2]['url'] ?>);"></div>
    		</div>
    	</div>
    </div>
    <?php
    break;
    case 4:
    ?>
    <style>
    	.gallery-nav-wrap {

    		--max: <?= ceil((ofsize($content['gallery']) / 3 - 1)) ?>;
    	}

    	.gallery-nav-line-bar {
    		width: calc(50% / (var(--max)));
    		left: calc(50% / (var(--max)) * var(--i));
    	}

    	.gallery-rail {
    		--w: calc(var(--container) * var(--g) / (100/70));
    		width: var(--w);
                            /* width: calc(120% * var(--g));
                            transform: translateX(calc((var(--container) * -0.25 * var(--i)) - var(--i) * -1.7rem)); */
                        }

                        .gallery-rail[data-end="1"] {
                        	left: 400px;
                        }

                        .gallery-group-items:nth-child(1) {
                        	width: 100%;
                        	grid-template-rows: repeat(1, 1fr);
                        }

                        .gallery-group-items:nth-child(2) {
                        	width: 150%;
                        	display: grid;
                        	gap: 20px;
                        	grid-template-columns: repeat(1, 1fr);
                        	grid-template-rows: repeat(1, 1fr);
                        }

                        .gallery-group-items:nth-child(1) .gallery-group-item:nth-child(1) {
                        	grid-column: span 6 / span 6;
                        }
                    </style>
                    <div class="gallery-rail" data-end="0" data-i="0" data-max="<?= ceil((ofsize($content['gallery']) / 3 - 1)) ?>" style="--g:2; --max: <?= ceil((ofsize($content['gallery']) / 3 - 1)) ?>; ">
                    	<div class="gallery-group-items">
                    		<div class="gallery-group-item">
                    			<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][0]['url'] ?>);"></div>
                    		</div>
                    		<div class="gallery-group-item">
                    			<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][1]['url'] ?>);"></div>
                    		</div>
                    		<div class="gallery-group-item">
                    			<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][2]['url'] ?>);"></div>
                    		</div>
                    	</div>
                    	<div class="gallery-group-items">
                    		<div class="gallery-group-item">
                    			<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][3]['url'] ?>);"></div>
                    		</div>
                    	</div>
                    </div>
                    <?php
                    break;
                    case 5:
                    ?>
                    <style>
                    	.gallery-group {
                    		width: calc(var(--container) * 0.9);
                    		display: grid;
                    		gap: 20px;
                    		grid-template-columns: repeat(12, 1fr);
                    	}

                    	.gallery-group-items:nth-child(1) {
                    		grid-column: span 7;
                    		display: grid;
                    		grid-template-columns: repeat(6, 1fr);
                    		grid-template-rows: repeat(3, 1fr);
                    	}

                    	.gallery-group-items:nth-child(1) .gallery-group-item:nth-child(1) {
                    		grid-column: span 6;
                    		grid-row: span 3;
                    	}

                    	.gallery-group-items:nth-child(2) {
                    		grid-column: span 5;
                    		display: grid;
                    		grid-template-columns: repeat(1, 1fr);
                    		grid-template-rows: repeat(1, 1fr);
                    	}

                    	.gallery-group-items:nth-child(2) .gallery-group-item {
                    		grid-column: span 1;
                    	}
                    </style>
                    <div class="gallery-norail">
                    	<div class="gallery-group">
                    		<div class="gallery-group-items">
                    			<div class="gallery-group-item">
                    				<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][0]['url'] ?>);"></div>
                    			</div>
                    			<div class="gallery-group-item">
                    				<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][1]['url'] ?>);"></div>
                    			</div>
                    			<div class="gallery-group-item">
                    				<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][2]['url'] ?>);"></div>
                    			</div>
                    		</div>
                    		<div class="gallery-group-items">
                    			<div class="gallery-group-item">
                    				<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][3]['url'] ?>);"></div>
                    			</div>
                    			<div class="gallery-group-item">
                    				<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][4]['url'] ?>);"></div>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                    <?php
                    break;
                    case 6:
                    ?>
                    <style>
                    	.gallery-group {
                    		width: calc(var(--container) * 0.9);
                    		display: grid;
                    		gap: 20px;
                    		grid-template-columns: repeat(12, 1fr);
                    	}

                    	.gallery-group-items:nth-child(1) {
                    		grid-column: span 6;
                    		display: grid;
                    		grid-template-columns: repeat(6, 1fr);
                    		grid-template-rows: repeat(3, 1fr);
                    	}

                    	.gallery-group-items:nth-child(1) .gallery-group-item:nth-child(1) {
                    		grid-column: span 6;
                    		grid-row: span 3;
                    	}

                    	.gallery-group-items:nth-child(2) {
                    		grid-column: span 6;
                    		display: grid;
                    		grid-template-columns: repeat(6, 1fr);
                    		grid-template-rows: repeat(3, 1fr);
                    	}

                    	.gallery-group-items:nth-child(2) .gallery-group-item:nth-child(3) {
                    		grid-column: span 6;
                    		grid-row: span 3;
                    	}

                    	.gallery-group-items:nth-child(2) .gallery-group-item {
                    		grid-column: span 3;
                    	}
                    </style>
                    <div class="gallery-norail">
                    	<div class="gallery-group">
                    		<div class="gallery-group-items">
                    			<div class="gallery-group-item">
                    				<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][0]['url'] ?>);"></div>
                    			</div>
                    			<div class="gallery-group-item">
                    				<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][1]['url'] ?>);"></div>
                    			</div>
                    			<div class="gallery-group-item">
                    				<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][2]['url'] ?>);"></div>
                    			</div>
                    		</div>
                    		<div class="gallery-group-items">
                    			<div class="gallery-group-item">
                    				<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][3]['url'] ?>);"></div>
                    			</div>
                    			<div class="gallery-group-item">
                    				<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][4]['url'] ?>);"></div>
                    			</div>
                    			<div class="gallery-group-item">
                    				<div class="gallery-img jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= $content['gallery'][5]['url'] ?>);"></div>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                    <?php
                    break;
                    default:
                    $shift_a = '67px';
                    $shift_b = '377px';
                    $shift = $shift_a;
                    $count = ceil(ofsize($content['gallery']));

                    if ($count % 6 == 4) {
                    	$shift = $shift_b;
                    }
                    ?>
                    <style>
                    	.gallery-nav-wrap {
                    		--g: <?= ceil(ofsize($content['gallery']) / 3) ?>;
                    		--max: <?= ceil((ofsize($content['gallery']) / 3) - 2) ?>;
                    	}
                    </style>


                    <div class="gallery-rail" data-end="0" data-max="<?= ceil((ofsize($content['gallery']) / 3) - 2) ?>" style="--g:<?= ceil(ofsize($content['gallery']) / 3) ?>; --max: <?= ceil((ofsize($content['gallery']) / 3) - 2) ?>;--shift:<?= $shift ?> ">
                    	<?php
                    	$round = 0;
                    	$ood;
                    	foreach ($content['gallery'] as $key => $value) :
                    		$odd = ($round % 3);
                    		$round += 1; ?>
                    		<?php if ($round == 1) : ?>
                    			<div class="gallery-group col-span-6 inline-block">
                    				<div class="gallery-group-items gap-4">
                    				<?php endif ?>
                    				<?php if ($round % 3 == 1) : ?>
                    					<div data-i="<?= $odd ?>" class="gallery-group-item">
                    						<?php else : ?>
                    							<div data-i="<?= $odd ?>" class="gallery-group-item">
                    							<?php endif ?>
                    							<div class=" bg-cover gallery-img jb-lightbox" data-jb-lightbox="m" style="--img: url(<?= $value['url'] ?>);"></div>
                    						</div>
                    						<?php if ($round % 3 == 0 && $round != 0 && $round != ofsize($content['gallery'])) : ?>
                    						</div>
                    					</div>
                    					<div class="gallery-group col-span-6 inline-block w-1/2">
                    						<div class="gallery-group-items gap-4">
                    						<?php endif ?>
                    						<?php if ($round == ofsize($content['gallery'])) : ?>
                    						</div>
                    					</div>
                    				<?php endif ?>
                    			<?php endforeach ?>
                    		</div>
                    	</div>
                    	<?php
                    	break;
                    endswitch;
                    ?>
                </div>

                <div class="gallery-nav-wrap">
                	<?php
                	$check = (ofsize($content['gallery']) != 1 && ofsize($content['gallery']) != 5 && ofsize($content['gallery']) != 6) ? true : false;
            // pre($check);
                	if ($check) :
                		?>
                		<div class="gallery-arrow-right" onclick="gallery_arrow(1)" style="background-image:var(--mc-arrow-up)" alt=""></div>
                		<div class="gallery-arrow-left -active" onclick="gallery_arrow(-1)" style="background-image:var(--mc-arrow-up)" alt=""></div>

                		<div class="relative">
                			<div id="gallery-nav">
                				<div class="gallery-nav-line">
                					<div class="gallery-nav-line-bg"></div>
                					<div class="gallery-nav-line-bar"></div>
                				</div>
                			</div>
                			<?php else : ?>
                				<div class="relative">
                				<?php endif ?>
                				<div class="gallery-hightlight flex items-center gap-4 ">
                					<div class="hightlight whitespace-nowrap" style="color: var(--text-color)">
                						<?= $content['under_section_text'] ?>
                					</div>
                					<sp class="gallery-line"></sp>
                				</div>
                			</div>
                		</div>

                		<style>
                			@media (max-width: 1319px) {

                				.gallery-wrap,
                				.gallery-nav-wrap {
                					display: none;
                				}

                				.gallery-m-wrap,
                				.gallery-nav-m-wrap {
                					display: block;
                				}

                				.gallery-nav-m-wrap {
                					padding: 0.75rem 0;
                				}

                				.gallery-rail {
                					width: calc(90% * var(--g));
                					transform: translateX(calc((var(--container) * -0.26 * var(--i)) - var(--i) * 1px));
                					padding-left: 1rem;
                					--mg: 1rem
                				}

                				.gallery-group-items {
                					gap: 8px;
                				}

                				.gallery-hightlight {
                					top: 2rem;
                					width: 90%;
                					position: absolute;
                					left: 1rem;
                				}

                				#gallery-m-nav {
                					padding-top: 1rem;
                					display: inline-flex;
                					justify-content: center;
                					align-items: center;
                				}

                				.gallery-nav-dot {
                					width: 8px;
                					height: 8px;
                					background: #FFFFFF;
                					box-shadow: inset 0px 1px 4px rgb(0 0 0 / 25%);
                					border-radius: 100%;
                					margin-right: 12px;
                					transition: all .3s ease-in-out;
                					cursor: pointer;
                				}

                				.gallery-nav-dot.-active {
                					background: #003952 !important;
                					width: 20px !important;
                					border-radius: 27px !important;
                				}

                				.gallery-norail {
                					padding-top: 0;
                					padding-bottom: 0;
                					display: flex;
                					justify-content: center;
                				}
                			}
                		</style>
                		<div class="gallery-m-wrap">
                			<?php switch (ofsize($content['gallery'])):
                				case 1:
                				?>
                				<style>
                					@media (max-width: 1319px) {
                						.gallery-group-item {
                							margin-top: 2rem;
                							margin-bottom: 2rem;
                						}

                						.gallery-hightlight {
                							/* top: -2rem; */
                							top: -0.5rem;
                						}
                					}
                				</style>
                				<div class="gallery-norail -cont-pd">
                					<div class="gallery-group">
                						<div class="gallery-group-item">
                							<div class="gallery-img jb-lightbox" data-jb-lightbox="m" style="--img: url(<?= $content["gallery"][0]['url'] ?>);"></div>
                						</div>
                					</div>
                				</div>
                				<?php
                				break;
                				case 2:
                				?>
                				<style>
                					@media (max-width: 1319px) {
                						.gallery-group-item {
                							padding-top: 0rem;
                							padding-bottom: 0rem;
                						}

                						.gallery-hightlight {
                							top: -2rem;
                						}

                						.gallery-norail {

                							margin-top: 2rem;
                							margin-bottom: 4rem;
                							gap: 0.5rem;
                							flex-wrap: wrap;
                						}
                					}
                				</style>
                				<div class="gallery-norail -cont-pd">
                					<div class="gallery-group">
                						<div class="gallery-group-item">
                							<div class="gallery-img jb-lightbox" data-jb-lightbox="m" style="--img: url(<?= $content["gallery"][0]['url'] ?>);"></div>
                						</div>
                					</div>
                					<div class="gallery-group">
                						<div class="gallery-group-item">
                							<div class="gallery-img jb-lightbox" data-jb-lightbox="m" style="--img: url(<?= $content["gallery"][1]['url'] ?>);"></div>
                						</div>
                					</div>
                				</div>
                				<?php
                				break;
                				case 3:
                				?>
                				<style>
                					@media (max-width: 1319px) {

                						.gallery-m-wrap {
                							padding-top: 2rem;
                							padding-bottom: 2rem;
                						}

                						.gallery-group {
                							display: grid;
                							grid-template-columns: repeat(12, 1fr);
                							grid-template-rows: repeat(2, 1fr);
                							gap: 8px;
                						}

                						.gallery-group-item:nth-child(1) {
                							grid-column: span 12;
                						}

                						.gallery-group-item {
                							grid-column: span 6;
                						}

                						.gallery-hightlight {
                							top: -0.75rem;
                						}
                					}
                				</style>
                				<div class="gallery-norail -cont-pd">
                					<div class="gallery-group">
                						<div class="gallery-group-item">
                							<div class="gallery-img jb-lightbox" data-jb-lightbox="m" style="--img: url(<?= $content["gallery"][0]['url'] ?>);"></div>
                						</div>
                						<div class="gallery-group-item">
                							<div class="gallery-img jb-lightbox" data-jb-lightbox="m" style="--img: url(<?= $content["gallery"][1]['url'] ?>);"></div>
                						</div>
                						<div class="gallery-group-item">
                							<div class="gallery-img jb-lightbox" data-jb-lightbox="m" style="--img: url(<?= $content["gallery"][2]['url'] ?>);"></div>
                						</div>
                					</div>
                				</div>
                				<?php
                				break;
                				default:
                				$shift_a = 'calc(7.7vw - 1rem)';
                				$shift_b = 'calc(var(--w-g) / 2 - 8px + 1rem)';
                				$shift = $shift_a;

                				if ((ofsize($content['gallery'])) % 6 == 4) {
                					$shift = $shift_b;
                				}


                				?>
                				<style>
                					@media (max-width: 1319px) {

                						.gallery-rail {
                							--w-g: 90vw;
                							--shift: 0;
                							width: calc(var(--w-g)* var(--g));
                							transform: translateX(calc(-1 * var(--i)* var(--w-g) + 8px));
                							padding-left: 0rem;
                							padding-top: 1rem;
                							padding-bottom: 0rem;
                							left: var(--shift);
                						}

                						.gallery-rail[data-end="1"] {
                							--shift: <?= $shift ?>;
                						}

                						.gallery-group-items:nth-child(1) {
                							grid-column: span 6;
                							display: grid;
                							grid-template-columns: repeat(6, 1fr);
                							grid-template-rows: repeat(3, 1fr);
                						}

                						.gallery-group-items:nth-child(1) .gallery-group-item:nth-child(1) {
                							grid-column: span 3;
                							grid-row: span 1;
                						}

                						.gallery-group {
                							width: var(--w-g);
                							grid-template-columns: repeat(6, 1fr);
                						}
                					}
                				</style>
                				<div class="gallery-rail" data-end="0" data-max="<?= ceil((ofsize($content['gallery']) / 3)) ?>" style="--g:<?= ceil(ofsize($content['gallery']) / 3) ?>; --max: <?= ceil((ofsize($content['gallery']) / 3)) ?>;">
                					<?php
                					$round = 0;
                					$ood;
                					foreach ($content['gallery'] as $key => $value) :
                						$odd = ($round % 3);
                						$round += 1; ?>
                						<?php if ($round == 1) : ?>
                							<div class="gallery-group col-span-6 inline-block">
                								<div class="gallery-group-items gap-4">
                								<?php endif ?>
                								<?php if ($round % 3 == 1) : ?>
                									<div data-i="<?= $odd ?>" class="gallery-group-item">
                										<?php else : ?>
                											<div data-i="<?= $odd ?>" class="gallery-group-item">
                											<?php endif ?>
                											<div class=" bg-cover gallery-img jb-lightbox" data-jb-lightbox="m" style="--img: url(<?= $value['url'] ?>);"></div>
                										</div>
                										<?php if ($round % 3 == 0 && $round != 0 && $round != ofsize($content['gallery'])) : ?>
                										</div>
                									</div>
                									<div class="gallery-group col-span-6 inline-block">
                										<div class="gallery-group-items gap-4">
                										<?php endif ?>
                										<?php if ($round == ofsize($content['gallery'])) : ?>
                										</div>
                									</div>
                								<?php endif ?>
                							<?php endforeach ?>
                						</div>
                						<?php
                						break;
                					endswitch; ?>
                				</div>
                				<div class="gallery-nav-m-wrap">
                					<?php
                					$check = (ofsize($content['gallery']) > 3) ? true : false;
                                // pre($check);
                					if ($check) :
                						?>
                						<div class="relative text-center">
                							<div id="gallery-m-nav">
                								<?php foreach (range(0, ceil((ofsize($content['gallery']) / 3) - 1)) as $key) : ?>
                									<div class="gallery-nav-dot <?= ($key == 0) ? '-active' : '' ?>" onclick="gallery_mobile(<?= $key ?>)"></div>
                								<?php endforeach; ?>
                							</div>
                							<?php else : ?>
                								<div class="relative">
                								<?php endif ?>
                								<div class="gallery-hightlight flex items-center gap-4 ">
                									<div class="hightlight whitespace-nowrap">
                										<?= $content['under_section_text'] ?>
                									</div>
                									<sp class="gallery-line"></sp>
                								</div>
                							</div>
                						</div>


                					</div>
                				</section>
                				<script type="module">
                					import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
                					let el = $('.gallery-m-wrap')
                					let hammerTime = new Hammer(el);
                					hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
                					hammerTime.on("panend", function (ev) {

                						let i = 0;
                						var nav = $$('#gallery .gallery-nav-dot');
                						let max = nav.length;
                						for(let b of nav){
                							if (b.classList.contains('-active')) {
                								break;
                							}else{
                								i++;
                							}
                						}
                						xconsolex.log(i)
                						xconsolex.log(max)

                						let di = 0;
                						if (ev.deltaX > 20) {
                							di = -1;
                						} else if (ev.deltaX < -20) {
                							di = +1;
                						}
                						i = (((i+di)%max)+max)%max
                						xconsolex.log('new i',i)
                						nav[i].click()

                					})
                				</script>