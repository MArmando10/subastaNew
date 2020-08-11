

      import { OpenStreetMapProvider } from 'leaflet-geosearch';
      const provider = new OpenStreetMapProvider();
      document.addEventListener('DOMContentLoaded', () => {
          const lat = 20.6701335;
          const lng = -103.4396177;
          const mapa = L.map('mapa').setView([lat, lng], 16);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href=" https://www.openstreetmap.org/org/copyringht">OpenStreetMap</a> contributors'
            }).addTo(mapa);
            let marker;
            marker = new L.marker([lat, lng]).addTo(mapa);
        });
