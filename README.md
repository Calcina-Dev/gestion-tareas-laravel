# Proyecto Laravel - Plataforma de Tareas

## Descripción
Este proyecto es una aplicación web para gestionar tareas. Los usuarios pueden crear, ver, editar y eliminar tareas. Cada tarea tiene un DNI, título, descripción, fecha de vencimiento y estado.

## Requisitos
- PHP >= 8.0
- Composer
- Laravel >= 11.34.2
- Docker (si se usa Docker para el desarrollo)

## Instalación

1. Clona el repositorio:

   ```bash
   git clone https://github.com/calcina-dev/gestion-tareas-laravel.git
   cd estion-tareas-laravel


Documentación de la API - Plataforma de Gestión de Tareas
Esta es la documentación de la API que permite gestionar tareas dentro de una plataforma. Los usuarios pueden crear, ver, actualizar y eliminar tareas. Cada tarea tiene un DNI, título, descripción, fecha de vencimiento y estado.

Base URL
La API se encuentra disponible en:

bash
Copiar código
http://localhost:8000/api
Autenticación
La API utiliza Laravel Sanctum para la autenticación basada en tokens. Para acceder a los endpoints, se requiere un token de autenticación válido.

1. Obtener un Token de Autenticación (Login)
Endpoint: POST /api/login

Descripción: Este endpoint permite a los usuarios obtener un token de autenticación.

Request:

json
Copiar código
{
  "email": "usuario@ejemplo.com",
  "password": "contraseña"
}
Respuesta:

json
Copiar código
{
  "access_token": "token_aqui",
  "token_type": "bearer"
}
2. Listar todas las tareas (GET)
Endpoint: GET /api/tareas

Descripción: Obtiene la lista de todas las tareas disponibles.

Headers:

Authorization: Bearer {token}
Respuesta:

json
Copiar código
[
  {
    "id": 1,
    "dni": "12345678",
    "titulo": "Tarea 1",
    "descripcion": "Descripción de la tarea 1",
    "fecha_vencimiento": "2024-12-01",
    "estado": "pendiente"
  },
  {
    "id": 2,
    "dni": "87654321",
    "titulo": "Tarea 2",
    "descripcion": "Descripción de la tarea 2",
    "fecha_vencimiento": "2024-12-10",
    "estado": "en progreso"
  }
]
3. Crear una tarea (POST)
Endpoint: POST /api/tareas

Descripción: Crea una nueva tarea.

Request:

json
Copiar código
{
  "dni": "12345678",
  "titulo": "Nueva tarea",
  "descripcion": "Descripción de la nueva tarea",
  "fecha_vencimiento": "2024-12-15",
  "estado": "pendiente"
}
Respuesta:

json
Copiar código
{
  "id": 3,
  "dni": "12345678",
  "titulo": "Nueva tarea",
  "descripcion": "Descripción de la nueva tarea",
  "fecha_vencimiento": "2024-12-15",
  "estado": "pendiente"
}
4. Ver una tarea específica (GET)
Endpoint: GET /api/tareas/{id}

Descripción: Obtiene los detalles de una tarea específica.

Parámetros:

id: ID de la tarea (en la URL).
Headers:

Authorization: Bearer {token}
Respuesta:

json
Copiar código
{
  "id": 1,
  "dni": "12345678",
  "titulo": "Tarea 1",
  "descripcion": "Descripción de la tarea 1",
  "fecha_vencimiento": "2024-12-01",
  "estado": "pendiente"
}
5. Actualizar una tarea (PUT)
Endpoint: PUT /api/tareas/{id}

Descripción: Actualiza los detalles de una tarea existente.

Request:

json
Copiar código
{
  "dni": "12345678",
  "titulo": "Tarea actualizada",
  "descripcion": "Descripción actualizada de la tarea",
  "fecha_vencimiento": "2024-12-20",
  "estado": "completada"
}
Respuesta:

json
Copiar código
{
  "id": 1,
  "dni": "12345678",
  "titulo": "Tarea actualizada",
  "descripcion": "Descripción actualizada de la tarea",
  "fecha_vencimiento": "2024-12-20",
  "estado": "completada"
}
6. Eliminar una tarea (DELETE)
Endpoint: DELETE /api/tareas/{id}

Descripción: Elimina una tarea específica.

Parámetros:

id: ID de la tarea (en la URL).
Headers:

Authorization: Bearer {token}
Respuesta:

json
Copiar código
{
  "message": "Tarea eliminada con éxito"
}
Errores comunes
401 Unauthorized
Este error ocurre cuando no se proporciona un token válido o el token ha expirado.

Ejemplo de respuesta:

json
Copiar código
{
  "message": "Unauthenticated."
}
422 Unprocessable Entity
Este error ocurre cuando los datos enviados no son válidos (por ejemplo, si falta un campo requerido).

Ejemplo de respuesta:

json
Copiar código
{
  "message": "The given data was invalid.",
  "errors": {
    "dni": ["El campo dni es obligatorio."]
  }
}

