"use strict"
import {
    resetDraggableObjects as makeItemsDraggable,
    makeDropPoint as dropPoint, drop
} from "./modules/draggable.js";
import {generateItemSection as generateItem} from "./modules/factory.js";
import {newItemButton as open,
        newItemForm as form,
        closeNewItemForm as close,
        confirmNewItemForm as confirm,
        newItemsContainer as newItems,
        listItemsContainer as listItems} from "./modules/selectors.js";

//Init
document.addEventListener("DOMContentLoaded", scriptLoader);

//ScriptLoader
function scriptLoader() {
    form.style.display = 'none'
    open.addEventListener("click", showDiv)
    confirm.addEventListener("click", addItem)
    makeItemsDraggable()
    newItems.addEventListener('dragover', dropPoint)
    newItems.addEventListener('drop', drop)
    listItems.addEventListener('dragover', dropPoint)
    listItems.addEventListener('drop', drop)
}

function showDiv(e) {
    e.preventDefault();
    form.style.display = 'block'
    close.addEventListener("click", closeDiv);
}

function addItem(g) {
    g.preventDefault()
    let input = form.getElementsByTagName("input")
    try {
        newItems.innerHTML += generateItem(input.item(0),
            input.item(1),
            input.item(2),
            document.querySelector("#new-item-form select").selectedOptions.item(0),
            document.querySelector("#new-item-form textarea"))
        makeItemsDraggable(".list-item")
        closeDiv()
    } catch (ex){
        document.querySelector("#new-item-form mark").innerHTML = "A name is needed!"
    }
}

function closeDiv() {
    form.style.display = 'none';
}
