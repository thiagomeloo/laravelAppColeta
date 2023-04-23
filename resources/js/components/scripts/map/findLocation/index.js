

/**
 * URL base para a busca de localização no OpenStreetMap.
 */
const baseURL = "https://nominatim.openstreetmap.org/search.php?&dedupe=0&format=jsonv2&countrycodes=BR&addressdetails=1"

/**
 * Busca uma localização pelo CEP.
 * 
 * @param {*} cep 
 * @returns 
 */
export async function FindLocationByCep(cep) {

  const url = `${baseURL}&postalcode=${cep}`

  return fetch(url)
    .then(response => response.json())
    .then(data => {
      return data
    })
    .catch(error => {
      return {
        error: error
      }
    })
}

/**
 * Busca dados de um endereço.
 * 
 * @param {*} address { rua, numero, cidade, estado, pais}
 * @returns 
 */
export async function FindLocationByAddress(address) {

  // &state=Estado
  // &city=Cidade
  // &street=Rua - Número
  // &postalcode= CEP
  // &country = Brasil - Retorna apenas endereços do Brasil
  // &dedupe=0 - Não remove duplicatas
  // $format=jsonv2 - Retorna em formato JSON
  // &countrycodes=BR - Retorna apenas endereços do Brasil
  // &addressdetails=1 - Retorna detalhes do endereço

  //format=jsonv2
  //addressdetails=1 - Retorna detalhes do endereço
  //countrycodes=BR - Retorna apenas endereços do Brasil

  const url = `${baseURL}&street=${address.rua} - ${address.numero}&city=${address.cidade}&state=${address.estado}`

  return fetch(url)
    .then(response => response.json())
    .then(data => {
      return data
    })
    .catch(error => {
      return {
        error: error
      }
    })
}