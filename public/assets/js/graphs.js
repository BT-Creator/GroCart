"use strict";
import {itemGraphContainer as itemContainer, addSVG} from "./modules/d3.js";
import {baseUrl as url} from "./config/config.js";

//Init
document.addEventListener("DOMContentLoaded", scriptLoader);

//ScriptLoader
function scriptLoader() {
    itemGraph();
}

function itemGraph() {
    d3.json(url + "/consumer/1/orders").then(function (data){
        let dataXY = data.map((object) => {
            let id = object.id
            let amount = object.amount
            return {"id": id, "amount":amount}
        })
        console.log(dataXY)
    })
    addSVG(itemContainer)
}
