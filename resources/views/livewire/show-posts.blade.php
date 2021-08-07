<div wire:init="loadPosts">{{-- El wire init es para hacer o generar una accion despues de haber cargado la pagina --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <!--A LOS TH LE AGREGAMOS LA CLASE cursor-ponter -->
    <div class="max-w-7x1 mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table>
            <div class="px-6 py-4 flex items-center">
                <div class="flex items-center">
                    <span>Mostrar</span>
                    <select wire:model="cant" class="mx-2 form-control">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>Entradas</span>
                </div>
                <x-jet-input class="flex-1 mx-4" placeholder="Escriba que quiere buscando" type="text"
                    wire:model="search" />
                {{-- ACA LLAMAMOS AL COMPONENTE CREATE POST PARA USAR SU BOTON Y MODAL --}}
                @livewire('create-post')
            </div>
            @if (count($posts))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('id')">
                                ID
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        {{-- SI ES ASCENDENTE PONER SU ICONO --}}
                                        <i class="fas fa-sort-numeric-up float-right"></i>
                                        {{-- SI ES DESCENDENTE PONER SU ICONO --}}
                                    @else
                                        {{-- SI ES DESCENDENTE PONER SU ICONO --}}
                                        <i class="fas fa-sort-numeric-up-alt float-right"></i>
                                    @endif
                                @else
                                    {{-- SI ES CLICKEA POR PRIMERA VEZ EN ID PONER SU ICONO --}}
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('title')">
                                Title
                                @if ($sort == 'title')
                                    @if ($direction == 'asc')
                                        {{-- SI ES ASCENDENTE PONER SU ICONO --}}
                                        <i class="fas fa-sort-amount-up-alt float-right mt-1"></i>
                                        {{-- SI ES DESCENDENTE PONER SU ICONO --}}
                                    @else
                                        {{-- SI ES DESCENDENTE PONER SU ICONO --}}
                                        <i class="fas fa-sort-amount-up float-right mt-1"></i>
                                    @endif
                                @else
                                    {{-- SI ES CLICKEA POR PRIMERA VEZ EN ID PONER SU ICONO --}}
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('content')">
                                Content
                                @if ($sort == 'content')
                                    @if ($direction == 'asc')
                                        {{-- SI ES ASCENDENTE PONER SU ICONO --}}
                                        <i class="fas fa-sort-amount-up-alt float-right mt-1"></i>
                                        {{-- SI ES DESCENDENTE PONER SU ICONO --}}
                                    @else
                                        {{-- SI ES DESCENDENTE PONER SU ICONO --}}
                                        <i class="fas fa-sort-amount-up float-right mt-1"></i>
                                    @endif
                                @else
                                    {{-- SI ES CLICKEA POR PRIMERA VEZ EN ID PONER SU ICONO --}}
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($posts as $item)
                            <tr>

                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->id }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->title }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->content }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm font-medium flex">
                                    <a class="btn btn-green" wire:click="edit({{ $item }})">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-red ml-2" wire:click="$emit('deletPost', {{ $item->id }})">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>

                @if ($posts->hasPages())

                    <div class="px-6 py-3">
                        {{ $posts->links() }}
                    </div>

                @endif
            @else
                <div class="px-6 py-4">
                    No existe ningún registro coincidente
                </div>
            @endif
            {{-- Si tiene por lo menos 2 páginas se mostrara el div
                si solo tiene una página el div estará oculto --}}



        </x-table>
    </div>

    <x-jet-dialog-modal wire:model="open_edit">

        <x-slot name='title'>
            Edita el post:
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"
                wire:loading wire:target="image">
                <strong class="font-bold">Imagen Cargando!</strong>
                <span class="block sm:inline">Espere un momento mientras se procesa la imagen.</span>
            </div>
            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}">
            @else
                {{-- No sé que ptas hace esto pero funciona --}}
                <img class="mb-4" src="{{ '/storage/' . $post->image }}">
            @endif
            <div class="mb-4">
                <x-jet-label value="Título del post" />
                <x-jet-input wire:model="post.title" type="text" class="w-full" />
            </div>
            <div>
                <x-jet-label value="Contenido del post" />
                <textarea wire:model="post.content" rows="6" class="form-control w-full"></textarea>
            </div>
            <div>
                {{-- Le ponemos id al input tipe file porque no se me renderiza al agregar un nueva imagen o al cancelar el modal --}}
                <input type="file" wire:model="image" id="identificador">
                <x-jet-input-error for="image" />
            </div>
        </x-slot>
        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:loading.attr='disabled' wire:click="update" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('js')
        <script src="sweetalert2.all.min.js"></script>
        <script>
            livewire.on('deletPost', postid => {
                Swal.fire({
                    title: 'Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        //Pasar un metodo desde javascript
                        Livewire.emitTo('show-posts','delete',postid);

                        Swal.fire(
                            'Eliminado!',
                            'Tu archivo ha sido eliminado.',
                            'éxito'
                        )
                    }
                })
            });
        </script>
    @endpush


</div>
