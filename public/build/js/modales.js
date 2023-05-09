<script>
    $(document).on('click', '.edit-item-btn', function(){
        var id = $(this).data('id');
        var tipo = $(this).data('tipo');
        var nombre = $(this).data('nombre');
        var descripcion = $(this).data('descripcion');
        var estado = $(this).data('estado');

        $('#id-field').val(id);
        $('#tipo-field').val(tipo);
        $('#nombre-field').val(nombre);
        $('#descripcion-field').val(descripcion);
        $('#estado-field').val(estado);
    });
</script>
