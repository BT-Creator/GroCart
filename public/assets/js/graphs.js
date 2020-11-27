"use strict";
import {itemGraphD3} from "./modules/selectors.js";
import {baseUrl as url} from "./config/config.js";

//Init
document.addEventListener("DOMContentLoaded", scriptLoader);

//ScriptLoader
function scriptLoader() {
    itemGraph();
}

function itemGraph() {
    d3.json(url + "/consumer/1/orders").then((json) => console.log(json))
    let margin = {top: 20, right: 20, bottom: 70, left:40},
        width = 600 - margin.left - margin.right,
        height = 300 - margin.top - margin.bottom;
    let xAxis = d3.svg.axis().scale(d3.scale.ordinal().rangeRoundBands([0, width], .05)).orient("bottom")
    let yAxis = d3.svg.axis().scale(d3.scale.linear().range([height, 0])).orient("left").ticks(10)
    itemGraphD3.append("svg")
}
