document.addEventListener("DOMContentLoaded", function() {
        
    let tabla1 = $("#tablaUsers").DataTable({
      "ajax": {
        url: "/api/users/api-users.php?accion=listar",
        dataSrc: "items"
      },
      "columns": [{
          "data": "id"
        },
        {
          "data": "name"
        },
        {
          "data": "email"
        },
        {
          "data": null,
          "orderable": false
        },
        {
          "data": null,
          "orderable": false
        }
      ],
      "columnDefs": [{
        targets: 3,
        "defaultContent": "<button class='btn btn-sm btn-warning botonmodificar'>Modificar</button>",
        data: null
      }, {
        targets: 4,
        "defaultContent": "<button class='btn btn-sm btn-danger botonborrar'>Borrar</button>",
        data: null
      }],
      "language": {
        "url": "DataTables/spanish.json",
      },
    });

    
$('#BotonAgregar').click(function() {
  $('#ConfirmarAgregar').show();
  $('#ConfirmarModificar').hide();
  limpiarFormulario();
  $("#FormularioUser").modal('show');
});

$('#ConfirmarAgregar').click(function() {
  $("#FormularioUser").modal('hide');
  let registro = recuperarDatosFormulario();
  agregarRegistro(registro);
});

$('#ConfirmarModificar').click(function() {
  $("#FormularioUser").modal('hide');
  let registro = recuperarDatosFormulario();
  modificarRegistro(registro);
});

$('#tablaUsers tbody').on('click', 'button.botonmodificar', function() {
  $('#ConfirmarAgregar').hide();
  $('#ConfirmarModificar').show();
  $('#id').prop("disabled", true);
  let registro = tabla1.row($(this).parents('tr')).data();
  recuperarRegistro(registro.id);
});

$('#tablaUsers tbody').on('click', 'button.botonborrar', function() {
  if (confirm("¿Realmente quiere borrar el artículo?")) {
    let registro = tabla1.row($(this).parents('tr')).data();
    console.log(registro.id);
    borrarRegistro(registro.id);
  }
});

// funciones que interactuan con el formulario de entrada de datos
function limpiarFormulario() {
  $('#id').val('');
  $('#id').prop("disabled", true);
  $('#name').val('');
  $('#email').val('');
  $('#password').val('');

}

function recuperarDatosFormulario() {
  let registro = {
    id: $('#id').val(),
    name: $('#name').val(),
    email: $('#email').val(),
    password:$('#password').val(),
  };
  return registro;
}


// funciones para comunicarse con el servidor via ajax
function agregarRegistro(registro) {
  $.ajax({
    type: 'POST',
    url: '/api/users/api-users.php?accion=agregar',
    data: registro,
    success: function(msg) {
      tabla1.ajax.reload();
    },
    error: function() {
      alert("Hay un problema");
    }
  });
}

function borrarRegistro(id) {
  $.ajax({
    type: 'GET',
    url: '/api/users/api-users.php?accion=borrar&id=' + id,
    data: '',
    success: function(msg) {
      tabla1.ajax.reload();
    },
    error: function() {
      alert("Hay un problema");
    }
  });
}


function recuperarRegistro(id) {
  $.ajax({
    type: 'GET',
    url: '/api/users/api-users.php?accion=consultar&id=' + id,
    data: '',
    success: function(datos) {
      $('#id').val(datos[0].id);
      $('#name').val(datos[0].name);
      $('#email').val(datos[0].email);
      $('#password').val(datos[0].password);

      //$("#estado").val($("#estado option:first").val());
      
      $("#FormularioUser").modal('show');
    },
    error: function() {
      alert("Hay un problema");
    }
  });
}

function modificarRegistro(registro) {
  $.ajax({
    type: 'POST',
    url: '/api/users/api-users.php?accion=modificar&id=' + registro.id,
    data: registro,
    success: function(msg) {
      tabla1.ajax.reload();
    },
    error: function() {
      alert("Hay un problema");
    }
  });
}

  });
