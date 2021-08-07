<div>
    <a class="btn btn-green" wire:click="$set('open',true)">
        <i class="fa fa-edit"></i>
    </a>

    <x-jet-dialog-modal wire:model="open">

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
            <img class="mb-4" src="{{$image->temporaryUrl()}}">
            @else
            {{--No sé que ptas hace esto pero funciona--}}
            <img class="mb-4" src="{{ '/storage/'.($post->image)}}">
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
                {{--Le ponemos id al input tipe file porque no se me renderiza al agregar un nueva imagen o al cancelar el modal--}}
                <input type="file" wire:model.defer="image" id="identificador">
                <x-jet-input-error for="image" />
            </div>
        </x-slot>
        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:loading.attr='disabled' wire:click="save" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>