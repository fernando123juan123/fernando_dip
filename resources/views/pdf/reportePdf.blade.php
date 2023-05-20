<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>reporte</title>
  <style>
    table {
    border-collapse: collapse;
    width: 100%;
    }
    table,
    th,
    td {
    border: 0.5px solid #000;
    }
  </style>
</head>
<body>
  <!-- https://www.nigmacode.com/laravel/generar-pdf-dompdf-laravel/ -->

  <h1 align="center" style="text-shadow: 3px 3px 5px #000;">REPORTE DE PERSONAL</h1>
    <table >
      <thead>
        <tr style="font-size: 10px; background:#000;color:#fff;">
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
        </tr>
      </thead>
      <tbody>
        
        <?php $con=1; foreach ($obj_cate as $value) {  ?>
          <tr style="font-size: 10px;">
            <td><?php echo $con++; ?></td>
            <td align="center"><img width="30" src="imagen_docente/<?php echo $value->do_imagen ?>" alt=""></td>
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
          </tr>  
        <?php } ?>            
      </tbody>
    </table>
</body>
</html>