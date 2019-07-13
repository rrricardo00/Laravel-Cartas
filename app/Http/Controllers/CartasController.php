<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carta;
class CartasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function adicionar(){
        return view('/adicionar');
    }

    public function listar(){
        $cartas = Carta::paginate(10);
        if(isset($cartas)){
            return view('listar', compact('cartas'));
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = [
            'remetente.required' => 'O campo :attribute é requerido',
            'destinatario.required' => 'O campo :attribute é requerido',
            'data.required' => 'O campo :attribute é requerido',
            'tipo.required' => 'O campo :attribute é requerido',
            'preco.min' => 'O preço precisa ser maior ou igual a 0'
        ];

        $request->validate([
            'remetente' => 'required',
            'destinatario' => 'required',
            'data' => 'required',
            'tipo' => 'required',
            'cep' => 'nullable',
            'rastreio' => 'nullable',
            'preco' => 'nullable|numeric|min:0'

        ], $messages);

        $cartas = new Carta();
        if(isset($cartas)){
           $cartas->remetente = $request->input('remetente');
           $cartas->destinatario = $request->input('destinatario');
           $cartas->data = $request->input('data');
           $cartas->cep = $request->input('cep');
           $cartas->rastreio = $request->input('rastreio');
           $cartas->tipo = $request->input('tipo');
           $cartas->preco = $request->input('preco');
           $cartas->save();
           echo "<h1>Cartas adicionada com sucesso</h1>". "<a class='btn btn-primary' href='/adicionar'>Voltar para Adicionar</a>";
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    //procurar por data
    public function procurarData(){
        return view('procurardata');
    }

    //pesquisar procura por data no formulário
    public function procurarDataShow(Request $request, $data1, $data2){
        $data1 = $request->input('procurardata1');
        $data2 = $request->input('procurardata2');

        $cartas = Carta::whereBetween('data', [$data1, $data2])->orderBy('data')->paginate(10);
        if(isset($cartas)){
            return view('listar', compact('cartas'));
        }

    }

    //Procurar PDF
    public function procurarDataShowPDF(){
        return view('gerarpdf');
    }

    //Gerar relatório WEB-PDF
    public function gerarDataShowPDF(Request $request, $data1, $data2){
        $data1 = $request->input('procurardata1');
        $data2 = $request->input('procurardata2');

        $soma = Carta::whereBetween('data', [$data1, $data2])->sum('preco');
        
        $cartas = Carta::whereBetween('data', [$data1, $data2])->orderBy('data')->get();
        if(isset($cartas)){
            return view('pdf', compact('cartas', 'soma'));
        }

    }

    //procurar por id
    public function procurar(){

        return view('procurar');
    }

    //pesquisar procura por id no formulário
    public function show(Request $request, $id)
    {
        $cartas = Carta::where($id, $request->input('procurar'))->get();
        if(isset($cartas)){
            return view('carregarprocura', compact('cartas'));
        } 
        
           
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $cartas = Carta::find($id);
        if(isset($id)){
            return view('atualizar', compact('cartas'));
        }
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
        $messages = [
            'remetente.required' => 'O campo :attribute é requerido',
            'destinatario.required' => 'O campo :attribute é requerido',
            'data.required' => 'O campo :attribute é requerido',
            'tipo.required' => 'O campo :attribute é requerido',
            'preco.min' => 'O preço precisa ser maior ou igual a 0'
        ];

        $request->validate([
            'remetente' => 'required',
            'destinatario' => 'required',
            'data' => 'required',
            'tipo' => 'required',
            'cep' => 'nullable',
            'rastreio' => 'nullable',
            'preco' => 'nullable|numeric|min:0'

        ], $messages);


        $cartas = Carta::find($id);
        if (isset($id)) {
           $cartas->remetente = $request->input('remetente');
           $cartas->destinatario = $request->input('destinatario');
           $cartas->data = $request->input('data');
           $cartas->cep = $request->input('cep');
           $cartas->rastreio = $request->input('rastreio');
           $cartas->tipo = $request->input('tipo');
           $cartas->preco = $request->input('preco');
           $cartas->save();
           echo "<h1>Atualização realizada com sucesso</h1>". "<a class='btn btn-primary' href='/listar'>Voltar para Listagem</a>";
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cartas = Carta::find($id);
        if(isset($cartas)){
            $cartas->delete();
            echo "<h1>Exclusão realizada com sucesso</h1>". "<a class='btn btn-primary' href='/home'>Voltar para Home</a>";
        }
    }
}
