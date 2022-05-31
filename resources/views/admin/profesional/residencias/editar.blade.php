<x-app-layout>
  <x-slot name="header">
      {{ __('Editar Residencia Profesional') }}
  </x-slot>
    
  <x-slot name="slot">
    <form action="{{route('residencias.update', $residencia)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-4">
          <div class="col-span-6 sm:col-span-2">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del alumno</label>
            <input type="text" name="nombre" id="nombre" autocomplete="nombre" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nombre') border-red-500 @enderror" value="{{$residencia->nombre}}">
            @error('nombre')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('nombre')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="apellido_paterno" class="block text-sm font-medium text-gray-700">Apellido paterno</label>
            <input type="text" name="apellido_paterno" id="apellido_paterno" autocomplete="apellido_paterno" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('apellido_paterno') border-red-500 @enderror" value="{{$residencia->apellido_paterno}}">
            @error('apellido_paterno')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('apellido_paterno')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="apellido_materno" class="block text-sm font-medium text-gray-700">Apellido materno</label>
            <input type="text" name="apellido_materno" id="apellido_materno" autocomplete="apellido_materno" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('apellido_materno') border-red-500 @enderror" value="{{$residencia->apellido_materno}}">
            @error('apellido_materno')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('apellido_materno')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="matricula" class="block text-sm font-medium text-gray-700">Matrícula</label>
            <input type="text" name="matricula" id="matricula" autocomplete="matricula" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('matricula') border-red-500 @enderror" value="{{$residencia->matricula}}">
            @error('matricula')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('matricula')}}
              </span>
            @enderror
          </div>

        </div>
      </div>
      <div class="px-4 py-3 text-right sm:px-6 flex justify-between">
        <button type="submit" class="btn btn-blue">Actualizar</button>
      </form>
        <form action="{{route('residencias.destroy', $residencia)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-red">Eliminar</button>
        </form>
      </div>
  </x-slot>
</x-app-layout>