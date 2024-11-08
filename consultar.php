<?php
include "conexao.php";
$cod = $_POST['cod'];
$sql = "SELECT * FROM tb_movimentacoes
        WHERE cod_rastreio LIKE '$cod'";
$consultar = $pdo->prepare($sql);
try{
    $consultar->execute();
    if($consultar->rowCount()>=1){
        $resultado = $consultar ->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultado as $item){
            $tipo = $item['tipo_movimentacao'];
            $data_movim = $item['data_hora_movi'];
            $origem = $item['origem'];
            $destino = $item['destino'];

            $somente_data = date(format: "d/m/y", timestamp: strtotime(datetime: $data_movim));
            if($tipo == "Em trânsito") {
            
            echo "
                <div class='atualizacao'>
                    <span class='tipo'>$tipo</span> <br>
                    <span class='data_hora'>$data_movim</span> <br>
                    <span class='locais'>
                        $origem 🚛 $destino
                    </span> <br>
                </div>
            ";
            }if($tipo == "Postado"){
                echo "
                <div class='atualizacao'>
                    <span class='tipo'>$tipo</span> <br>
                    <span class='data_hora'>$data_movim</span> <br>
                    <span class='locais'>
                        $origem 📧 $destino
                    </span> <br>
                </div>
            ";
            }if($tipo == "Saiu para entrega") {
                echo "
                <div class='atualizacao'>
                    <span class='tipo'>$tipo</span> <br>
                    <span class='data_hora'>$data_movim</span> <br>
                    <span class='locais'>
                        $origem 🏍 $destino
                    </span> <br>
                </div>
            ";
            }if($tipo == "Entreque"){
                echo "
                <div class='atualizacao'>
                    <span class='tipo'>$tipo</span> <br>
                    <span class='data_hora'>$data_movim</span> <br>
                    <span class='locais'>
                        $origem 👩‍🍳 $destino
                    </span> <br>
                </div>
            ";
            }
        }
    }else{
        echo "Nada encontrado!";
    }
}catch(PDOException $erro){
    echo "Falha ao consultar!";
}

?>