(() => {
	window.onscroll = () => {
		let topbar = document.getElementById(
			'topbar'
		);
		let sidebar = document.getElementById(
			'sidebar'
		);
		let sticky = topbar.offsetTop;
		if (window.pageYOffset >= sticky) {
			topbar.classList.add('sticky__topbar');
			sidebar.classList.add('sticky__sidebar');
		} else {
			topbar.classList.remove('sticky__topbar');
			sidebar.classList.remove('sticky__sidebar');
		}
	};
})();
