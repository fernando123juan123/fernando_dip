<?php

namespace App\Exports;

use App\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'CARNET',
            'NOMBRE',
            'PATERNO',
            'MATERNO',
            'FECHA NAC.',
            'CELULAR',
            'CORREO',
            'ESTADO',
            'PROFESION',
        ];
    }
    public function collection()
    {
         $obj_cate=DB::table('docentes')
        ->select('personas.ci','personas.nombre', 'personas.paterno','personas.materno','personas.fecha_nac','personas.celular','personas.correo','docentes.do_estado','docentes.do_profesion')
        ->join('personas','docentes.idpersonas', '=','personas.id')
        ->where('do_estado','<>', 'eliminar')
        ->orderBy('personas.id','desc')->get();
         return $obj_cate;

    }
}