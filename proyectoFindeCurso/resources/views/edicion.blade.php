@include('navegacion')


@foreach ($inscripcion as $inscripcion)

<h2>{{$inscripcion->nombre}}</h2> 
 
@endforeach
<div class="container">
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">email</th>
        <th scope="col">Provincia</th>
        <th scope="col">Centro de Estudios</th>
        <th scope="col">Fecha terminación</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>{{$inscripcion->nombre}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>

@include('footer')