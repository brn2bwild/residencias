<div class="grid grid-cols-1 md:grid-cols-6 gap-4">
  <div class="md:col-span-6">
    <span class="text-md">Datos personales</span>
  </div>
  <div class="sm:col-span-2">
    <x-label>Nombre(s)</x-label>
    <x-input type="text" name="nombres" id="nombres" :error="$errors->has('nombres')" value="{{old('nombres')}}"/>
    @error('nombres')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('nombres')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-2">
    <x-label>Apellido paterno</x-label>
    <x-input type="text" name="apellido_paterno" id="apellido_paterno" :error="$errors->has('apellido_paterno')" value="{{old('apellido_paterno')}}"/>
    @error('apellido_paterno')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('apellido_paterno')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-2">
    <x-label>Apellido Materno</x-label>
    <x-input type="text" name="apellido_materno" id="apellido_materno" :error="$errors->has('apellido_materno')" value="{{old('apellido_materno')}}"/>
    @error('apellido_materno')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('apellido_materno')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-1">
    <x-label>Matrícula</x-label>
    <x-input type="text" name="matricula" id="matricula" :error="$errors->has('matricula')" value="{{old('matricula')}}"/>
    @error('matricula')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('matricula')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-2">
    <x-label>Carrera</x-label>
    <x-select name="carrera" id="carrera" :error="$errors->has('carrera')">
    </x-select>
    @error('carrera')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('carrera')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-2">
    <x-label>Correo electrónico</x-label>
    <x-input type="email" name="email" id="email" :error="$errors->has('email')" value="{{old('email')}}"/>
    @error('email')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('email')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-1">
    <x-label>Número telefónico</x-label>
    <x-input type="tel" name="numero_tel" id="numero_tel" :error="$errors->has('numero_tel')" value="{{old('numero_tel')}}" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"/>
    @error('numero_tel')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('numero_tel')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-1">
    <x-label>Género</x-label>
    <x-select name="genero" id="genero" :error="$errors->has('genero')">
      <option value="">Seleccione un sexo</option>
      <option value="M">Mujer</option>
      <option value="H">Hombre</option>
    </x-select>
    @error('genero')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('genero')}}
      </span>
    @enderror
  </div>

  <div class="md:col-span-6">
    <span class="text-md">Datos de la empresa o Institución</span>
  </div>
  
  <div class="sm:col-span-3">
    <x-label>Empresa / Dependencia / Institución</x-label>
    <x-input type="text" name="lugar_residencia" id="lugar_residencia" :error="$errors->has('lugar_residencia')" value="{{old('lugar_residencia')}}"/>
    @error('lugar_residencia')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('lugar_residencia')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-3">
    <x-label>Dirección del lugar de la residencia</x-label>
    <x-input type="text" name="direccion_lugar" id="direccion_lugar" :error="$errors->has('direccion_lugar')" value="{{old('direccion_lugar')}}"/>
    @error('direccion_lugar')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('direccion_lugar')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-2">
    <x-label>Sector</x-label>
    <x-select name="sector" id="sector" :error="$errors->has('sector')">
    </x-select>
    @error('sector')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('sector')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-2">
    <x-label>Giro</x-label>
    <x-select name="giro" id="giro" :error="$errors->has('giro')">
    </x-select>
    @error('giro')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('giro')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-2">
    <x-label>Tipo de asentamiento</x-label>
    <x-select name="tipo" id="tipo" :error="$errors->has('tipo')">
    </x-select>
    @error('tipo')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('tipo')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-3">
    <x-label>Nombre del asesor externo</x-label>
    <x-input type="text" name="asesor_externo" id="asesor_externo" :error="$errors->has('asesor_externo')" value="{{old('asesor_externo')}}"/>
    @error('asesor_externo')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('asesor_externo')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-3">
    <x-label>Cargo del asesor externo</x-label>
    <x-input type="text" name="cargo_asesor_externo" id="cargo_asesor_externo" :error="$errors->has('cargo_asesor_externo')" value="{{old('cargo_asesor_externo')}}"/>
    @error('cargo_asesor_externo')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('cargo_asesor_externo')}}
      </span>
    @enderror
  </div>

  <div class="md:col-span-6">
    <span class="text-md">Datos del proyecto de residencia</span>
  </div>

  <div class="sm:col-span-3">
    <x-label>Nombre del proyecto</x-label>
    <x-input type="text" name="nombre_proyecto" id="nombre_proyecto" :error="$errors->has('nombre_proyecto')" value="{{old('nombre_proyecto')}}"/>
    @error('nombre_proyecto')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('nombre_proyecto')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-3">
    <x-label>Opción de titulación</x-label>
    <x-select name="opcion" id="opcion" :error="$errors->has('opcion')">
    </x-select>
    @error('opcion')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('opcion')}}
      </span>
    @enderror
  </div>

  <div class="md:col-span-6">
    <span class="text-md">Periodo de realización</span>
  </div>

  <div class="sm:col-span-2">
    <x-label>Fecha de inicio</x-label>
    <x-input type="date" name="fecha_inicio" id="fecha_inicio" :error="$errors->has('fecha_inicio')" value="{{old('fecha_inicio')}}"/>
    @error('fecha_inicio')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('fecha_inicio')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-2">
    <x-label>Fecha de terminación</x-label>
    <x-input type="date" name="fecha_termino" id="fecha_termino" :error="$errors->has('fecha_termino')" value="{{old('fecha_termino')}}"/>
    @error('fecha_termino')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('fecha_termino')}}
      </span>
    @enderror
  </div>

  <div class="md:col-span-6">
    <span class="text-md">Observaciones generales</span>
  </div>

  <div class="sm:col-span-1">
    <x-label>Modalidad</x-label>
    <x-select name="modalidad" id="modalidad" :error="$errors->has('modalidad')">
    </x-select>
    @error('modalidad')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('modalidad')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-1">
    <x-label>Estancia</x-label>
    <x-select name="estancia" id="estancia" :error="$errors->has('estancia')">
    </x-select>
    @error('estancia')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('estancia')}}
      </span>
    @enderror
  </div>

  <div class="sm:col-span-4">
    <x-label>Observaciones adicionales</x-label>
    <x-input type="text" name="observaciones" id="observaciones" :error="$errors->has('observaciones')" value="{{old('observaciones')}}"/>
    @error('observaciones')
      <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{$errors->first('observaciones')}}
      </span>
    @enderror
  </div>

</div>