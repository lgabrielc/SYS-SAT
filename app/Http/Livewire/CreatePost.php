<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
/* Para poder subir imagenes desde livewire*/
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    /*Una vez que hemos importaodo la clase use Livewire\WithFileUploads
    necesitamos indicarle que lo queremos usar aca poniendo:*/
    use WithFileUploads;
    public $open = false;

    public $title, $content, $image, $identificador;
    /*Estas son mis reglas de validación en este caso para que
    Cuando mande campos vacios se me valide que tienen que ser obligatorios*/
    protected $rules = [
        'title' => 'required|max:10',
        'content' => 'required|min:10|max:240',
        'image' => 'required|image|max:2048',
    ];
    //Usamos el metodo mount para darle una propiedad a mi variable identificador
    public function mount()
    {
        $this->identificador = rand();
    }
    /*Recordar que dice UPDATED con de al final, con esto validamos que nuestras reglas
    o rules definidas anteriormente se cumplan de manera dinamica en la vista
    Recordar tambien que este metodo se usa para validar cosas netamente necesarias como la cantidad
    de digitos de un dni o un celular pero no para contenido que se puede validar al momento de enviar la info
    algo así como el campo required o el min o max de caracteres de un texto largo
    ya que esto hace muchas peticiones al servidor*/
    /*
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }*/
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function cancel()
    {
        /*Este $this->reset sirve para resetear las propiedas de las variables definidas
        o inicializadas al comienzo del codigo*/
        $this->reset(['open', 'title', 'content', 'image']);
    }
    public function save()
    {
        /*Si no pasa esta validacion que hace referencia a el
    protected $rules entonces termina no sigue con los comandos despues del
    validate */
        $this->validate();
        /*Al parece el store tiene que ver con la url 
    de la imagen */
        $image = $this->image->store('posts');
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image,
        ]);
        $this->reset(['open', 'title', 'content', 'image']);

        $this->identificador = rand();
        //Emitir un evento *lE LLAMARE RENDER* EL EVENTO ES PARA TOODS LOS CONMPONENTES
        $this->emitTo('show-posts', 'render');
        //Si quieres que se escuche solo en un componente entonces ponemos
        //$this->emitTo('name del otro componente','nombre del evento')
        //$this->emit('render');
        $this->emit('alert', 'El post se ha creado satisfactoriamente');
        //        $this->open = false;
    }
    public function render()
    {

        return view('livewire.create-post');
    }
}
