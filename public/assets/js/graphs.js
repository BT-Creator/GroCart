"use strict";
import {itemGraph as itemContainer} from "./modules/selectors.js";
import {baseUrl} from "./config/config.js";

//Init
document.addEventListener("DOMContentLoaded", scriptLoader);

//ScriptLoader
function scriptLoader() {
    itemGraph();
}

function itemGraph() {
    fetch(baseUrl + "/1/order").then((data) => {
        console.log(data)
        let chart = new Chart(itemContainer, {
            type: 'bar'

        })
    })

}
