{
	window.addEventListener('load', e => {
		const asyncData = e => {
			fetch('./async/logout.php', { method: 'POST' })
				.then(response => response.json())
				.then(result => {
					console.log('Result', result);
					window.location = result.root;
				})
				.catch(error => console.log('Error', error));
		};
		const logout = document.getElementById('logout');
		const modalCurtain = document.getElementById('modalCurtain');
		const modal = document.getElementById('modal');
		const modalTitle = document.getElementById('modalTitle');
		const modalBtnClose = document.getElementById('modalBtnClose');
		const modalBody = document.getElementById('modalBody');
		const modalTextContent = document.getElementById('modalTextContent');
		const modalFooter = document.getElementById('modalFooter');
		const drawModal = () => {
			modalCurtain.classList.remove('modal__curtain--hide');
			modalCurtain.classList.add('modal__curtain--show');
			modalTitle.innerText = 'Logout';
			modalTextContent.innerText = '¿Esta seguro que desea cerrar sessión?';
			modalFooter.innerHTML = `
            <button id="modalBtnConfirm" class="btn btn__success btn__md">
               Confirmar
            </button>
            <button id="modalBtnCancel" class="btn btn__warning btn__md">
               Cancelar
            </button>            
           `;
			const modalBtnConfirm = document.getElementById('modalBtnConfirm');
			const modalBtnCancel = document.getElementById('modalBtnCancel');
			modalBtnConfirm.addEventListener('click', e => {
				e.preventDefault();
				asyncData();
			});
			modalBtnCancel.addEventListener('click', e => {
				e.preventDefault();
				modalCurtain.classList.remove('modal__curtain--show');
				modalCurtain.classList.add('modal__curtain--hide');
			});
			modalBtnClose.addEventListener('click', e => {
				e.preventDefault();
				modalCurtain.classList.remove('modal__curtain--show');
				modalCurtain.classList.add('modal__curtain--hide');
			});
		};
		logout.addEventListener('click', e => {
			e.preventDefault();
			drawModal();
		});
	});
}
