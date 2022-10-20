<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Post;

class Posts extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search;
    public $postId,$title,$description;
    public $isOpen = 0;
    public $uploadImage;
    

    public function render()
    {
        $searchParams = '%'.$this->search.'%';
        return view('livewire.posts', [
            'posts' => Post::where('title','like',$searchParams)->latest()->paginate(5)
        ]);
    }

    public function showModal(){
        $this->isOpen = true;
    }

    public function hideModal(){
        $this->isOpen = false;
    }

    public function store(){
        $this->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'uploadImage' => 'image' // Validates jpeg, png, gift and other image format
            ]
        );
        
        Post::updateOrCreate(['id' => $this->postId],[
            'title' => $this->title,
            'description' => $this->description,
            'upload_image' => $this->uploadImage->hashName()
        ]);

        if (!empty($this->uploadImage)) {
            $this->uploadImage->store('public/photos');
        }

        $this->hideModal();

        session()->flash('info',$this->postId ? 'Data Berhasil diupdate' : 'Data Berhasil ditambahkan');

        $this->postId = '';
        $this->title = '';
        $this->description = '';
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        $this->postId = $id;
        $this->title = $post->title;
        $this->description = $post->description;

        $this->showModal();
    }

    public function delete($id){
        Post::find($id)->delete();
        session()->flash('delete', 'Data Berhasil dihapus');
    }
}
