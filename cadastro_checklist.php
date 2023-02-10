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
    
    $parachoques = $_POST["posterior_parachoques"];
    $parachoques2 = $_POST["posterior_parachoques2"];
    $parachoques3 = $_POST["posterior_parachoques3"];
    $txtPosterior = $_POST["posterior_anotacao"];
    $motor = $_POST["motor"];
    $motor2 = $_POST["motor2"];
    $motor3 = $_POST["motor3"];
    $txtMotor = $_POST["motor_anotacao"];
    $pneus = $_POST["Pneus_Calotas"];
    $pneus2 = $_POST["Pneus_Calotas2"];
    $pneus3 = $_POST["Pneus_Calotas3"];
    $txtPneus = $_POST["pneus_anotacao"];
    $piso = $_POST["Piso_Cabine"];
    $piso2 = $_POST["Piso_Cabine2"];
    $piso3 = $_POST["Piso_Cabine3"];
    $txtPiso = $_POST["piso_anotacao"];
    $tanque = $_POST["tanque_combustivel"];
    $tanque2 = $_POST["tanque_combustivel2"];
    $tanque3 = $_POST["tanque_combustivel3"];
    $txtCombustivel = $_POST["tanque_anotacao"];
    $cabine = $_POST["cabine"];
    $cabine2 = $_POST["cabine2"];
    $cabine3 = $_POST["cabine3"];
    $txtCabine = $_POST["cabine_anotacao"];
    $tanqueAr = $_POST["tanques_ar"];
    $tanqueAr2 = $_POST["tanques_ar2"];
    $tanqueAr3 = $_POST["tanques_ar3"];
    $txtTanques = $_POST["tanquesAr_anotacao"];
    $eixos = $_POST["eixos_transmissao"];
    $eixos2 = $_POST["eixos_transmissao2"];
    $eixos3 = $_POST["eixos_transmissao3"];
    $txtEixos = $_POST["eixos_anotacao"];
    
    $quintaRoda = $_POST["area_quintaRoda"];
    $quintaRoda2 = $_POST["area_quintaRoda2"];
    $quintaRoda3 = $_POST["area_quintaRoda3"];
    $txtRoda = $_POST["quintaRoda_anotacao"];
    $exterior = $_POST["exterior_abaixo"];
    $exterior2 = $_POST["exterior_abaixo2"];
    $exterior3 = $_POST["exterior_abaixo3"];
    $txtExterior = $_POST["exterior_anotacao"];
    $pisoInterior = $_POST["piso_interior"];
    $pisoInterior2 = $_POST["piso_interior2"];
    $pisoInterior3 = $_POST["piso_interior3"];
    $txtPisoInt= $_POST["pisoInterior_anotacao"];
    $portas = $_POST["portas_afora_adentro"];
    $portas2 = $_POST["portas_afora_adentro2"];
    $portas3 = $_POST["portas_afora_adentro3"];
    $txtPortasAfora= $_POST["portas_anotacao"];
    $paredesL = $_POST["paredes_laterais"];
    $paredesL2 = $_POST["paredes_laterais2"];
    $paredesL3 = $_POST["paredes_laterais3"];
    $txtParedesL= $_POST["paredes_anotacao"];
    $teto = $_POST["teto_interior_exterior"];
    $teto2 = $_POST["teto_interior_exterior2"];
    $teto3 = $_POST["teto_interior_exterior3"];
    $txtTeto = $_POST["teto_anotacao"];
    $parede = $_POST["parede_dianteira"];
    $parede2 = $_POST["parede_dianteira2"];
    $parede3 = $_POST["parede_dianteira3"];
    $txtParede = $_POST["paredeDianteira_anotacao"];
    $refrigerador = $_POST["unidade_refrigerador"];
    $refrigerador2 = $_POST["unidade_refrigerador2"];
    $refrigerador3 = $_POST["unidade_refrigerador3"];
    $txtRefrigerador = $_POST["refrigerador_anotacao"];
    $escapamento = $_POST["escapamento"];
    $escapamento2 = $_POST["escapamento2"];
    $escapamento3 = $_POST["escapamento3"];
    $txtEscapamento = $_POST["escapamento_anotacao"];
    $imagem = $_POST["imagem"];
    
    $path = "imagens/".$motorista.'_'.$plCaminhao.".jpg";
    $url = "https://transcr10.com/chek17pontos/$path";
    
    file_put_contents($path, base64_decode($imagem));
    
    $bytesArquivo = file_get_contents($path);
    
    $sql = "INSERT INTO pontos_inspecao (Numero_Embarque, Data_Horario, Transportadora, Nome_Motorista, Placa_Caminhao, Placa_Carreta, Num_LacreOEA, Num_Lacre, posterior_parachoques, posterior_parachoques2, posterior_parachoques3, posterior_anotacao, motor, motor2, motor3, motor_anotacao, Pneus_Calotas, Pneus_Calotas2, Pneus_Calotas3, pneus_anotacao, Piso_Cabine, Piso_Cabine2, Piso_Cabine3, piso_anotacao, tanque_combustivel, tanque_combustivel2, tanque_combustivel3, tanque_anotacao, cabine, cabine2, cabine3, cabine_anotacao, tanques_ar, tanques_ar2, tanques_ar3, tanquesAr_anotacao, eixos_transmissao, eixos_transmissao2, eixos_transmissao3, eixos_anotacao, area_quintaRoda, area_quintaRoda2, area_quintaRoda3, quintaRoda_anotacao, exterior_abaixo, exterior_abaixo2, exterior_abaixo3, exterior_anotacao, piso_interior, piso_interior2, piso_interior3, pisoInterior_anotacao, portas_afora_adentro, portas_afora_adentro2, portas_afora_adentro3, portas_anotacao, paredes_laterais, paredes_laterais2, paredes_laterais3, paredes_anotacao, teto_interior_exterior, teto_interior_exterior2, teto_interior_exterior3, teto_anotacao, parede_dianteira, parede_dianteira2, parede_dianteira3, paredeDianteira_anotacao, unidade_refrigerador, unidade_refrigerador2, unidade_refrigerador3, refrigerador_anotacao, escapamento, escapamento2, escapamento3, escapamento_anotacao, imagem, url_imagem) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conexao->prepare($sql) or die($conexao->error);
    $stmt-> bind_param('ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', $numero, $data, $transportadora, $motorista, $plCaminhao, $plCarreta, $numeroOEA, $lacre, $parachoques, $parachoques2, $parachoques3,$txtPosterior, $motor, $motor2, $motor3, $txtMotor, $pneus, $pneus2, $pneus3, $txtPneus, $piso, $piso2, $piso3, $txtPiso, $tanque, $tanque2, $tanque3, $txtCombustivel, $cabine, $cabine2, $cabine3, $txtCabine, $tanqueAr, $tanqueAr2, $tanqueAr3, $txtTanques, $eixos, $eixos2, $eixos3, $txtEixos, $quintaRoda, $quintaRoda2, $quintaRoda3, $txtRoda, $exterior, $exterior2, $exterior3, $txtExterior, $pisoInterior, $pisoInterior2, $pisoInterior3, $txtPisoInt, $portas, $portas2, $portas3, $txtPortasAfora, $paredesL, $paredesL2, $paredesL3, $txtParedesL, $teto, $teto2, $teto3, $txtTeto, $parede, $parede2, $parede3, $txtParede, $refrigerador, $refrigerador2, $refrigerador3, $txtRefrigerador, $escapamento, $escapamento2, $escapamento3, $txtEscapamento, $bytesArquivo, $url);
    //$stmt-> execute();
    //$result = $stmt->get_result();
 
    if($stmt-> execute()){
    //if($stm>0){
        //while(mysqli_stmt_fetch($result)){
            $response['success'] = 1;
            echo "success";
            //echo json_encode($response);
        //}
        //echo "registra";
        //$stm->close();
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