<?php 
    session_start();
    require "config.php";

    $consulta = $pdo->prepare("
        select * from efetivo
        order by inputPostGrad
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
            <h1 class="card-title">Efetivo</h1>
        </div>
        <div id="body-sidebar" class="text-center card-body">
            <div class="btn-group-vertical">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                    data-target="#modalEfetivo">Adicionar<br><img src="_imagens/add.png" alt="">
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
                        <a class="nav-link active" href="efetivo.php">
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
        <div id="corpo-efetivo" class="card">
            <div id="header-efetivo" class="card-header">
                <h1 class="card-title">Efetivo</h1>
            </div>
            <div id="body-efetivo" class="card-body">
            <table class="table table-hover table-bordered"> 
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Post/Grad</th>
                        <th scope="col">RE</th>
                        <th scope="col">Nome Completo</th>
                        <th scope="col">Data Admissão</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">E-mail</th>
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
                            echo "
                                <tr>
                                    <th scope='row'>$numerador</th>
                                    <td>$row[inputPostGrad]</td>
                                    <td>$row[inputRE]</td>
                                    <td>$row[inputNomeCompleto]</td>
                                    <td>$row[inputDataAdmissao]</td>
                                    <td>$row[inputFone]</td>
                                    <td>$row[inputCel]</td>
                                    <td>$row[inputDN]</td>
                                    <td>$row[inputEmail]</td>
                                    <td>
                                        <div class='btn-group btn-group-sm' role='group' aria-label='botoes'>
                                            <button type='button' class='btn btn-secondary btn-warning' data-toggle='modal' data-target='#exampleModal' data-whateverid='$row[id_efetivo]'  data-whateverpost='$row[inputPostGrad]' data-whateverre='$row[inputRE]' data-whatevernomecompleto='$row[inputNomeCompleto]' data-whateveradmissao='$row[inputDataAdmissao]' data-whateverfone='$row[inputFone]' data-whatevercel='$row[inputCel]' data-whateverdn='$row[inputDN]' data-whateveremail='$row[inputEmail]'>Edit</button>
                                            <a href=\"excluir-efetivo.php?id_efetivo=$row[id_efetivo]\"  onclick=\"return confirm('Confirmar a exclusão do registro?')\"><button type='button' class='btn btn-secondary btn-danger'>Del</button></a>
                                        </div>
                                    </td>
                                    <td style='visibility: hidden'>$row[id_efetivo]</td>
                                </tr>
                                
                            ";
                            $numerador = $numerador + 1;
                        }

                    ?>
                </table>
            </div>
            <div id="footer-efetivo" class="card-footer">

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
                            <button type="reset class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar Talão</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Fim Talao Modal -->

    <!-- MODAL EFETIVO -->

    <div id="modalEfetivo" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Adicionar Militar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="salvar-efetivo.php" method="post">
                    <div class="modal-body">
                        <input type="hidden"  class="form-control" name="id_efetivo" id="id_efetivo">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputPostGrad">Post/Grad</label>
                                <select class="form-control" name="inputPostGrad" id="inputPostGrad">
                                    <option value="Cap">Cap</option>
                                    <option value="1º Ten">1º Ten</option>
                                    <option value="2º Ten">2º Ten</option>
                                    <option value="SubTen">SubTen</option>
                                    <option value="1º Sgt">1º Sgt</option>
                                    <option value="2º Sgt">2º Sgt</option>
                                    <option value="3º Sgt">3º Sgt</option>
                                    <option value="Cb">Cb</option>
                                    <option value="Sd">Sd</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputRE">RE</label>
                                <input type="number" class="form-control" name="inputRE" id="inputRE">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="inputNomeCompleto">Nome Completo</label>
                                <input type="text" class="form-control" name="inputNomeCompleto" id="inputNomeCompleto">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputDataAdmissao">Data Admissão</label>
                                <input type="date" class="form-control" name="inputDataAdmissao" id="inputDataAdmissao">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputFone">Telefone</label>
                                <input type="tel" class="form-control" name="inputFone" id="inputFone">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCel">Celular</label>
                                <input type="tel" class="form-control" name="inputCel" id="inputCel">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputDN">Data de Nascimento</label>
                                <input type="date" class="form-control" name="inputDN" id="inputDN">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="inputEmil">Email</label>
                                <input type="email" class="form-control" name="inputEmail" id="inputEmail">
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

    <!-- FIM MODAL EFETIVO -->

    <!-- MODAL edit EFETIVO -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Adicionar Militar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="salvar-alterar-efetivo.php" method="post">
                    <div class="modal-body">
                        <input type="hidden"  class="form-control" name="inputEditId" id="inputEditId">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputPostGrad">Post/Grad</label>
                                <select class="form-control" name="inputPostGrad" id="inputPostGrad">
                                    <option value="Cap">Cap</option>
                                    <option value="1º Ten">1º Ten</option>
                                    <option value="2º Ten">2º Ten</option>
                                    <option value="SubTen">SubTen</option>
                                    <option value="1º Sgt">1º Sgt</option>
                                    <option value="2º Sgt">2º Sgt</option>
                                    <option value="3º Sgt">3º Sgt</option>
                                    <option value="Cb">Cb</option>
                                    <option value="Sd">Sd</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputRE">RE</label>
                                <input type="number" class="form-control" name="inputRE" id="inputEditRE">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="inputNomeCompleto">Nome Completo</label>
                                <input type="text" class="form-control" name="inputNomeCompleto" id="inputEditNomeCompleto">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputDataAdmissao">Data Admissão</label>
                                <input type="date" class="form-control" name="inputDataAdmissao" id="inputEditDataAdmissao">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputFone">Telefone</label>
                                <input type="tel" class="form-control" name="inputFone" id="inputEditFone">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCel">Celular</label>
                                <input type="tel" class="form-control" name="inputCel" id="inputEditCel">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputDN">Data de Nascimento</label>
                                <input type="date" class="form-control" name="inputDN" id="inputEditDN">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="inputEmil">Email</label>
                                <input type="email" class="form-control" name="inputEmail" id="inputEditEmail">
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

    <!-- FIM MODAL edit EFETIVO -->

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
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Botão que acionou o modal
            var id = button.data('whateverid')
            var post = button.data('whateverpost')
            var re = button.data('whateverre')
            var nomeCompleto = button.data('whatevernomecompleto')
            var admissao = button.data('whateveradmissao')
            var fone = button.data('whateverfone')
            var cel = button.data('whatevercel')
            var dn = button.data('whateverdn')
            var email = button.data('whateveremail') // Extrai informação dos atributos data-*
            // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
            // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
            var modal = $(this)
            modal.find('.modal-title').text('Editar Militar')
            modal.find('#inputEditId').val(id)
            modal.find('#inputEditPostGrad').val(post)
            modal.find('#inputEditRE').val(re)
            modal.find('#inputEditNomeCompleto').val(nomeCompleto)
            modal.find('#inputEditDataAdmissao').val(admissao)
            modal.find('#inputEditFone').val(fone)
            modal.find('#inputEditCel').val(cel)
            modal.find('#inputEditDN').val(dn)
            modal.find('#inputEditEmail').val(email)
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