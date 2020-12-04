"use strict";
import {constructMap} from "./modules/map.js";

//Init
document.addEventListener("DOMContentLoaded", scriptLoader);

//ScriptLoader
function scriptLoader() {
    getLocation()
}

function getLocation() {
    navigator.geolocation.getCurrentPosition((location) => {
        constructMap('map', location.coords.longitude, location.coords.latitude)
    })
}

