(() => {
	window.onscroll = () => {
		let topbar = document.getElementById(
			'topbar'
		);
		let sticky = topbar.offsetTop;
		if (window.pageYOffset >= sticky) {
			topbar.classList.add('sticky__topbar');
		} else {
			topbar.classList.remove('sticky__topbar');
		}
	};
})();
