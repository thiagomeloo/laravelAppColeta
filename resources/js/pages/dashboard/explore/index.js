

import { LeafletMapComponent } from "../../../components/scripts/map/leaflet";
import { NavigationPosition } from "../../../components/scripts/map/navigationPosition";

document.addEventListener('DOMContentLoaded', async () => {

    const maps = [...document.querySelectorAll('.map')];

    maps.forEach(element => {

        const objMap = element.dataset;

        return LeafletMapComponent().init({
            'id': element.id,
            'lat': objMap.latitude ?? '-6.4808',
            'lng': objMap.longitude ?? '-35.4347',
            'zoom': objMap.zoom ?? '15',
        });


    });

});
