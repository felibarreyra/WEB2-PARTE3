# WEB2-PARTE3
** #ALUMNO: Felipe Barreyra

##CATEGORIAS

Miembro B: 
-Obtener un elemento por ID->  http://localhost/WEBTP3/MVC/api/category/:id (trae una categoria por id en formato JSON)

SI EL ID FUERA =1 POR EJEMPLO;
{
    "id": "1",
    "name": "Cinturon",
    "season": "Verano"
}
  

-POST inserto una categoria->  http://localhost/WEBTP3/MVC/api/category (se agrega una categoria)
PARA INSERTAR SE DEBE ENVIAR UN JSON DE LA SIGUIENTE MANERA: (name y season son VARCHAR)
{
    "name": "Malla",
    "season": "Verano"
}


-Ordenado-> http://localhost/WEBTP3/api/categories?sort_by=ID&order=DESC ordena por ID, de manera descendente

Tambien se puede ordenar por nombre:http://localhost/WEBTP3/api/categories?sort_by=name&order=DESC

Y por temporada: http://localhost/WEBTP3/api/categories?sort_by=season&order=DESC

PD: El orden puede ser ascendente(ASC) o descendente(DESC) cambiando esta parte del endpoint &order=DESC/ASC



-GET obtengo las categorias-> http://localhost/WEBTP3/MVC/api/category (trae todas las categorias)

-PUT modifico una categoria->  http://localhost/WEBTP3/MVC/api/category/:id (modifica una categoria)

SELECCIONAS LA CATEGORIA CON EL ID QUE QUERES MODIFICAR Y ENVIAS DE ESTA FORMA: (name y season son VARCHAR)

{
    "name": "Malla",
    "season": "Verano"
}


**
