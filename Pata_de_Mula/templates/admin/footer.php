</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
<script>
    function mostrar() {
        document.getElementById("sidebar").style.width = "300px";
        document.getElementById("contenido").style.marginLeft = "300px";
        document.getElementById("abrir").style.display = "none";
        document.getElementById("cerrar").style.display = "inline";
    }

    function ocultar() {
        document.getElementById("sidebar").style.width = "0";
        document.getElementById("contenido").style.marginLeft = "0";
        document.getElementById("abrir").style.display = "inline";
        document.getElementById("cerrar").style.display = "none";
    }


    function MostrarInfo(datos) {
        d = datos.split('||');
        $('#nombreEmpleado').text(d[0]);
        $('#apEmpleado').text(d[1]);
        $('#amEmpleado').text(d[2]);
        $('#fecha').text(d[3]);
    }
    function MostrarInfo1(datos1) {
        d = datos1.split('||');
        $('#id_reservacion').val(d[0]);
        $('#nombreCliente').val(d[1]);
        $('#telefonou').val(d[2]);
        $('#diau').val(d[3]);
        $('#horau').val(d[4]);
        $('#numPersonasu').val(d[5]);
    }
</script>
</body>

</html>