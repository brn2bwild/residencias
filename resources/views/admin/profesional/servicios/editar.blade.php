<x-app-layout>
  <x-slot name="header">
      {{ __('Editar Servicio Social') }}
  </x-slot>
    
  <x-slot name="slot">
    <form action="{{route('servicios.update', $servicio)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="px-4 py-5 bg-white sm:p-6">
        {{-- <div class="grid grid-cols-6 gap-4">
          <div class="col-span-6">
            <span class="text-md">Datos personales</span>
          </div>
          <div class="col-span-6 sm:col-span-2">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del alumno</label>
            <input type="text" name="nombre" id="nombre" autocomplete="nombre" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nombre') border-red-500 @enderror" value="{{$servicio->alumno->nombre}}">
            @error('nombre')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('nombre')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="apellido_paterno" class="block text-sm font-medium text-gray-700">Apellido paterno</label>
            <input type="text" name="apellido_paterno" id="apellido_paterno" autocomplete="apellido_paterno" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('apellido_paterno') border-red-500 @enderror" value="{{$servicio->alumno->apellido_paterno}}">
            @error('apellido_paterno')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('apellido_paterno')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="apellido_materno" class="block text-sm font-medium text-gray-700">Apellido materno</label>
            <input type="text" name="apellido_materno" id="apellido_materno" autocomplete="apellido_materno" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('apellido_materno') border-red-500 @enderror" value="{{$servicio->alumno->apellido_materno}}">
            @error('apellido_materno')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('apellido_materno')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="matricula" class="block text-sm font-medium text-gray-700">Matrícula</label>
            <input type="text" name="matricula" id="matricula" autocomplete="matricula" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('matricula') border-red-500 @enderror" value="{{$servicio->alumno->matricula}}">
            @error('matricula')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('matricula')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="carrera" class="block text-sm font-medium text-gray-700">Carrera</label>
            <select id="carrera" name="carrera" autocomplete="carrera-alumno" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm @error('matricula') border-red-500 @enderror">
              <option selected>Seleccione una carrera</option>
              @foreach ($carreras as $carrera)
                <option value="{{$carrera->nombre}}" @selected($servicio->alumno->carrera == $carrera->nombre)>{{$carrera->nombre}}</option>
              @endforeach
            </select>
            @error('carrera')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('carrera')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
            <input type="email" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('email') border-red-500 @enderror" value="{{$servicio->alumno->email}}">
            @error('email')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('email')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="numero_tel" class="block text-sm font-medium text-gray-700">Número de teléfono</label>
            <input type="text" name="numero_tel" id="numero_tel" autocomplete="numero_tel" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('numero_tel') border-red-500 @enderror" value="{{$servicio->alumno->numero_tel}}">
            @error('numero_tel')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('numero_tel')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="sexo" class="block text-sm font-medium text-gray-700">Sexo</label>
            <select id="sexo" name="sexo" autocomplete="sexo" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm @error('sexo') border-red-500 @enderror" value="{{old('sexo')}}">
              <option value="" selected>Seleccione un sexo</option>
              <option value="Femenino" @selected($servicio->alumno->sexo == 'Femenino')>Femenino</option>
              <option value="Masculino" @selected($servicio->alumno->sexo == 'Masculino')>Masculino</option>
            </select>
            @error('sexo')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('sexo')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 mt-4">
            <span class="text-md">Datos de la institución / empresa</span>
          </div>

          <div class="col-span-6 sm:col-span-6">
            <label for="lugar_servicio" class="block text-sm font-medium text-gray-700">Institución / Empresa</label>
            <input type="text" name="lugar_servicio" id="lugar_servicio" autocomplete="lugar_servicio" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('lugar_servicio') border-red-500 @enderror" value="{{$servicio->lugar_servicio}}">
            @error('lugar_servicio')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('lugar_servicio')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-6">
            <label for="direccion_lugar" class="block text-sm font-medium text-gray-700">Dirección de la Institución / Empresa</label>
            <input type="text" name="direccion_lugar" id="direccion_lugar" autocomplete="direccion_lugar" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('direccion_lugar') border-red-500 @enderror" value="{{$servicio->direccion_lugar}}">
            @error('direccion_lugar')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('direccion_lugar')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-6">
            <label for="responsable" class="block text-sm font-medium text-gray-700">Nombre del responsable del programa</label>
            <input type="text" name="responsable" id="responsable" autocomplete="responsable" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('responsable') border-red-500 @enderror" value="{{$servicio->responsable}}">
            @error('responsable')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('responsable')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="sector" class="block text-sm font-medium text-gray-700">Sector</label>
            <select id="sector" name="sector" autocomplete="sector" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm @error('sector') border-red-500 @enderror">
              <option value="" selected>Seleccione un sector</option>
              @foreach ($sectores as $sector)
                <option value="{{$sector->nombre}}" @selected($servicio->sector == $sector->nombre)>{{$sector->nombre}}</option>  
              @endforeach
            </select>
            @error('sector')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('sector')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="alcance" class="block text-sm font-medium text-gray-700">Alcance</label>
            <select id="alcance" name="alcance" autocomplete="alcance" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm @error('sector') border-red-500 @enderror">
              <option value="" selected>Seleccione un alcance</option>
              @foreach ($alcances as $alcance)
                <option value="{{$alcance->nombre}}" @selected($servicio->alcance == $alcance->nombre)>{{$alcance->nombre}}</option>  
              @endforeach
            </select>
            @error('alcance')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('alcance')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 mt-4">
            <span class="text-md">Periodo</span>
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha de inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" autocomplete="fecha_inicio" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('fecha_inicio') border-red-500 @enderror" value="{{$servicio->fecha_inicio}}">
            @error('fecha_inicio')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('fecha_inicio')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="fecha_termino" class="block text-sm font-medium text-gray-700">Fecha de terminación</label>
            <input type="date" name="fecha_termino" id="fecha_termino" autocomplete="fecha_termino" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('fecha_termino') border-red-500 @enderror" value="{{$servicio->fecha_termino}}">
            @error('fecha_termino')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('fecha_termino')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 mt-4">
            <span class="text-md">Observaciones</span>
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="numero_oficio" class="block text-sm font-medium text-gray-700">Número de oficio</label>
            <input type="text" name="numero_oficio" id="numero_oficio" autocomplete="numero_oficio" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('numero_oficio') border-red-500 @enderror" value="{{$servicio->numero_oficio}}">
            @error('numero_oficio')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('numero_oficio')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="modalidad" class="block text-sm font-medium text-gray-700">Modalidad</label>
            <select id="modalidad" name="modalidad" autocomplete="modalidad" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm @error('matricula') border-red-500 @enderror">
              <option value="" selected>Seleccione una modalidad</option>
              @foreach ($modalidades as $modalidad)
                <option value="{{$modalidad->nombre}}" @selected($servicio->modalidad == $modalidad->nombre)>{{$modalidad->nombre}}</option>
              @endforeach
            </select>
            @error('modalidad')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('modalidad')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="estancia" class="block text-sm font-medium text-gray-700">Tipo de estancia</label>
            <select id="estancia" name="estancia" autocomplete="estancia" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm @error('matricula') border-red-500 @enderror">
              <option value="" selected>Seleccione una estancia</option>
              @foreach ($estancias as $estancia)
                <option value="{{$estancia->nombre}}" @selected($servicio->estancia == $estancia->nombre)>{{$estancia->nombre}}</option>
              @endforeach
            </select>
            @error('estancia')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('estancia')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="calificacion" class="block text-sm font-medium text-gray-700">Calificación</label>
            <input type="number" name="calificacion" id="calificacion" autocomplete="calificacion" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('calificacion') border-red-500 @enderror" value="{{$servicio->calificacion}}" min="0" max="100">
            @error('calificacion')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('calificacion')}}
              </span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-4">
            <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones adicionales</label>
            <input type="text" name="observaciones" id="observaciones" autocomplete="observaciones" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('observaciones') border-red-500 @enderror" value="{{$servicio->observaciones}}">
            @error('observaciones')
              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{$errors->first('observaciones')}}
              </span>
            @enderror
          </div>

        </div> --}}
        <x-form-servicios :servicio="$servicio" :carreras="$carreras" :sectores="$sectores" :tipos="$tipos" :estancias="$estancias" :modalidades="$modalidades"/>
      </div>
      <div class="px-4 py-3 text-right sm:px-6 flex justify-between">
        <button type="submit" class="btn btn-blue">Actualizar</button>
      </form>
        <form action="{{route('servicios.destroy', $servicio)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-red">Eliminar</button>
        </form>
      </div>
  </x-slot>
</x-app-layout>