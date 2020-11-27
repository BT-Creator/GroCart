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
        addSVG(itemContainer)
        const yScale = d3.scaleLinear().domain([0, getMax(data)])
        const xScale = d3.scaleLinear().domain([0, data.length])
        console.log(yScale, xScale)
    })

    function getMax(data) {
        let amounts = data.map((object) => {
            return object.amount
        });
        return amounts.reduce((a,b) => {return Math.max(a,b)})
    }
}
