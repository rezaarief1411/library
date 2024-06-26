<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Authors as AuthorsModel;
use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;

class Authors extends Component
{
    use WithPagination;
    public $errorMsg;
    public $file;
    public $limitPerPage = 10;
    public $currentPage = 1;
    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }

    public function render()
    {
        $authorList = AuthorsModel::orderBy('id', 'asc')
                    ->paginate($this->limitPerPage);

        return view('livewire.authors',["authorList"=> $authorList]);
    }
}
