
@extends('plantilla')
@section('contenido')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" align="center"> FORMULARIO MODIFICAR DATOS DOCENTE</h4>
      </div>

      <div class="card-body ">
        <a href="<?php echo route('sistema.index') ?>" class="btn btn-danger"> SALIR</a>
      
          <form id="guardarEditarPersona" method="post">
            <div class="row">
              @csrf
              <input type="hidden" name="idpersonas" value="<?php echo $obj->idpersonas ?>">
              <input type="hidden" name="iddocentes" value="<?php echo $obj->id ?>">
              <input type="hidden" name="do_imagen" value="<?php echo $obj->do_imagen ?>">
              <div class="col-lg-3">
                <div class="form-group">
                  <label >CARNET :</label>
                  <input type="text" class="form-control" name="ci" placeholder="Ingresar..." value="<?php echo $obj->ci ?>" required>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label >EPEDIDO :</label>
                  <select  class="form-control" name="expedido" required>
                    <option></option>
                    <option value="LP" <?php if($obj->expedido=='LP') echo "selected"; ?>>LA PAZ</option>
                    <option value="BN" <?php if($obj->expedido=='BN') echo "selected"; ?>>BENI</option>
                    <option value="TJ" <?php if($obj->expedido=='TJ') echo "selected"; ?>>TARIJA</option>
                    <option value="CBB" <?php if($obj->expedido=='CBB') echo "selected"; ?>>COCHABAMBA</option>
                    <option value="SC" <?php if($obj->expedido=='SC') echo "selected"; ?>>SUCRE</option>
                    <option value="PD" <?php if($obj->expedido=='PD') echo "selected"; ?>>PANDO</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label >NOMBRE :</label>
                  <input type="text" class="form-control" name="nombre" value="<?php echo $obj->nombre ?>" placeholder="Ingresar..." required>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label >PATERNO :</label>
                  <input type="text" class="form-control" name="paterno" value="<?php echo $obj->paterno ?>" placeholder="Ingresar...">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label >MATERNO :</label>
                  <input type="text" class="form-control" name="materno" value="<?php echo $obj->materno ?>" placeholder="Ingresar...">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label >FECHA NAC. :</label>
                  <input type="date" class="form-control" name="fecha_nac" value="<?php echo $obj->fecha_nac ?>" placeholder="Ingresar..." required>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label >CELULAR :</label>
                  <input type="text" class="form-control" name="celular" placeholder="Ingresar..." value="<?php echo $obj->celular ?>" required maxlength="8">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label >CORREO :</label>
                  <input type="email" class="form-control" name="correo" value="<?php echo $obj->correo ?>" placeholder="Ingresar...">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label >PROFESION :</label>
                  <input type="text" class="form-control" name="profesion" value="<?php echo $obj->do_profesion ?>" placeholder="Ingresar..." required>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="form-group">
                  <label >IMAGEN :</label>
                  <input type="file"  class="form-control" name="imagen" accept="image/png,image/jpeg" placeholder="Ingresar...">
                </div>
              </div>
              
              
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-lg" >GUARDAR DATOS</button>
              <a href="<?php echo route('sistema.index') ?>" class="btn btn-primary btn-lg" >CANCELAR</a>
            </div>
          </form>
          
      </div>
    </div>
  </div>

<script>

$("#guardarEditarPersona").submit(function(event) {
  event.preventDefault();
  var formData=new FormData($("#guardarEditarPersona")[0]);

  $.ajax({
      url:'<?php echo route('sistema.guardarEditarPersona') ?>',
      type:'post',
      data:formData,
      cache:false,
      processData:false,
      contentType:false,
      success:function(){ 
        alertify.success("<b>Datos enviados...</b>"); 
        alertify.alert("<b style='color: #008000;'>EXITOSAMENTE GUARDADOS</b> ", function () { 
          window.location='<?php echo route('sistema.index') ?>';
        }); 
      }
  });
});

</script>
</div>

@endsection