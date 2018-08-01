<div class="row">

	<div class="col l8 m8 s12 offset-m2 offset-l2" style='border:2px solid; padding: 10px'>
	<?php

		$atributos = array('method'=>'post', 'id' => 'guardar');
		echo form_open('empleados/actualizar', $atributos);

		echo form_hidden('nombre_ant', $empleado->nombre);
		$divi = "<div class='input-field col s4 l4 m4'>";
		$divc = "</div>";
		$clearfix = "<div class='clearfix'></div>";

		echo $divi;
		echo form_label('Nombre');
		echo form_input(array('type'=>'text', 'name'=>'nombre', 'value' => $empleado->nombre, 'required'=>true, 'class'=>'validate'));
		echo $divc;

		echo $divi;
		echo form_input(array('type'=>'text', 'name'=>'apellido', 'value' => $empleado->apellido, 'required'=>true, 'class'=>'validate'));
		echo form_label('Apellido');
		echo $divc;
		echo $clearfix;

		echo $divi;
		echo form_label('Edad');
		echo form_input(array('type'=>'text', 'name'=>'edad', 'value' => $empleado->edad, 'required'=>true, 'class'=>'validate','pattern'=>'[0-9][0-9]'));
		echo $divc;

		echo $divi;
		echo form_input(array('type'=>'text', 'name'=>'cargo', 'value' => $empleado->cargo, 'required'=>true, 'class'=>'validate'));
		echo form_label('Cargo');
		echo $divc;
		echo $clearfix;

		echo form_submit(array('value' => 'Actualizar', 'class' => 'btn waves-effect'));
		echo form_reset(array('value' => 'Cancelar', 'class' => 'btn waves-effect red'));
		echo form_close();
	?>
	</div>
</div>