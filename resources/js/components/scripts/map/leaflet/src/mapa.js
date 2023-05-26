/**
 * Componente helper da lib Leaflet para a criação de um mapa.
 * @returns
 */
export function LeafletMapComponent() {

    const privateAttributes = {
        map: null,
    }

    return {

        /**
         * Inicializa o mapa.
         *
         * @param {*} atributos atributos do mapa
         * @returns
         */
        init: function (atributos) {

            const { id, lat, lng, zoom, callBackAttMap } = atributos;

            privateAttributes.map = L.map(id).setView([lat, lng], zoom);

            // Adiciona o mapa do OpenStreetMap
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            })
                .addTo(privateAttributes.map);

            // cria um controle que contém um link para atualizar o mapa.
            var customControl = L.Control.extend({
                options: {
                    position: 'bottomleft'
                },

                onAdd: function (map) {
                    var container = L.DomUtil.create('div', 'my-custom-control leaflet-control-attribution');
                    container.innerHTML = `<a id="attMap"  > Atualizar mapa </a>`;
                    return container;
                }
            });

            // Adicione o controle personalizado ao mapa
            privateAttributes.map.addControl(new customControl());

            const attMap = document.getElementById('attMap');
            attMap?.addEventListener('click', callBackAttMap ?? (() => { }));

            /**
             * TESTE
             */

            return this;
        },

        /**
         * Retorna o mapa.
         *
         * @returns o mapa
         */
        getMap: function () {
            return privateAttributes.map;
        },

        /**
         * adiciona um marcador no mapa.
         *
         * @returns
         **/
        addMarker: function (atributos) {

            const { lat, lng, popup, iconClass, size, draggable, callbackDraggable } = atributos;

            //cria o icone
            const markerIcon = L.divIcon({
                className: `${iconClass}`,
                iconSize: size,
                iconAnchor: [22, 94],
                popupAnchor: [-12, -90]
            });

            //cria o marcador
            const marker = L.marker([lat, lng], { icon: markerIcon });

            //adiciona o popup
            marker.bindPopup(popup);

            //adiciona o marcador no mapa
            marker.addTo(privateAttributes.map);

            //se existir poupupOpen, abre o popup
            if (atributos.popupOpen) {
                marker.openPopup();

                setTimeout(() => {
                    marker.closePopup();
                }, 10000);
            }

            //se existir draggable, torna o marcador arrastável
            if (draggable && typeof callbackDraggable === 'function') {
                marker.dragging.enable();

                marker.on('dragend', (e) => {
                    callbackDraggable(e);
                });
            }




            //salva no array de marcadores
            if (!privateAttributes.markers) {
                privateAttributes.markers = [];
            }
            privateAttributes.markers.push(
                {
                    lat: lat,
                    lng: lng,
                    popup: popup,
                    iconClass: iconClass,
                    objMarker: marker
                }
            )

            return this;
        },

        /**
         * Remove todos os marcadores do mapa.
         *
         * @returns
         */
        removeMarkers: function () {
            if (privateAttributes.markers) {
                privateAttributes.markers.forEach(marker => {
                    marker.objMarker.remove();
                });
            }
            return this;
        }

    }

}
