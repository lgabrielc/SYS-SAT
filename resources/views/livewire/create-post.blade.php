<div>
    <x-jet-danger-button wire:click="$set('open',true)">
        Crear nuevo Post
    </x-jet-danger-button>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Este es el modal de prueba
        </x-slot>
        <x-slot name="content">

            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"
                wire:loading wire:target="image">
                <strong class="font-bold">Imagen Cargando!</strong>
                <span class="block sm:inline">Espere un momento mientras se procesa la imagen.</span>
            </div>
            @if ($image)
            <img class="mb-4" src="{{$image->temporaryUrl()}}">
            @endif

            <div class="mb-6">
                <x-jet-label value="Titulo del post" />
                {{-- wire:model.defer es para evitar el comportamiento de que se renderize por cada palabra que escribo --}}
                <x-jet-input wire:model.defer="title" type="text" class="w-full" />
                <x-jet-input-error for="title" />
                {{-- Esta es una manera de mostrar el mensaje de error
                @error('title')
                    <span>
                        {{ $message }}
                </span>
                @enderror --}}
            </div>
            <div class="mb-6" wire:ignore>
                <x-jet-label value="Contenido del post" />
                <textarea id="editor" 
                wire:model.defer="content" 
                class="form-control w-full" 
                rows="6"></textarea>
                <x-jet-input-error for="content" />
                {{-- Esta es una manera de mostrar el mensaje de error
                @error('content')
                    <span>
                        {{ $message }}
                </span>
                @enderror --}}
            </div>
            <div>
                {{--Le ponemos id al input tipe file porque no se me renderiza al agregar un nueva imagen o al cancelar el modal--}}
                <input type="file" wire:model.defer="image" id="identificador">
                <x-jet-input-error for="image" />
            </div>

        </x-slot>
        <x-slot name="footer">
            {{-- Este wire:click="$set('open',false)" --}}
            <x-jet-secondary-button {{-- wire:click="$set('open',false)" --}} wire:click="cancel">
                Cancel
            </x-jet-secondary-button>
            {{-- wire:click="save" esto es para ejecutar una accion y activar 
            el metodo en el controlador de livewire --}}
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save,image"
                class="disabled:opacity-25">
                Crear Post
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( function(editor) {
                editor.model.document.on('change:data', ()=> {
                    //Content es el nombre de la propiedad del componente
                    @this.set('content', editor.getData());
                })
            })
            .catch( error => {
                console.error( error );
            } );
    </script>

    @endpush
</div>