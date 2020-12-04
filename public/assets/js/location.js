"use strict";

//Init
document.addEventListener("DOMContentLoaded", scriptLoader);

//ScriptLoader
function scriptLoader() {
    getLocation()
}

function getLocation() {
    navigator.geolocation.getCurrentPosition((location) => {
        let latitude = location.coords.latitude
        let longitude = location.coords.longitude
        console.log(location, latitude, longitude)
        new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([0, 0]),
                zoom: 4
            })
        });
    })
    }

