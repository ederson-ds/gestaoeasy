<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <form action="<?php echo base_url() . $controllerName . "/create" . ($conta->id ? '/' . $conta->id : '') ?>" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label>Nome da conta</label>
                            <input type="text" value="<?php echo $conta->nome ?>" autocomplete="off" name="nome" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label>Saldo Inicial</label>
                            <input type="text" value="<?php echo Number::floatToNumber($conta->saldoinicial) ?>" autocomplete="off" name="saldoinicial" class="form-control money" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label>Data Saldo</label>
                            <input type="text" value="<?php echo Date::isoToDateBR($conta->datasaldo) ?>" autocomplete="off" name="datasaldo" class="form-control datepicker" required>
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