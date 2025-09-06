import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import { leafletProviders } from './leaflet-providers';

const map = L.map('map', {
    zoomControl: false,
}).setView([0.6973449319031846, 127.95485842430058], 9);

// L.control.zoom({
//     position: 'bottomleft'
// }).addTo(map);

L.tileLayer(leafletProviders['Esri']['WorldGrayCanvas']['url'], {
    attribution: leafletProviders['Esri']['WorldGrayCanvas']['html_attribution'],
}).addTo(map);
