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

    map.addMarker({
        lat: objMap.latitude ?? latitude ?? '-6.4808',
        lng: objMap.longitude ?? longitude ?? '-35.4347',
        popup: 'Você está aqui',
        iconClass: 'fa-solid fa-location-dot fa-2x text-red-700',
        popupOpen: true,
        size: [35, 35]
    });

})


