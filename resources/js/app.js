import './bootstrap';
import 'bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function addTask (url){
    let template = document.querySelector("#add-task");
    let clone = template.cloneNode(true);
    fetch(url, {
        method: "PUT", // Указываем метод запроса

        body: JSON.stringify({ html: htmlContent })
    })
        .then(response => response.json())
        .then(data => console.log("Ответ сервера:", data))
        .catch(error => console.error("Ошибка:", error));
    document.body.appendChild(clone);
}

