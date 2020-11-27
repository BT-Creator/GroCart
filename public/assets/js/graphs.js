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
    itemGraphD3.append("p")
        .select("p")
        .data(d3.json(url + "/consumer/1/orders"))
    d3.json(url + "/consumer/1/orders").then((json) => console.log(json))
}
