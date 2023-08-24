
document.addEventListener('DOMContentLoaded', (event) => {
    console.log('DOM fully loaded and parsed');
    // Se cargan los datos de la primer tabla

});

// Valita en el Fetch la respuesta sea 200
const isResponseOk = (response) => {
    if (!response.ok)
      throw new Error(response.status);
    return response.text()
}

