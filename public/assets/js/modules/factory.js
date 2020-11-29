"use strict";
let mockId = 0

export function generateItemSection(name, brand, weight, unit, notes){
    mockId--
    let res = `<section class="list-item" draggable="true">`
    if(name.value === ""){
        throw new Error("No name was given")
    }
    else{
        res += `<h2>${name.value}</h2>`
        if(brand.value === "" && weight.value === "" && notes.value === ""){
            let json = {"id":mockId, "name":name.value, "brand":null, "weight":null, "note":null}
            res += `<p>Just plain old ${name.value}</p>
                    <label for="item:${mockId}" hidden="hidden">
                        <input type="checkbox" hidden="hidden"
                        id="item:${mockId}" name="item:${mockId}" value="${json}">
                    </label>
            </section>`
        }
        else{
            res += existenceCheck(brand)
            res += existenceCheck(weight)
            res += existenceCheck(notes)
            res += addDataContainer(name, brand, weight, notes)
            res += `</section>`
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

function addDataContainer(name, brand, weight, notes) {
    let dc = `<label for="item:${mockId}" hidden="hidden">`
    let json = `{"id":${mockId},"name":"${name.value.split(' ').join("_")}",`;
    (brand.value === "") ? json += `"brand":null,` : json += `"brand":"${brand.value.split(' ').join("_")}",`;
    (weight.value === "") ? json += `"weight":null,` : json += `"weight":${parseFloat(weight.value)},`;
    (notes.value === "") ? json += `"notes":null` : json += `"notes":"${notes.value.split(' ').join("_")}"`;
    json += `}`
    json = JSON.parse(json)
    dc += `<input type="checkbox" hidden="hidden" id="item:${mockId}" name="item:${mockId}" value=${JSON.stringify(json)}>
            </label>`;
    return dc
}
