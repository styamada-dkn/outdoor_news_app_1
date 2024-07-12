<?php

namespace App\Livewire;

use App\Models\Blog;
use Illuminate\Support\Collection;
use Livewire\Component;

class MoreRead extends Component
{

    public Collection $blogs;
    public $myBlog_id;
    public $category_id;

    public $pageNumber = 1;
    public $hasMorePages = false;


    public function mount(string $myBlog_id, string $category_id)
    {
        $this->blogs = new Collection();
        $this->myBlog_id = $myBlog_id;
        $this->category_id = $category_id;

        $this->fetchData();
    }

    public function fetchData()
    {

        $query = Blog::where('id', '!=', $this->myBlog_id)->latest("updated_at");

        if (isset($this->category_id)) {
            $query->where('category_id', $this->category_id);
        }

        $blogs = $query->paginate(3, ['*'], 'page',$this->pageNumber);

        $this->pageNumber += 1;

        $this->hasMorePages = $blogs->hasMorePages();

        $this->blogs->push(...$blogs->items());

    }

    public function render()
    {
        return view('livewire.more-read');
    }
}
