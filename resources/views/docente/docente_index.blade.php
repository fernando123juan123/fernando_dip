
@extends('plantilla')
@section('contenido')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> LISTA DE DOCENTES</h4>
      </div>
      <div class="card-body">
        <a href="<?php echo route('sistema.nuevoDocente') ?>" class="btn btn-success"> NUEVO REGISTRO</a>
        <a href="" target="_blank" class="btn btn-warning"> GENERAR REPORTE PDF</a>
        <a href="" target="_blank" class="btn btn-info"> GENERAR REPORTE EXCEL</a>
        <div class="table-responsive">
          <table id="myTable" class="table table-border" style="width: 100%;" border="0">
            <thead>
              <tr style="font-size: 10px;">
                <th>#</th>
                <th> IMAGEN</th>
                <th> CARNET</th>
                <th> NOMBRE</th>
                <th> APELLIDOS</th>
                <th> FECHA NAC.</th>
                <th> CELULAR</th>
                <th> CORREO</th>
                <th> PROFESION</th>
                <th> ESTADO</th>
                <th> </th>                
              </tr>
            </thead>
            <tbody>
              
              <?php $con=1; foreach ($obj_cate as $value) {  ?>
                <tr>
                  <td><?php echo $con++; ?></td>
                  <td><img width="50" src="/imagen_docente/<?php echo $value->do_imagen ?>" alt=""></td>
                  <td><?php echo $value->ci.' '.$value->expedido ?></td>
                  <td><?php echo $value->nombre ?></td>
                  <td><?php echo $value->paterno.' '.$value->materno ?></td>
                  <td><?php echo $value->fecha_nac ?></td>
                  <td><?php echo $value->celular ?></td>
                  <td><?php echo $value->correo ?></td>
                  <td><?php echo $value->do_profesion ?></td>
                  <td>
                    <?php if($value->do_estado=='activo'){ ?>
                      <span class="text-success">ACTIVO</span>
                    <?php } else{ ?>
                      <span class="text-danger">INACTIVO</span>
                    <?php } ?>
                  </td>
                  <td>
                    <a  class="btn btn-primary btn-round btn-sm" href="<?php echo route('sistema.editarDocente',$value->iddocentes) ?>"><i class="fa fa-edit"></i></a>
                    
                    <a href="" class="btn btn-primary btn-round btn-sm" title="CAMBIAR ESTADO"><i class="fa fa-pause"></i> </a>
                    <form id="eliminar_doc" method="post">
                      @method('PUT')
                      @csrf
                      <input type="hidden" name="idpersonas" value="<?php echo $value->idpersonas ?>">
                      <input type="hidden" name="iddocentes" value="<?php echo $value->iddocentes ?>">
                      <button type="submit"  class="btn btn-primary btn-round btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>  
              <?php } ?>            
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<script>
$("#eliminar_doc").submit(function(event) {
  event.preventDefault();
  var formData=new FormData($("#eliminar_doc")[0]);
  alert()
});
$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>
</div>

@endsection