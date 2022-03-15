<?php

namespace App\Http\Livewire;
use App\Models\Task;
use App\Models\TaskImages;
use App\Models\User;
use Livewire\Component;

class Detail extends Component
{
    public $task_id;
    public $task;
    public $title;
    public $detail;
    public $status;
    public $user_id;
    public $assignee;
    public $assignee_name;
    public $no_of_images;

    public function mount($id){
        $this->task = Task::find($id);
        $this->title = $this->task->title;
        $this->detail = $this->task->detail;
        $this->no_of_images = $this->task->no_of_images;
        $this->status = $this->task->status;
        $this->user_id = $this->task->user_id;
        if ($this->user_id != null) {
            $this->assignee = User::where('id', $this->user_id)->first('name');
            $this->assignee_name = $this->assignee->name;
        }else{
            $this->assignee_name = "Not Assigned";
        }
        if($this->status === '3'){
            $this->ImgUrl = TaskImages::where('user_id', $this->user_id && 'task_id', $this->task->id)->first('url');
        }

    }

    public function render()
    {
        return view('livewire.detail');
    }
}
