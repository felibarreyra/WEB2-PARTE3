# WEB2-PARTE3 - Categorías API

## Alumno
Felipe Barreyra

## Descripción
ecommerce-ropa
Este proyecto implementa una API para gestionar categorías de productos.

## Endpoints

### 1. Obtener un elemento por ID
- **Endpoint**: `http://localhost/WEBTP3/MVC/api/category/:id`
- **Método**: GET
- **Descripción**: Retorna una categoría específica por ID en formato JSON.
  
  **Ejemplo de respuesta para ID = 1:**
  ```
  {
      "id": "1",
      "name": "Cinturón",
      "season": "Verano"
  }
  ```

### 2. Insertar una nueva categoría
- **Endpoint**: `http://localhost/WEBTP3/MVC/api/category`
- **Método**: POST
- **Descripción**: Agrega una nueva categoría.

  **Formato JSON de solicitud:**
  ```
  {
      "name": "Malla",
      "season": "Verano"
  }
  ```

### 3. Obtener categorías ordenadas
- **Endpoint**: `http://localhost/WEBTP3/api/categories`
- **Método**: GET
- **Descripción**: Retorna todas las categorías ordenadas según el parámetro especificado.

  **Parámetros de consulta:**
   - `sort_by`: Puede ser "ID", "name" o "season".
   - `order`: Puede ser "ASC" (ascendente) o "DESC" (descendente).

  **Ejemplos de uso:**
  - Ordenar por ID de manera descendente: `http://localhost/WEBTP3/api/categories?sort_by=ID&order=DESC`
  - Ordenar por nombre de manera descendente: `http://localhost/WEBTP3/api/categories?sort_by=name&order=DESC`
  - Ordenar por temporada de manera descendente: `http://localhost/WEBTP3/api/categories?sort_by=season&order=DESC`

### 4. Obtener todas las categorías
- **Endpoint**: `http://localhost/WEBTP3/MVC/api/category`
- **Método**: GET
- **Descripción**: Retorna todas las categorías.

### 5. Modificar una categoría
- **Endpoint**: `http://localhost/WEBTP3/MVC/api/category/:id`
- **Método**: PUT
- **Descripción**: Modifica una categoría existente.

  **Formato JSON de solicitud:**
  ```
  {
      "name": "Malla",
      "season": "Verano"
  }
  ```
