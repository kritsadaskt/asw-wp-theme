<style type="text/css">
	.jb-lightbox-section{
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		z-index: 100000;
		display: grid;
		grid-template-columns: 1fr;
		grid-template-rows: 40px auto;
		background-color: #000d;
		transition: opacity .25s;
		opacity: 0;
		pointer-events: none;
	}
	.jb-lightbox-section[data-active="1"]{
		opacity: 1;
		pointer-events: unset;
	}
	.-jbl-header{
		background-color: rgb(32 40 49 / 70%);
	}
	.-jbl-body {
		display: grid;
		grid-template-rows: auto 76px;
		grid-template-columns: 1fr 1008px 1fr;
		padding-top: 12px;
		padding-bottom: 12px;
	}
	.-jbl-arrow.-l {
		grid-column: 1 / span 1;
		grid-row: 1 / span 1;
	}
	.-jbl-arrow.-r {
		grid-column: 3 / span 1;
		grid-row: 1 / span 1;
	}

	.-jbl-gll-pic {
		position: relative;
		background-image: var(--gll-pic);
		transition: background-image .2s;
		grid-column: 2 / span 1;
		grid-row: 1 / span 1;
		background-size: contain;
		background-position: center;
		background-repeat: no-repeat;
		background-color: #0000;
	}
	[data-is-zoom="1"] .-jbl-gll-pic{
		grid-column: 1 / 4;
		grid-row: 1 / 3;
		background-color: #000c;
	}
	[data-is-zoom="1"] .-jbl-body{
		padding: 0;
	}
	.-jbl-header-container {
		height: 100%;
		display: flex;
		flex-direction: row;
		justify-content: flex-end;
	}
	.-jbl-i{
		width: 40px;
		height: 100%;
		display: flex;
	}
	.-jbl-i.--zoom-in,
	.-jbl-i.--zoom-out,
	.-jbl-i.--zoom{
		background-color: #202831;
	}
	.-jbl-i span{
		width: 100%;
		height: 100%;
		background-size: 28px;
		background-position: center;
		background-repeat: no-repeat;
		cursor: pointer;
	}
	.-jbl-i.--close span{
		background-image: url('/wp-content/uploads/2023/03/menu.png');
	}
	.-jbl-i.--download{
		margin-left: 20px;
		margin-right: 10px;
	}
	.-jbl-i.--download a {
		width: 100%;
		height: 100%;
		display: flex;
	}
	.-jbl-i.--download span{
		background-image: url('/wp-content/uploads/2023/03/bx_phone-call.png')
	}
	.-jbl-i.--zoom{
		width: 48px;
	}
	.-jbl-i.--zoom span{
		background-image: url('/wp-content/uploads/2023/03/Group-517.png');
		opacity: .3;
	}
	.jb-lightbox-section[data-is-zoom="1"] .-jbl-i.--zoom-out span{
		opacity: .3;
	}
	.jb-lightbox-section[data-is-zoom="0"] .-jbl-i.--zoom-in span{
		opacity: .3;
	}
	.-jbl-i.--zoom-out span{
		background-image: url('/wp-content/uploads/2023/03/Group-1069.png')
	}
	.-jbl-i.--zoom-in span{
		background-image: url('/wp-content/uploads/2023/03/Group-1068.png')
	}
	.-jbl-arrow {
		display: flex;
		justify-content: flex-end;
		align-items: center;
	}
	.-jbl-arrow.-l {
		justify-content: start;
	}
	.-jbl-arrow span {
		width: 48px;
		height: 48px;
		background-image: var(--mc-lightbox-arrow);
		background-size: contain;
		background-position: center;
		background-repeat: no-repeat;
		display: block;
		margin: 24px;
		cursor: pointer;
	}
	.-jbl-arrow.-l span{
		transform: rotate(-90deg);
	}
	.-jbl-arrow.-r span{
		transform: rotate(90deg);
	}
	.-jbl-gll-draw {
		grid-column: 2 / span 1;
		grid-row: 2 / span 1;
		padding-top: 12px;
		overflow: auto;
		scroll-behavior: smooth;
	}
	.-jbl-gll-draw::-webkit-scrollbar {
		display: none;
	}
	.-jbl-gll-draw-rail {
		height: 100%;
		display: flex;
		gap: var(--gap);
		width: max-content;
	}
	.-jbl-gll-draw-wrap{
		--w:116px;
		--gap:16px;
	}
	.-jbl-gll-draw-rail-i {
		width: var(--w);
		height: 100%;
		background-image: var(--img);
		background-size: cover;
		background-position: center;
		cursor: pointer;
		box-shadow: 0px 0px 0px 0px #fff inset;
		transition: all .2s;
	}
	.-jbl-gll-draw-rail-i[data-active="1"] {
		box-shadow: 0px 0px 0px 3px #fff inset;
	}
	.-jbl-gll-draw-wrap {
		width: 100%;
		height: 100%;
		--rail-w: calc(( var(--w) * var(--max) ) + ( var(--gap) * ( var(--max) - 1 ) ));
		padding-left: calc( ( 100% - var(--rail-w) ) / 2 );
	}
	@media (max-width: 1319px) {
		.jb-lightbox-section{

		}
		.-jbl-header-container {
			max-width: unset;
		}
		.-jbl-body{
			grid-template-rows: auto 62px;
			grid-template-columns: 96px auto 96px;
		}
		.-jbl-gll-pic {
			grid-column: 1 / span 3;
		}
		.-jbl-gll-draw {
			grid-column: 1 / span 3;
			grid-row: 2 / span 1;
			padding-left: 8px;
			padding-right: 8px;
		}
		.-jbl-gll-draw-wrap{
			--w: 88px;
			--gap:8px;
		}
		.-jbl-arrow span{
			margin: 16px;
		}
		[data-is-zoom="1"] .-jbl-gll-pic {
			background-size: cover;
		}
	}
