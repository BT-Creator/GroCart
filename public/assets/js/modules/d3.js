"use strict"

export const itemGraphContainer = d3.select("#item-graph");
export function addSVG(container){
    container.append("svg")
        .classed("svg-content", true)
}
