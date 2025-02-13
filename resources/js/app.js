import './bootstrap';
import 'bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const tagContainer = document.getElementById("tagContainer");
const tagInput = document.getElementById("tagInput");

tagInput.addEventListener("keydown", function(event) {
    if (event.key === "Enter" && tagInput.value.trim() !== "") {
        event.preventDefault();
        addTag(tagInput.value.trim());
        tagInput.value = "";
    }
});

function addTag(tagText) {
    const tag = document.createElement("div");
    tag.classList.add("tag");
    tag.textContent = tagText;

    const removeButton = document.createElement("button");
    removeButton.textContent = "×";
    removeButton.onclick = function() {
        tagContainer.removeChild(tag);
    };

    tag.appendChild(removeButton);
    tagContainer.insertBefore(tag, tagInput);
}

function focusInput() {
    tagInput.focus();
}
