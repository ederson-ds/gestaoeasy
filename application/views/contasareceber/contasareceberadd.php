<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <form action="<?php echo base_url() . $controllerName . "/create" . ($conta->id ? '/' . $conta->id : '') ?>" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label>Descrição do recebimento</label>
                            <input type="text" value="<?php echo $conta->descricao ?>" autocomplete="off" name="descricao" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label>Vencimento</label>
                            <input type="text" value="<?php echo Date::isoToDateBR($conta->vencimento) ?>" autocomplete="off" name="vencimento" class="form-control datepicker" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label>Valor Bruto</label>
                            <input type="text" value="<?php echo Number::floatToNumber($conta->valorbruto) ?>" autocomplete="off" name="valorbruto" class="form-control money" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Juros</label>
                            <input type="text" value="<?php echo Number::floatToNumber($conta->juros) ?>" autocomplete="off" name="juros" class="form-control money">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Desconto</label>
                            <input type="text" value="<?php echo Number::floatToNumber($conta->desconto) ?>" autocomplete="off" name="desconto" class="form-control money">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label>Conta bancária</label>
                            <select class="form-control select2" name="contabancaria_id" style="width: 100%;" required>
                                <option value="">Selecione uma opção</option>
                                <?php foreach ($contasbancarias as $contabancaria) { ?>
                                    <option <?php
                                            if ($conta->contabancaria_id == $contabancaria->id) {
                                                echo 'selected="selected"';
                                            }
                                            ?> value="<?php echo $contabancaria->id ?>"><?php echo $contabancaria->nome ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label>Forma de pagamento</label>
                            <select class="form-control select2" name="formadepagamento_id" style="width: 100%;" required>
                                <option value="">Selecione uma opção</option>
                                <?php foreach ($formadepagamentos as $formpagamento) { ?>
                                    <option <?php
                                            if ($conta->formadepagamento_id == $formpagamento->id) {
                                                echo 'selected="selected"';
                                            }
                                            ?> value="<?php echo $formpagamento->id ?>"><?php echo $formpagamento->nome ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Recebimento quitado</label>
                            <select class="form-control" id="recebimentoquitado" style="width: 100%;">
                                <option value="1">Sim</option>
                                <option value="0" selected="selected">Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Data de compensação</label>
                            <input type="text" value="<?php echo Date::isoToDateBR($conta->datacompensacao) ?>" autocomplete="off" name="datacompensacao" class="form-control datepicker" disabled required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Confirmar</button>
                <a href="<?php echo base_url() . $controllerName ?>" class="btn btn-default">Voltar</a>
            </div>
            <!-- /.card-footer-->
        </form>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
<script>
    $('.select2').select2({
        theme: 'bootstrap4'
    });
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = dd + '/' + mm + '/' + yyyy;
    $("#recebimentoquitado").change(function() {
        if ($(this).val() == "1") {
            $('input[name="datacompensacao"]').prop("disabled", false);
            $('input[name="datacompensacao"]').parent().addClass("required");
            $('input[name="datacompensacao"]').val(today);
            $('input[name="datacompensacao"]').focus();
        } else {
            $('input[name="datacompensacao"]').prop("disabled", true);
            $('input[name="datacompensacao"]').parent().removeClass("required");
            $('input[name="datacompensacao"]').val("");
        }
    });

    $('input[name="datacompensacao"]').focusout(function() {
        if ($(this).val() == "") {
            $(this).val(today);
        }
    });

    if ($('input[name="datacompensacao"]').val() != "") {
        $("#recebimentoquitado").val("1");
        $('input[name="datacompensacao"]').prop("disabled", false);
        $('input[name="datacompensacao"]').parent().addClass("required");
    }
</script>