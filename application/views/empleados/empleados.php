<div class="row">
<h1>Ejercicio</h1>
	<div class="col l8 m8 s12 offset-m2 offset-l2">
			<?php
		$atributos = array('method'=>'post', 'id' => 'guardar');
		echo form_open('empleados/guardar', $atributos);
		$divi = "<div class='input-field col s4 l4 m4'>";
		$divc = "</div>";
		$clearfix = "<div class='clearfix'></div>";

		echo $divi;
		echo form_label('Nombre');
		echo form_input(array('type'=>'text', 'name'=>'nombre', 'required'=>true, 'class'=>'validate'));
		echo $divc;

		echo $divi;
		echo form_input(array('type'=>'text', 'name'=>'apellido', 'required'=>true, 'class'=>'validate'));
		echo form_label('Apellido');
		echo $divc;
		echo $clearfix;

		echo $divi;
		echo form_label('Edad');
		echo form_input(array('type'=>'text', 'name'=>'edad', 'required'=>true, 'class'=>'validate','pattern'=>'[0-9][0-9]'));
		echo $divc;

		echo $divi;
		echo form_input(array('type'=>'text', 'name'=>'cargo', 'required'=>true, 'class'=>'validate'));
		echo form_label('Cargo');
		echo $divc;
		echo $clearfix;


		echo form_submit(array('value' => 'Guardar', 'class' => 'btn waves-effect'));
		echo form_reset(array('value' => 'Cancelar', 'class' => 'btn waves-effect red'));
		echo form_close();
	?>
	</div>
</div>

<div class="row">
	<div class="col offset-l2 offset-m2 l8 m8 s12">
	<table border="1" class="striped responsive-table">
		<caption>Listado</caption>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Edad</th>
				<th>Cargo</th>
				<th>Opciones</th>
				<th><a href='index.php/empleados/imprimir'>Imprimir</a></th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach($empleados as $empleado)
			{
				echo "<tr>
				<td>{$empleado->nombre}</td>
				<td>{$empleado->apellido}</td>
				<td>{$empleado->edad}</td>
				<td>{$empleado->cargo}</td>
				<td><a href='index.php/empleados/modificar/{$empleado->nombre}'>Modificar</a></td>
				<td><a href='index.php/empleados/eliminar/{$empleado->nombre}'>Eliminar</a></td>
				</tr>";
			}
			
			?>
		</tbody>
	</table>
</div>