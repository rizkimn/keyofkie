import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import { leafletProviders } from './leaflet-providers';
import 'leaflet-routing-machine';
import 'leaflet-routing-machine/dist/leaflet-routing-machine.css';
import userMarker from "/public/assets/img/leaflet/user-marker.png";

const map = L.map('map', {
    zoomControl: false,
    maxZoom: 18
}).setView([0.6973449319031846, 127.95485842430058], 9);

L.tileLayer(leafletProviders['Stadia']['StamenTerrain']['url'], {
    attribution: leafletProviders['Stadia']['StamenTerrain']['html_attribution'],
}).addTo(map);

const locations = window.locationsData;

// variabel global
let userLatLng = null;
let routingControl = null;

map.locate({ setView: true, maxZoom: 12 });

map.on('locationfound', function (e) {
    userLatLng = e.latlng;

    const userIcon = L.icon({
        iconUrl: userMarker,
        iconSize: [60, 60],
        iconAnchor: [30, 30],
        popupAnchor: [0, -10],
    });

    L.marker(userLatLng, {
        icon: userIcon,
        zIndexOffset: 666
    }).addTo(map)
        .on("click", () => {
            map.setView(userLatLng, 18, { animate: true });
        });
});

map.on('locationerror', function () {
    alert("Tidak bisa mendapatkan lokasi Anda 😢");
});

// buat marker lokasi wisata
locations.forEach(loc => {
    const lat = loc.latitude;
    const lng = loc.longitude;

    const marker = L.marker([lat, lng])
        .addTo(map)
        .bindPopup(`<b>${loc.name}</b>`);

    // saat popup dibuka → buat rute
    marker.on("popupopen", () => {
        if (!userLatLng) {
            alert("Lokasi Anda belum terdeteksi 🚫");
            return;
        }

        // pastikan rute lama hilang dulu
        if (routingControl) {
            map.removeControl(routingControl);
            routingControl = null;
        }

        routingControl = L.Routing.control({
            waypoints: [
                L.latLng(userLatLng.lat, userLatLng.lng),
                L.latLng(lat, lng)
            ],
            lineOptions: {
                styles: [{ color: '#E21C51', weight: 4 }]
            },
            addWaypoints: false,
            draggableWaypoints: false,
            fitSelectedRoutes: true,
            showAlternatives: false
        }).addTo(map);
    });

    // saat popup ditutup → hapus rute
    marker.on("popupclose", () => {
        if (routingControl) {
            map.removeControl(routingControl);
            routingControl = null;
        }
    });
});
