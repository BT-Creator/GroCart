"use strict"

//Init
document.addEventListener("DOMContentLoaded", scriptLoader);

//Element
const openButton = document.querySelector("#list-top-bar a")
const form = document.querySelector("#new-item-form")
const closeButton = document.querySelector("#new-item-form div a")
const confirmButton = document.querySelector("#new-item-form input[type='submit']")
const newItems = document.querySelector(".new-items-container")

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
    let unitInfo = document.querySelector("#new-item-form select").selectedOptions.item(0).text
    newItems.innerHTML += generateItemSelection(input.item(0).value,
                                                input.item(1).value,
                                                input.item(2).value,
                                                unitInfo,
                                                document.querySelector("#new-item-form textarea").value)

    function generateItemSelection(name, brand, weight, unit,  notes){
        console.log(name, brand, weight, unit, notes)
        return null
    }
}

function closeDiv() {
    form.style.display = 'none';
}
