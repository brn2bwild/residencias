<x-app-layout>
  <x-slot name="header">
    {{ __('Tipos') }}
  </x-slot>
    
  <x-slot name="slot">
    @if ($mensaje = Session::get('mensaje'))
      <div id="toast" class="absolute flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow bottom-5 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert" onclick="closeToast()">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        </div>
        <div class="ml-3 text-sm font-normal">{{$mensaje}}</div>
      </div>
    @endif

    <div class="w-full flex justify-end mb-4">
      <a href="{{route('tipos.create')}}" class="btn btn-blue">Nuevo</a>
    </div>
    <table id="tipos" class="w-full text-sm text-left text-gray-500 dark:text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-blue-900 dark:text-gray-200">
        <tr>
          <th scope="col" class="px-6 py-3">Nombre</th>
          <th scope="col" class="px-6 py-3">Descripción</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($tipos as $tipo)
          <tr class="bg-white hover:bg-gray-200 border-b" onclick="window.location='{{route('tipos.edit', $tipo)}}'" style="cursor: pointer">
            <td class="px-6 py-4">{{$tipo->nombre}}</td>
            <td class="px-6 py-4">{{$tipo->descripcion}}</td>
          </tr>
        @empty
        @endforelse
      </tbody>
    </table>
  </x-slot>
  @section('js')
    <script>
      $(document).ready(function () {
        $('#tipos').DataTable({
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