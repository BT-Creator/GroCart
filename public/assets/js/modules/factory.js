"use strict";
export function generateItemSection(name, brand, weight, unit, notes){
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
