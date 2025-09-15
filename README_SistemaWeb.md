# Demostración del Sistema Web VentasFix

## 1. Login y Protección de Rutas
### Código ejemplo (routes/api.php):
```php
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index']);
  // ...otras rutas protegidas
});
```
- El sistema utiliza autenticación por token (Laravel Sanctum).
- Solo usuarios registrados pueden acceder a rutas protegidas (dashboard, CRUD).
- Ejemplo: Iniciar sesión con usuario creado (`admin@ventasfix.cl` / `admin123`).
- Si no estás autenticado, las rutas protegidas redirigen al login o devuelven error.

## 2. Dashboard
### Código ejemplo (DashboardController):
```php
public function index() {
  $usuarios = User::count();
  $productos = Producto::count();
  $clientes = Cliente::count();
  return view('dashboard.dashboard', compact('usuarios', 'productos', 'clientes'));
}
```
- Muestra conteo total de usuarios, productos y clientes.
- Acceso solo para usuarios autenticados.
- Visualización con diseño Vuexy (cards, colores, iconos).

## 3. CRUD de Usuarios
### Código ejemplo (UserApiController):
```php
public function store(Request $request) {
  $request->validate([
    'rut' => 'required|unique:users,rut',
    'email' => 'required|email|unique:users,email',
    'password' => 'required|min:6',
  ]);
  $user = User::create([
    'rut' => $request->rut,
    'nombre' => $request->nombre,
    'apellido' => $request->apellido,
    'email' => $request->email,
    'password' => Hash::make($request->password),
  ]);
  return response()->json($user, 201);
}
```
- Crear usuario: formulario con validación (RUT, email único, contraseña cifrada).
- Listar usuarios: tabla con datos y acciones (editar, eliminar).
- Actualizar usuario: edición de datos y cambio de contraseña (cifrada).
- Eliminar usuario: confirmación y borrado seguro.
- Validaciones y errores claros en cada acción.

## 4. CRUD de Productos
### Código ejemplo (ProductoApiController):
```php
public function store(Request $request) {
  $request->validate([
    'sku' => 'required|unique:productos,sku',
    'nombre' => 'required',
    'precio_neto' => 'required|numeric',
  ]);
  $producto = Producto::create([
    'sku' => $request->sku,
    'nombre' => $request->nombre,
    'precio_neto' => $request->precio_neto,
    'precio_venta' => $request->precio_neto * 1.19,
    // ...otros campos
  ]);
  return response()->json($producto, 201);
}
```
- Crear producto: formulario con validación y campos completos.
- Cálculo automático del precio de venta (IVA 19%) al crear/editar producto.
- Listar productos: cards y tabla con detalles, imagen, stock y precios.
- Actualizar producto: edición de todos los campos.
- Eliminar producto: confirmación y borrado seguro.

## 5. CRUD de Clientes
### Código ejemplo (ClienteApiController):
```php
public function store(Request $request) {
  $request->validate([
    'rut_empresa' => 'required|unique:clientes,rut_empresa',
    'email_contacto' => 'required|email|unique:clientes,email_contacto',
  ]);
  $cliente = Cliente::create($request->all());
  return response()->json($cliente, 201);
}
```
- Agregar cliente empresa: formulario con validación (RUT empresa, email único, teléfono).
- Listar clientes: tabla con datos y acciones (editar, eliminar).
- Actualizar cliente: edición de datos.
- Eliminar cliente: confirmación y borrado seguro.

## 6. Vuexy Aplicado
### Código ejemplo (layouts/app.blade.php):
```html
<link rel="stylesheet" href="{{ asset('vuexy/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('vuexy/css/style.css') }}">
<script src="{{ asset('vuexy/js/bootstrap.bundle.min.js') }}"></script>
```
### Ejemplo de clases Vuexy en vistas:
```html
<div class="card vuexy-card">
  <table class="vuexy-table">
    <!-- ... -->
  </table>
</div>
```
El diseño del sistema utiliza el template Vuexy y se han aplicado mejoras visuales:

- Navbar superior única y responsive con enlaces principales.
- Cards, tablas y botones con clases Vuexy (`vuexy-card`, `vuexy-table`, `vuexy-btn`).
- Iconos en botones y cards usando Bootstrap Icons.
- Badges para mostrar conteos y estados en dashboard, usuarios, clientes y productos.
- Footer fijo con copyright y estilo Vuexy.
- Scroll horizontal visible y aviso en tablas para usuarios móviles.
- Visual coherente y moderna en todas las vistas principales.

### Ejemplo de código aplicado:
```html
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow vuexy-navbar">...</nav>
<h1>Usuarios <span class="badge bg-primary">{{ count($usuarios) }}</span></h1>
<a class="btn btn-success"><i class="bi bi-person-plus"></i> Crear Usuario</a>
<!-- Logout seguro -->
<form action="/logout" method="POST" class="d-inline m-0 p-0">
  @csrf
  <button type="submit" class="nav-link btn btn-link text-danger p-0" style="border:none;background:none;display:flex;align-items:center;">
    <i class="bi bi-box-arrow-right me-1"></i> Salir
  </button>
</form>
<footer class="bg-white text-center py-3 border-top mt-4 shadow-sm vuexy-footer">...</footer>
```

## 7. Seguridad y Buenas Prácticas
### Código ejemplo (validación y cifrado):
```php
$request->validate([
  'email' => 'required|email|unique:users,email',
  // ...
]);
$user = User::create([
  'password' => Hash::make($request->password),
  // ...
]);
```
- Validación de datos en todos los formularios.
- Contraseñas cifradas.
- Protección contra SQL Injection y XSS mediante validaciones y sanitización.
- Manejo de errores unificado y mensajes claros.

## 8. Requisitos para la Demostración
- Tener usuarios registrados para probar login y rutas protegidas.
- Mostrar el dashboard tras iniciar sesión.
- Realizar operaciones CRUD en usuarios, productos y clientes.
- Destacar el diseño y funcionalidad Vuexy en la interfaz.

---

**Este README explica los puntos clave que debes mostrar y explicar durante la demostración del sistema web VentasFix.**