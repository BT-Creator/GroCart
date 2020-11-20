"use strict";

//Init
document.addEventListener("DOMContentLoaded", scriptLoader);

//ScriptLoader
function scriptLoader() {
    document.querySelector("#list-top-bar a").addEventListener("click", showDiv)
}

function showDiv(e) {
    e.preventDefault();
    document.querySelector("#new-item-form").removeAttribute("hidden");
    document.querySelector("#new-item-form div span").addEventListener("click", closeDiv);

    function closeDiv(f) {
        f.preventDefault();
        document.querySelector("#new-item-form").setAttribute("hidden", "hidden");
    }
}
