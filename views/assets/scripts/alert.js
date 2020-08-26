{
	const btnTest = document.getElementById('btnTestAlert');
	const btnClose = document.getElementById('btnCloseAlert');
	const alert = document.getElementById('alert');
	btnTest != null &&
		btnTest.addEventListener('click', e => {
			alert.classList.remove('alert__hide');
			alert.classList.add('alert__show');
			setTimeout(() => {
				alert.classList.remove('alert__show');
				alert.classList.add('alert__hide');
			}, 5000);
			console.log('Click btn Test');
		});
	btnClose != null &&
		btnClose.addEventListener('click', e => {
			alert.classList.remove('alert__show');
			alert.classList.add('alert__hide');
			console.log('Click btn Close');
		});
}
