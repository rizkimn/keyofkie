import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import { leafletProviders } from './../../leaflet-providers';

const latInput = document.getElementById("latitude");
const lngInput = document.getElementById("longitude");
const mapDiv = document.getElementById("map");

if (!mapDiv) console.log("map's container not found");

const defaultLat = 0.6973449319031846;
const defaultLng = 127.95485842430058;

// Inisialisasi map
const map = L.map("map").setView([defaultLat, defaultLng], 7);

L.tileLayer(leafletProviders['Stadia']['StamenTerrain']['url'], {
    attribution: leafletProviders['Stadia']['StamenTerrain']['html_attribution'],
}).addTo(map);

let marker = null;

function sanitizeInput(value) {
    return value.replace(/[^0-9\-,.]/g, "");
}

function attachValidation(input) {
    input.addEventListener("input", () => {
        input.value = sanitizeInput(input.value);
        reloadMap();
    });
}

attachValidation(latInput);
attachValidation(lngInput);

// fungsi update marker dari input
function reloadMap(zoom = 15) {
    const lat = parseFloat(latInput.value);
    const lng = parseFloat(lngInput.value);

    if (!isNaN(lat) && !isNaN(lng)) {
        if (marker) {
            marker.setLatLng([lat, lng]);
        } else {
            marker = L.marker([lat, lng], { draggable: true }).addTo(map);

            // kalau marker digeser → update input
            marker.on("moveend", e => {
                const { lat, lng } = e.target.getLatLng();
                latInput.value = lat.toFixed(6);
                lngInput.value = lng.toFixed(6);
            });
        }
        map.setView([lat, lng], 15);
    }
}
reloadMap();

// --- Tambahan: otomatis pakai GPS ---
// if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(
//         (pos) => {
//             latInput.value = pos.coords.latitude.toFixed(6);
//             lngInput.value = pos.coords.longitude.toFixed(6);
//             reloadMap(7); // gunakan fungsi lama untuk update marker + map
//         },
//         (err) => {
//             console.warn("Gagal dapat lokasi:", err.message);
//         }
//     );
// } else {
//     console.warn("Browser tidak mendukung geolocation");
// }
