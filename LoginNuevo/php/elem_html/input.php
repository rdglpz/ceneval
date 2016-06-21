<?php
	/*objeto que crea un elemento de tipo input, recibe el tipo, nombre, id,
	placeholder, y la expresion regular para la validacion*/ 
	class input{
		/*variables*/
		private $type;
		private $name;
		private $id;
		private $placeholder;
		private $pattern;
		private $valor;
		private $bandera;

		/*constructor*/
		public function __construct($tipo,$nombre,$ident,$contenido,$validacion,$value,$flag){
			$this->type = $tipo;
			$this->name = $nombre;
			$this->id = $ident;
			$this->placeholder = $contenido;
			$this->pattern = $validacion;
			$this->valor = $value;
			$this->bandera = $flag;
		}

		/*funciones*/
		public function crea_input(){
			/*función que imprime el elemento*/
			if($this->bandera==0){
				echo "
				<input type=".$this->type." class='form-control input-margin' name=".$this->name." id=".$this->id." placeholder=".$this->placeholder." pattern=".$this->pattern." required>";	
			}else if ($this->bandera == 1){
				echo "
				<input type=".$this->type." class='form-control input-margin' name=".$this->name." id=".$this->id." placeholder=".$this->placeholder." pattern=".$this->pattern." value=".$this->valor." required>";	
			}else if ($this->bandera == 2){
				echo "
				<input type=".$this->type." class='form-control input-margin' name=".$this->name." id=".$this->id." placeholder=".$this->placeholder." required>";	
			}
			
		}
	}

?>