<x-app-layout>
  <x-slot name="header">
      {{ __('Registrar Servicio Social') }}
  </x-slot>
    
  <x-slot name="slot">
    <form action="{{route('servicios.store')}}" method="POST">
      {{ csrf_field() }}
      <div class="px-4 py-5 bg-white sm:p-6">
        <x-form-servicios :carreras="$carreras" :sectores="$sectores" :tipos="$tipos" :estancias="$estancias" :modalidades="$modalidades" :periodos="$periodos"/>
      </div>
      <div class="px-4 py-3 text-right sm:px-6">
        <button type="submit" class="btn btn-blue">Guardar</button>
      </div>
    </form>
  </x-slot>
</x-app-layout>

<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
    }
  });

  function fechas(){
    let periodo = document.getElementById('periodo').value;
    $.ajax({
      url:'/ajax/periodos/'+periodo,
      data: {},
      type: 'get',
      success: function(response){
        let datos = JSON.parse(response);
        document.getElementById('fecha_inicio').value = datos.fecha_inicio;
        document.getElementById('fecha_aceptacion').value = datos.fecha_aceptacion;
        document.getElementById('fecha_documentacion').value = datos.fecha_documentacion;
        document.getElementById('fecha_termino').value = datos.fecha_termino;
      }
    });
  }
</script>