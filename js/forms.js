(() => {
	document.addEventListener('DOMContentLoaded', () => {
		const regForm = document.querySelector('#submit_reg');

		const postData = async (url, data) => {
			let res = await fetch(url, {
				method: "POST",
				body: data
			});
			return await res.json();
		};

		regForm.addEventListener('submit', (e) => {
			e.preventDefault();
			const formData = new FormData(regForm);
			postData('/Restaurant/backends/register.php', formData)
				.then((res) => {
					const msgBlock = document.createElement('div');
					const msgInner = document.createElement('span');
					msgInner.textContent = res['msg'];
					['modal-content', 'center'].forEach(item => {
						msgBlock.classList.add(item);
					})
					const regModal = document.querySelector('.registermodal #modal2');
					document.querySelector('.registermodal .modal-content').remove();
					msgBlock.appendChild(msgInner);
					regModal.appendChild(msgBlock);
				})
				.catch((err) => {
					alert(err)
				})
		});


		const loginForm = document.querySelector('.loginmodal form')

		loginForm.addEventListener('submit', (e) => {
			e.preventDefault();

			const loginFormData = new FormData(loginForm);

			postData('/Restaurant/backends/login.php', loginFormData)
				.then((res) => {
					console.log(res)
					if(res.code === 0){
						document.querySelectorAll('.loginmodal .err__msg').forEach(item => {
							item.remove();
						});
						const row = document.querySelector('.loginmodal form .row')
						const msgBlock = document.createElement('div');
						msgBlock.textContent = res.msg;
						msgBlock.classList.add('err__msg')
						row.appendChild(msgBlock);
					} else if(res.code === 1) {
						window.location.reload();
					}
				})
				.catch((err) => {
					alert(err);
				})
		})
	})
})();



