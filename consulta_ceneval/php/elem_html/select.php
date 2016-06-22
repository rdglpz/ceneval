<?php

	class select_list{

		private $opciones;
		private $valores;
		private $nombre;
		private $id;
		private $nombre_select;
		
		public function __construct($options,$values,$name,$ident,$n_select){
			$this->opciones = $options;
			$this->valores = $values;
			$this->nombre = $name;
			$this->id = $ident;
			$this->nombre_select = $n_select;
		}

		public function crea_select(){
			?>
			    <div class="form-group">
			    	<label for="<?php echo $this->id; ?>"><?php echo $this->nombre; ?></label>
			    	<select class="form-control" id="<?php echo $this->id; ?>" name="<?php echo $this->nombre_select; ?>">
			      	<?php
			      		for ($i=0;$i<count($this->opciones);$i++){
			      			?>
			      			<option value="<?php echo $this->valores[$i]; ?>"><?php echo $this->opciones[$i]; ?></option>
			      			<?php
			      		}
			      	?>
			    	</select>
				</div>
		<?php

		}

	}
?>