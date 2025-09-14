<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Producto;
use App\Models\Cliente;

class DashboardController extends Controller
{
    public function index()
    {
        $usuarios_count = User::count();
        $productos_count = Producto::count();
        $clientes_count = Cliente::count();

        return view('dashboard.dashboard', compact('usuarios_count', 'productos_count', 'clientes_count'));
    }
}
