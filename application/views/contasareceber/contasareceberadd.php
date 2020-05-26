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
    })
</script>