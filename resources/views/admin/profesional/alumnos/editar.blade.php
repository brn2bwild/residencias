<x-app-layout>
  <x-slot name="header">
      {{ __('Editar Alumno') }}
  </x-slot>
    
  <x-slot name="slot">
    @if ($mensaje = Session::get('mensaje'))
      <div id="toast" class="absolute flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow bottom-5 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert" onclick="closeToast()">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        </div>
        <div class="ml-3 text-sm font-normal">{{$mensaje}}</div>
        {{-- <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button> --}}
      </div>

      {{-- <div id="toast-bottom-left" class="absolute flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow bottom-5 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
        <div class="text-sm font-normal">Bottom left positioning.</div>
      </div> --}}
    @endif
    <form action="{{route('alumnos.update', $alumno)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-6">
          <div class="col-span-6 sm:col-span-2">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="nombre" id="nombre" autocomplete="nombre_alumno" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{$alumno->nombre}}" style="text-transform: uppercase">
            @error('nombre')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('nombre')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="apellido_paterno" class="block text-sm font-medium text-gray-700">Apellido Paterno</label>
            <input type="text" name="apellido_paterno" id="apellido_paterno" autocomplete="apellido_paterno" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{$alumno->apellido_paterno}}" style="text-transform: uppercase">
            @error('apellido_paterno')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('apellido_paterno')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="apellido_materno" class="block text-sm font-medium text-gray-700">Apellido Materno</label>
            <input type="text" name="apellido_materno" id="apellido_materno" autocomplete="apellido_materno" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{$alumno->apellido_materno}}" style="text-transform: uppercase">
            @error('apellido_materno')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('apellido_materno')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="matricula" class="block text-sm font-medium text-gray-700">Matricula</label>
            <input type="text" name="matricula" id="matricula" autocomplete="matricula" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{$alumno->matricula}}" style="text-transform: uppercase">
            @error('matricula')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('matricula')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="semestre" class="block text-sm font-medium text-gray-700">Semestre</label>
            <input type="number" name="semestre" id="semestre" autocomplete="semestre" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{$alumno->semestre}}">
            @error('semestre')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('semestre')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="grupo" class="block text-sm font-medium text-gray-700">Grupo</label>
            <input type="text" name="grupo" id="grupo" autocomplete="grupo" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{$alumno->grupo}}" style="text-transform: uppercase">
            @error('grupo')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('grupo')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="carrera" class="block text-sm font-medium text-gray-700">Carrera</label>
            <select id="carrera" name="carrera" autocomplete="carrera-alumno" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
              <option selected>Seleccione una carrera</option>
              <option value="Ing. Informática" @selected('Ing. Informática' == $alumno->carrera)>Ing. Informática</option>
              <option value="Ing. Electromecánica" @selected('Ing. Electromecánica' == $alumno->carrera)>Ing. Electromecánica</option>
              <option value="Ing. Administración" @selected('Ing. Administración' == $alumno->carrera)>Ing. Administración</option>
              <option value="Ing. Bioquímica" @selected('Ing. Bioquímica' == $alumno->carrera)>Ing. Bioquímica</option>
              <option value="Ing. Industrial" @selected('Ing. Industrial' == $alumno->carrera)>Ing. Industrial</option>
              <option value="Ing. Energías Renovables" @selected('Ing. Energías Renovables' == $alumno->carrera)>Ing. Energías Renovables</option>
              <option value="Ing. Agronomía" @selected('Ing. Agronomía' == $alumno->carrera)>Ing. Agronomía</option>
            </select>
            @error('carrera')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('carrera')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="email-address" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
            <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="">
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
      <div class="px-4 py-3 text-right sm:px-6 flex justify-between">
        {{-- <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-bold rounded-md text-white bg-blue-900 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700">Guardar</button> --}}
        <button type="submit" class="btn btn-blue">Actualizar</button>
      </form>
        <form action="{{route('alumnos.destroy', $alumno)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-red">Eliminar</button>
        </form>
      </div>

  </x-slot>
  @section('js')
    <script>
      $(document).ready(function () {
        $('#alumnos').DataTable({
          lengthChange: false,
        });
      });

      function closeToast() {
        const toast = document.querySelector('#toast');
        toast.classList.add('hidden');
      }
    </script>
  @endsection
</x-app-layout>