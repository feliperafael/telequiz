<?php
//echo 'Realpath '.(__DIR__.DIRECTORY_SEPARATOR."configuracao.php").'<br>';
if(realpath(__DIR__.DIRECTORY_SEPARATOR."cfg.php")!=false){
	require_once(realpath(__DIR__.DIRECTORY_SEPARATOR."cfg.php"));
}else{
	echo 'Verifique a configuração ';
}
//echo '<br>LOAD.php<br>';
function normalizePath($path)
{
    $parts = array();// Array to build a new path from the good parts
    $path = str_replace('\\', '/', $path);// Replace backslashes with forwardslashes
    $path = preg_replace('/\/+/', '/', $path);// Combine multiple slashes into a single slash
    $segments = explode('/', $path);// Collect path segments
    $test = '';// Initialize testing variable
    foreach($segments as $segment)
    {
        if($segment != '.')
        {
            $test = array_pop($parts);
            if(is_null($test))
                $parts[] = $segment;
            else if($segment == '..')
            {
                if($test == '..')
                    $parts[] = $test;

                if($test == '..' || $test == '')
                    $parts[] = $segment;
            }
            else
            {
                $parts[] = $test;
                $parts[] = $segment;
            }
        }
    }
    return implode('/', $parts);
}

function __autoload($class_name) {
	$inc_class = array (
		0 => 'Bcrypt',
		
	);
	//echo '<br>'.$class_name;
	if(strpos($class_name, 'DAO')!==false){//include na pasta DAO
		$file = 'dao/'.$class_name . '.class.php';
	}else if(strpos($class_name, 'model')!==false){
		$file = 'model/'.$class_name . '.class.php';
	}else if($class_name=="conexao" || $class_name=="Conexao"){
		$file = 'connect/'.$class_name . '.class.php';
	}else if(in_array($class_name, $inc_class)){
		$file = 'inc/'.$class_name . '.class.php';
	}else{
		$file =  'obj/'.$class_name . '.object.php';		
	}
	
	//echo '<file><h1> Realpath : '.normalizePath(realpath($file)).'</h1>'. $file .'</file>';
	
		
		require_once($file);

}

?>