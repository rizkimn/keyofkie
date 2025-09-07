import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import { leafletProviders } from './leaflet-providers';

const map = L.map('map', {
    zoomControl: false,
    maxZoom: 18
}).setView([0.6973449319031846, 127.95485842430058], 8);

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
        .bindPopup(`<b>${loc.name}</b>`);
});
