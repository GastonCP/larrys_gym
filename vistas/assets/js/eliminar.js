$(document).on("click", ".btnEliminarProducto", function () {
   
    let id_producto = $(this).attr("id_producto"); 
  
    Swal.fire({
      title: "Está seguro de eliminar el producto?",
      text: "Sino lo está puede cancelar la acción",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, eliminar producto",
    }).then(function (result) {
      if (result.value) {
        window.location =
          "index.php?pagina=productos&id_producto_eliminar=" + id_producto;
      }
    });
  });

$(document).on("click", ".btnEliminarCliente", function () {
   
    let id_cliente = $(this).attr("id_cliente"); 
  
    Swal.fire({
      title: "Está seguro de eliminar el cliente?",
      text: "Sino lo está puede cancelar la acción",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, eliminar cliente",
    }).then(function (result) {
      if (result.value) {
        window.location =
          "index.php?pagina=clientes&id_cliente_eliminar=" + id_cliente;
      }
    });
  });

$(document).on("click", ".btnEliminarEntrenador", function () {
   
    let id_entrenador = $(this).attr("id_entrenador"); 
  
    Swal.fire({
      title: "Está seguro de eliminar el entrenador?",
      text: "Sino lo está puede cancelar la acción",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, eliminar entrenador",
    }).then(function (result) {
      if (result.value) {
        window.location =
          "index.php?pagina=entrenadores&id_entrenador_eliminar=" + id_entrenador;
      }
    });
  });

$(document).on("click", ".btnEliminarEspecialidad", function () {
   
    let id_especialidad = $(this).attr("id_especialidad"); 
  
    Swal.fire({
      title: "Está seguro de eliminar el especialidad?",
      text: "Sino lo está puede cancelar la acción",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, eliminar especialidad",
    }).then(function (result) {
      if (result.value) {
        window.location =
          "index.php?pagina=especialidades&id_especialidad_eliminar=" + id_especialidad;
      }
    });
  });

  $(document).on("click", ".btnEliminarPlan", function () {
   
    let id_plan = $(this).attr("id_plan"); 
  
    Swal.fire({
      title: "Está seguro de eliminar el plan?",
      text: "Sino lo está puede cancelar la acción",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, eliminar plan",
    }).then(function (result) {
      if (result.value) {
        window.location =
          "index.php?pagina=planes&id_plan_eliminar=" + id_plan;
      }
    });
  });