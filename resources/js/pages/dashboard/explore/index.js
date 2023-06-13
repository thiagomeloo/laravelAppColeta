

import { LeafletMapComponent } from "../../../components/scripts/map/leaflet";
import { NavigationPosition } from "../../../components/scripts/map/navigationPosition";

document.addEventListener('DOMContentLoaded', async () => {

    const maps = document.querySelectorAll('.map');

    maps.forEach((element) => {
        const latitude = element.getAttribute('latitude');
        const longitude = element.getAttribute('longitude');
        const zoom = 18;
        const typeEvent = element.getAttribute('typeEvent') ?? null;

        const elMap = LeafletMapComponent().init({
            'id': element.id,
            'lat': latitude ?? '-6.4808',
            'lng': longitude ?? '-35.4347',
            'zoom': zoom,
        });

        switch (typeEvent) {
            case 'Coleta':
                elMap.addMarker({
                    lat: latitude,
                    lng: longitude,
                    popup: 'Aqui',
                    iconClass: 'fa-solid fa-location-dot fa-2x text-green-700',
                    popupOpen: true,
                    draggable: false,
                    size: [35, 35]
                });
                break;

            case 'Descarte':
                elMap.addMarker({
                    lat: latitude,
                    lng: longitude,
                    popup: 'Aqui',
                    iconClass: 'fa-solid fa-location-dot fa-2x text-blue-700',
                    popupOpen: true,
                    draggable: false,
                    size: [35, 35]
                });
                break;
            default:
                break;
        }

        elMap.setView(latitude, longitude);
    });


    // maps.forEach(element => {

    //     const objMap = element.dataset;

    //     for (let key in element.dataset) {
    //         // Exibindo o nome da propriedade e seu valor
    //         console.log(key + ': ' + element.dataset[key]);
    //     }

    //     // const elMap = LeafletMapComponent().init({
    //     //     'id': element.id,
    //     //     'lat': objMap.latitude ?? '-6.4808',
    //     //     'lng': objMap.longitude ?? '-35.4347',
    //     //     'zoom': objMap.zoom ?? '15',
    //     // });

    //     // console.log(objMap.latitude, objMap.longitude);

    //     // elMap.addMarker({
    //     //     lat: objMap.latitude,
    //     //     lng: objMap.longitude,
    //     //     popup: 'Aqui',
    //     //     iconClass: 'fa-solid fa-location-dot fa-2x text-blue-700',
    //     //     popupOpen: true,
    //     //     draggable: false,
    //     //     size: [35, 35]
    //     // });

    // });

});
