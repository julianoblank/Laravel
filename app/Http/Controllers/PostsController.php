<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postagem as ModelPostagem;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function novo()
    {
        return view('novo');
    }
    public function editar($id){
        $post = ModelPostagem::findOrFail($id);
        return view('editar',['post'=>$post]);
    }

    public function update(Request $request){

        $id = $request->input('postId');
        ModelPostagem::where(['id'=>$id])->update([
            'titulo' => $request->input('titulo'),
            'descricao' => $request->input('descricao'),
            'imagem' => $request->input('imagem'),
            'ativa' => $request->input('ativa') ? $request->input('ativa') : 'N'
        ]);
    }

    public function store(Request $request)
    {

        if($request->input('descricao') != '' && $request->input('imagem') != ''){
            $post = ModelPostagem::create([
                'titulo' => $request->input('titulo'),
                'descricao' => $request->input('descricao'),
                'imagem' => $request->input('imagem')
            ]);
        }

        if($post){
            $json = json_encode($post);
            return response()->json($json);
        }
    }
    public function publicar($id){
        ModelPostagem::where(['id'=>$id])->update([
            'ativa'=>'S'
        ]);

        return redirect()->route('home')->withSuccess(__("Postagem publicada com sucesso."));
    }

    public function destroy(Request $request)
    {
        $id = $request->postId;

        ModelPostagem::where(['id'=>$id])->delete();
        return redirect()->route('home')->withSuccess(__("Postagem removido com sucesso."));

    }
}
