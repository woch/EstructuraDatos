<!DOCTYPE html>
<html lang="en">
    <?php

        $Datos = str_getcsv('1, 3, 2, 3, 5, 0');
        $Contador = 0;
       

        function ExisteEnArray($valor, $array) {

            foreach ($array as $comparar) {
                if ($comparar == $valor) {
                    return true;
                }
            }
            return false;
        }


        for ($i=0; $i < count($Datos); $i++) {
            $Valor = $Datos[$i] + 1;

            if(ExisteEnArray($Valor, $Datos)){
                $Contador ++;
            }
        }


    
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $Registro = $_POST['Registro'];
        }
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

    <label for="fname">Ingrese un arreglo separado por coma</label><br>
        <input type="text" id="Registro" name="Registro" placeholder="1, 2, 3"><br>
        <input name="Agregar" type="submit" value="Agregar" class="submit">
    </form>

    <?php if(count($Datos) > 0){ ?>
        <h3>Valores ingresados</h3>
        <ul>
            <?php for ($i=0; $i < count($ops); $i++) {
                echo "<li>".$ops[$i]."</li>";
            } ?>
        </ul>

        <h3>Output: <?php echo $Contador; ?></h3> 
    <?php } ?>
    
</body>
</html>