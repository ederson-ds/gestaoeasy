<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Valor</th>
                        <th style="text-align: center;">Situação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contasapagar as $conta) { ?>
                        <tr>
                            <td><?php echo $conta->descricao ?></td>
                            <td>
                                <?php

                                if ($conta->datacompensacao) {
                                    echo Date::isoToDateBR($conta->datacompensacao);
                                } else {
                                    echo Date::isoToDateBR($conta->vencimento);
                                }

                                ?>
                            </td>
                            <td><?php echo Number::floatToNumber($conta->valorbruto + $conta->juros - $conta->desconto) ?></td>
                            <td style="text-align: center;">
                                <?php

                                $currentDate =  strtotime(date("Y-m-d"));
                                $vencimento =  strtotime($conta->vencimento);
                                $datacompensacao =  strtotime($conta->datacompensacao);

                                if ($currentDate <= $datacompensacao) {
                                    echo '<span class="badge badge-success">Quitado</span>';
                                } else if ($currentDate > $vencimento) {
                                    echo '<span class="badge badge-danger">Atrasado</span>';
                                } else {
                                    echo '<span class="badge badge-info">Em aberto</span>';
                                }

                                ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url() . $controllerName . "/create/" . $conta->id ?>" class="btn btn-default">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-default excluirBtn" data-id="<?php echo $conta->id ?>" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="<?php echo base_url() . $controllerName . "/create" ?>" class="btn btn-primary">Cadastrar</a>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                <a type="button" id="excluirBtn" class="btn btn-primary">Excluir</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(".excluirBtn").click(function() {
        var controllerName = <?php echo '"' . $controllerName . '"' ?>;
        var baseUrl = <?php echo '"' . base_url() . '"' ?>;
        $("#excluirBtn").attr("href", baseUrl + controllerName + "/delete/" + $(this).data('id'));
    });
</script>