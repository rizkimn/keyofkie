import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import { leafletProviders } from './../../leaflet-providers';

const mapDiv = document.getElementById("map");

if (!mapDiv) console.log("map's container not found");

const lat = window.locationData.latitude;
const lng = window.locationData.longitude;

// Inisialisasi map
const map = L.map("map").setView([lat, lng], 15);

L.tileLayer(leafletProviders['Stadia']['StamenTerrain']['url'], {
    attribution: leafletProviders['Stadia']['StamenTerrain']['html_attribution'],
}).addTo(map);

L.marker([lat, lng], { draggable: true }).addTo(map);
