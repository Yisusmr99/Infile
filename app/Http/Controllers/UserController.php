<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;

class UserController extends Controller
{
    protected $result      = false;
	protected $message     = 'Ocurrió un problema al procesar su solicitud';
	protected $records     = array();
    protected $status_code = 400;
    

    public function index(){
        try {
            $records           = Usuarios::all();
            $this->status_code = 200;
            $this->result      = true;
            $this->message     = 'Registros consultados correctamente';
            $this->records     = $records;
        } catch (\Exception $e) {
            $this->status_code = 400;
            $this->result      = false;
            $this->message     = env('APP_DEBUG')?$e->getMessage():$this->message;
        }finally{
            $response = [
                'result'  => $this->result,
                'message' => $this->message,
                'records' => $this->records,
            ];

            return response()->json($response, $this->status_code);
        }
    }

    public function store(Request $request) {  
		try {
			$record = Usuarios::create([
                
                    'nombre'     => $request->input('nombre'),
                    'correo'     => $request->input('correo'),
                    'telefono'   => $request->input('telefono'),
				]);
			if ($record) {
				$this->status_code = 200;
				$this->result      = true;
				$this->message     = 'Usuario  creado correctamente';
				$this->records     = $record;
			} else {
				throw new \Exception('Usuario no pudo ser creado.');
			}
		} catch (\Exception $e) {
			$this->status_code = 400;
			$this->result      = false;
			$this->message     = env('APP_DEBUG')?$e->getMessage():$this->message;
		}finally{
			$response = [
				'result'  => $this->result,
				'message' => $this->message,
				'records' => $this->records,
			];

			return response()->json($response, $this->status_code);
		}
    }
    
    public function show($id) {
		try {
			$record = Usuarios::find($id);
			if ($record) {
				$this->status_code = 200;
				$this->result      = true;
				$this->message     = 'Usuario consultado correctamente';
				$this->records     = $record;
			} else {
				throw new \Exception('Usuario no encontrado');
			}
		} catch (\Exception $e) {
			$this->status_code = 400;
			$this->result      = false;
			$this->message     = env('APP_DEBUG')?$e->getMessage():$this->message;
		}finally{
			$response = [
				'result'  => $this->result,
				'message' => $this->message,
				'records' => $this->records,
			];

			return response()->json($response, $this->status_code);
		}
    }
    
    public function update(Request $request, $id) {
		try {
            $record         = Usuarios::find($id);
            $record->nombre = $request->input('nombre', $record->nombre);
            $record->correo = $request->input('correo', $record->correo);
            $record->telefono = $request->input('telefono', $record->telefono);
            if ($record->save()) {
                $this->status_code = 200;
                $this->result      = true;
                $this->message     = 'Usuario actualizada correctamente';
                $this->records     = $record;
            } else {
                throw new \Exception('Usuario no actualizado');
            }
		} catch (\Exception $e) {
			$this->status_code = 400;
			$this->result      = false;
			$this->message     = env('APP_DEBUG')?$e->getMessage():$this->message;
		}finally{
			$response = [
				'result'  => $this->result,
				'message' => $this->message,
				'records' => $this->records,
			];
			return response()->json($response, $this->status_code);
		}
    }
    
    public function destroy($id) {
		try {
			$record = Usuarios::find($id);
			if ($record) {
				$record->delete();
				$this->status_code = 200;
				$this->result      = true;
				$this->message     = 'Usuario eliminado correctamente';
			} else {
				throw new \Exception('Usuario no pudo ser encontrado');
			}
		} catch (\Exception $e) {
			$this->status_code = 400;
			$this->result      = false;
			$this->message     = env('APP_DEBUG')?$e->getMessage():$this->message;
		}finally{
			$response = [
				'result'  => $this->result,
				'message' => $this->message,
				'records' => $this->records,
			];

			return response()->json($response, $this->status_code);
		}
	}

	public function principal(){

        $usuarios = Usuarios::orderBy('id', 'DESC')->paginate();
        return view('usuarios.index', compact('usuarios'));
	}
	
	public function ver($id){
        $usuarios = Usuarios::find($id);
        return view('usuarios.show', compact('usuarios'));
	}
	
	public function eliminar($id){
        $product = Usuarios::find($id);
        $product->delete();
        return  back()->with('info', 'El producto fue eliminado.');
    }
}
