<?php 

include "../../Administrador/config/bd.php";


if(!empty($_POST)){
        
    if($_POST['action'] == 'lista')
    { 
        try {

            $id= $_POST['id'];
            $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbmediodeenvio 
                                                INNER JOIN tbestado on tbestado.idestado = tbmediodeenvio.estado 
                                                INNER JOIN tbusuarios on tbusuarios.idusuario  = tbmediodeenvio.idusuario 
                                                where tbmediodeenvio.estado  = '1' and tbmediodeenvio.idusuario = :dato1
                                                ORDER BY medioenvio ASC ");
            $sentenciaSQL->bindParam(':dato1', $id);
            $sentenciaSQL->execute();
            $result=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            
            if(count($result)>0){
                $count=1;
                foreach($result as $row ){
                    $json[] =array(
                        'valor' => $count,
                        'idmedioenvio' => filter_var($row['idmedioenvio'], FILTER_SANITIZE_NUMBER_INT),
                        'medioenvio'=> filter_var($row['medioenvio'],FILTER_SANITIZE_STRING),
                        'usuario' => filter_var($row['Usuario'], FILTER_SANITIZE_STRING),
                        'imagen_m_envio' => filter_var($row['imagen_m_envio'], FILTER_SANITIZE_STRING),
                        'descripcion_m_envio' => filter_var($row['descripcion_m_envio'],FILTER_SANITIZE_STRING),
                        'precio_m_envio' => number_format(filter_var($row['precio_m_envio'],FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION), 2, '.', ''),
                        'estado' => filter_var($row['detalleestado'], FILTER_SANITIZE_STRING)
                        );
                    $count++;
                }
                $jsonstring = json_encode($json);
                echo $jsonstring;
                exit;
            } else {
                echo json_encode(["error" => "No se encontraron resultados"]);
                exit;
            }
        } catch(PDOException $e) {
            echo json_encode(["error" => $e->getMessage()]);
            exit;
        }
    }
}
?>
