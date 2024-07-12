<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;

class Modal extends Component
{
    public $showModal = false;
    public Blog $blog;
    public string $form_type;

    public function mount(Blog $blog, string $form_type)
    {
        $this->blog = $blog;
        $this->form_type = $form_type;
    }

    public function render()
    {
        return view('livewire.modal');
    }

    public function openModal()
    {
        $this->showModal = true;
    }
    public function closeModal()
    {
        $this->showModal = false;
    }
}
