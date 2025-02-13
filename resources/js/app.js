import './bootstrap';
import 'bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function addTag(element,tagInput) {
    const tag = document.createElement("div");
    tag.classList.add("tag");
    tag.textContent = tagInput.value;

    const tagHiddenInput = document.createElement("input");
    tagHiddenInput.name = "tag[]";
    tagHiddenInput.value = tagInput.value || "";
    tagHiddenInput.type = "hidden";



    const removeButton = document.createElement("button");
    removeButton.textContent = "×";
    removeButton.onclick = function() {
        element.parent.removeChild(tag);
    };

    tag.appendChild(removeButton);
    tag.appendChild(tagHiddenInput);
    element.append(tag, tagInput);
}

