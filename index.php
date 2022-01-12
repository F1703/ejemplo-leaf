<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="leaflet/leaflet.js"></script> -->
    <!-- <link rel="stylesheet" href="leaflet/leaflet.css"> -->

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <script src="leaflet.wms.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

    <style>
        #map {
            width: 100%;
            height: 580px;
            box-shadow: 5px 5px 5px #888;
        }
    </style>
</head>

<body>
    <div id="map"></div>

    <script>

        // http://idet.tucuman.gob.ar/geonetwork3/srv/spa/catalog.search#/metadata/ab464d1e-94d9-4d40-877a-dddc611c4646
        
        var latLong = [-26.81862450605049, -65.21977054140879];

        var map = L.map('map', {
            // fadeAnimation: false,
            // zoomAnimation: false,
            // markerZoomAnimation: false
        }).setView(latLong, 14);

        var url = 'http://g.geosplan.tucuman.gob.ar/geoserver/SituacionActual/wms?';

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            transparent: true,
            attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
        }).addTo(map);

        // show the scale bar on the lower left corner
        L.control.scale({ imperial: true, metric: true }).addTo(map);


        var basemaps = {
            'Antenas de Telecom': L.tileLayer.wms(url, {
                layers: 'SituacionActual:teco_antenas',
                transparent: true,
                format: 'image/png',
            }),

            'Lineas de alta tension': L.tileLayer.wms(url, {
                layers: 'SituacionActual:GeoSPlan-AltaTension-deENARGAS',
                transparent: true,
                format: 'image/png',
            }),


            'Red vial pavimentada': L.tileLayer.wms(url, {
                layers: 'SituacionActual:redvial_pavimentada',
                transparent: true,
                format: 'image/png',
            }),


            'Rutas provinciales': L.tileLayer.wms(url, {
                layers: 'SituacionActual:rutas_prov_2016',
                transparent: true,
                format: 'image/png',
            }),


            'Transporte publico de pasajeros urbanos': L.tileLayer.wms(url, {
                layers: 'SituacionActual:transportepublicopasajerosurbanos',
                transparent: true,
                format: 'image/png',
            }),

        };

        L.control.layers(basemaps, {}, { collapsed: false }).addTo(map);

        basemaps['Antenas de Telecom'].addTo(map);
        // basemaps.Infraestructura.addTo(map);


    </script>
</body>

</html>