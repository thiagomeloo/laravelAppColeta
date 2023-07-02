import { LeafletMapComponent } from "../../../components/scripts/map/leaflet";
import { NavigationPosition } from "../../../components/scripts/map/navigationPosition";

document.addEventListener('DOMContentLoaded', async () => {

    const objMap = document.getElementById('map').dataset
    let { latitude, longitude } = await NavigationPosition();

    const map = LeafletMapComponent().init({
        'id': 'map',
        'lat': objMap.latitude ?? latitude ?? '-6.4808',
        'lng': objMap.longitude ?? longitude ?? '-35.4347',
        'zoom': objMap.zoom ?? '15',
    });


    const markers = JSON.parse(document.getElementById('map')?.getAttribute('markers') ?? '[]');

    markers.forEach(element => {
        map.addMarker({
            lat: element.latitude,
            lng: element.longitude,
            popup: element.title + ' - ' + element.description,
            iconClass: 'fa-solid fa-location-dot fa-2x text-lime-700',
            popupOpen: true,
            size: [35, 35]
        })
    });

    map.addMarker({
        lat: objMap.latitude ?? latitude ?? '-6.4808',
        lng: objMap.longitude ?? longitude ?? '-35.4347',
        popup: 'Você está aqui',
        iconClass: 'fa-solid fa-location-dot fa-2x text-red-700',
        popupOpen: true,
        size: [35, 35]
    });

})


