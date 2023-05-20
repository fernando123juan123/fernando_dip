<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Docente;
use App\Persona;
use Illuminate\Support\Facades\Redirect;
use DB;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Str; 
// use App\Models\Post;

class ControllerSistema extends Controller
{
    //

    public function prueba(){
        $valor=15;
        $valor1=48;
        if($valor>$valor1){
            echo 'valor1 ES MAYOR :'.$valor1;
        }ELSE{
            echo "valor ES MENOR:".$valor;
        }
    }
    public function index(){
        $obj_cate=DB::table('docentes')
        ->select('docentes.*', 'personas.*')
        ->join('personas','docentes.idpersonas', '=','personas.id')
        ->where('do_estado','<>', 'eliminar')
        ->orderBy('personas.id','desc')->get();
        // return var_dump($obj_cate);
        return view('docente.docente_index',compact('obj_cate'));
    }
    public function nuevoDocente(){
        return view('docente.nuevoDocente');
    }
    public function guardarNuevoPersona(Request $request){
        $obj=new Persona();
        $obj->ci=$request->post('ci');
        $obj->expedido=$request->post('expedido');
        $obj->nombre=mb_strtoupper($request->post('nombre'),'utf-8');
        $obj->paterno=mb_strtoupper($request->post('paterno'),'utf-8');
        $obj->materno=mb_strtoupper($request->post('materno'),'utf-8');
        $obj->fecha_nac=$request->post('fecha_nac');
        $obj->celular=$request->post('celular');
        $obj->correo=$request->post('correo');
        $obj->save();

        $idpersona=$obj->id;

        if($request->hasFile('imagen')){
            $imagen=$request->file('imagen');
            $nombreimagen=Str::slug(date('ymdHs')).".".$imagen->guessExtension();
            $ruta=public_path('imagen_docente/');
            $imagen->move($ruta,$nombreimagen);
        }


        // $idpersona=Persona::latest('idpersonas')->first()->id;
        // echo ">>".$idpersona;die();
        $obj1=new Docente();
        $obj1->do_profesion=mb_strtoupper($request->post('profesion'),'utf-8');
        $obj1->do_fecha_reg=date('Y-m-d');
        $obj1->do_estado='activo';
        $obj1->idpersonas=$idpersona;
        $obj1->do_imagen=$nombreimagen;
        $obj1->save();
    }
    public  function editarDocente($iddocentes){
        // $idpersonas=$request->post('idpersonas');
        // $iddocentes=$request->post('iddocentes');

        $obj=DB::table('docentes')
        ->select('docentes.*', 'personas.*')
        ->join('personas','docentes.idpersonas', '=','personas.id')
        ->where('docentes.id','=', $iddocentes)->first();
        // return var_dump($obj_cate); die();
        return view('docente.editarDocente',compact('obj'));
    }
    public function guardarEditarPersona(Request $request){
        // echo $idpersonas; die();
        $obj= Persona::find($request->post('idpersonas'));
        // var_dump($obj); die();
        $obj->ci=$request->post('ci');
        $obj->expedido=$request->post('expedido');
        $obj->nombre=mb_strtoupper($request->post('nombre'),'utf-8');
        $obj->paterno=mb_strtoupper($request->post('paterno'),'utf-8');
        $obj->materno=mb_strtoupper($request->post('materno'),'utf-8');
        $obj->fecha_nac=$request->post('fecha_nac');
        $obj->celular=$request->post('celular');
        $obj->correo=$request->post('correo');
        $obj->save();

        $do_imagen=$request->post('do_imagen');
        if($request->hasFile('imagen')){
            // Storage::disk('imagen_docente')->delete($do_imagen);

            $imagen=$request->file('imagen');
            $nombreimagen=Str::slug(date('ymdHs')).".".$imagen->guessExtension();
            $ruta=public_path('imagen_docente/');
            $imagen->move($ruta,$nombreimagen);
        }else{
            $nombreimagen=$do_imagen;
        }

        $obj1= Docente::find($request->post('iddocentes'));
        $obj1->do_profesion=mb_strtoupper($request->post('profesion'),'utf-8');
        $obj1->do_imagen=$nombreimagen;
        $obj1->save();
    }
    public function eliminar_doc(Request $request){
        $obj1= Docente::find($request->post('id'));
        $obj1->do_estado='eliminar';
        $obj1->save();
    }
    public function estado_doc(Request $request){ 
        // dd($request->get('do_estado'));die();
        $obj1= Docente::find($request->post('id'));
        if($request->post('do_estado')=='activo'){
            $obj1->do_estado='inactivo';
        }else{
            $obj1->do_estado='activo';
        }
        $obj1->save();
    }

    public function reportePdf(){
        $obj_cate=DB::table('docentes')
        ->select('docentes.*', 'personas.*')
        ->join('personas','docentes.idpersonas', '=','personas.id')
        ->where('do_estado','<>', 'eliminar')
        ->orderBy('personas.id','desc')->get();

        $pdf = \PDF::loadView('pdf.reportePdf', compact('obj_cate'));
        // return $pdf->setPaper('a4', 'landscape')->download('ejemplo.pdf');//horizontal
        // return $pdf->setPaper('a4', 'portrait')->download('ejemplo.pdf');//vertical

        // return $pdf->setPaper('Legal', 'landscape')->download('ejemplo.pdf');//horizontal
        return $pdf->setPaper('Legal', 'portrait')->download('ejemplo.pdf');//vertical
    }
    public function reporteExcel(){
        return Excel::download(new UsersExport, 'users.xlsx');

        /*$obj_cate=DB::table('docentes')
        ->select('docentes.*', 'personas.*')
        ->join('personas','docentes.idpersonas', '=','personas.id')
        ->where('do_estado','<>', 'eliminar')
        ->orderBy('personas.id','desc')->get();

        $pdf = \Excel::loadView('pdf.reportePdf', compact('obj_cate'));
        return $pdf->download('ejemplo.xlsx');//vertical*/
    }
}
