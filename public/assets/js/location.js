"use strict";

//Init
document.addEventListener("DOMContentLoaded", scriptLoader);

//ScriptLoader
function scriptLoader() {
    getLocation()
}

function getLocation() {
    navigator.geolocation.getCurrentPosition((location) => console.log(location))
}
