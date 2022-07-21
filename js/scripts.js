function reordenar_empresas(){
    var button = document.getElementById("cabecera_nombre");

    var order = button.dataset.order;

    var ajax_url = "./reordenar_empresas.php";
          // Creamos un nuevo objeto encargado de la comunicación
          var ajax_request = new XMLHttpRequest();

          // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
          ajax_request.onreadystatechange = function() {

              // si el readyState es 4, proseguir
              if (ajax_request.readyState == 4 ) {

                  // Analizaos el responseText que contendrá el JSON enviado desde el servidor
                  var response = ajax_request.responseText;
                  document.getElementById("tbody_empresas").innerHTML = response;
              }
           }
           
           // Definimos como queremos realizar la comunicación
           ajax_request.open( "GET", ajax_url + "?order=" + order );
           
           //Enviamos la solictud con los parámetros que habíamos definido
           ajax_request.send();

           if(order == "ASC"){
                button.dataset.order = "DESC";
                document.getElementById("flecha_arriba").style.display = "none";
                document.getElementById("flecha_abajo").style.display = "inline";
           }
           else{
            button.dataset.order = "ASC";
            document.getElementById("flecha_arriba").style.display = "inline";
            document.getElementById("flecha_abajo").style.display = "none";
           }

           
}

function reordenar_alumnos(){
    var button = document.getElementById("cabecera_nombre");

    var order = button.dataset.order;

    var ajax_url = "./reordenar_alumnos.php";
          // Creamos un nuevo objeto encargado de la comunicación
          var ajax_request = new XMLHttpRequest();

          // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
          ajax_request.onreadystatechange = function() {

              // si el readyState es 4, proseguir
              if (ajax_request.readyState == 4 ) {

                  // Analizaos el responseText que contendrá el JSON enviado desde el servidor
                  var response = ajax_request.responseText;
                  document.getElementById("tbody_empresas").innerHTML = response;
              }
           }
           
           // Definimos como queremos realizar la comunicación
           ajax_request.open( "GET", ajax_url + "?order=" + order );
           
           //Enviamos la solictud con los parámetros que habíamos definido
           ajax_request.send();

           if(order == "ASC"){
                button.dataset.order = "DESC";
                document.getElementById("flecha_arriba").style.display = "none";
                document.getElementById("flecha_abajo").style.display = "inline";
           }
           else{
            button.dataset.order = "ASC";
            document.getElementById("flecha_arriba").style.display = "inline";
            document.getElementById("flecha_abajo").style.display = "none";
           }

           
}

function filtrar_empresas(){
    var filtro = document.getElementById("filtro").value;
    var ajax_url = "./filtrar_empresas.php";

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tbody_empresas").innerHTML = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?filtro=" + filtro );
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

}

function filtrar_alumnos(){
    var filtro = document.getElementById("filtro").value;
    var ajax_url = "./filtrar_alumnos.php";

    var element = document.getElementById("anterior"); 
    element.setAttribute("data-inicio", 0);

    var element = document.getElementById("siguiente"); 
    element.setAttribute("data-inicio", 0); 

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tbody_empresas").innerHTML = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?filtro=" + filtro );
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

}

function leer_tutor(){
    
    empresa_seleccionada = document.getElementById("empresa_asociada").value;
    if(empresa_seleccionada != ""){

        document.getElementById("fechas_practicas").style.display = "flex";
    var ajax_url = "./leer_tutor.php";

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tutor_empresa").value = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?id_empresa=" + empresa_seleccionada );
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

    }
    else{
        document.getElementById("tutor_empresa").value = "";
        document.getElementById("fechas_practicas").style.display = "none";

    }


}

// function that deletes a company
function borrar_empresa(id_empresa){
    var ajax_url = "./delete_empresa.php";
    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            //document.getElementById("tbody_empresas").innerHTML = response;
            window.location="empresas.php";
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?id_empresa=" + id_empresa );
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

   

}

// function that deletes an alumn
function borrar_alumno(id_alumno){
    var ajax_url = "./delete_alumno.php";
    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            //document.getElementById("tbody_empresas").innerHTML = response;
            window.location="alumnos.php";
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?id_alumno=" + id_alumno );
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

   

}

function paginar(tabla, direccion,valor, limite){

    valor = parseInt(valor);
    limite = parseInt(limite);

    console.log(valor + " " + limite + " " + direccion + " " + tabla);

    // Incrementamos o decrementamos el inicio del paginador
    if(direccion == "siguiente" && valor + 10 < limite){
        valor = valor + 10;
    }
    if(direccion == "anterior" && valor - 10 >= 0){
        valor = valor - 10;
    }
    if(tabla == "empresas"){
    var ajax_url = "./paginar_empresa.php?tabla=" + tabla + "&valor=" + valor + "&limite=" + limite;
    }
    if(tabla == "alumnos"){
        var ajax_url = "./paginar_alumno.php?tabla=" + tabla + "&valor=" + valor + "&limite=" + limite;
        }
    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            console.log(response);
            document.getElementById("tbody_empresas").innerHTML = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url );
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();


    

    // Actualizamos el inicio del paginador
    var element = document.getElementById("anterior"); 
    element.setAttribute("data-inicio", valor);
    
    var element = document.getElementById("siguiente"); 
    element.setAttribute("data-inicio", valor); 

    //Habiltamos o deshabilitamos los botones de anterior y siguiente
    if(valor > 0){
        document.getElementById("anterior").classList.remove("disabled");
    }
    else{
        document.getElementById("anterior").classList.add("disabled");
    }
    if(valor + 10 < limite){
        document.getElementById("siguiente").classList.remove("disabled");
    }
    else{
        document.getElementById("siguiente").classList.add("disabled");
    }
    console.log(valor + " " + direccion);

}

function filtrar_favoritas(){
    var ajax_url = "./filtrar_favoritas.php";

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tbody_empresas").innerHTML = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url);
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

}

function filtrar_por_contactar(){
    var ajax_url = "./filtrar_por_contactar.php";

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tbody_empresas").innerHTML = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url);
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

}

function filtrar_contactadas(){
    var ajax_url = "./filtrar_contactadas.php";

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tbody_empresas").innerHTML = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url);
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

}

function filtrar_no_interesadas(){
    var ajax_url = "./filtrar_no_interesadas.php";

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tbody_empresas").innerHTML = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url);
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

}

function filtrar_interesadas(){
    var ajax_url = "./filtrar_interesadas.php";

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tbody_empresas").innerHTML = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url);
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

}