<?php

require "config.php";

$rDateDE = $_POST['inputRelDateDE'];
$rDateATE = $_POST['inputRelDateATE'];
$rHoraDE = $_POST['inputRelHoraDE'];
$rHoraATE = $_POST['inputRelHoraATE'];
$rRua = $_POST['inputRelRua'];
$rBairro = $_POST['inputRelBairro'];
$rAtendente = $_POST['inputRelAtendente'];
$rTipoOcorrencia = $_POST['inputRelTipoOcorrencia'];
$rCod = $_POST['inputRelCod'];
$rVtr = $_POST['inputRelVtr'];
$rNumVitimas = $_POST['inputRelNumVitimas'];
$rMotorista = $_POST['inputRelMotorista'];
$rComandante = $_POST['inputRelComandante'];

// IF - filtrando por data ou não

if ($rDateDE == '' && $rDateATE == '') {
    $consulta = $pdo-> prepare("SELECT * FROM talao 
    WHERE inputEndereco LIKE :rRua 
    AND inputTipoOcorrencia LIKE :rTipoOcorrencia 
    AND inputAtendente LIKE :rAtendente
    AND inputVtr LIKE :rVtr");
} else {
    $consulta = $pdo-> prepare("SELECT * FROM talao 
    WHERE inputEndereco LIKE :rRua 
    AND inputTipoOcorrencia LIKE :rTipoOcorrencia 
    AND inputAtendente LIKE :rAtendente 
    AND inputData >= :rDateDE AND inputData <= :rDateATE
    AND inputVtr LIKE :rVtr");

    $consulta -> bindValue(':rDateDE', "$rDateDE");
    $consulta -> bindValue(':rDateATE', "$rDateATE");
}

$consulta -> bindValue(':rRua', "%$rRua%");
$consulta -> bindValue(':rTipoOcorrencia', "%$rTipoOcorrencia%");
$consulta -> bindValue(':rAtendente', "%$rAtendente%");
$consulta -> bindValue(':rVtr', "%$rVtr%");

$consulta -> execute();


    $numerador = 1;
    ?>

<!-- identificando os estilos -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <title>Cadastro de Ocorrências</title>
</head>

<body>

    <!-- CABECALHO -->

    <div id="cabecalho" class="text-center">
        <img id="logo" class="header-inline" src="_imagens/policia.png" alt="">
        <h1 class="text-danger header-inline">Cadastro de Ocorrências</h1>
    </div>


    <!-- FIM CABECALHO -->


    <!-- PRINCIPAL -->
    <br>
    <div id="principal-index" class="container">
        <div class="container">
            <div class="text-center">
                <div class="btn-group btn-group-lg float" role="group" aria-label="...">
                    <a href="relatorio.php"><button type="button" class="btn btn-primary btn-lg">Voltar</button></a>
                    <a href="index.php"><button type="button" class="btn btn-primary btn-lg">Início</button></a>
                </div> 
            </div>
        </div>
    <br>

        
        <!-- FIM PRINCIPAL -->

        <!-- CORPO -->

        <div id="corpo-relatorio" class="card">
            <div id="header-relatorio" class="card-header">
                <div class="container">
                    <h6>Filtrado por:</h6>
                    Data - de: <?php echo$rDateDE?> até: <?php echo$rDateATE?><br>
                    Rua: <?php echo$rRua?><br>
                </div> 
                <div class="container">
                    Bairro: <?php echo$rBairro?><br>
                    Atendente: <?php echo$rAtendente?><br>
                </div>
                <div class="container">
                    Tipo de Ocorrência: <?php echo$rTipoOcorrencia?><br>
                    Viatura: <?php echo$rVtr?><br>    
                </div>         
            </div>
            <div id="body-relatorio" class="card-body">
        
    <?php 

    echo "
    <table class='table table-hover'>
    <thead class='thead-dark'>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>DATA</th>
      <th scope='col'>ENDEREÇO</th>
      <th scope='col'>ATENDENTE</th>
      <th scope='col'>TIPO OCORRÊNCIA</th>
      <th scope='col'>VIATURA</th>
      <th scope='col'></th>
    </tr>
  </thead>
        ";
while ($row = $consulta -> fetch(PDO::FETCH_ASSOC)){

    $id = $row['id_talao'];
    echo "<tr>
            <th>$numerador</th>
            <td>$row[inputData]</td>
            <td>$row[inputEndereco]</td>
            <td>$row[inputAtendente]</td>
            <td>$row[inputTipoOcorrencia]</td>
            <td>$row[inputVtr]</td>
            <td>
                <div class='btn-group btn-group-sm' role='group' aria-label='botoes'>   
                    <button type='button' class='btn btn-outline-success' data-toggle='modal' data-target='#viewTalao' data-whateverid='$row[id_talao]'
                    data-whatevernumtalao='$row[inputNumTalao]' data-whateverdatahora='$row[inputData]'
                    data-whateverhorachamada='$row[inputHoraChamada]' data-whateversolicitante='$row[inputSolicitante]' data-whatevertel='$row[inputTel]'
                    data-whateverendereco='$row[inputEndereco]'
                    data-whatevernum='$row[inputNum]'
                    data-whateverbairro='$row[inputBairro]'
                    data-whateveratendente='$row[inputAtendente]'
                    data-whatevertipoocorrencia='$row[inputTipoOcorrencia]'
                    data-whatevercod='$row[inputCod]'
                    data-whatevervtr='$row[inputVtr]'
                    data-whateverhs='$row[inputHS]'
                    data-whateveros='$row[inputOS]'
                    data-whateverhl='$row[inputHL]'
                    data-whateverol='$row[inputOL]'
                    data-whateversl='$row[inputSL]'
                    data-whateverps='$row[inputPS]'
                    data-whateversps='$row[inputSPS]'
                    data-whateverhpb='$row[inputHPB]'
                    data-whateveropb='$row[inputOPB]'
                    data-whatevernumvitimas='$row[inputNumVitimas]'
                    data-whateverqruocor='$row[inputQruOcor]'
                    data-whatevermotorista='$row[inputMotorista]'
                    data-whatevercomandante='$row[inputComandante]'
                    >View</button>
                </div>
            </td>
            </tr>
            ";
            $numerador += 1;
        }
    echo "
        </table>";
?>


                </div>
            </div>    
        </div>
    </div>

        <!-- RODAPE -->

    <footer class="clear text-center">
        <h4>Todos os direitos reservados.</h4>
    </footer>

    <!-- FIM RODAPE -->

    <!-- MODAL edit TALAO -->

    <div class="modal fade" id="viewTalao" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Editar Talão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="salvar-alterar-talao.php" method="post">
                        <input type="hidden"  class="form-control" name="id_talao" id="id_talao">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputNumTalao">Nº Talão</label>
                                <input type="number" class="form-control" name="inputNumTalao" id="inputNumTalao" readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputData">Data</label>
                                <input type="date" class="form-control" name="inputData" id="inputData">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputHoraChamada">Hora Chamada</label>
                                <input type="time" class="form-control" name="inputHoraChamada" id="inputHoraChamada">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputSolicitante">Solicitante</label>
                                <input type="text" class="form-control" name="inputSolicitante" id="inputSolicitante">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputTel">Telefone</label>
                                <input type="tel" class="form-control" name="inputTel" id="inputTel">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="inputEndereco">Endereço</label>
                                <input type="text" class="form-control" name="inputEndereco" id="inputEndereco">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputNum">Nº</label>
                                <input type="number" class="form-control" name="inputNum" id="inputNum">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputBairro">Bairro</label>
                                <input type="text" class="form-control" name="inputBairro" id="inputBairro">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputCity">Atendente</label>
                                <input type="text" class="form-control" name="inputAtendente" id="inputAtendente">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputTipoOcorrencia">Tipo de Ocorrência</label>
                                <input type="text" class="form-control" name="inputTipoOcorrencia"
                                    id="inputTipoOcorrencia">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputCod">Cód Ocorrência</label>
                                <input type="text" class="form-control" name="inputCod" id="inputCod">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputVtr">Viatura</label>
                                <input type="text" class="form-control" name="inputVtr" id="inputVtr">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-1.5">
                                <label for="inputHS">Hora Saída</label>
                                <input type="time" class="form-control" name="inputHS" id="inputHS">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputOS">Odo. Saída</label>
                                <input type="number" class="form-control" name="inputOS" id="inputOS">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputHL">Hora Local</label>
                                <input type="time" class="form-control" name="inputHL" id="inputHL">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputOL">Odo. Local</label>
                                <input type="number" class="form-control" name="inputOL" id="inputOL">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputSO">Saída Ocor.</label>
                                <input type="time" class="form-control" name="inputSL" id="inputSL">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputPS">Chegada PS</label>
                                <input type="time" class="form-control" name="inputPS" id="inputPS">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputSPS">Saída PS</label>
                                <input type="time" class="form-control" name="inputSPS" id="inputSPS">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-1.5">
                                <label for="inputHPB">Hora PB</label>
                                <input type="time" class="form-control" name="inputHPB" id="inputHPB">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputOPB">Odo. PB</label>
                                <input type="number" class="form-control" name="inputOPB" id="inputOPB">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputNumVitimas">Nº Vit.</label>
                                <input type="number" class="form-control" name="inputNumVitimas" id="inputNumVitimas">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputQruOcor">QRU Ocorrência</label>
                                <input type="text" class="form-control" name="inputQruOcor" id="inputQruOcor">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputMotorista">Motorista</label>
                                <input type="text" class="form-control" name="inputMotorista" id="inputMotorista">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputComandante">Comandante</label>
                                <input type="text" class="form-control" name="inputComandante" id="inputComandante">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar Talão</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- FIM MODAL edit TALAO -->

    <!-- MODAL edit TALAO -->

    <div class="modal fade" id="viewTalao" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Editar Talão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="salvar-alterar-talao.php" method="post">
                        <input type="hidden"  class="form-control" name="id_talao" id="id_talao">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputNumTalao">Nº Talão</label>
                                <input type="number" class="form-control" name="inputNumTalao" id="inputNumTalao">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputData">Data</label>
                                <input type="date" class="form-control" name="inputData" id="inputData">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputHoraChamada">Hora Chamada</label>
                                <input type="time" class="form-control" name="inputHoraChamada" id="inputHoraChamada">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputSolicitante">Solicitante</label>
                                <input type="text" class="form-control" name="inputSolicitante" id="inputSolicitante">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputTel">Telefone</label>
                                <input type="tel" class="form-control" name="inputTel" id="inputTel">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="inputEndereco">Endereço</label>
                                <input type="text" class="form-control" name="inputEndereco" id="inputEndereco">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputNum">Nº</label>
                                <input type="number" class="form-control" name="inputNum" id="inputNum">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputBairro">Bairro</label>
                                <input type="text" class="form-control" name="inputBairro" id="inputBairro">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputCity">Atendente</label>
                                <input type="text" class="form-control" name="inputAtendente" id="inputAtendente">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputTipoOcorrencia">Tipo de Ocorrência</label>
                                <input type="text" class="form-control" name="inputTipoOcorrencia"
                                    id="inputTipoOcorrencia">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputCod">Cód Ocorrência</label>
                                <input type="text" class="form-control" name="inputCod" id="inputCod">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputVtr">Viatura</label>
                                <input type="text" class="form-control" name="inputVtr" id="inputVtr">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-1.5">
                                <label for="inputHS">Hora Saída</label>
                                <input type="time" class="form-control" name="inputHS" id="inputHS">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputOS">Odo. Saída</label>
                                <input type="number" class="form-control" name="inputOS" id="inputOS">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputHL">Hora Local</label>
                                <input type="time" class="form-control" name="inputHL" id="inputHL">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputOL">Odo. Local</label>
                                <input type="number" class="form-control" name="inputOL" id="inputOL">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputSO">Saída Ocor.</label>
                                <input type="time" class="form-control" name="inputSL" id="inputSL">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputPS">Chegada PS</label>
                                <input type="time" class="form-control" name="inputPS" id="inputPS">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputSPS">Saída PS</label>
                                <input type="time" class="form-control" name="inputSPS" id="inputSPS">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-1.5">
                                <label for="inputHPB">Hora PB</label>
                                <input type="time" class="form-control" name="inputHPB" id="inputHPB">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputOPB">Odo. PB</label>
                                <input type="number" class="form-control" name="inputOPB" id="inputOPB">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputNumVitimas">Nº Vit.</label>
                                <input type="number" class="form-control" name="inputNumVitimas" id="inputNumVitimas">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputQruOcor">QRU Ocorrência</label>
                                <input type="text" class="form-control" name="inputQruOcor" id="inputQruOcor">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputMotorista">Motorista</label>
                                <input type="text" class="form-control" name="inputMotorista" id="inputMotorista">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputComandante">Comandante</label>
                                <input type="text" class="form-control" name="inputComandante" id="inputComandante">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar Talão</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- FIM MODAL edit TALAO -->

    <!-- JavaScritp -->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="../erp-cadastro-ocorrencias/bootstrap4/js/bootstrap.min.js"></script>
    <script>
        $('#talaoModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
    <script>
        $('#viewTalao').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Botão que acionou o modal
            var id = button.data('whateverid')
            var numTalao = button.data('whatevernumtalao')
            var datahora = button.data('whateverdatahora')
            var horaChamada = button.data('whateverhorachamada')
            var solicitante = button.data('whateversolicitante')
            var tel = button.data('whatevertel')
            var endereco = button.data('whateverendereco')
            var num = button.data('whatevernum')
            var bairro = button.data('whateverbairro')
            var atendente = button.data('whateveratendente')
            var tipoOcorrencia = button.data('whatevertipoocorrencia')
            var cod = button.data('whatevercod')
            var vtr = button.data('whatevervtr')
            var hs = button.data('whateverhs')
            var os = button.data('whateveros')
            var hl = button.data('whateverhl')
            var ol = button.data('whateverol')
            var sl = button.data('whateversl')
            var ps = button.data('whateverps')
            var sPs = button.data('whateversps')
            var hpb = button.data('whateverhpb')
            var opb = button.data('whateveropb')
            var numVitimas = button.data('whatevernumvitimas')
            var qruOcor = button.data('whateverqruocor')
            var motorista = button.data('whatevermotorista')
            var comandante = button.data('whatevercomandante') 
            
            // Extrai informação dos atributos data-*
            // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
            // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
            var modal = $(this)
            modal.find('.modal-title').text('Editar Talão')
            modal.find('#id_talao').val(id)
            modal.find('#inputNumTalao').val(numTalao)
            modal.find('#inputData').val(datahora)
            modal.find('#inputHoraChamada').val(horaChamada)
            modal.find('#inputSolicitante').val(solicitante)
            modal.find('#inputTel').val(tel)
            modal.find('#inputEndereco').val(endereco)
            modal.find('#inputNum').val(num)
            modal.find('#inputBairro').val(bairro)
            modal.find('#inputAtendente').val(atendente)
            modal.find('#inputTipoOcorrencia').val(tipoOcorrencia)
            modal.find('#inputCod').val(cod)
            modal.find('#inputVtr').val(vtr)
            modal.find('#inputHS').val(hs)
            modal.find('#inputOS').val(os)
            modal.find('#inputHL').val(hl)
            modal.find('#inputOL').val(ol)
            modal.find('#inputSL').val(sl)
            modal.find('#inputPS').val(ps)
            modal.find('#inputSPS').val(sPs)
            modal.find('#inputHPB').val(hpb)
            modal.find('#inputOPB').val(opb)
            modal.find('#inputNumVitimas').val(numVitimas)
            modal.find('#inputQruOcor').val(qruOcor)
            modal.find('#inputMotorista').val(motorista)
            modal.find('#inputComandante').val(comandante)
            
            
        })
    </script>


    </body>
