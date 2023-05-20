
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
        <a href="<?php echo route('sistema.reportePdf')?>" target="_blank" class="btn btn-warning"> GENERAR REPORTE PDF</a>
        <a href="<?php echo route('sistema.reporteExcel')?>" target="_blank" class="btn btn-info"> GENERAR REPORTE EXCEL</a>
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
                    <a  class="btn btn-primary btn-round btn-sm" href="<?php echo route('sistema.editarDocente',$value->id) ?>"><i class="fa fa-edit"></i></a>
                    <a  class="btn btn-primary btn-round btn-sm" href="#" onclick="estado_doc('<?php echo $value->do_estado ?>','<?php echo $value->id ?>')"><i class="fa fa-pause"></i></a>

                    <a  class="btn btn-primary btn-round btn-sm" href="#" onclick="eliminar_doc('<?php echo $value->id ?>')"><i class="fa fa-trash"></i></a>

                   

                    
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

function eliminar_doc(id){
  alertify.confirm("<p>ESTA SEGURO QUE DESEA ELIMINAR?<br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
    if (e) {
      $.post('<?php echo route('sistema.eliminar_doc') ?>', {id}, function() {
        alertify.success("<b>Datos enviados...</b>"); 
        alertify.alert("<b style='color: #008000;'>EXITOSAMENTE GUARDADOS</b> ", function () { 
          window.location='';
        }); 
      });
    } else { alertify.error("Has pulsado  cancel ");
    }
  }); 
  return false

}
function estado_doc(do_estado,id){
  $.post('<?php echo route('sistema.estado_doc') ?>', {do_estado,id}, function() {
    alertify.success("<b>Datos enviados...</b>"); 
    alertify.alert("<b style='color: #008000;'>EXITOSAMENTE GUARDADOS</b> ", function () { 
      window.location='';
    }); 
  });
}
$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>
</div>

@endsection