<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
// use App\Http\Requests\Request;

class UsuariosController extends Controller
{
    public function index(){

        $products = Usuarios::orderBy('id', 'DESC')->paginate();
        return view('products.index', compact('products'));
    }
    public function create(){
        return view('products.create');
    }
    
    public  function store(Request $request){
        $product = new Usuarios;

        $product->nombre  = $request->nombre;
        $product->correo   = $request->correo;
        $product->telefono = $request->telefono;
        $product->save();

        return redirect()->route('product.index')
                         ->with('info', 'El usuario fue creado.');
    }

    public function edit($id){

        $product = Usuarios::find($id);
        return view('products.edit ', compact('product'));
    }

    public  function update(Request $request, $id){
        
        $product = Usuarios::find($id);
        $product->nombre = $request->nombre;
        $product->correo = $request->correo;
        $product->telefono = $request->telefono;
        $product->save();
        return redirect()->route('product.index')
                         ->with('info', 'El usuario fue actualizado');
    }

    public function show($id){
        $product = Usuarios::find($id);
        return view('products.show', compact('product'));
    }

    public function destroy($id){
        $product = Usuarios::find($id);
        $product->delete();
        return  back()->with('info', 'El usuario fue eliminado.');
    }

    
    
}
