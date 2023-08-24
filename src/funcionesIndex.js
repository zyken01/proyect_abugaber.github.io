$(document).ready(() => {

    consulta_API();
    consulta_datos();
});

async function consulta_API() {
    // Consulta API
    var PimpTrizkit =  await new Promise((res, rej) => {
        fetch('https://api.github.com/users/PimpTrizkit/repos')
        .then((response) => {
            if (response.ok)
                res( response.json());
                rej( `Error request`);
        })
        .then( (request) => res(request) )
        .catch( error => alert("ERROR: " + error) );
    });

    var majimboo =  await new Promise((res, rej) => {
        fetch('https://api.github.com/users/majimboo/repos')
        .then((response) => {
            if (response.ok)
                res( response.json());
                rej( `Error request`);
        })
        .then( (request) => res(request) )
        .catch( error => alert("ERROR: " + error) );
    });


    console.log(PimpTrizkit);
    console.log(majimboo);


    // GUARDAR PimpTrizkit
    $.each(PimpTrizkit, function(index, value) {
        let formData = new FormData();
        formData.append('Action', 'guardar_data_api');
        formData.append('id', value.id);
        formData.append('name', value.name);
        formData.append('full_name', value.full_name);
        formData.append('description', value.description);
        formData.append('created_at', value.created_at);
        formData.append('updated_at', value.updated_at);
        formData.append('owner_login', value.owner.login );
        formData.append('owner_avatar_url', value.owner.avatar_url);
    
        fetch("controller/consultas.php" , {method: 'POST', body: formData } )
        .then( response => isResponseOk(response))
        .catch(err => console.log("ERROR: " + err.message ) );
    });

    $.each(majimboo, function(index, value) {
        let formData = new FormData();
        formData.append('Action', 'guardar_data_api');
        formData.append('id', value.id);
        formData.append('name', value.name);
        formData.append('full_name', value.full_name);
        formData.append('description', value.description);
        formData.append('created_at', value.created_at);
        formData.append('updated_at', value.updated_at);
        formData.append('owner_login', value.owner.login );
        formData.append('owner_avatar_url', value.owner.avatar_url);
    
        fetch("controller/consultas.php" , {method: 'POST', body: formData } )
        .then( response => isResponseOk(response))
        .catch(err => console.log("ERROR: " + err.message ) );
    });

}

// Cosulta inicial de la tabla
function consulta_datos() {
    let formData = new FormData();
    formData.append('Action', 'consulta');

    fetch("controller/consultas.php" , {method: 'POST', body: formData } )
    .then( response => isResponseOk(response))
    .then( data => {
        //   console.log(data);
          document.getElementById("tbl_result").innerHTML = data;
          new DataTable('#tblRegistros');
    })
    .catch(err => console.log("ERROR: " + err.message ) );

}

function agregar_campo() {
    document.getElementById('form_agregar').style.display = 'block';
}

function guardar_campo(){
    let formData = new FormData();
    formData.append('Action', 'guardar_menu');
    formData.append('descripcion', 'guardar_menu');

    fetch("controller/consultas.php" , {method: 'POST', body: formData } )
    .then( response => isResponseOk(response))
    .then( data => {
        //   document.getElementById("tbl_result").innerHTML = data;
          console.log(data);
          consulta_datos();
    })
    .catch(err => console.log("ERROR: " + err.message ) );
}

function borrar_campo( value ){

}
