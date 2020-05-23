<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <form action="<?php echo base_url() . $controllerName . "/create" . ($conta->id ? '/' . $conta->id : '') ?>" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Descrição do Pagamento</label>
                            <input type="text" value="<?php echo $conta->descricao ?>" name="descricao" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Vencimento</label>
                            <input type="text" value="<?php echo Date::isoToDateBR($conta->vencimento) ?>" name="vencimento" class="form-control datepicker" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Valor Bruto</label>
                            <input type="text" value="<?php echo Number::floatToNumber($conta->valorbruto) ?>" name="valorbruto" class="form-control money" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Juros</label>
                            <input type="text" value="<?php echo Number::floatToNumber($conta->juros) ?>" name="juros" class="form-control money" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Desconto</label>
                            <input type="text" value="<?php echo Number::floatToNumber($conta->desconto) ?>" name="desconto" class="form-control money" required>
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
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR'
        });
        $('.datepicker').mask('00/00/0000');
        $('.money').mask('#.##0,00', {reverse: true});
    });
</script>