<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;


class ShowPosts extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $search = '';
    public $image, $post, $identificador;
    public $open_edit = false;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $readyToLoad = false;

    protected $listeners = ['render','delete'];

    /*Ni puta idea de que hace esto pero tiene que ver ocn la URL
    y lo que quiere que se muestre con la renderización de la pag.*/
    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function mount()
    {
        $this->identificador = rand();
        $this->post = new Post();
    }
    protected $rules = [
        'post.title' => 'required',
        'post.content' => 'required',
    ];
    //AQUI DECLARAMOS AL OYENTE DE NUESTRO EVENTO declarado en CREATEPOST
    //El nombre del evento debe recibirse con el mismo nombre aquí
    //protected $listeners = ['render' => 'render'];
    //Como el metodo se llama igual que el evento entonces se puede poenr así:
    
    public function render()
    {   
        if ($this->readyToLoad) {
            $posts = Post::where('title', 'like', '%' . $this->search . '%')
                ->orwhere('content', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $posts = [];
        }
        return view('livewire.show-posts', compact('posts'));
    }
    public function loadPosts()
    {
        $this->readyToLoad = true;
    }
    public function order($sort)
    {
        if ($sort == $this->sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
        }
    }
    public function edit(Post $post)
    {
        $this->post = $post;
        $this->open_edit = true;
    }
    public function update()
    {

        $this->validate();
        if ($this->image) {
            Storage::delete([$this->post->image]);
            $this->post->image = $this->image->store('posts');
        }

        $this->post->save();

        $this->reset(['open_edit', 'image']);

        $this->identificador = rand();

        $this->emit('alert', 'El post se actualizo satisfactoriamente');
    }
    public function delete(Post $post){
        $post->delete();
    }
}
