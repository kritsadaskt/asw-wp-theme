<?php 
get_header();
?>
<style type="text/css">
	@media (min-width: 1280px){
		.cont,.container {
			max-width: 1312px !important;
			padding-left: 0;
			padding-right: 0;
		}
	}
</style>

<style type="text/css">
	.pj-unit{
		background: var(--white, #FFF);
		position: relative;
	}
	.pj-unit .-header{
		background-color: #eee;
		padding-top: 55.26%;
		background-size: cover;
		background-position: center;
		position: relative;
	}
	.pj-unit .-detail{
		border: 1px solid var(--grey-grey-800, #DFE3E8);
		border-top: 0;
		padding-bottom: 80px;
	}
	.pj-unit .-info{
		padding: 1rem;
	}
	.pj-unit .-action{
		display: grid;
		grid-template-columns: 1fr 1fr;
		gap: 8px;
		background: var(--blue-blue-900, #F3F9FF);
		padding: 1rem;
		position: absolute;
		width: 100%;
		bottom: 0;
		left: 0;
		border: 1px solid var(--grey-grey-800, #DFE3E8);
		border-top: 0;
	}
	.pj-unit .-action .-btn-2{
		display: flex;
		height: 48px;
		padding: 8px;
		justify-content: center;
		align-items: center;
		flex-shrink: 0;
		border-radius: 8px;
		background: var(--blue-blue-300-main, #123F6D);
		color: #fff;
	}
	.pj-unit .-action .-btn-2[href="#!"] {
		background: var(--grey-grey-700, #CFD4D9);
		pointer-events: none;
	}
	.pj-unit .-action .-btn-1{
		display: flex;
		height: 48px;
		padding: 8px;
		justify-content: center;
		align-items: center;
		flex-shrink: 0;
		color: var(--blue-blue-300-main, #123F6D);
	}
	.pj-unit .-about .-img{
		height: auto;
		width: 160px;
		margin-top: 94px;
	}
	.pj-unit .-about .-btn{
		border-radius: 8px;
		border: 1px solid var(--blue-blue-700, #B7CDE4);
		background: var(--white, #FFF);
		display: inline-flex;
		padding: 8px 16px;
		align-items: flex-start;
		gap: 4px;
		color: var(--blue-blue-300-main, #123F6D);
		text-align: center;
		font-size: 26px;
		font-style: normal;
		font-weight: 400;
		line-height: 32px; 
	}
	.pj-unit .-about {
		padding: .5rem;
		text-align: center;
	}
	.pj-unit .-about .-pj-status{
		font-size: 18px;
		font-style: normal;
		font-weight: 700;
		line-height: 20px; 
		margin-bottom: 20px;
		display: block;
	}

	.pj-about-term{
		display: flex;
		flex-flow: row;
		gap: 1.5rem;
		margin-bottom: 1rem;
		justify-content: center;
		font-size: 22px;
		font-style: normal;
		font-weight: 400;
		line-height: 28px; 
		color: var(--grey-grey-100, #202831);
	}
	.pj-about-term > div{
		display: flex;
		flex-flow: row;
		gap: .5rem;
		justify-content: center;
	}
	.pj-about-term .-a{
	}
	.pj-about-term .-b{
	}

	.pj-unit .-title{
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 30px;
		font-style: normal;
		font-weight: 500;
		line-height: 32px;
	}
	.pj-unit .--line{
		background: #DFE3E8;
		width: 100%;
		height: 1px;
		margin: 8px 0;
	}
	.pj-unit .--room-detail{
		display: flex;
		flex-flow: row;
		gap: 24px;
	}
	.pj-unit .--room-detail > div{
		display: flex;
		flex-flow: row;
		gap: .5rem;
		justify-content: center;
		align-items: center;
	}

	.pj-unit .-overall-price .-book-price {
		color: var(--veridian-veridian-400-main, #1D9F9B);
		text-align: right;
		font-size: 26px;
		font-style: normal;
		font-weight: 500;
		line-height: 32px;
	}
	.pj-unit .-overall-price .-sell-price {
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 22px;
		font-style: normal;
		font-weight: 500;
		line-height: 28px;
	}
	.pj-unit .-overall-price .-full-price {
		color: var(--grey-grey-400, #828A92);
		font-size: 20px;
		font-style: normal;
		font-weight: 400;
		line-height: 28px;
		position: relative;
		margin-right: 0.5rem;
		display: inline-block;
	}
	.pj-unit .-overall-price .-full-price::after {
		content: " ";
		position: absolute;
		height: 1px;
		width: calc(100% + 6px);
		background: var(--grey-grey-400, #828A92);
		display: block;
		top: 0.6em;
		left: -3px;
	}
	.pj-unit .-overall-price {
		display: grid;
		grid-template-columns: 1fr 1fr;
		gap: 1rem;
		align-items: flex-end;
		margin-top: 1rem;
		height: 56.25px;
	}
	.pj-unit .-header .-viewplan{
		padding: 8px;
		border-radius: 8px;
		background: rgba(0, 0, 0, 0.60);
		position: absolute;
		width: 36px;
		height: 36px;
		display: flex;
		justify-content: center;
		align-items: center;
		cursor: pointer;
		top: 8px;
		right: 8px;
	}
	.pj-unit[data-status="2"] .-overall-price {
		display: flex;
		justify-content: flex-end;
	}
	.pj-unit .-sold-out{
		display: none;
	}
	.pj-unit[data-status="2"] .-sold-out{
		border-radius: 32px;
		border: 1px solid var(--error, #E24646);
		color: var(--error, #E24646);
		font-size: 22px;
		font-style: normal;
		font-weight: 400;
		line-height: 28px;
		display: inline-flex;
		padding: 0 8px;
		justify-content: center;
		align-items: center;
	}
	.pj-unit[data-status="2"] .-unit-price,
	.pj-unit[data-status="2"] .-book-price{
		display: none;
	}
	.pj-unit[data-status="2"] .-action .-btn-1 {
		color: var(--grey-grey-500, #9FA5AB);
		pointer-events: none;
	}
	.pj-unit[data-status="2"] .-action .-btn-2 {
		background: var(--grey-grey-700, #CFD4D9);
		pointer-events: none;
	}
	
	.price-remark{
		margin-left: 2px;
	}
</style>

<style type="text/css">
	
	.pj-unit-wrap .-units{
		display: grid;
		grid-template-columns: repeat(4, 1fr);
		grid-gap: 2rem;
	}
</style>

<style type="text/css">
	div#header-nav-items {
		display: none;
	}
	.site-branding img {
		width: 99px;
		height: auto;
	}
	.site-header, .site-header-space {
		height: 48px;
		min-height: 48px;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.left-header-buffer {
		display: flex;
	}
	.site-right-bar,.site-left-bar{
		grid-column: span 1/ span 1;
	}
	.header-layout{
		display: grid;
		grid-template-columns: 1fr auto 1fr;
		grid-template-rows: 1fr;
		align-items: center;
	}
	#header-nav .-nav-mob{
		display: none;
	}
</style>

<style type="text/css">
	section#header-nav {
		position: sticky;
		top: 48px;
		z-index: 1000;
		height: 72px;
		flex-shrink: 0;
		border-bottom: 1px solid var(--grey-grey-600, #BFC4C8);
		background: var(--white, #FFF);
	}
	body{
		overflow: unset;
	}
	.header-nav-inner{
		display: grid;
		grid-template-columns: 130px calc(100% - 2rem - 260px) 130px;
		align-items: center;
		grid-gap: 1rem;
		height: 72px;
	}
	#header-nav .-btn{
		display: inline-flex;
		padding: 8px 34px;
		justify-content: center;
		align-items: center;
		gap: 8px;
		width: 130px;
		color: var(--white, #FFF);
		text-align: center;
		font-size: 26px;
		font-style: normal;
		font-weight: 400;
		line-height: 32px;
		border-radius: 8px;
		background: var(--blue-blue-300-main, #123F6D);
	}
	#header-nav .-nav {
		display: flex;
		justify-content: center;
		height: 100%;
		cursor: pointer;
	}
	#header-nav .-item:after{
		content: " ";
		width: 1px;
		height: 8px;
		position: absolute;
		top: calc(50% - 4px);
		right: 0;
		background: #CFD4D9;
	}
	#header-nav .-item:last-child:after{
		display: none;
	}
	#header-nav .-item{
		position: relative;
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
		padding: 0 24px;
		box-shadow: 0px 0px 0px #2973A5 inset;
		color:#323A41;
		font-size: 26px;
		font-style: normal;
		font-weight: 400;
		line-height: 32px;
		transition: all .3s;
	}
	#header-nav .-item[data-active="1"]{
		box-shadow: 0px -4px 0px #2973A5 inset;
		color:#2973A5;
	}
</style>
<?php
$level = get_field('level');
get_template_part( 'template-parts/hot-deal',$level);
?>
<style type="text/css">
	footer#site-footer{
		display: none;
	}
	.hotdeal-footer{
		background: var(--blue-blue-100, #031121);
	}
	.hotdeal-footer .-logo{
		width: 174px;
		margin-top: 44px;
		margin-bottom: 22px;
	}
	.hotdeal-footer .-line{
		background:#828A92;
		height: 1px;
		width: 100%;
	}
	.hotdeal-footer .-f-footer{
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 18px 0;
	}
	.hotdeal-footer .-copy{
		color: var(--white, #FFF);
		font-size: 18px;
		font-style: normal;
		font-weight: 700;
		line-height: 20px; /* 111.111% */
	}
	.hotdeal-footer .-policy{
		color: var(--white, #FFF);
		font-size: 18px;
		font-style: normal;
		font-weight: 700;
		line-height: 20px; /* 111.111% */
	}
</style>
<footer class="hotdeal-footer">
	<div class="cont">
		<div class="text-center">
			<a href="/home" class="">
				<img src="/wp-content/themes/seed-spring/img/<?=pll_current_language()?>/logo-asw.png" class="inline-block -logo">
			</a>
			<div class="-line"></div>
		</div>
		<div class="-f-footer">
			<div>
				<span class="-copy"><?php pll_e('© สงวนลิขสิทธิ์ พ.ศ. 2565 บริษัท แอสเซทไวส์ จำกัด (มหาชน)') ?></span>
			</div>
			<div>
				<a href="/privacy-policy" class="-policy">
					<?php pll_e('นโยบายข้อมูลส่วนบุคคล') ?>
				</a>
			</div>
		</div>
	</div>
</footer>
<?php
get_footer(); 
?>