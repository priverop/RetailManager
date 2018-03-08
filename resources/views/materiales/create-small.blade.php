<tr>
  <td>#</td>
  <td><input type="text" name="material" id="nuevoMaterial" /></td>
  <td>#</td>
  <td>#</td>
</tr>

<script>
  $(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $("#nuevoMaterial").keypress(function(e) {
      if(e.which == 13) {
        var nombre = $("#nuevoMaterial").val();
        var form_action = $("#actionMaterialStore").val();
        var parte_id = $("#parte_id").val();
        var precio = 1;
        var proveedor_id = 1;

        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: '/materiales',
            data: { nombre:nombre, precio:precio, proveedor_id:proveedor_id, parte_id:parte_id }
        }).done(function(data){
          location.reload();
        });
      }
    });
  });
</script>
