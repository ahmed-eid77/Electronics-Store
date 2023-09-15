<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{

    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $newImage;
    public $status;
    public $slide_id;

    public function mount($slider_id){
        $slide             = HomeSlider::find($slider_id);
        $this->title       = $slide->title;
        $this->subtitle    = $slide->subtitle;
        $this->price       = $slide->price;
        $this->link        = $slide->link;
        $this->image       = $slide->image;
        $this->status      = $slide->status;
        $this->slide_id    = $slide->id;
    }

    public function updateSlide() {
        $slide = HomeSlider::find($this->slide_id);
        $slide->title = $this->title;
        $slide->subtitle = $this->subtitle;
        $slide->price = $this->price;
        $slide->link = $this->link;
        if($this->newImage){
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('sliders', $imageName);
            $slide->image = $imageName;
        }
        $slide->status = $this->status;
        $slide->save();
        session()->flash('message', 'Category Has Been Updated Successfully');
    }


    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
