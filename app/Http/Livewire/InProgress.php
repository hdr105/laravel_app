<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;


class InProgress extends Component
{
    public $in_progress_tasks;

    public function mount($id)
    {
        $this->in_progress_tasks = Task::where('id',$id)->get();
    }
    public function render()
    { 
        $client = new \Shutterstock\Api\Client("kOjjBu34Sl7YGpY1J1jZZCqHoCZ4IaVN","J8HynIy3JeR20nYC");
        // perform an image search for puppies
        $images = $client->get('images/search', array('query' => 'house'));
        $images = $images->getBody()->jsonSerialize()['data'];
        return view('livewire.in-progress',['images' => $images]);
    }
}
