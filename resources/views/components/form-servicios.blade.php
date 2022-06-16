<div class="grid grid-cols-1 md:grid-cols-6 gap-4">
  <div class="md:col-span-6">
    <span class="text-md">Datos personales</span>
  </div>
  <div class="sm:col-span-2">
    <x-label>Nombre(s)</x-label>
    <x-input type="text" name="nombres" id="nombres" :error="$errors->has('nombres')" value="{{old('nombres', isset($servicio->alumno->nombres) ? $servicio->alumno->nombres: '')}}"/>
    <x-input-validation-error :errors="$errors" :error="'nombres'"/>
  </div>

  <div class="sm:col-span-2">
    <x-label>Apellido paterno</x-label>
    <x-input type="text" name="apellido_paterno" id="apellido_paterno" :error="$errors->has('apellido_paterno')" value="{{old('apellido_paterno', isset($servicio->alumno->apellido_paterno) ? $servicio->alumno->apellido_paterno: '')}}"/>
    <x-input-validation-error :errors="$errors" :error="'apellido_paterno'"/>
  </div>

  <div class="sm:col-span-2">
    <x-label>Apellido materno</x-label>
    <x-input type="text" name="apellido_materno" id="apellido_materno" :error="$errors->has('apellido_materno')" value="{{old('apellido_materno', isset($servicio->alumno->apellido_materno) ? $servicio->alumno->apellido_materno: '')}}"/>
    <x-input-validation-error :errors="$errors" :error="'apellido_materno'"/>
  </div>

  <div class="sm:col-span-1">
    <x-label>Matrícula</x-label>
    <x-input type="text" name="matricula" id="matricula" :error="$errors->has('matricula')" value="{{old('matricula', isset($servicio->alumno->matricula) ? $servicio->alumno->matricula: '')}}"/>
    <x-input-validation-error :errors="$errors" :error="'matricula'"/>
  </div>

  <div class="sm:col-span-2">
    <x-label>Carreras</x-label>
    <x-select name="carrera" id="carrera" :error="$errors->has('carrera')">
      <option value="" selected>Seleccione una carrera</option>
      @foreach ($carreras as $carrera)
        <option value="{{$carrera->nombre}}" @selected(old('carrera', isset($servicio->alumno->carrera->nombre) ? $servicio->alumno->carrera->nombre: '') == $carrera->nombre)>{{$carrera->nombre}}</option>
      @endforeach
    </x-select>
    <x-input-validation-error :errors="$errors" :error="'carrera'"/>
  </div>

  <div class="sm:col-span-2">
    <x-label>Correo electrónico</x-label>
    <x-input type="email" name="email" id="email" :error="$errors->has('email')" value="{{old('email', isset($servicio->alumno->email) ? $servicio->alumno->email: '')}}"/>
    <x-input-validation-error :errors="$errors" :error="'email'"/>
  </div>

  <div class="sm:col-span-1">
    <x-label>Número telefónico</x-label>
    <x-input type="tel" name="numero_tel" id="numero_tel" :error="$errors->has('numero_tel')" value="{{old('numero_tel', isset($servicio->alumno->numero_tel) ? $servicio->alumno->numero_tel: '')}}"/>
    <x-input-validation-error :errors="$errors" :error="'numero_tel'"/>
  </div>

  <div class="sm:col-span-1">
    <x-label>Sexo</x-label>
    <x-select name="sexo" id="sexo" :error="$errors->has('sexo')">
      <option value="">Seleccione un sexo</option>
      <option value="M" @selected(old('sexo', isset($servicio->alumno->sexo) ? $servicio->alumno->sexo: '') == "M")>Mujer</option>
      <option value="H" @selected(old('sexo', isset($servicio->alumno->sexo) ?$servicio->alumno->sexo: '') == "H")>Hombre</option>
    </x-select>
    <x-input-validation-error :errors="$errors" :error="'sexo'"/>
  </div>

  <div class="md:col-span-6">
    <span class="text-md">Datos de la institución / empresa</span>
  </div>

  <div class="sm:col-span-6">
    <x-label>Dependencia / Institución</x-label>
    <x-input type="text" name="lugar_servicio" id="lugar_servicio" :error="$errors->has('lugar_servicio')" value="{{old('lugar_servicio', isset($servicio->lugar_servicio) ? $servicio->lugar_servicio: '')}}"/>
    <x-input-validation-error :errors="$errors" :error="'lugar_servicio'"/>
  </div>

  <div class="sm:col-span-3">
    <x-label>Dirección del lugar del servicio social</x-label>
    <x-input type="text" name="direccion_lugar" id="direccion_lugar" :error="$errors->has('direccion_lugar')" value="{{old('direccion_lugar',isset($servicio->direccion_lugar) ? $servicio->direccion_lugar: '')}}"/>
    <x-input-validation-error :errors="$errors" :error="'direccion_lugar'"/>
  </div>

  <div class="sm:col-span-3">
    <x-label>Responsable del programa</x-label>
    <x-input type="text" name="responsable" id="responsable" :error="$errors->has('responsable')" value="{{old('responsable', isset($servicio->responsable) ? $servicio->responsable: '')}}"/>
    <x-input-validation-error :errors="$errors" :error="'responsable'"/>
  </div>

  <div class="sm:col-span-2">
    <x-label>Sector</x-label>
    <x-select name="sector" id="sector" :error="$errors->has('sector')">
      <option value="" selected>Seleccione un sector</option>
      @foreach ($sectores as $sector)
        <option value="{{$sector->nombre}}" @selected(old('sector', isset($servicio->sector->nombre) ?$servicio->sector->nombre: '') == $sector->nombre)>{{$sector->nombre}}</option>  
      @endforeach
    </x-select>
    <x-input-validation-error :errors="$errors" :error="'sector'"/>
  </div>


  <div class="sm:col-span-2">
    <x-label>Tipo de asentamiento</x-label>
    <x-select name="tipo" id="tipo" :error="$errors->has('tipo')">
      <option value="" selected>Seleccione un tipo</option>
      @foreach ($tipos as $tipo)
        <option value="{{$tipo->nombre}}" @selected(old('tipo', isset($servicio->tipo->nombre) ? $servicio->tipo->nombre: '') == $tipo->nombre)>{{$tipo->nombre}}</option>  
      @endforeach
    </x-select>
    <x-input-validation-error :errors="$errors" :error="'tipo'"/>
  </div>

  <div class="md:col-span-6">
    <span class="text-md">Periodo de realización</span>
  </div>

  <div class="sm:col-span-2">
    <x-label>Periodo</x-label>
    <x-select name="periodo" id="periodo" :error="$errors->has('periodo')" onchange="fechas()">
      <option value="" selected>Seleccione un periodo</option>
      @foreach ($periodos as $periodo)
        <option value="{{$periodo->nombre}}" @selected(old('periodo', isset($servicio->periodo->nombre) ? $servicio->periodo->nombre: '') == $periodo->nombre)>{{$periodo->nombre}}</option>  
      @endforeach
    </x-select>
    <x-input-validation-error :errors="$errors" :error="'periodo'"/>
  </div>


  <div class="sm:col-span-1">
    <x-label>Fecha de inicio</x-label>
    <x-input type="date" name="fecha_inicio" id="fecha_inicio" :error="$errors->has('fecha_inicio')" value="{{old('fecha_inicio', isset($servicio->fecha_inicio) ? $servicio->fecha_inicio: '')}}"/>
    {{-- <x-input-validation-error :errors="$errors" :error="'fecha_inicio'"/> --}}
  </div>

  <div class="sm:col-span-1">
    <x-label>Límite de aceptación</x-label>
    <x-input type="date" name="fecha_aceptacion" id="fecha_aceptacion" :error="$errors->has('fecha_aceptacion')" value="{{old('fecha_aceptacion', isset($servicio->fecha_aceptacion) ? $servicio->fecha_aceptacion: '')}}"/>
    {{-- <x-input-validation-error :errors="$errors" :error="'fecha_aceptacion'"/> --}}
  </div>

  <div class="sm:col-span-1">
    <x-label>Límite de documentación</x-label>
    <x-input type="date" name="fecha_documentacion" id="fecha_documentacion" :error="$errors->has('fecha_documentacion')" value="{{old('fecha_documentacion', isset($servicio->fecha_documentacion) ? $servicio->fecha_documentacion: '')}}"/>
    {{-- <x-input-validation-error :errors="$errors" :error="'fecha_aceptacion'"/> --}}
  </div>

  <div class="sm:col-span-1">
    <x-label>Fecha de terminación</x-label>
    <x-input type="date" name="fecha_termino" id="fecha_termino" :error="$errors->has('fecha_termino')" value="{{old('fecha_termino', isset($servicio->fecha_termino) ? $servicio->fecha_termino: '')}}"/>
    {{-- <x-input-validation-error :errors="$errors" :error="'fecha_termino'"/> --}}
  </div>

  <div class="md:col-span-6">
    <span class="text-md">Observaciones</span>
  </div>

  <div class="sm:col-span-1">
    <x-label>Número de oficio</x-label>
    <x-input type="text" name="numero_oficio" id="numero_oficio" :error="$errors->has('numero_oficio')" value="{{old('numero_oficio', isset($servicio->numero_oficio) ? $servicio->numero_oficio: '')}}"/>
      <x-input-validation-error :errors="$errors" :error="'numero_oficio'"/>
  </div>

  <div class="sm:col-span-2">
    <x-label>Modalidad</x-label>
    <x-select name="modalidad" id="modalidad" :error="$errors->has('modalidad')">
      <option value="" selected>Seleccione una modalidad</option>
      @foreach ($modalidades as $modalidad)
        <option value="{{$modalidad->nombre}}" @selected(old('modalidad', isset($servicio->modalidad->nombre) ? $servicio->modalidad->nombre: '') == $modalidad->nombre)>{{$modalidad->nombre}}</option>
      @endforeach
    </x-select>
    <x-input-validation-error :errors="$errors" :error="'modalidad'"/>

  </div>

  <div class="sm:col-span-2">
    <x-label>Estancia</x-label>
    <x-select name="estancia" id="estancia" :error="$errors->has('estancia')">
      <option value="" selected>Seleccione una estancia</option>
      @foreach ($estancias as $estancia)
        <option value="{{$estancia->nombre}}" @selected(old('estancia', isset($servicio->estancia->nombre) ? $servicio->estancia->nombre: '') == $estancia->nombre)>{{$estancia->nombre}}</option>
      @endforeach
    </x-select>
    <x-input-validation-error :errors="$errors" :error="'estancia'"/>
  </div>

  <div class="sm:col-span-1">
    <x-label>Calificación</x-label>
    <x-input type="number" name="calificacion" id="calificacion" :error="$errors->has('calificacion')" value="{{old('calificacion', isset($servicio->calificacion) ? $servicio->calificacion: '')}}"/>
    <x-input-validation-error :errors="$errors" :error="'calificacion'"/>
  </div>

  <div class="sm:col-span-6">
    <x-label>Observaciones adicionales</x-label>
    <x-input type="text" name="observaciones" id="observaciones" :error="$errors->has('observaciones')" value="{{old('observaciones', isset($servicio->observaciones) ? $servicio->observaciones: '')}}"/>
    <x-input-validation-error :errors="$errors" :error="'observaciones'"/>
  </div>

</div>