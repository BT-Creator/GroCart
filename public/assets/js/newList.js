"use strict";

//Init
document.addEventListener("DOMContentLoaded", scriptLoader);

//Element
const openButton = document.querySelector("#list-top-bar a")
const form = document.querySelector("#new-item-form")
const closeButton = document.querySelector("#new-item-form div a")
const confirmButton = document.querySelector("#new-item-form input[type='submit']")

//ScriptLoader
function scriptLoader() {
    form.style.display = 'none'
    openButton.addEventListener("click", showDiv)
    confirmButton.addEventListener("click", addItem)
}

function showDiv(e) {
    e.preventDefault();
    form.style.display = 'block'
    closeButton.addEventListener("click", closeDiv);
}

function addItem(g) {
    g.preventDefault()
    closeDiv()
    let input = form.getElementsByTagName("input")
    let select = document.querySelector("#new-item-form select").selectedOptions.item(0).text
    let notes = document.querySelector("#new-item-form textarea").value
    console.log(select)
    console.log(input)
    console.log(notes)
}

function closeDiv() {
    form.style.display = 'none';
}
