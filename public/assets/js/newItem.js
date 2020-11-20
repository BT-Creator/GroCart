"use strict"
import {drag} from "./modules/itemDrag.js";

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
    let input = form.getElementsByTagName("input")
    try {
        newItems.innerHTML += generateItemSelection(input.item(0),
            input.item(1),
            input.item(2),
            document.querySelector("#new-item-form select").selectedOptions.item(0),
            document.querySelector("#new-item-form textarea"))
        document.querySelectorAll('.list-item').forEach(elem => elem.addEventListener(drag()))
        closeDiv()
    } catch (ex){
        document.querySelector("#new-item-form mark").innerHTML = "A name is needed!"
    }


    function generateItemSelection(name, brand, weight, unit, notes){
        let res = `<section class="list-item" draggable="true">`
        if(name.value === ""){
            throw new Error("No name was given")
        }
        else{
            res += `<h2>${name.value}</h2>`
            if(brand.value === "" && weight.value === "" && notes.value === ""){
                res += `<p>Just plain old ${name.value}</p></section>`
            }
            else{
                res += existenceCheck(brand)
                res += existenceCheck(weight)
                res += existenceCheck(notes)
            }
        }
        return res

        function existenceCheck(elem) {
            if(elem.value === ""){
                return ""
            }
            else {
                let property = elem.name.replace('item-', '')
                if (property === 'weight'){
                    let value = parseFloat(elem.value)
                    return `<p><span class="list-property">${property}:</span> ${value} ${unit.value}</p>`
                }
                return `<p><span class="list-property">${property}:</span> ${elem.value}</p>`
            }
        }
    }
}

function closeDiv() {
    form.style.display = 'none';
}
