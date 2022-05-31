<x-app-layout>
  <x-slot name="header">
      {{ __('Regristrar Alumno') }}
  </x-slot>
    
  <x-slot name="slot">
    <form action="{{route('alumnos.store')}}" method="POST">
      {{ csrf_field() }}
      <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-6">
          <div class="col-span-6 sm:col-span-2">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="nombre" id="nombre" autocomplete="nombre_alumno" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" style="text-transform: uppercase">
            @error('nombre')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('nombre')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="apellido_paterno" class="block text-sm font-medium text-gray-700">Apellido Paterno</label>
            <input type="text" name="apellido_paterno" id="apellido_paterno" autocomplete="apellido_paterno" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" style="text-transform: uppercase">
            @error('apellido_paterno')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('apellido_paterno')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="apellido_materno" class="block text-sm font-medium text-gray-700">Apellido Materno</label>
            <input type="text" name="apellido_materno" id="apellido_materno" autocomplete="apellido_materno" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" style="text-transform: uppercase">
            @error('apellido_materno')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('apellido_materno')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="matricula" class="block text-sm font-medium text-gray-700">Matrícula</label>
            <input type="text" name="matricula" id="matricula" autocomplete="matricula" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" style="text-transform:uppercase">
            @error('matricula')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('matricula')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="semestre" class="block text-sm font-medium text-gray-700">Semestre</label>
            <input type="text" name="semestre" id="semestre" autocomplete="semestre" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" style="text-transform: uppercase">
            @error('semestre')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('semestre')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="grupo" class="block text-sm font-medium text-gray-700">Grupo</label>
            <input type="text" name="grupo" id="grupo" autocomplete="grupo" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" style="text-transform:uppercase">
            @error('grupo')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('grupo')}}
              </span>
            @enderror
          </div>
          

          <div class="col-span-6 sm:col-span-2">
            <label for="carrera" class="block text-sm font-medium text-gray-700">Carrera</label>
            <select id="carrera" name="carrera" autocomplete="carrera-alumno" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
              <option value="" selected>Seleccione una carrera</option>
              <option value="Ing. Informática">Ing. Informática</option>
              <option value="Ing. Electromecánica">Ing. Electromecánica</option>
              <option value="Ing. Administración">Ing. Administración</option>
              <option value="Ing. Bioquímica">Ing. Bioquímica</option>
              <option value="Ing. Industrial">Ing. Industrial</option>
              <option value="Ing. Energías Renovables">Ing. Energías Renovables</option>
              <option value="Ing. Agronomía">Ing. Agronomía</option>
            </select>
            @error('carrera')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('carrera')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="email-address" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
            <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
          </div>

          {{-- <div class="col-span-6 sm:col-span-3">
            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
            <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
              <option>United States</option>
              <option>Canada</option>
              <option>Mexico</option>
            </select>
          </div> --}}

          {{-- <div class="col-span-6">
            <label for="street-address" class="block text-sm font-medium text-gray-700">Street address</label>
            <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
          </div>

          <div class="col-span-6 sm:col-span-6 lg:col-span-2">
            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
            <input type="text" name="city" id="city" autocomplete="address-level2" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
          </div>

          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
            <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label>
            <input type="text" name="region" id="region" autocomplete="address-level1" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
          </div>

          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
            <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
            <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
          </div> --}}
        </div>
      </div>
      <div class="px-4 py-3 text-right sm:px-6">
        {{-- <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Guardar</button> --}}
        <button type="submit" class="btn btn-blue">Guardar</button>
      </form>
      </div>
  </x-slot>
</x-app-layout>