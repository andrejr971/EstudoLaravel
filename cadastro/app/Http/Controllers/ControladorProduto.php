<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Produto;
use Illuminate\Http\Request;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto = new Produto();
        $produtos = Produto::all();
        $cats = Categoria::all();

        return view('produtos', compact('produtos', 'cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Categoria::all();
        return view('novoproduto', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->input('nomeProduto');
        $produto->preco = $request->input('preco');
        $produto->estoque = $request->input('estoque');
        $produto->categoria_id = $request->input('categorias');
        $produto->save();

        return redirect('produtos');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtos = Produto::find($id);
        $cats = Categoria::all();

        if(isset($produtos)) {
            return view('editarproduto', compact('produtos', 'cats'));
        }
        return redirect('/produtos');
        
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
        $produto = Produto::find($id);
        if(isset($produto)) {
            $produto->nome = $request->input('nomeProduto');
            $produto->preco = $request->input('preco');
            $produto->estoque = $request->input('estoque');
            $produto->categoria_id = $request->input('categorias');
            $produto->save();
        }
        return redirect('produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        if(isset($produto)) {
            $produto->delete();
        }
        return redirect('produtos');
    }
}