</style>

<script type="text/javascript">
	if (typeof the_lightbox == 'undefined') {
		var the_lightbox = [];
	}
	function jb_lightbox_set(){
		let img = document.querySelectorAll('.jb-lightbox');
		for(let i of img){
			let setName = i.dataset.jbLightbox
			let src = i.style.getPropertyValue('--img')
			if (the_lightbox[setName] == undefined) {
				the_lightbox[setName] = []
			}
			let id = the_lightbox[setName].length;
			the_lightbox[setName].push({i:id,el:i,src:src})
			i.addEventListener('click', function () {
				jb_lb_view(setName,id)
			})
		}

		for(let setName in the_lightbox){
			let section = document.createElement('div');
			let data = the_lightbox[setName]
			let max = data.length
			section.classList.add('jb-lightbox-section')
			section.dataset.jbLightbox = setName
			section.dataset.active = 0
			section.dataset.i = 0
			section.dataset.max = data.length
			section.dataset.isZoom = 0
			
			section.style.setProperty('--gll-pic',data[0].src)
			html = `
			<div class="-jbl-header">
			<div class="container mx-auto -jbl-header-container">
			<div class="-jbl-i --zoom-in">
			<span onclick="jb_lb_zoom('${setName}',0)"></span>
			</div>
			<div class="-jbl-i --zoom">
			<span></span>
			</div>
			<div class="-jbl-i --zoom-out">
			<span onclick="jb_lb_zoom('${setName}',1)"></span>
			</div>
			<div class="-jbl-i --download">
			<a href="" download><span></span></a>
			</div>
			<div class="-jbl-i --close">
			<span onclick="jb_lb_i_close('${setName}')"></span>
			</div>
			</div>
			</div>

			<div class="-jbl-body">
			<div class="-jbl-gll-pic">
			<div class="-jbl-gll-pic-main"></div>
			</div>
			<div class="-jbl-arrow -l">
			<span onclick="jb_lb_nav('${setName}',-1)"></span>
			</div>
			<div class="-jbl-arrow -r">
			<span onclick="jb_lb_nav('${setName}',1)"></span>
			</div>
			<div class="-jbl-gll-draw">
			<div class="-jbl-gll-draw-wrap" style="--max:${data.length}">
			<div class="-jbl-gll-draw-rail">
			`
			
			for(let d of data){
				html+= `
				<div class="-jbl-gll-draw-rail-i" data-i="${d.i}" style="--img:${d.src}"  onclick="jb_lb_view('${setName}',${d.i})" data-active="${d.i==0 ? 1 : 0}">
				<div class="-jbl-gll-draw-rail-pic"></div>
				</div>`
			}
			
			html += `
			</div>
			</div>
			</div>
			</div>
			`
			section.innerHTML = html
			document.body.appendChild(section);
		}
	}
	jb_lightbox_set()
	// window.addEventListener('load', function () {
	// 	jb_lightbox_set()
	// })
	function jb_lb_nav(setName,d){
		let section = document.querySelector(`.jb-lightbox-section[data-jb-lightbox="${setName}"]`);
		xconsolex.log(section)
		let max = parseInt(section.dataset.max)
		let i = parseInt(section.dataset.i)
		let newI = (((i+d)%max)+max)%max
		jb_lb_view(setName,newI)

	}
	function jb_lb_view(setName,i){
		let section = document.querySelector(`.jb-lightbox-section[data-jb-lightbox="${setName}"]`);
		let sectionActive = section.dataset.active
		if (sectionActive == '0') {
			section.dataset.active = 1
		}
		let set = the_lightbox[setName]
		let src = set[i].src
		section.style.setProperty('--gll-pic',src)
		section.dataset.i = i
		let items = document.querySelectorAll(`.jb-lightbox-section[data-jb-lightbox="${setName}"] .-jbl-gll-draw-rail-i`)
		for(let img of items){
			img.dataset.active = 0
		}
		items[i].dataset.active = 1

		let srcDownload = src.split('url(')[1].split(')')[0]
		srcDownload = srcDownload.replaceAll('\\','')
		section.querySelector('.--download a').href = srcDownload
		if (window.innerWidth>=1320) {
			xconsolex.log(123)
			section.querySelector('.-jbl-gll-draw').scrollLeft = 132*(i-3) - 50;
		}else{
			xconsolex.log(123444)
			section.querySelector('.-jbl-gll-draw').scrollLeft = 96*(i-1) - 30;
		}
		

	}
	function jb_lb_i_close(setName){
		let section = document.querySelector(`.jb-lightbox-section[data-jb-lightbox="${setName}"]`);
		section.dataset.active = 0
	}
	function jb_lb_zoom(setName,z){
		let section = document.querySelector(`.jb-lightbox-section[data-jb-lightbox="${setName}"]`);
		section.dataset.isZoom = z
	}
</script>
