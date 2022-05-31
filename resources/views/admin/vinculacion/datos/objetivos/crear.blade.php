<x-app-layout>
  <x-slot name="header">
      {{ __('Crear Objetivo') }}
  </x-slot>
    
  <x-slot name="slot">
    <form action="{{route('objetivos.store')}}" method="POST">
      {{ csrf_field() }}
      <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-5 gap-4">
          <div class="col-span-6 sm:col-span-2">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del objetivo</label>
            <input type="text" name="nombre" id="nombre" autocomplete="nombre" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nombre') border-red-500 @enderror">
            @error('nombre')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('nombre')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción del objetivo</label>
            <input type="text" name="descripcion" id="descripcion" autocomplete="descripcion" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('descripcion') border-red-500 @enderror">
            @error('descripcion')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('descripcion')}}
              </span>
            @enderror
          </div>
        </div>
      </div>
      <div class="px-4 py-3 text-right sm:px-6">
        <button type="submit" class="btn btn-blue">Guardar</button>
      </div>
    </form>
  </x-slot>
</x-app-layout>