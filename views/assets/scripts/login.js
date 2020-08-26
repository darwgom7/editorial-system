(() => {
	window.addEventListener('load', () => {
		const formMessages = {
			default(inputElement) {
				formDesign.removeSuccessBorder(inputElement);
				formDesign.removeDangerBorder(inputElement);
				formDesign.removeMessageDanger(inputElement.nextElementSibling);
				formDesign.addMessageHide(inputElement.nextElementSibling);
				return true;
			},
			success(inputElement) {
				formDesign.addSuccessBorder(inputElement);
				formDesign.removeDangerBorder(inputElement);
				formDesign.removeMessageDanger(inputElement.nextElementSibling);
				formDesign.addMessageHide(inputElement.nextElementSibling);
				return true;
			},
			danger(inputElement, message) {
				formDesign.addDangerBorder(inputElement);
				formDesign.removeSuccessBorder(inputElement);
				formDesign.addMessage(inputElement.nextElementSibling, message);
				formDesign.removeMessageHide(inputElement.nextElementSibling);
				formDesign.addMessageDanger(inputElement.nextElementSibling);
				formDesign.addTransition(inputElement.nextElementSibling);
				return false;
			}
		};
		const formDesign = {
			addTransition(element) {
				element.classList.add('form-alert__msg--transition');
			},
			addMessage(element, message) {
				element.innerText = message;
			},
			addMessageDanger(element) {
				element.classList.add('form-alert__msg--danger');
			},
			removeMessageDanger(element) {
				element.classList.remove('form-alert__msg--danger');
			},
			addMessageSuccess(element) {
				element.classList.add('form-alert__msg--success');
			},
			addMessageHide(element) {
				element.classList.add('form-alert__msg--hide');
			},
			removeMessageHide(element) {
				element.classList.remove('form-alert__msg--hide');
			},
			addSuccessBorder(element) {
				element.classList.add('form-alert__input--success');
			},
			removeSuccessBorder(element) {
				element.classList.remove('form-alert__input--success');
			},
			addDangerBorder(element) {
				element.classList.add('form-alert__input--danger');
			},
			removeDangerBorder(element) {
				element.classList.remove('form-alert__input--danger');
			},
			reset(element) {
				element.classList.remove('form-alert__input--danger');
				element.classList.remove('form-alert__input--success');
				element.nextElementSibling.classList.remove('form-alert__msg--danger');
				element.nextElementSibling.classList.remove('form-alert__msg--show');
				element.nextElementSibling.classList.add('form-alert__msg--hide');
			},
			removeMessages(element) {
				element.nextElementSibling.classList.remove('form-alert__msg--danger');
				element.nextElementSibling.classList.remove('form-alert__msg--show');
				element.nextElementSibling.classList.add('form-alert__msg--hide');
			},
			addDangerMessageToggle(element) {
				element.nextElementSibling.classList.add('form-alert__msg--danger');
				element.nextElementSibling.classList.remove('form-alert__msg--hide');
				element.nextElementSibling.classList.add('form-alert__msg--show');
			},
			addSuccessBorderToggle(element) {
				element.classList.remove('form-alert__input--danger');
				element.classList.add('form-alert__input--success');
			},
			addDangerBorderToggle(element) {
				element.classList.remove('form-alert__input--success');
				element.classList.add('form-alert__input--danger');
			}
		};
		const formValidation = {
			inputText(inputElement, message) {
				return inputElement.value.trim()
					? formMessages.success(inputElement)
					: formMessages.danger(inputElement, message);
			},
			inputEmail(inputElement) {
				const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return emailRegex.test(inputElement.value.trim())
					? formMessages.success(inputElement)
					: formMessages.danger(inputElement, 'Invalid email format!');
			}
		};
		const login = document.getElementById('login');
		const modalCurtain = document.getElementById('modalCurtain');
		const loginModal = document.getElementById('loginModal');
		const btnClose = document.getElementById('btnClose');
		const elUser = loginModal.elements['txtUser'];
		const elPass = loginModal.elements['txtPass'];

		const requiredFields = [
			{
				inputElement: elUser,
				message: 'Usuario es requerido!'
			},
			{
				inputElement: elPass,
				message: 'Contraseña es requerida!'
			}
		];
		const asyncData = e => {
			let formData = new FormData();
			formData.append('nick', e.target.elements['txtUser'].value);
			formData.append('pass', e.target.elements['txtPass'].value);
			fetch('./async/login.php', {
				method: 'POST',
				body: formData
			})
				.then(response => response.json())
				.then(result => {
					console.log('Result', result);
					if (!result.response) {
						requiredFields.forEach(field => {
							formMessages.danger(
								field.inputElement,
								'Usuario o contraseña incorrectos.'
							);
						});
					} else {
						e.target.parentElement.classList.remove('modal__curtain--show');
						e.target.parentElement.classList.add('modal__curtain--hide');
						window.location = result.root;
					}
				})
				.catch(error => console.log('Error', error));
		};
		btnClose.addEventListener('click', e => {
			e.preventDefault();
			modalCurtain.classList.remove('modal__curtain--show');
			modalCurtain.classList.add('modal__curtain--hide');
			loginModal.classList.remove('modal__show');
			loginModal.classList.add('modal__hide');
			loginModal.reset();
			requiredFields.forEach(field => {
				formDesign.reset(field.inputElement);
			});
		});

		loginModal.addEventListener('submit', e => {
			e.preventDefault();
			let valid = false;
			requiredFields.forEach(field => {
				valid = formValidation.inputText(field.inputElement, field.message);
			});
			requiredFields.forEach(field => {
				field.inputElement.addEventListener('keyup', e => {
					if (
						e.target.type === 'text' ||
						e.target.type === 'password' ||
						e.target.type === 'number'
					) {
						console.log(e.target.value.length);
						console.log(e.target.value.trim());
						if (e.target.value.length > 0) {
							formDesign.removeMessages(field.inputElement);
							formDesign.addSuccessBorderToggle(field.inputElement);
						} else {
							formDesign.addDangerBorderToggle(field.inputElement);
							formDesign.addDangerMessageToggle(field.inputElement);
						}
					}
				});
			});
			if (valid) {
				requiredFields.forEach(field => {
					formDesign.addTransition(field.inputElement);
					formDesign.removeSuccessBorder(field.inputElement);
				});
				asyncData(e);
				loginModal.reset();
			}
		});

		login.addEventListener('click', e => {
			e.preventDefault();
			modalCurtain.classList.remove('modal__curtain--hide');
			modalCurtain.classList.add('modal__curtain--show');
			loginModal.classList.remove('modal__hide');
			loginModal.classList.add('modal__show');
		});
	});
})();
