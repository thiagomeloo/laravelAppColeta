
/**
 * Pega as coordenadas do usuário e retorna uma promisse
 * @param {Object} options {enableHighAccuracy: true, timeout: 5000, maximumAge: 0}
 * 
 */
export function NavigationPosition(options) {

  //valores default para as opções
  if (!options) options = {
    enableHighAccuracy: true,
    timeout: 10000,
    maximumAge: 0,
  };

  return new Promise((resolve, reject) => {

    //verifica se as opções foram passadas e se são um objeto
    if (
      options && typeof options === 'object' &&
      options.enableHighAccuracy !== undefined &&
      options.timeout !== undefined &&
      options.maximumAge !== undefined
    ) {

      //verifica se o navegador tem suporte a geolocalização
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (position) => {
            let { latitude, longitude } = position.coords;

            //arredondar as coordenadas para 4 casas decimais apos o ponto
            latitude = parseFloat(latitude.toFixed(4));
            longitude = parseFloat(longitude.toFixed(4));

            resolve({ latitude, longitude });
          }
          , (error) => {
            reject(error);
          }
          , options
        );


      } else {
        reject('Navegador não suporta geolocalização');
      }

    } else {
      reject('Parâmetros inválidos');
    }
  });


} 