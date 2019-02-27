<?php  
	include ("conexion.php");

    $ClaveProdcuto = $_POST['clave']:

    $consulta = "SELECT DISTINCT (SELECT categ_vchNombre FROM tblcategoria WHERE categ_intCodigo=prodcat_intCodCategoria) AS 'Nombre Categoria',
    prodcat_intCodigo,prodcat_intCodCategoria 
    FROM  tblproductoscategoria,tblcategoria 
    WHERE prodcat_intCodProducto ='$ClaveProdcuto';";
    $resultado = mysqli_query($conexion, $consulta);
    if (!$resultado)
    {
        echo "No se pudo consultar";
    }{
        if($resultado==null){

        }else{
            while ($reg=mysqli_fetch_array($resultado)) {
                $vec[]=$reg;
            }
            $cadena=json_encode($vec);
            echo $cadena;
        }
    } 

?>