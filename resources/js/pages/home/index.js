import { FindLocationByAddress, FindLocationByCep } from "../../components/scripts/map/findLocation";
import { LeafletMapComponent } from "../../components/scripts/map/leaflet";
import { NavigationPosition } from "../../components/scripts/map/navigationPosition";


(async () => {

  let { latitude, longitude } = await NavigationPosition();

  const mapa = LeafletMapComponent().init({
    id: 'mapa',
    lat: latitude,
    lng: longitude,
    zoom: 17,
    callBackAttMap: () => {
      mapa.getMap().setView([
        -6.4808,
        -35.4347
      ], 15)
    },
  });

  mapa.addMarker({
    lat: latitude,
    lng: longitude,
    popup: 'Você está aqui',
    iconClass: 'fa-solid fa-location-dot fa-2x text-red-700',
    popupOpen: true,
    size: [30, 30]
  });


  //criar 10 marcadores aleatórios ao redor do usuário
  for (let i = 0; i < 10; i++) {

    let lat = -6.4808 + Math.random() * 0.01;
    let lng = -35.4347 + Math.random() * 0.01;

    //zero ou um aleatório
    let value = i % 2 == 0 ? 0 : 1;

    let color = 'text-blue-700';

    if (value) {
      color = 'text-green-700';
    }

    mapa.addMarker({
      lat: lat,
      lng: lng,
      popup: `${value ? 'Coleta' : 'Descarte'} de resíduos`,
      iconClass: `fa-solid fa-map-pin fa-2x ${color}`,
      size: [30, 30]
    });
  }





  const rua = 'Rua Marechal Dutra'
  const numero = '679'
  const cidade = 'Nova Cruz'
  const estado = 'RN'
  const pais = 'Brasil'

  const cep = '59215000'

  const resultEndereco = FindLocationByAddress({
    rua: rua,
    numero: numero,
    cidade: cidade,
    estado: estado,
    // pais: pais,
  }).then((data) => {
    if (data.length > 0) {
      mapa.addMarker({
        lat: parseFloat(data[0].lat).toFixed(6),
        lng: parseFloat(data[0].lon).toFixed(6),
        popup: `Minha casa`,
        iconClass: `fa-solid fa-map-pin fa-2x text-yellow-700`,
        size: [30, 30],
        draggable: true,
        callbackDraggable: (e) => {
          const { lat, lng } = e.target.getLatLng();
          console.log("nova posição: ", lat, lng);
        }
      });
    }

  });


})();



