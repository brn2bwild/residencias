<x-app-layout>
  <x-slot name="header">
      {{ __('Registrar Residencia Profesional') }}
  </x-slot>
    
  <x-slot name="slot">
    <form action="{{route('residencias.store')}}" method="POST">
      {{ csrf_field() }}
      <div class="px-4 py-5 bg-white sm:p-6">
        <x-form-residencias/>
      </div>
      <div class="px-4 py-3 text-right sm:px-6">
        <button type="submit" class="btn btn-blue">Guardar</button>
      </div>
    </form>
  </x-slot>
</x-app-layout>