<!DOCTYPE html>
<html lang="en">
    <?php   
            function ValidarDosPrevias($Arreglo){
                $Cantidad = count($Arreglo); 
                if($Cantidad > 1){

                    $C1 = str_replace(' ', '', $Arreglo[$Cantidad - 1]);
                    $C2 = str_replace(' ', '', $Arreglo[$Cantidad - 2]);

                    if(is_numeric($C1) && is_numeric($C2)){
                        return true;
                    }
                }
                return false;
            }

            $Datos = array();
            $ops = array();

           

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $Registro = $_POST['Registro'];
                $Datos = $_POST['Datos'];
                

                $ops = $_POST['ops'];

                if(is_numeric($Registro)){ // es un valor

                    $Datos[] = $Registro;
                    $ops[] = $Registro;

                }elseif($Registro == "+"){

                    if(ValidarDosPrevias($Datos)){
                        $Cantidad = count($Datos); 

                        $Ultimo = str_replace(' ', '', $Datos[$Cantidad - 1]);
                        $Penultimo = str_replace(' ', '', $Datos[$Cantidad - 2]);

                        echo $Ultimo ." - ". $Penultimo;
                        $Total = $Ultimo + $Penultimo;

                        $Datos[] = $Total;
                        $ops[] = $Registro;
                    }else{
                        $Error = "Debe haber dos puntuaciones previas";
                    }

                }elseif($Registro == "D" || $Registro == "d"){

                    $Cantidad = count($Datos);
                    if($Cantidad > 0){
                        $Ultimo = $Datos[$Cantidad - 1];
                        if(is_numeric($Ultimo)){
                            $Datos[] = $Ultimo * 2;
                            $ops[] = $Registro;
                        }else{
                            $Error = "Debe haber una puntuación previa";
                        }
                    }else{
                        $Error = "Debe haber una puntuación previa";
                    }

                }elseif($Registro == "C" || $Registro == "c"){

                    $Cantidad = count($Datos);
                    if($Cantidad > 0){
                        $Ultimo = $Datos[$Cantidad - 1];
                        if(is_numeric($Ultimo)){
                            //$New = array_pop($Datos);
                            for ($i=0; $i < count($Datos) - 1; $i++) {
                                $New[] = $Datos[$i];
                            }

                            $Datos = $New;
                            $ops[] = $Registro;
                        }else{
                            $Error = "Debe haber una puntuación previa";
                        }
                    }else{
                        $Error = "Debe haber una puntuación previa";
                    }

                    
                }else{
                    $Error = "Opción no disponible";
                }
		        
            }

            var_dump($Datos);
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen 2 - Walter Chamorro</title>
</head>
<body>
    <h1>Bienvenidos</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <h3>Menú de opciones </h3>
        <ul>
            <li>Ingresar un número para agregar puntaje</li>
            <li>+ - para agregar la suma de los dos puntajes anteriores</li>
            <li>D - para agregar el doble del puntaje anterior</li>
            <li>C - Elimina el puntaje anterior</li>
        </ul>
    <label for="fname">Ingrese un valor</label><br>
    <input type="text" id="Registro" name="Registro"><br>

                <?php for ($i=0; $i < count($Datos); $i++) { ?>
                    <input name="Datos[]" value=" <?php echo $Datos[$i]; ?>" type="hidden">                   
                <?php } ?>

                <?php for ($i=0; $i < count($ops); $i++) { ?>
                    <input name="ops[]" value=" <?php echo $ops[$i]; ?>" type="hidden">                   
                <?php } ?>

                <?php echo $Error; ?>

                <input name="Agregar" type="submit" value="Agregar" class="submit">
    </form>

    <?php if(count($Datos) > 0){
        
            $Puntaje = 0; 
    ?>
        <h3>Valores ingresados</h3>
        <ul>
        <?php for ($i=0; $i < count($ops); $i++) {
            $Puntaje += $Datos[$i]; 
            echo "<li>".$ops[$i]."</li>";
        } ?>
        </ul>

        <h3>Puntaje final: <?php echo $Puntaje; ?></h3> 
    <?php } ?>
    
</body>
</html>