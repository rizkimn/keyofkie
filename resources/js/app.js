import './bootstrap';
import L from 'leaflet';

import pointMarker from "/public/assets/img/leaflet/point-marker.png";

delete L.Icon.Default.prototype._getIconUrl;

// L.Icon.Default.mergeOptions({
//   iconRetinaUrl: "https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png",
//   iconUrl: "https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png",
//   shadowUrl: "https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png",
// });

L.Icon.Default.mergeOptions({
  iconRetinaUrl: pointMarker,
  iconUrl: pointMarker,
  shadowUrl: null,
  iconSize: [60, 60],
  iconAnchor: [30, 30],     // titik bawah-tengah (x tengah, y bawah)
  popupAnchor: [0, -10],    // popup muncul di atas icon
});
