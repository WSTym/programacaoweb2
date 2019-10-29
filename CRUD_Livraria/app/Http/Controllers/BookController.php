<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use DateTime;

class BookController extends Controller
{
    private $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$title - "Index";

        $books = $this->book->paginate('10');

        return view('index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->all();

        $this->validate($request, $this->book->rules);

        if ($request->hasFile('image') && $request->file('image')->isValid())
        {
            $name = date('YmdHis');
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";

            $dataForm['image'] = $nameFile;

            $upload = $request->image->storeAs('img', $nameFile);

            if (!$upload)
                return redirect()->back()->with('error', 'Falha ao fazer upload')->withInput();
        }

        $insert = $this->book->create($dataForm);

        if ($insert) 
            return redirect('/');
        else
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->book->find($id);

        return view('show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->book->find($id);

        return view('create-edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataForm = $request->all();

        $this->validate($request, $this->book->rules);
        
        $book = $this->book->find($id);

        if ($request->hasFile('image') && $request->file('image')->isValid())
        {
            $name = date('YmdHis');
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";

            $dataForm['image'] = $nameFile;

            $upload = $request->image->storeAs('img', $nameFile);

            if (!$upload)
                return redirect()->back()->with('error', 'Falha ao fazer upload')->withInput();
        }

        $update = $book->update($dataForm);

        if($update)
            return redirect()->route('books.index');
        else
            return redirect()->route('books.edit', $id)->with(['errors' => 'Falha ao editar!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = $this->book->find($id);

        $delete = $book->delete();

        if($delete)
        {   
            Storage::delete("img/$book->image");            
            return redirect()->route('books.index');
        } 
        else
        {
            return redirect()->route('books.show', $id)->with('error', 'Falha ao deletar livro!');
        }

    }
}
