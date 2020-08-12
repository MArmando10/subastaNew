import { OpenStreetMapProvider } from 'leaflet-geosearch';
    const provider = new OpenStreetMapProvider();

       document.addEventListener('DOMContentLoaded', () => {
           if(document.querySelector('#mapa')){
               const lat = 20.6705778;
               const lng = -103.4358731;
               const mapa = L.map('mapa').setView([lat, lng], 16);

               L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                   attribution: '&copy; <a href=" https://www.openstreetmap.org/org/copyringht">OpenStreetMap</a> contributors'
                }).addTo(mapa);

                let marker;

                // agregar el pin
                marker = new L.marker([lat, lng],{
                    draggable: true,
                    autoPan: true
                }).addTo(mapa);

                //geocode service
                const geocodeService = L.esri.Geocoding.geocodeService();

                //Buscador de direcciones
                const buscador = document.querySelector('#formbuscador');
                buscador.addEventListener('blur', buscarDireccion);

                //Detectar movimiento del marker
                marker.on('moveend', function(e) {
                    // console.log(e.target);
                    marker = e.target;

                    const posicion = marker.getLatLng();
                    // console.log(marker.getLatLng() );  //muestra la lactitud y longitud

                    //centrar automaticamente
                    mapa.panTo( new L.latLng( posicion.lat, posicion.lng) );

                    //Reverse Geocoding, cuando el usuario reubica el pin
                    geocodeService.reverse().latlng(posicion, 16).run(function(error, resultado) {
                        // console.log(error);

                        // console.log(resultado.address);

                        marker.bindPopup(resultado.address.LongLabel);
                        marker.openPopup();

                        //llenar los campos
                        llenarInputs(resultado);
                    })

                });

                function buscarDireccion(e) {
                    if (e.target.value.lenght > 1) {
                        provider.search({query: e.target.value})
                        .then( resultado => {
                            if (resultado[0]) {
                                console.log( resultado[0].bounds[0] );
                            }
                            // console.log(resultado[0]);
                        })
                    }
                    // console.log(e.target)
                }

                function llenarInputs(resultado) {
                    console.log(resultado);
                    document.querySelector('#direccion').value = resultado.address.Address || '';
                    document.querySelector('#colonia').value = resultado.address.Neighborhood || '';
                    document.querySelector('#lat').value = resultado.latlng.lat || '';
                    document.querySelector('#lng').value = resultado.latlng.lng || '';
                }
            }
        });
