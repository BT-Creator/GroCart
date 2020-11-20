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
    try {
        newItems.innerHTML += generateItemSelection(input.item(0),
            input.item(1),
            input.item(2),
            unitInfo,
            document.querySelector("#new-item-form textarea").value)
    } catch (ex){
        document.querySelector(".new-items-container mark").innerHTML = "A name is needed!"
    }


    function generateItemSelection(name, brand, weight, unit, notes){
        console.log(name, brand, weight, unit, notes)
        let res = `<section class="list-item">`
        if(name.value === ""){
            throw new Error("No name was given")
        }
        else{
            res += `<h2>${name.value}</h2>`
            if(brand.value === "" && weight.value === "" && notes === ""){
                res += `<p>Just plain old ${name.value}</p></section>`
            }
            else{
                res += existenceCheck(brand)
            }
        }
        return res

        function existenceCheck(elem) {
            if(elem.value === ""){
                return ""
            }
            else {
                console.log(elem)
            }
        }
    }
}

function closeDiv() {
    form.style.display = 'none';
}
