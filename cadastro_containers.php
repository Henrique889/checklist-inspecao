<?php
require_once "conexao.php";
$response = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $codigo = $conexao->insert_id;
    $numero = $_POST["Numero_Embarque"];
    $data = $_POST["Data_Horario"];
    $transportadora = $_POST["Transportadora"];
    $motorista = $_POST["Nome_Motorista"];
    $plCaminhao = $_POST["Placa_Caminhao"];
    $plCarreta = $_POST["Placa_Carreta"];
    $numeroOEA = $_POST["Num_LacreOEA"];
    $lacre = $_POST["Num_Lacre"];
    
    $secao = $_POST["secao_inferior_externa"];
    $secao2 = $_POST["secao_inferior_externa2"];
    $secao3 = $_POST["secao_inferior_externa3"];
    $txtSecao = $_POST["txt_secao_inferior_externa"];
    $portas = $_POST["portas_interiores_exteriores"];
    $portas2 = $_POST["portas_interiores_exteriores2"];
    $portas3 = $_POST["portas_interiores_exteriores3"];
    $txtPortas = $_POST["txt_portas_interiores_exteriores"];
    $ladoDireito = $_POST["ladoDireito"];
    $ladoDireito2 = $_POST["ladoDireito2"];
    $ladoDireito3 = $_POST["ladoDireito3"];
    $txtladoDireito = $_POST["txt_ladoDireito"];
    $ladoEsquerdo= $_POST["ladoEsquerdo"];
    $ladoEsquerdo2 = $_POST["ladoEsquerdo2"];
    $ladoEsquerdo3 = $_POST["ladoEsquerdo3"];
    $txt_ladoEsquerdo = $_POST["txt_ladoEsquerdo"];
    $parede= $_POST["parede_Dianteira"];
    $parede2 = $_POST["parede_Dianteira2"];
    $parede3 = $_POST["parede_Dianteira3"];
    $txtParede = $_POST["txt_parede_Dianteira"];
    $teto = $_POST["teto_interior_exterior"];
    $teto2 = $_POST["teto_interior_exterior2"];
    $teto3 = $_POST["teto_interior_exterior3"];
    $txtTeto = $_POST["txt_teto_interior_exterior"];
    $piso = $_POST["piso"];
    $piso2 = $_POST["piso2"];
    $piso3 = $_POST["piso3"];
    $txtPiso = $_POST["txt_piso"];
    
    $imagem = $_POST["imagem"];
    
    $path = "imagens/".$motorista.'_'.$plCaminhao.'_'.$plCarreta.".jpg";
    $url = "https://transcr10.com/chek17pontos/container/$path";
    
    file_put_contents($path, base64_decode($imagem));
    
    $bytesArquivo = file_get_contents($path);
    
    $sql = "INSERT INTO pontos_container (Numero_Embarque, Data_Horario, Transportadora, Nome_Motorista, Placa_Caminhao, Placa_Carreta, Num_LacreOEA, Num_Lacre, secao_inferior_externa, secao_inferior_externa2, secao_inferior_externa3, txt_secao_inferior_externa, portas_interiores_exteriores, portas_interiores_exteriores2, portas_interiores_exteriores3, txt_portas_interiores_exteriores, ladoDireito, ladoDireito2, ladoDireito3, txt_ladoDireito, ladoEsquerdo, ladoEsquerdo2, ladoEsquerdo3, txt_ladoEsquerdo, parede_Dianteira, parede_Dianteira2, parede_Dianteira3, txt_parede_Dianteira, teto_interior_exterior, teto_interior_exterior2, teto_interior_exterior3, txt_teto_interior_exterior, piso, piso2, piso3, txt_piso, 	imagem, url_imagem) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conexao->prepare($sql) or die($conexao->error);
    $stmt-> bind_param('ssssssssssssssssssssssssssssssssssssss', $numero, $data, $transportadora, $motorista, $plCaminhao, $plCarreta, $numeroOEA, $lacre, $secao, $secao2, $secao3, $txtSecao, $portas, $portas2, $portas3, $txtPortas, $ladoDireito, $ladoDireito2, $ladoDireito3, $txtladoDireito, $ladoEsquerdo, $ladoEsquerdo2, $ladoEsquerdo3, $txt_ladoEsquerdo, $parede, $parede2, $parede3, $txtParede, $teto, $teto2, $teto3, $txtTeto, $piso, $piso2, $piso3, $txtPiso, $bytesArquivo, $url);
 
    if($stmt-> execute()){
        $response['success'] = 1;
        echo "Registrado";

    } else{
        //echo "não registrou";
        $response['success'] = 0;
        echo json_encode($response);
        //$stm->close();
    }
    $stmt->close();
    
}else{
    $response['success'] = 0;
    $response['message'] = "Invalid Request";
    echo json_encode($response);
}
$conexao->close();
//mysqli_close($conexao);

?>