<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Books as BooksModel;
use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;

class Books extends Component
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
        $bookList = BooksModel::join('authors', 'books.author_id', '=', 'authors.id')
        ->select('books.*' ,'authors.name')
        ->orderBy('id', 'asc')
        ->paginate($this->limitPerPage);

        return view('livewire.books',["bookList"=> $bookList]);
    }
}
