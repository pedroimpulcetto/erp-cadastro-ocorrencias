<?php 
    session_start();
    require "config.php";

    $consulta = $pdo->prepare("
        select * from viatura
        order by inputPrefixo
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
            <h1 class="card-title">Viaturas</h1>
        </div>
        <div id="body-sidebar" class="text-center card-body">
            <div class="btn-group-vertical">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                    data-target="#modalViatura">Adicionar<br><img src="_imagens/add.png" alt="">
                </button>
                <br>
                <button type="button" class="btn btn-outline-secondary">Excluir<br><img src="_imagens/delete.png"
                        alt=""></button>
                <br>
                <button type="button" class="btn btn-outline-success">Editar <br><img src="_imagens/edit.png"
                        alt=""></button>
                <br>
                <button type="button" class="btn btn-outline-danger">Imprimir<br><img src="_imagens/print.png"
                        alt=""></button>
                <br>
                <button type="button" class="btn btn-outline-warning">Salvar<br><img src="_imagens/save.png"></button>
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
                        <a class="nav-link active" href="viatura.php">
                            <button type="button" class="btn btn-outline-info">Viaturas
                                <br>
                                <img src="_imagens/viatura.png" alt="">
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="corpo-viaturas" class="card">
            <div id="header-viaturas" class="card-header">
                <h1 class="card-title">Viaturas</h1>
            </div>
            <div id="body-viaturas" class="card-body">
            <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Prefixo</th>
                            <th scope="col">Marca/Modelo</th>
                            <th scope="col">Placa</th>
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
                                # code...         
                                $id = $row['id_viatura'];                      
                                echo "
                                    <tr>
                                        <th scope='row'>$numerador</td>
                                        <td>$row[inputPrefixo]</td>
                                        <td>$row[inputMM]</td>
                                        <td>$row[inputPlaca]</td>
                                        <td>
                                            <div class='btn-group btn-group-sm' role='group' aria-label='botoes'>
                                                <button type='button' class='btn btn-outline-warning' data-toggle='modal' data-target='#modalEditVtr'  data-whateverprefixo='$row[inputPrefixo]' data-whatevermm='$row[inputMM]' data-whateverplaca='$row[inputPlaca]'>Edit</button>
                                                <button type='button' class='btn btn-outline-danger' data-toggle='modal'
                                                data-target='#modal$id'>Del</button>
                                            </div>
                                        </td>
                                        <td style='visibility: hidden'>$row[id_viatura]</td>
                                    </tr>

                                    <!-- MODAL APAGAR -->

                                    <div class='modal fade' id='modal$id' tabindex='-1' role='dialog' aria-labelledby='modal$id' aria-hidden='true'>
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header bg-danger'>
                                                    <h5 class='modal-title text-white' id='modalApagar'>Alerta!</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <div class='modal-body'>
                                                    <h5>Deseja realmente apagar esse registro?</h5>
                                                </div>
                                                <div class='modal-footer'>
                                                <a href=\"excluir-viatura.php?id_viatura=$row[id_viatura]\"><button type='reset' class='btn btn-outline-danger'>Apagar</button></a>
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
            <div id="footer-viaturas" class="card-footer">

            </div>
        </div>
    </div>


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


    <!-- MODAL VIATURA -->

    <div class="modal fade" id="modalViatura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Adicionar Viatura</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="salvar-vtr.php" method="post">
                    <div class="modal-body">
                        <div class="form-row">
                           <div class="form-group col-md-3">
                                <label for="inputPrefixo">Prefixo</label>
                                <input type="text" class="form-control" name="inputPrefixo" id="inputPrefixo">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputMM">Marca/Modelo</label>
                                <input type="text" class="form-control" name="inputMM" id="inputMM">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPlaca">Placa</label>
                                <input type="text" class="form-control" name="inputPlaca" id="inputPlaca">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- FIM MODAL VIATURA -->

    <!-- MODAL EDIT VIATURA -->

    <div class="modal fade" id="modalEditVtr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Adicionar Viatura</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="salvar-alterar-vtr.php" method="post">
                    <div class="modal-body">
                        <div class="form-row">
                           <div class="form-group col-md-3">
                                <label for="inputPrefixo">Prefixo</label>
                                <input type="text" class="form-control" name="inputPrefixo" id="inputEditPrefixo">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputMM">Marca/Modelo</label>
                                <input type="text" class="form-control" name="inputMM" id="inputEditMM">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPlaca">Placa</label>
                                <input type="text" class="form-control" name="inputPlaca" id="inputEditPlaca">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- FIM MODAL EDIT VIATURA -->

    <!-- Fim Modal -->

    <!-- JavaScritp -->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="../erp-cadastro-ocorrencias/bootstrap4/js/bootstrap.min.js"></script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>

    <script>    
        $('#modalEditVtr').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Botão que acionou o modal
            var prefixo = button.data('whateverprefixo')
            var MM = button.data('whatevermm')
            var placa = button.data('whateverplaca') // Extrai informação dos atributos data-*
            // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
            // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
            var modal = $(this)
            modal.find('.modal-title').text('Editar Viatura')
            modal.find('#inputEditPrefixo').val(prefixo)
            modal.find('#inputEditMM').val(MM)
            modal.find('#inputEditPlaca').val(placa)
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