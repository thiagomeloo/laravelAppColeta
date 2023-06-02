import { FindLocationByAddress, FindLocationByCep } from "../../../components/scripts/map/findLocation";
import { LeafletMapComponent } from "../../../components/scripts/map/leaflet";
import { NavigationPosition } from "../../../components/scripts/map/navigationPosition";
import { SweetAlertComponent } from "../../../components/scripts/sweetAlert";


document.addEventListener('DOMContentLoaded', async () => {

    const objMap = document.getElementById('map').dataset
    let { latitude, longitude } = await NavigationPosition();

    const map = LeafletMapComponent().init({
        'id': 'map',
        'lat': objMap.latitude ?? latitude ?? '-6.4808',
        'lng': objMap.longitude ?? longitude ?? '-35.4347',
        'zoom': objMap.zoom ?? 18,
    });

    //add sua localização atual
    map.addMarker({
        lat: latitude ?? '-6.4808',
        lng: longitude ?? '-35.4347',
        popup: 'Você está aqui',
        iconClass: 'fa-solid fa-location-dot fa-2x text-red-700',
        popupOpen: true,
        size: [35, 35]
    });

    //input de busca endereço
    const searchAddressInput = document.getElementById('searchAddressInput')

    //botao de buscar endereco
    const searchAddressButton = document.getElementById('searchAddressButton')


    //botao de buscar endereco
    searchAddressButton?.addEventListener('click', async () => {
        const value = searchAddressInput?.value;

        //remove todos os marcadores
        map.removeMarkers();

        //add sua localização atual
        map.addMarker({
            lat: latitude ?? '-6.4808',
            lng: longitude ?? '-35.4347',
            popup: 'Você está aqui',
            iconClass: 'fa-solid fa-location-dot fa-2x text-red-700',
            popupOpen: true,
            size: [35, 35]
        });

        //verifica se o valor digitado é um cep
        if (checkIsCep(value)) {

            FindLocationByCep(value)
                .then(data => {
                    if (data.length > 0) {

                        SweetAlertComponent().basic.success('Encontrado', 'Endereço encontrado com sucesso!');

                        const { lat, lon } = data[0];

                        if (lat == null || lon == null) return;

                        //add marcador
                        addMarker(map, lat, lon);

                    } else {
                        SweetAlertComponent().basic.error('Ops!', 'Não foi possível encontrar o endereço.');
                    }
                })
                .catch(err => {
                    SweetAlertComponent().basic.error('Ops!', 'Erro ao buscar endereço.');
                });
        } else {

            const arr = value.split(',');

            if (arr.length < 4) {
                SweetAlertComponent().basic.error('Ops!', 'O endereço deve seguir o seguinte formato: Rua, Número, Cidade, Estado ou CEP (apenas números)');
                return;
            }

            const address = {
                rua: arr[0] ?? '',
                numero: arr[1] ?? '',
                cidade: arr[2] ?? '',
                estado: arr[3] ?? '',
            }

            FindLocationByAddress(address)
                .then(data => {
                    if (data.length > 0) {

                        SweetAlertComponent().basic.success('Encontrado', 'Endereço encontrado com sucesso!');

                        const lat = data[0]?.lat ?? null;
                        const lon = data[0]?.lon ?? null;

                        if (lat == null || lon == null) return;

                        //add marcador
                        addMarker(map, lat, lon);
                    } else {
                        SweetAlertComponent().basic.error('Ops!', 'Não foi possível encontrar o endereço.');
                    }
                }).catch(err => {
                    SweetAlertComponent().basic.error('Ops!', 'Erro ao buscar endereço.');
                });
        }

    });

})


/**
 * Faz validação se o que foi digitado é um CEP.
 * @param {string} str string a ser validada
 * @returns
 */
function checkIsCep(str) {
    if (!/^\d+$/.test(str)) return false;
    if (str.length != 8) return false;
    return true;
}

/**
 * Adiciona o marcador de localização no mapa.
 *
 * @param {*} map instancia do mapa
 * @param {*} lat latitude
 * @param {*} lon longitude
 */
function addMarker(map, lat, lon) {

    //inputs de latitude e longitude
    const inputLatitude = document.getElementById('latitude')
    const inputLongitude = document.getElementById('longitude')

    inputLatitude.value = lat;
    inputLongitude.value = lon;

    map.addMarker({
        lat: lat,
        lng: lon,
        popup: 'Arraste e solte no local desejado caso haja inconsistência.',
        iconClass: 'fa-solid fa-location-dot fa-2x text-blue-700',
        popupOpen: true,
        draggable: true,
        callbackDraggable: (e) => {

            const { lat, lng } = e.target._latlng;
            if (lat == null || lng == null) return;

            inputLatitude.value = lat.toFixed(6);
            inputLongitude.value = lng.toFixed(6);

        },
        size: [35, 35]
    });


    //centraliza o mapa na localização
    map.setView(lat, lon);

}
