import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import { leafletProviders } from './leaflet-providers';
import userMarker from "/public/assets/img/leaflet/user-marker.png";

const map = L.map('map', {
    zoomControl: false,
    maxZoom: 18
}).setView([0.6973449319031846, 127.95485842430058], 9);

// L.control.zoom({
//     position: 'bottomleft'
// }).addTo(map);

L.tileLayer(leafletProviders['Stadia']['StamenTerrain']['url'], {
    attribution: leafletProviders['Stadia']['StamenTerrain']['html_attribution'],
}).addTo(map);

const locations = window.locationsData

locations.forEach(loc => {
    const lat = loc.latitude;  // langsung pakai kolom latitude
    const lng = loc.longitude; // langsung pakai kolom longitude

    L.marker([lat, lng])
        .addTo(map)
        .bindPopup(`<b>${loc.name}</b>`)
        .on("click", () => {
            map.setView([lat, lng], 16, { animate: true });
        })
});

map.locate({ setView: true, maxZoom: 12 });

map.on('locationfound', function(e) {
    const userLatLng = e.latlng;

    // Marker user dengan ikon custom (biru misalnya)
    const userIcon = L.icon({
        iconUrl: userMarker,
        iconSize: [60, 60],
        iconAnchor: [30, 30],
        popupAnchor: [0, -10],
    });

    L.marker(userLatLng, {
        icon: userIcon,
        zIndexOffset: 666
    })
    .addTo(map)
    .on("click", () => {
        map.setView(userLatLng, 18, { animate: true });
    });
});

map.on('locationerror', function() {
    alert("Tidak bisa mendapatkan lokasi Anda 😢");
});
