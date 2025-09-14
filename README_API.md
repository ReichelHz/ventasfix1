# Demostración de la API VentasFix (Postman)

## 1. Autenticación y Login API

### Login
- Endpoint: `POST /api/login`
- Body (JSON):
```json
{
  "email": "admin@ventasfix.cl",
  "password": "admin123"
}
```
- Respuesta:
```json
{
  "token": "TOKEN_GENERADO"
}
```
- El token se usa para acceder a rutas protegidas.

## 2. Usuarios API

### Listar usuarios
- Endpoint: `GET /api/usuarios`
- Headers:
  - `Authorization: Bearer TOKEN`
- Respuesta: lista de usuarios en JSON.

### Mostrar usuario por ID
- Endpoint: `GET /api/usuarios/{id}`
- Headers:
  - `Authorization: Bearer TOKEN`
- Respuesta: datos del usuario.

### Crear usuario
- Endpoint: `POST /api/usuarios`
- Headers:
  - `Authorization: Bearer TOKEN`
- Body (JSON):
```json
{
  "rut": "12345678-9",
  "nombre": "Nuevo",
  "apellido": "Usuario",
  "email": "nuevo@ventasfix.cl",
  "password": "nuevo123"
}
```
- Respuesta: usuario creado.

### Actualizar usuario
- Endpoint: `PUT /api/usuarios/{id}`
- Headers:
  - `Authorization: Bearer TOKEN`
- Body (JSON):
```json
{
  "nombre": "Actualizado"
}
```
- Respuesta: usuario actualizado.

### Eliminar usuario
- Endpoint: `DELETE /api/usuarios/{id}`
- Headers:
  - `Authorization: Bearer TOKEN`
- Respuesta: confirmación de borrado.

## 3. Productos API

- Endpoints CRUD:
  - `GET /api/productos` (listar)
  - `GET /api/productos/{id}` (detalle)
  - `POST /api/productos` (crear)
  - `PUT /api/productos/{id}` (actualizar)
  - `DELETE /api/productos/{id}` (eliminar)
- Todos requieren el header `Authorization: Bearer TOKEN`.
- Ejemplo de creación:
```json
{
  "sku": "P001",
  "nombre": "Puerta",
  "descripcion_corta": "Puerta café",
  "descripcion_larga": "Puerta de seguridad café",
  "imagen_url": "https://...",
  "precio_neto": 59000,
  "stock_actual": 20,
  "stock_minimo": 1,
  "stock_bajo": 5,
  "stock_alto": 50
}
```

## 4. Clientes API

- Endpoints CRUD:
  - `GET /api/clientes` (listar)
  - `GET /api/clientes/{id}` (detalle)
  - `POST /api/clientes` (crear)
  - `PUT /api/clientes/{id}` (actualizar)
  - `DELETE /api/clientes/{id}` (eliminar)
- Todos requieren el header `Authorization: Bearer TOKEN`.
- Ejemplo de creación:
```json
{
  "rut_empresa": "76543210-1",
  "rubro": "Comercio",
  "razon_social": "Comercial ABC Ltda.",
  "telefono": "987654321",
  "direccion": "Av. Central 123",
  "nombre_contacto": "Carlos Soto",
  "email_contacto": "carlos.soto@abc.cl"
}
```

## 5. Token y Rutas Protegidas
- Todas las rutas CRUD requieren el header:
```
Authorization: Bearer TOKEN
```
- Si el token no se envía o es inválido, la API responde con error 401 (no autorizado).

## 6. Ejemplo de uso en Postman
1. Hacer login y copiar el token.
2. En cada request, agregar el header `Authorization: Bearer TOKEN`.
3. Probar los endpoints CRUD de usuarios, productos y clientes.
4. Verificar respuestas JSON y manejo de errores.

---

**Este README te guía para mostrar y explicar la API VentasFix usando Postman, con ejemplos de código y headers.**