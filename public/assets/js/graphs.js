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
    fetch(baseUrl + "/consumer/1/order").then(function (response) {
        response.json().then(function (json) {
            let labels = json.map((order) => {return "List " + order.id})
            let data = json.map((order) => {return order.amount})
            new Chart(itemContainer, {
                type: 'bar',
                data:{
                    labels: labels,
                    datasets: [{
                        label: 'Items',
                        borderColor: 'rgb(0, 0, 0)',
                        backgroundColor: 'rgb(76,181,76)',
                        data: data
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            })
        })
    })

}
