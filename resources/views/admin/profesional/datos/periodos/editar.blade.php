<x-app-layout>
  <x-slot name="header">
      {{ __('Editar Periodo') }}
  </x-slot>
    
  <x-slot name="slot">
    <form action="{{route('periodos.update', $periodo)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-4">
          <div class="col-span-6 sm:col-span-2">
            <x-label>Nombre del periodo</x-label>
            <x-input type="text" name="nombre" id="nombre" :error="$errors->has('nombre')" value="{{old('nombre', isset($periodo->nombre) ? $periodo->nombre: '')}}"/>
            <x-input-validation-error :errors="$errors" :error="'nombre'"/>
          </div>

          <div class="col-span-6 sm:col-span-2">
            <x-label>Fecha inicio</x-label>
            <x-input type="date" name="fecha_inicio" id="fecha_inicio" :error="$errors->has('fecha_inicio')" value="{{old('fecha_inicio', isset($periodo->fecha_inicio) ? $periodo->fecha_inicio: '')}}"/>
            <x-input-validation-error :errors="$errors" :error="'fecha_inicio'"/>
          </div>

          <div class="col-span-6 sm:col-span-2">
            <x-label>Fecha límite para aceptación</x-label>
            <x-input type="date" name="fecha_aceptacion" id="fecha_aceptacion" :error="$errors->has('fecha_aceptacion')" value="{{old('fecha_aceptacion', isset($periodo->fecha_aceptacion) ? $periodo->fecha_aceptacion: '')}}"/>
            <x-input-validation-error :errors="$errors" :error="'fecha_aceptacion'"/>
          </div>

          <div class="col-span-6 sm:col-span-2">
            <x-label>Fecha límite para documentación</x-label>
            <x-input type="date" name="fecha_documentacion" id="fecha_documentacion" :error="$errors->has('fecha_documentacion')" value="{{old('fecha_documentacion', isset($periodo->fecha_documentacion) ? $periodo->fecha_documentacion: '')}}"/>
            <x-input-validation-error :errors="$errors" :error="'fecha_documentacion'"/>
          </div>

          <div class="col-span-6 sm:col-span-2">
            <x-label>Fecha de terminación</x-label>
            <x-input type="date" name="fecha_termino" id="fecha_termino" :error="$errors->has('fecha_termino')" value="{{old('fecha_termino', isset($periodo->fecha_termino) ? $periodo->fecha_termino: '')}}"/>
            <x-input-validation-error :errors="$errors" :error="'fecha_termino'"/>
          </div>

        </div>
      </div>
      <div class="px-4 py-3 text-right sm:px-6 flex justify-between">
        <button type="submit" class="btn btn-blue">Actualizar</button>
      </form>
        <form action="{{route('periodos.destroy', $periodo)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-red">Eliminar</button>
        </form>
      </div>
  </x-slot>
</x-app-layout>