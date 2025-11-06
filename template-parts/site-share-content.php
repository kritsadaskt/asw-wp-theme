<style>
	#page_contact {
		bottom: 1rem;
		right: 1rem;
		position: fixed;
		z-index: 10000;
		display: flex;
		flex-flow: column;
		flex-wrap: wrap;
		justify-content: center;
		align-items: center;
		pointer-events: none;
	}

	.chaty-widget {
		/*display: none;*/
	}

	#page_contact_show {
		width: 48px;
		display: flex;
		flex-direction: column;
		justify-content: end;
		align-items: center;
		background-color: #fff;
		color: #000;
		padding: 8px 0 20px;
		border-radius: 999px;
		margin-bottom: 75px;
		margin-right: 12px;
	}

	#page_contact_hide {
		position: absolute;
	}

	#page_contact_hide {
		bottom: 3rem;
		right: 1.5rem;
	}

	#page_contact_show,
	#page_contact_hide {
		transition: all .3s;
	}

	.contact_btn {
		cursor: pointer;
		width: 40px;
		height: 40px;
		border-radius: 100%;
		margin-bottom: 8px;
		transition: all .2s;
	}

	.contact_btn:hover {
		background-color: var(--ci-blue-300);
	}

	#page_contact[data-expand="1"] .is-expand,
	#page_contact[data-expand="-1"] .not-expand {
		opacity: 1;
		pointer-events: auto;

	}

	#page_contact[data-expand="-1"] .is-expand,
	#page_contact[data-expand="1"] .not-expand {
		opacity: 0;
		pointer-events: none;
	}

	#page_contact_hide {
		cursor: pointer;
		width: 42px;
		height: 42px;
		border-radius: 100%;
		background-color: rgba(29, 159, 155, 1);
		background-image: url('/wp-content/uploads/2023/06/share.png');
		background-size: 55%;
		background-position: center;
		background-repeat: no-repeat;
		right: 13px;
		bottom: 75px;
	}

	#page_contact[data-expand="1"] #page_contact_hide {
		right: 12px;
		bottom: 20px;
		width: 32px;
		height: 32px;
	}

	.contact_fb {
		background-image: url('/wp-content/uploads/2023/03/Logo.png');
		background-color: #fff;
		border: 1px solid rgba(84, 94, 103, 1);
		background-size: 10px;
		background-position: center;
		background-repeat: no-repeat;
		transition: all .3s;

	}

	.contact_twitter {
		background-image: url('/wp-content/uploads/2023/06/twitter.png');
		background-color: #fff;
		border: 1px solid rgba(84, 94, 103, 1);
		background-size: 17px;
		background-position: center;
		background-repeat: no-repeat;
		transition: all .3s;

	}

	.contact_ln {
		background-image: url('/wp-content/uploads/2023/03/Subtract.png');
		background-color: #fff;
		border: 1px solid rgba(84, 94, 103, 1);
		background-size: 22px;
		background-position: center;
		background-repeat: no-repeat;
		transition: all .3s;

	}

	.contact_fb:hover {
		background-image: url('/wp-content/uploads/2023/03/Artboard-2.png')
	}

	.contact_twitter:hover {
		background-image: url('/wp-content/uploads/2023/06/twitter.png')
	}

	.contact_ln:hover {
		background-image: url('/wp-content/uploads/2023/03/Artboard-3.png')
	}

	.contact_close {
		background-color: rgba(130, 138, 146, 1) !important;
		cursor: pointer;
		width: 32px;
		height: 32px;
		margin-top: 24px;
		margin-bottom: 0;
		background-image: url('/wp-content/uploads/2023/03/Group-889.png');
		background-size: 10px;
		background-position: center;
		background-repeat: no-repeat;

	}
</style>

<div id="page_contact" data-expand="-1">
	<div id="page_contact_show" class="page_contact_btn is-expand">
		<a href="http://www.facebook.com/share.php?u=<?php echo get_permalink();?>" target="_blank" class=""><div class="contact_btn contact_fb"></div></a>
		<a href="https://social-plugins.line.me/lineit/share?url=<?php echo get_permalink(); ?>" target="_blank" class=""><div class="contact_btn contact_ln"></div></a>
		<a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>" target="_blank" class=""><div class="contact_btn contact_twitter"></div></a>
		<div class="contact_btn contact_close" onclick="toggle_contact(-1)"></div>
	</div>
	<div id="page_contact_hide" class="page_contact_btn not-expand" onclick="toggle_contact(1)"></div>
</div>
<script type="text/javascript">
	function toggle_contact(v) {
		$('#page_contact').dataset.expand = v
	}
</script>