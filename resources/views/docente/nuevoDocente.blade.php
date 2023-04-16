
@extends('plantilla')
@section('contenido')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> FORMULARIO DOCENTE</h4>
      </div>
      <div class="card-body ">
        <a href="<?php echo route('sistema.index') ?>" class="btn btn-danger"> SALIR</a>
      
          <form id="guardarNuevoPersona" method="post">
            <div class="row">
              @csrf
              <div class="col-lg-3">
                <div class="form-group">
                  <label >CARNET :</label>
                  <input type="text" class="form-control" name="ci" placeholder="Ingresar..." required>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label >EPEDIDO :</label>
                  <select  class="form-control" name="expedido" required>
                    <option></option>
                    <option value="LP">LA PAZ</option>
                    <option value="BN">BENI</option>
                    <option value="TJ">TARIJA</option>
                    <option value="CBB">COCHABAMBA</option>
                    <option value="SC">SUCRE</option>
                    <option value="PD">PANDO</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label >NOMBRE :</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Ingresar..." required>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label >PATERNO :</label>
                  <input type="text" class="form-control" name="paterno" placeholder="Ingresar...">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label >MATERNO :</label>
                  <input type="text" class="form-control" name="materno" placeholder="Ingresar...">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label >FECHA NAC. :</label>
                  <input type="date" class="form-control" name="fecha_nac" placeholder="Ingresar..." required>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label >CELULAR :</label>
                  <input type="text" class="form-control" name="celular" placeholder="Ingresar..." required maxlength="8">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label >CORREO :</label>
                  <input type="email" class="form-control" name="correo" placeholder="Ingresar...">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label >PROFESION :</label>
                  <input type="text" class="form-control" name="profesion" placeholder="Ingresar..." required>
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

$("#guardarNuevoPersona").submit(function(event) {
  event.preventDefault();
  var formData=new FormData($("#guardarNuevoPersona")[0]);

  $.ajax({
      url:'<?php echo route('sistema.guardarNuevoPersona') ?>',
      type:'POST',
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