</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Versão</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 GestãoEasy.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR'
        });
        $('.datepicker').mask('00/00/0000');
        $('.money').keypress(function (e) {
            if (window.event) {
                tecla = e.keyCode;
            } else if (e.which) {
                tecla = e.which;
            } else {
                tecla = 0;
            }

            if (tecla == 13) {
                return false;
            }

            if ((tecla >= 48 && tecla <= 57) || (tecla == 8) || (tecla == 44) || (tecla == 46) || (tecla == 45) || e.ctrlKey) {
                if (tecla == 13) {
                    $(this).blur();
                }
                return true;
            } else {
                return false;
            }
        });

        $(".money").focus(function () {
            $(this).attr("placeholder", "0,00");
        });
        $(".money").focusout(function () {
            valor = $(this).val();
            if ($(this).val() != "") {
                valor = moeda2float(valor);
                valor = float2moeda(valor);
            }
            $(this).val(valor);
            $(this).attr("placeholder", "");
        });
        $(".datepicker").focus(function () {
            $(this).attr("placeholder", "__/__/____");
        });
        $(".datepicker").focusout(function () {
            $(this).attr("placeholder", "");
        });

        String.prototype.replaceAll = function (de, para) {
            var str = this;
            var pos = str.indexOf(de);
            while (pos > -1) {
                str = str.replace(de, para);
                pos = str.indexOf(de);
            }
            return (str);
        }

        function moeda2float(moeda) {
            if (moeda == '' || moeda == undefined) {
                return 0;
            }
            moeda = moeda.replaceAll(".", "");
            moeda = moeda.replace(",", ".");
            return parseFloat(moeda);
        }

        function float2moeda(number, decimals, dec_point, thousands_sep) {
            if (decimals == undefined) {
                decimals = 2;
            }
            //decimals = casasDecimaisValor;
            dec_point = ',';
            thousands_sep = '.';

            number = (number + '')
                    .replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function (n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + (Math.round(n * k) / k)
                                .toFixed(prec);
                    };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
                    .split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '')
                    .length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1)
                        .join('0');
            }
            return s.join(dec);
        }

    });
</script>
</body>
</html>