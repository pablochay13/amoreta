<?php   
# CLASE PARA GESTIONAR EL IDIOMA DEL USUARIO
class lenguaje
{
    private $key;
#:._________________________________________________ soy una barra separadora :)
  public function __construct($k='es')
  {     
    $this->key = $k;
  }
#:._________________________________________________ soy una barra separadora :)
# Carga idioma elegido y retorna en un array 
    public function get_idioma()
    {           
        #Si achivo de idioma es correcto
        $file = 'inc/lenguaje/'.$this->key.'.inc.php';
        if ( is_file( $file ) )        
            include_once $file;
        else
            include_once 'inc/lenguaje/es.inc.php';                
        return $id;   
    }
#:._________________________________________________ soy una barra separadora :)    
}
?>