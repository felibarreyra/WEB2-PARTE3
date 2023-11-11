# WEB2-PARTE3
ALUMNO: Felipe Barreyra

CATEGORIAS

Miembro B: 
Obtener un elemento por ID->  http://localhost/WEBTP3/MVC/api/category/:id (trae una categoria por id en formato JSON).

SI EL ID FUERA =1 POR EJEMPLO;
{
    "id": "1",
    "name": "Cinturon",
    "season": "Verano"
}
  

POST inserto una categoria->  http://localhost/WEBTP3/MVC/api/category (se agrega una categoria).

PARA INSERTAR SE DEBE ENVIAR UN JSON DE LA SIGUIENTE MANERA:
{
    "name": "Malla",
    "season": "Verano"
}


GET obtengo las categorias-> http://localhost/WEBTP3/MVC/api/category (trae todas las categorias).

PUT modifico una categoria->  http://localhost/WEBTP3/MVC/api/category/:id (modifica una categoria).

SELECCIONAS LA CATEGORIA CON EL ID QUE QUERES MODIFICAR Y ENVIAS DE ESTA FORMA:

{
    "name": "Malla",
    "season": "Verano"
}


