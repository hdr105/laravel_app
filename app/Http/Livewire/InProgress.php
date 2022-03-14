<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;


class InProgress extends Component
{

    public $in_progress_tasks;

    public  $img ;

    public $images;

    public $showImages = 0;

    protected $rules = [
        'img' => 'required',
    ];

    public function mount($id)
    {
        $this->in_progress_tasks = Task::where('id',$id)->get();
    }

    public function render()
    {
        return view('livewire.in-progress');
    }

    public function ImgSearch(){
        dd($this->img);
        $this->validate();
        $client = new \Shutterstock\Api\Client("kOjjBu34Sl7YGpY1J1jZZCqHoCZ4IaVN","J8HynIy3JeR20nYC");
        // perform an image search for puppies
        $images = $client->get('images/search', array('query' => 'pool'));
        $images = $images->getBody()->jsonSerialize()['data'];
        $this->images = $images;
        $showImages = 1;
    }

}
