<?php 
    session_start();
    require "config.php";

    $consulta = $pdo->prepare("
        select * from crm
        order by inputNomeMedico
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
        <img id="logo" class="header-inline" src="_imagens/policia.png" alt="">
        <h1 class="text-danger header-inline">Cadastro de Ocorrências</h1>
    </div>


    <!-- FIM CABECALHO -->

    <!-- SideBar -->

    <aside id="sidebar" class="clear text-center">
        <div id="header-sidebar">
            <h1 class="card-title">Relatório</h1>
        </div>
        <div id="body-sidebar" class="text-center card-body">
            <div class="btn-group-vertical">
                <button type="button" class="btn btn-outline-primary">Imprimir<br><img src="_imagens/print.png" alt="">
                </button>
                <br>
                <button type="button" class="btn btn-outline-secondary">Salvar<br><img src="_imagens/save.png"></button>
                <br>
                <button type="button" class="btn btn-outline-success">Success</button>
            </div>
        </div>
    </aside>

    <!-- Fim SideBar -->

    <!-- PRINCIPAL -->

    <div id="principal">
        <div class="container">
            <div class="text-center">
                <br>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <button type="button" class="btn btn-outline-dark">Principal
                                <br>
                                <img src="_imagens/principal.png">
                            </button>
                        </a>
                    <li class="nav-item" data-toggle="buttons">
                        <a class="nav-link" href="#">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                data-target=".talao-modal">Talão
                                <br>
                                <img src="_imagens/add.png">
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="relatorio.php">
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
        <div id="corpo-relatorios" class="card">
            <div id="header-relatorio" class="card-header">
                <h1 class="card-title">Filtrar</h1>
            </div>
            <div id="body-relatorio" class="card-body">
                <form method="post" action="consulta-relatorio.php" >
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputRelDateDE">Data - de:</label>
                            <input type="date" class="form-control" name="inputRelDateDE">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputRelDateATE">até:</label>
                            <input type="date" class="form-control" name="inputRelDateATE">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1.5">
                            <label for="inputRelHoraDE">Hora - de:</label>
                            <input type="time" class="form-control" name="inputRelHoraDE">
                        </div>
                        <div class="form-group col-md-1.5">
                            <label for="inputRelHoraATE">até:</label>
                            <input type="time" class="form-control" name="inputRelHoraATE">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="inputRelRua">Rua</label>
                            <input type="text" class="form-control" name="inputRelRua" placeholder="RUA JOSÉ LOPES SILVA">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputRelBairro">Bairro</label>
                            <input type="text" class="form-control" name="inputRelBairro" placeholder="JARDIM EROISE">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputRelAtendente">Atendente</label>
                            <input type="text" class="form-control" name="inputRelAtendente" placeholder="CB FAVERI">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputRelTipoOcorrencia">Tipo de Ocorrência</label>
                            <input type="text" class="form-control" name="inputRelTipoOcorrencia"
                                placeholder="CARRO X MOTO">
                        </div>
                        <div class="form-group col-md-1.5">
                            <label for="inputRelCod">Cód Ocorrência</label>
                            <input type="text" class="form-control" name="inputRelCod" placeholder="L08">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputRelVtr">Viatura</label>
                            <input type="text" class="form-control" name="inputRelVtr" placeholder="UR16215">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="inputRelNumVitimas">Nº Vit.</label>
                            <input type="number" class="form-control" name="inputRelNumVitimas">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputRelMotorista">Motorista</label>
                            <input type="text" class="form-control" name="inputRelMotorista">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputRelComandante">Comandante</label>
                            <input type="text" class="form-control" name="inputRelComandante">
                        </div>
                    </div>
                </div>
                <div id="footer-relatorio" class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Gerar Relatório</button>
                </div>
            </form>
        </div>
    </div>

    <!-- FIM PRINCIPAL -->


    <!-- RODAPE -->

    <footer class="clear text-center">
        <h4>Todos os direitos reservados.</h4>
    </footer>

    <!-- FIM RODAPE -->

    <!-- Modal -->

    <!-- Talao Modal -->

    <div class="modal fade talao-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
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

    <!-- Fim Modal -->

    <!-- JavaScritp -->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="../erp-cadastro-ocorrencias/bootstrap4/js/bootstrap.min.js"></script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>

    <!-- Fim JavaScritp -->


</body>

</html>