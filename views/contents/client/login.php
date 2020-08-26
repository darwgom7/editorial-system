<div id="modalCurtain" class="modal__curtain--hide">
	<form id="loginModal" class="form modal">
		<div class="modal__header">
			<h4 class="modal__header--title">
				Login
			</h4>
			<a id="btnClose" class="btn btn__dark btn__round">
				&times;
			</a>
		</div>
		<div class="modal__body form__group--block">
			<div class="form__group--block">
				<label for="txtUser">Usuario</label>
				<input
                    id="txtUser"
                    name="user"
					class="form__control--txt"
					type="text"
					placeholder="Su nombre de usuario"
				/>
				<small class="form-alert__msg form-alert__msg--hide">Hello</small>
			</div>
			<div class="form__group--block">
				<label for="txtPass">Contraseña</label>
				<input
                    id="txtPass"
                    name="pass"
					class="form__control--pass"
					type="password"
					placeholder="Su contraseña"
				/>
				<small class="form-alert__msg form-alert__msg--hide">Hello</small>
			</div>
		</div>
		<div class="modal__footer">
			<button id="modalBtnOk" class="btn btn__success btn__md">
				Ingresar
			</button>
		</div>
	</form>
</div>