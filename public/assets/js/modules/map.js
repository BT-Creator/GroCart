"use strict";

export function constructMap(target, longitude, latitude){
    new ol.Map({
        target: target,
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM({
                    url: 'https://tile.openstreetmap.be/osmbe/{z}/{x}/{y}.png',
                    attributions: [ol.source.OSM.ATTRIBUTION, 'Tiles courtesy of <a href="https://geo6.be/">GEO-6</a>'],
                    maxZoom: 18
                })
            }),
            new ol.layer.Tile({
                source: new ol.source.OSM()
            }),
            new ol.layer.Vector({
                source: new ol.source.Vector({
                    features: [
                        new ol.Feature({
                            geometry: new ol.geom.Point(ol.proj.fromLonLat([longitude, latitude]))
                        })
                    ]
                })
            })
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([longitude, latitude]),
            zoom: 14
        }),
    });
}
