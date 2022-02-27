<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Poems;

class PoemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poems = Poems::orderBy('id')->get();

        return view('poems.index', compact('poems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(Poems::$rules);

        $data = $request->all();

        // foreach($data as $key => $value){
        //     if(is_array($value) || is_object($value)){
        //         foreach($value as $key_2 => $value_2){
        //             if(is_array($value) || is_object($value)){
        //                 foreach($value_2 as $key_3 => $value_3){
        //                     if(strlen($value_3) > 1){
        //                         $data[$key][$key_2][$key_3] = strtoupper($value_3);
        //                         if(strlen($value_3, ',') !== false && strpos($value_3, '.') !== false) $data[$key][$key_2][$key_3] = str_replace(',', '', $data[$key][$key_2][$key_3]);
        //                     }
        //                 }
        //             }else{
        //                 if(strlen($value_2) > 1){
        //                     $data[$key][$key_2] = strtoupper($value_2);
        //                     if(strpos($value_2, ',') !== false && strpos($value_2, '.') !== false) $data[$key][$key_2] = str_replace(',', '', $data[$key][$key_2]);
        //                 }
        //             }
        //         }
        //     }else{
        //         if(strlen($value) > 1){
        //             $data[$key] = strtoupper($value);
        //             if(strpos($value, ',') !== false && strpos($value, '.') !== false) $data[$key] = str_replace(',', '', $data[$key]);
        //         }
        //     }
        // }
        // $request->merge($data);

        $resultado = Poems::create($data);

        if(!$resultado){
            return redirect()->action('PoemController@create')->with('message', 'Não possível registrar o novo poema');
        }

        return redirect()->action('PoemController@index')->with('message', 'Poema registrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poems = Poems::findOrFail($id);

        return view('poems.view', compact('poems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poems = Poems::findOrFail($id);

        return view('poems.edit', compact('poems'));
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
        $poems = Poems::findOrFail($id);

        $validatedData = $request->validate(Poems::$rules_u);

        $data = $request->all();

        // foreach($data as $key => $value){
        //     if(is_array($value) || is_object($value)){
        //         foreach($value as $key_2 => $value_2){
        //             if(is_array($value) || is_object($value)){
        //                 foreach($value_2 as $key_3 => $value_3){
        //                     if(strlen($value_3) > 1){
        //                         $data[$key][$key_2][$key_3] = strtoupper($value_3);
        //                         if(strlen($value_3, ',') !== false && strpos($value_3, '.') !== false) $data[$key][$key_2][$key_3] = str_replace(',', '', $data[$key][$key_2][$key_3]);
        //                     }
        //                 }
        //             }else{
        //                 if(strlen($value_2) > 1){
        //                     $data[$key][$key_2] = strtoupper($value_2);
        //                     if(strpos($value_2, ',') !== false && strpos($value_2, '.') !== false) $data[$key][$key_2] = str_replace(',', '', $data[$key][$key_2]);
        //                 }
        //             }
        //         }
        //     }else{
        //         if(strlen($value) > 1){
        //             $data[$key] = strtoupper($value);
        //             if(strpos($value, ',') !== false && strpos($value, '.') !== false) $data[$key] = str_replace(',', '', $data[$key]);
        //         }
        //     }
        // }
        // $request->merge($data);

        $resultado = $poems->update($data);

        if(!$resultado){
            return redirect()->action('PoemController@create')->with('message', 'Não possível atualiar o poema');
        }

        return redirect()->action('PoemController@index')->with('message', 'Poema atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poems = Poems::whereId($id)->first();
        if(!$poems){
            return 0;
        }else{
            $poems->delete();
        }
        
        return redirect()->back()->with('message', 'Poema deletado com sucesso!');
    }
}
