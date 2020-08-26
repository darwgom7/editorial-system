{
	window.addEventListener('load', e => {
		const btnSave = document.getElementById('btnSave');
		const tbBody = document.getElementById('tbBody');
		const asyncData = e => {
			fetch('./async/readEditorialBranch.php', { method: 'POST' })
				.then(response => response.json())
				.then(result => {
					console.log('Result', result);
					tbBody.innerHTML = '';
					for(let item of result) {
						tbBody.innerHTML += `
						<tr class="tb__row">
						<td class="tb__data tb__data--info-start">
							${item.code}
						</td>
						<td class="tb__data">
						    ${item.address}
						</td>
						<td class="tb__data">
						    ${item.phone}
						</td>
						<td class="tb__data tb__data--container-item">
							<a
								class="tb__content--item btn btn__sm btn__success"
								href="#"
								title="Edit register"
								>Edit</a
							>
							<a
								class="tb__content--item btn btn__sm btn__danger"
								href="#"
								title="Remove register"
								>Remove</a
							>
						</td>
					    </tr>						
						`;
					}
				})
				.catch(error => console.log('Error', error));
		};
		asyncData();
	});
}
