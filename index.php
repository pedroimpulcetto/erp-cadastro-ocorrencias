<?php 
    session_start();
    require "config.php";

    $consulta = $pdo->prepare("
        SELECT * FROM talao
        ORDER BY id_talao
    ");
    $consulta->execute();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Ocorrências</title>
</head>

<body>



    <!-- CABECALHO -->

    <div id="cabecalho" class="text-center">
        <div class="container">
            <img id="logo" class="header-inline" src="_imagens/policia.png" alt="">
            <h1 class="text-danger header-inline">Cadastro de Ocorrências</h1>
        </div>
    </div>


    <!-- FIM CABECALHO -->


    <!-- PRINCIPAL -->
    <div id="principal-index" class="container">
        <div class="container">
            <div class="text-center">
                <br>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">
                            <button type="button" class="btn btn-outline-dark">Principal
                                <br>
                                <img src="_imagens/principal.png">
                            </button>
                        </a>
                    <li class="nav-item btn-group" data-toggle="buttons">
                        <a class="nav-link" href="#">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#talaoModal">Talão
                                <br>
                                <img src="_imagens/add.png">
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="relatorio.php">
                            <button type="button" class="btn btn-outline-secondary">Relatório
                                <br>
                                <img src="_imagens/search.png">
                            </button>
                        </a>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="crm.php">
                            <button type="button" class="btn btn-outline-success">CRM
                                <br>
                                <img src="_imagens/medical.png" alt="">
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="efetivo.php">
                            <button type="button" class="btn btn-outline-danger">Efetivo
                                <br>
                                <img src="_imagens/efetivo.png" alt="">
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viatura.php">
                            <button type="button" class="btn btn-outline-info">Viaturas
                                <br>
                                <img src="_imagens/viatura.png" alt="">
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="corpo-index" class="body container card">
            <br>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Data</th>
                        <th scope="col">Talão</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Tipo de Ocor.</th>
                        <th scope="col">Viatura</th>
                        <th scope="col">Odo. Saída</th>
                        <th scope="col">Odo. Local</th>
                        <th scope="col">Odo. Final</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                    if(isset($_SESSION['msg']))
                    {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
                <tbody>
                    <?php
                        $numerador = 1;
                        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                            $id = $row['id_talao'];
                            echo "
                                <tr>
                                    <th scope='row'>$numerador</th>
                                    <td>$row[inputData]</td>
                                    <td>$row[inputNumTalao]</td>
                                    <td>$row[inputEndereco], $row[inputNum] - $row[inputBairro]</td>
                                    <td>$row[inputTipoOcorrencia]</td>
                                    <td>$row[inputVtr]</td>
                                    <td>$row[inputOS]</td>
                                    <td>$row[inputOL]</td>
                                    <td>$row[inputOPB]</td>
                                    <td>
                                        <div class='btn-group btn-group-sm' role='group' aria-label='botoes'>   
                                            <button type='button' class='btn btn-outline-warning' data-toggle='modal' data-target='#editTalao' data-whateverid='$row[id_talao]'
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
                                            >Edit</button>
                                            <button type='button' class='btn btn-outline-danger' data-toggle='modal'
                                            data-target='#modal$id'>Del</button>
                                        </div>
                                    </td>
                                    <td style='visibility: hidden'>$row[id_talao]</td>
                                </tr>

                                <!-- MODAL APAGAR -->

                                    <div class='modal fade' id='modal$id' tabindex='-1' role='dialog' aria-labelledby='modal$id' aria-hidden='true'>
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title text-danger' id='modalApagar'>Alerta!</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <div class='modal-body'>
                                                    <h5>Deseja realmente apagar esse registro?</h5>
                                                </div>
                                                <div class='modal-footer'>
                                                <a href=\"excluir-talao.php?id_talao=$row[id_talao]\"><button type='reset' class='btn btn-outline-danger'>Apagar</button></a>
                                                    <button type='' class='btn btn-primary' data-dismiss='modal'>Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- FIM MODAL APAGAR -->
                            ";
                            $numerador = $numerador + 1;
                        }
                    ?>
                </tbody>
            </table>
        </div>


    </div>

    <!-- RODAPE -->

    <footer class="clear text-center">
        <h4>Todos os direitos reservados.</h4>
    </footer>

    <!-- FIM RODAPE -->



    <!-- Modal -->

    <!-- Talao Modal -->

    <div class="modal fade" id="talaoModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Cadastrar Novo Talão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="salvar-talao.php" method="post">
                        <input type="hidden"  class="form-control" name="id_talao" id="id_talao">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputNumTalao">Nº Talão</label>
                                <input type="number" class="form-control" name="inputNumTalao" id="inputNumTalao"
                                    placeholder="1234">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputData">Data</label>
                                <input type="date" class="form-control" name="inputData" id="inputData"
                                    placeholder="22FEV19">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputHoraChamada">Hora Chamada</label>
                                <input type="time" class="form-control" name="inputHoraChamada" id="inputHoraChamada"
                                    placeholder="07:30">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputSolicitante">Solicitante</label>
                                <input type="text" class="form-control" name="inputSolicitante" id="inputSolicitante"
                                    placeholder="PEDRO">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputTel">Telefone</label>
                                <input type="tel" class="form-control" name="inputTel" id="inputTel"
                                    placeholder="9-9830-5135">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="inputEndereco">Endereço</label>
                                <input type="text" class="form-control" name="inputEndereco" id="inputEndereco"
                                    placeholder="RUA JOSÉ LOPES SILVA">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputNum">Nº</label>
                                <input type="number" class="form-control" name="inputNum" id="inputNum"
                                    placeholder="1234">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputBairro">Bairro</label>
                                <input type="text" class="form-control" name="inputBairro" id="inputBairro"
                                    placeholder="1234">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputCity">Atendente</label>
                                <input type="text" class="form-control" name="inputAtendente" id="inputAtendente"
                                    placeholder="CB FAVERI">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputTipoOcorrencia">Tipo de Ocorrência</label>
                                <input type="text" class="form-control" name="inputTipoOcorrencia"
                                    id="inputTipoOcorrencia" placeholder="CARRO X MOTO">
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="inputCod">Cód Ocorrência</label>
                                <input type="text" class="form-control" name="inputCod" id="inputCod" placeholder="L08">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputVtr">Viatura</label>
                                <input type="text" class="form-control" name="inputVtr" id="inputVtr"
                                    placeholder="UR16215">
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

    <!-- MODAL edit TALAO -->

    <div class="modal fade" id="editTalao" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Cadastrar Novo Talão</h5>
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

    <!-- Fim Modal -->

    <!-- JavaScritp -->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="../erp-cadastro-ocorrencias/bootstrap4/js/bootstrap.min.js"></script>
    <script>
        $('#talaoModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
    <script>
        $('#editTalao').on('show.bs.modal', function (event) {
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
    <script>   
        setTimeout(function(){ 
            $('#msg-clear').remove();   
        }, 5000);
    </script>

    <!-- Fim JavaScritp -->

</body>

</html>