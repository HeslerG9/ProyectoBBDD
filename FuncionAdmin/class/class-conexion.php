<?php
	class Conexion{
		private $host = "localhost";
		private $usuario = "postgres";
		private $password = "honduras100";
		private $baseDatos = "aerolinea2";
		private $puerto = 5432;
		private $link;

		public function __construct(){
			$this->link = pg_connect(
				"host=$this->host 
				dbname=$this->baseDatos 
				port=$this->puerto 
				user=$this->usuario 
				password=$this->password"
			) or die('Error al conectar con la base de datos');
		}

		public function ejecutarConsulta($sql){
			return pg_query($this->link, $sql);
		}

		public function obtenerFila($resultado){
			return pg_fetch_array($resultado);
		}

		public function cerrarConexion(){
			pg_close($this->link);
		}

		public function getLink(){
			return $this->link;
		}

		//no se para que es esta
		public function antiInyeccion($texto){
			return mysqli_real_escape_string($this->link, $texto);
		}
		//tampoco se
		public function ultimoId(){
			return mysqli_insert_id($this->link);
		}
	}
?>