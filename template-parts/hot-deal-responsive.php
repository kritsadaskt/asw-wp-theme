<style type="text/css">
	/*-- Mobile Version --*/
	@media (max-width: 768px) {
		section#header-nav{
			/*	display: none;*/
		}
		#nearby-unit{
			/*	display: none;*/
		}
	}
</style>

<style type="text/css">
	/*-- Mobile Version --*/
	@media (max-width: 991px) {
		.cont, cont{
			padding: 0 1rem;
		}
	}

	.-nav-mob-expand {
		display: flex;
		position: absolute;
		background: #ffffff;
		width: 100%;
		left: 0em;
		top: 100%;
		flex-direction: column;
		gap: 0.5em;
		padding: 1em;
		transition: 0.2s;
	}
	#header-nav[data-expand="-1"] .-nav-mob-expand{
		display: none;
	}
	.-nav-chevron{
		transition: all .5s;
		transform: rotate(0deg);
	}
	#header-nav[data-expand="1"] .-nav-chevron{
		transform: rotate(-180deg);
	}
	/*-- Mobile Version --*/
	@media (min-width: 1321px) {
		.-nav-mob-expand{
			display: none;
		}
	}
	/*-- Mobile Version --*/
	@media (max-width: 1320px) {
		.-l2-cta-btn{
			text-align: center;
		}
	}
	.-nav-mob .-display[data-active="1"]{
		display: flex;
		justify-content: flex-start;
	}
	.-nav-mob .-display[data-active="-1"]{
		display: none;
	}
	.-nav-mob-expand .-list {
		display: flex;
		justify-content: flex-start;
	}
	.-nav-mob-expand .-list[data-active="1"] {
		color: #123F6D !important;
	}
	.-nav-mob-expand > a {
		margin: 0.5em auto;
	}

	.-sales_gallery.-mob{
		display: none;
	}

	.-units-mob-wrap {
		display: none;
	}

	/*-- Mobile Version --*/
	/* @media (max-width: 1024px) {
		.pj-unit-wrap .-units{
			grid-template-columns: repeat(3, 1fr);
			grid-gap: 1rem;
		}
	}
	@media (max-width: 768px) {
		.pj-unit-wrap .-units{
			grid-template-columns: repeat(2, 1fr);
			grid-gap: 1rem;
		}
	}
	@media (max-width: 540px) {
		.pj-unit-wrap .-units{
			grid-template-columns: repeat(1, 1fr);
		}
	} */

	/*-- Mobile Version --*/
	@media (max-width: 768px) {
		.cpj-subtitle {
			font-size: 36px;
		}
		#nearby-unit header {
			align-items: center;
		}		

		/*		*/
		.unit-top {
			grid-template-columns: 1fr;
		}
		.contact-us-inner {
			grid-template-columns: 1fr;
			overflow: hidden;
		}
		.-contact {
			flex-flow: column;
			gap: 21px;
		}

		.-contact-btn.-telephone_number a::after{
			display: none;
		}
		#contact-us .-about {
			text-align: center;
		}
		#contact-us .-about :is(.-title,.-pj-title){
			font-size: 30px;
			font-style: normal;
			font-weight: 400;
			line-height: 32px;
		}
		.unit-data-grid {
			grid-template-columns: 1fr;
		}
		.money-table {
			grid-template-columns: repeat(3, 1fr);
		}
		.-sales_gallery.-desktop{
			display: none;
		}
		.-sales_gallery.-mob{
			display: block;
		}
		#contact-us  .-button-group {
			gap: 16px;
			margin-top: 5px;
		}

		.pj-unit-wrap > .-units {
			display: none;
		}
		.pj-unit-wrap > .-units-mob-wrap {
			display: block;
		}

		/*	L2	*/

		.pj-unit-wrap {/*			display: grid;*/
		}

		.fac-grid {
			grid-template-columns: repeat(2, 1fr);
			grid-gap: 1.5em;
		}
		.location-grid {
			grid-template-columns: 1fr;
			grid-auto-rows: unset;
		}


/*	L1	*/
.campaign-now {
	width: 100%;
	overflow-x: scroll;
	justify-content: flex-start;
}
.campaign-now::-webkit-scrollbar { 
	display: none;  /* Safari and Chrome */
}
.campaign-now .cp-item {
	font-size: 1.625rem;
	padding: 0.25rem 1rem;
	gap: 1.5rem;
	flex-shrink: 0;
}
.pj-filter {
	width: 100%;
}
.pj-filter-dropdown {
	width: 100%;
	max-height: fit-content;
}
.pj-filter-dropdown .-group {
	flex-wrap: wrap;
}
article.hd-pj-card {
	grid-template-columns: 1fr;
	padding-right: 0px;
}
.hd-pj-card .-about .-img {
	margin-top: 0;
}
.hd-pj-card .-about {
	padding: .5rem;
	text-align: center;
}
.hd-pj-card > .-units {
	display: none;
	overflow: scroll;
	padding: 1em;
}
.hd-pj-card > .-units-mob-wrap {
	display: block;
}
		/* .pj-unit {
			width: 280px;
		} */
		.filter-bar-inner {
			overflow-x: auto;
		}
		.filter-bar-inner .-i {
			width: max-content;
		}
	}

	/*-- Mobile Version --*/
	@media (max-width: 1320px) {
		/*	Navbar	*/
		.-nav-mob {
			display: flex !important;
			justify-content: flex-end;
			align-items: center;
		}
		.-nav-mob .-item {
			text-align: right !important;
		}

		.-nav-mob .-item[data-active="1"] {
			box-shadow: none !important;
			color: #323A41 !important;
			justify-content: flex-end !important;
		}
	}
	/*-- Mobile Version --*/
	@media (max-width: 1024px) {
		.pj-unit-wrap .-units{
			grid-template-columns: repeat(3, 1fr);
		}
	}
</style>
