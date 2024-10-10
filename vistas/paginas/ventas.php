<div style="margin-top: 3%">    
    <div class="row g-0 text-center">
      <div class="col-sm-6 col-md-8">
        <input onkeyup="leer_codigo(event)" class="form-control" type="text" name="codigo_barras" placeholder="codigo de barras" id="id_codigo_barras">
        
      </div>
      <div class="col-6 col-md-2">
      <button class="btn btn-primary me-md-2"  data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Buscar producto</button>
      </div>
      <div class="col-6 col-md-2">
        <select class="form-control" name="tipo_pago" id="tipo_pagos" >
          <option value="">Seleccione un metodo de pago</option>
        </select>
      </div>
    </div>
    <div>
      <canvas id="myChart"></canvas>
    </div>
    <div style="margin-top: 3%">
      <table id="tabla_productos" class="table table-bordered">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John</td>
          <td>Doe</td>
          <td>john@example.com</td>
          <td>john@example.com</td>
        </tr>
      </tbody>
    </table>
    </div>

    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Total: $12312321</h5>
        <h6 class="card-subtitle mb-2 text-muted">Pago <input class="form-control" value="0" /></h6>
        <p class="card-text">Vuelto: $0.1</p>
      </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });


    function leer_codigo(event){
        if (event.key == 'Enter'){
            console.log(event.target.value)
            $.ajax({
              url: "controladores/ventas.ajax.controlador.php",
              type: "post",
              data: {
                'codigo_barra': event.target.value
              } ,
              success: function (response) {
                let data = JSON.parse(response);
                console.log(data)
                $('#tabla_productos  > tbody').append(`<tr><td>${data.nombre}</td><td>${data.precio}</td><td>1</td><td><div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-primary me-md-2" type="button">Button</button>
  <button class="btn btn-primary" type="button">Button</button>
</div></td></tr>`);
              }
          });
        }
    }
</script>