"use strict";

var btnAttempts = document.querySelectorAll('.attempt');
var cellPoints = document.querySelector('.points');
btnAttempts.forEach(function (btn) {
  btn.addEventListener('click', function (e) {
    var data = '';

    if (e.target.getAttribute('clicked') != 1) {
      for (var i = 0; i < btnAttempts.length; i++) {
        btnAttempts[i].classList.remove('active');
        btnAttempts[i].setAttribute('clicked', 0);
      }

      e.target.classList.add('active');
      e.target.setAttribute('clicked', 1);
      data = Number(e.target.textContent) - 1;
      cellPoints.textContent = 'Очков за попытку';
    } else {
      e.target.classList.remove('active');
      e.target.setAttribute('clicked', 0);
      data = '';
      cellPoints.textContent = 'Сумма очков';
    }

    fetch("./modules/ajax.php", {
      method: 'POST',
      body: data
    }).then(function (res) {
      return res.json();
    }).then(function (data) {
      var contentTable = document.querySelector('.content');
      contentTable.innerHTML = '';
      data.forEach(function (el, index) {
        contentTable.innerHTML += "\n   <tr>\n   <th>".concat(index + 1, "</th>\n   <td>").concat(el.name, "</td>\n  <td>").concat(el.city, "</td>\n                        <td>").concat(el.car, "</td>\n                        <td>").concat(el.attempts, "</td>\n                        <td>").concat(el.points, "</td>\n                    </tr>\n                ");
      });
    });
  });
});