
<?php
    ini_set('display_errors', 1);
    require_once('conexion.php');
    require_once('paginacion.php');
    require_once('auditoria.php');

    class Usuario  extends Pagination{
        private $id;
        private $nombre_usuario;
        private $email;
        private $password;
        private $perfiles_id;


        public function __construct($id='', $nombre_usuario='', $email='', $password='', $perfiles_id=''){

            $this->id = $id;
            $this->nombre_usuario = $nombre_usuario;
            $this->email = $email;
            $this->password = $password;
            $this->perfiles_id = $perfiles_id;

        }

        public function guardar(){
            try{
                $conexion = new Conexion();
                $password = password_hash($this->password, PASSWORD_DEFAULT);
                $query = "INSERT INTO usuarios (nombre_usuario, email, password, perfiles_id) VALUES ('$this->nombre_usuario', '$this->email', '$password', '$this->perfiles_id')";
                $id = $conexion->insertar($query);
                $auditoria = new Auditoria('guardar', $id, 'usuarios');
                $auditoria->guardar();
                return $id;
            }catch(Exception $e){
                throw new Exception('Division by zero.');
            }
            
        }

        public function actualizar(){
            $conexion = new Conexion();
            $password = password_hash($this->password, PASSWORD_DEFAULT);
            $query = "UPDATE usuarios SET nombre_usuario = '$this->nombre_usuario', email = '$this->email', password =  '$password', perfiles_id = '$this->perfiles_id' WHERE id = '$this->id'";
            return $conexion->actualizar($query);
        }

        public function cambiar_password(){
                $conexion = new Conexion();
                $password = password_hash($this->password, PASSWORD_DEFAULT);
                $query = "UPDATE usuarios SET password = '$password' WHERE id = '$this->id'";
                return $conexion->actualizar($query);
        }

        public function eliminar(){
            $conexion = new Conexion();
            $query = "UPDATE usuarios SET activo = 0 WHERE id = '$this->id'";
            $resultado =  $conexion->actualizar($query);
            $auditoria = new Auditoria('eliminar', $this->id, 'usuarios');
            $auditoria->guardar();
            return $resultado;
        }

        public function validar_usuario(){
            $conexion = new Conexion();
            $query = "SELECT * FROM usuarios WHERE nombre_usuario = '$this->nombre_usuario' and activo = 1";
            return $conexion->consultar($query);
        }

        public function validar_email(){
                $conexion = new Conexion();
                $query = "SELECT * FROM usuarios WHERE email = '$this->email'";
                return $conexion->consultar($query);
        }
            
        public function traer_usuarios(){
            $conexion = new Conexion();
            $query = "SELECT usuarios.id as usuarios_id, usuarios.*, perfiles.* 
            FROM facturacion.usuarios inner join 
            perfiles on perfiles.id=usuarios.perfiles_id where activo = 1
            limit $this->current_page, $this->page_size";
            return $conexion->consultar($query);     
        }

        public function traer_usuarios_cantidad(){
            $conexion = new Conexion();
            $query = "SELECT COUNT(*) as total FROM usuarios WHERE activo = 1";
            return $conexion->consultar($query);
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nombre_usuario
         */ 
        public function getNombre_usuario()
        {
                return $this->nombre_usuario;
        }

        /**
         * Set the value of nombre_usuario
         *
         * @return  self
         */ 
        public function setNombre_usuario($nombre_usuario)
        {
                $this->nombre_usuario = $nombre_usuario;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

            /**
             * Get the value of perfiles_id
             */ 
            public function getPerfiles_id()
            {
                        return $this->perfiles_id;
            }

            /**
             * Set the value of perfiles_id
             *
             * @return  self
             */ 
            public function setPerfiles_id($perfiles_id)
            {
                        $this->perfiles_id = $perfiles_id;

                        return $this;
            }
    }

