// NEW 
let card_arr_x = []
function scrollCard(){
	card_arr_x = []
	let h = window.innerHeight
	let cards = document.querySelectorAll('.card-project')
	let offset = 200
	let delay = 0
	let chktop = 0

	for(let i of cards){
		let react = i.getBoundingClientRect()
		if (card_arr_x.indexOf(react.x) == -1) {
			card_arr_x.push(react.x)
		}
	}
		// xconsolex.log(card_arr_x)
	card_arr_x = card_arr_x.sort(function (a, b) {  return a - b;  })
	let index = card_arr_x.indexOf(0);
	if (index !== -1) {
		card_arr_x.splice(index, 1);
	}
	for(let i of cards){
		let cp_btn = i.parentNode.parentNode.getElementsByClassName('-pj-cp')[0]
		let react = i.getBoundingClientRect()
		let point = react.y-h+offset
		i.dataset.x = card_arr_x.indexOf(react.x)
		i.style.setProperty('--x',i.dataset.x)
		if (cp_btn != undefined) {
			cp_btn.style.setProperty('--x',i.dataset.x)
		}
		if (point<0) {
			i.dataset.show = 1
			if (cp_btn != undefined) {
				cp_btn.dataset.show = 1
			}
		}
	}
}

function forScrollCard(){

}


	//new price change
function restartSort(){
	let cards = document.querySelectorAll('.card-project')
	for(let i of cards){
		i.dataset.show = 0
		i.dataset.x = -1
		let cp_btn = i.parentNode.parentNode.getElementsByClassName('-pj-cp')[0]
		if (cp_btn != undefined) {
			cp_btn.dataset.show = 0
		}
	}
	pjc = $$('.project-card')
	pjc_count = 0
	for(let i of pjc){
		if (i.style.display != 'none') {
			pjc_count++
		}
	}
	xconsolex.log(pjc_count)
	$('#num-con').innerText = `- ${pjc_count} <?php pll_e('รายการ') ?>`
	scrollCard()
}
	// new price end

sort_info()
window.onscroll = ()=>{
	scrollCard()
}
	// scrollCard()
forScrollCard()
	// END NEW 