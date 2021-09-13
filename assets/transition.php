<script type="text/javascript">
	
function transitionHref (move, url) {
	if (move == 'from-right-side') {
		$('body').append('<div class="transition-from-right-side"></div>');
	}
	if (move == 'to-left-side') {
		$('body').append('<div class="transition-to-left-side"></div>');
	}
	console.log('0sec')
	if (url) {
		setTimeout(function () {
			console.log('1sec')
			location.href = url;
		}, 800);
	}
}

$('.header-lyrics').click(function () {
	transitionHref('from-right-side', '<?= $link?>/lyrics');
})
$('.header-contact').click(function () {
	transitionHref('from-right-side', '<?= $link?>/contact-us');
})
$('.header-photos').click(function () {
	transitionHref('from-right-side', '<?= $link?>/photos');
})
$('.header-logo').click(function () {
	transitionHref('from-right-side', '<?= $link?>');
})
$('.header-about').click(function () {
	transitionHref('from-right-side', '<?= $link?>/about-us');
})


</script>