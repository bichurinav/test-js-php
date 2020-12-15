const btnAttempts = document.querySelectorAll('.attempt');
const cellPoints = document.querySelector('.points');

btnAttempts.forEach(btn => {
    btn.addEventListener('click', e => {
        let data = '';

        if (e.target.getAttribute('clicked') != 1) {
            for (let i = 0; i < btnAttempts.length; i++) {
                btnAttempts[i].classList.remove('active');
                btnAttempts[i].setAttribute('clicked', 0);
            }
            e.target.classList.add('active');
            e.target.setAttribute('clicked', 1);
            data = Number(e.target.textContent) - 1;
            cellPoints.textContent = 'Очков за попытку'
        } else {
            e.target.classList.remove('active');
            e.target.setAttribute('clicked', 0);
            data = '';
            cellPoints.textContent = 'Сумма очков'
        }

        fetch(`./modules/ajax.php`, {
            method: 'POST',
            body: data
        }).then(res => res.json()).then(data => {

            const contentTable = document.querySelector('.content')
            contentTable.innerHTML = '';

            data.forEach((el, index) => {
                contentTable.innerHTML += `
                    <tr>
                        <th>${index + 1}</th>
                        <td>${el.name}</td>
                        <td>${el.city}</td>
                        <td>${el.car}</td>
                        <td>${el.attempts}</td>
                        <td>${el.points}</td>
                    </tr>
                `
            })
        })
    })
})