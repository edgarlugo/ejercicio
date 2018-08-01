<div class="row">

	<div class="col l8 m8 s12 offset-m2 offset-l2" style='border:2px solid; padding: 10px'>
	<?php

		$atributos = array('method'=>'post', 'id' => 'guardar');
		echo form_open('empleados/actualizar', $atributos);

		echo form_hidden('id_empleado', $empleado->id_empleado);

		$divi = "<div class='input-field col s4 l4 m4'>";
		$divc = "</div>";
		$clearfix = "<div class='clearfix'></div>";

		echo $divi;
		echo form_label('Código');
		echo form_input(array('type'=>'text', 'value' => $empleado->codigo, 'required'=>true, 'class'=>'validate', 'disabled' => true));
		echo $divc;

		echo $divi;
		echo form_label('Nombre');
		echo form_input(array('type'=>'text', 'value' => $empleado->nombre, 'name'=>'nombre', 'required'=>true, 'class'=>'validate'));
		echo $divc;

		echo $divi;
		echo form_input(array('type'=>'text', 'value' => $empleado->apellido,'name'=>'apellido', 'required'=>true, 'class'=>'validate'));
		echo form_label('Apellido');
		echo $divc;
		echo $clearfix;

		echo $divi;
		echo form_input(array('type'=>'text','value' => $empleado->estatura ,'name'=>'estatura', 'required'=>true, 'class'=>'validate'));
		echo form_label('Estatura');
		echo $divc;
		echo $clearfix;

		echo form_submit(array('value' => 'Actualizar', 'class' => 'btn waves-effect'));
		echo form_reset(array('value' => 'Cancelar', 'class' => 'btn waves-effect red'));
		echo form_close();
	?>
	</div>
</div>