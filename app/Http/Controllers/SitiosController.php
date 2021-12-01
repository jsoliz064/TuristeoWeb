<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class SitiosController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename='ciudad/santa cruz/guia';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sitios = $this->database->getReference($this->tablename)->getValue();
        $total =$reference=$this->database->getReference($this->tablename)->getSnapshot()->numChildren();
        return view('sitios.index',compact('sitios','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sitios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $postData = [
            'url'=>$request->url,
            'descripcion'=>$request->descripcion,

        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData); */
        $uid = 'Samaipata';
        $postData = [
            'url' => 'sadfss',
            'descripcion' => 'gaa',
        ];
        // Create a key for a new post
        $newPostKey = $this->database->getReference('ciudad')->push()->getKey();

        $updates = [
            //'ciudad/santa cruz/guia/'.$newPostKey => $postData,
            'ciudad/Cochabamba/guia' => "",
        ];

        $this->database->getReference()->update($updates);

        if ($newPostKey){
            return redirect()->route('sitios.index')->with('status','contacto agregado exitosamente');
        }else{
            return redirect()->route('sitios.index')->with('status','contacto no agregado');
        }
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
        $key=$id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if ($editdata){
            return view('sitios.edit',compact('editdata','key'));
        }
        return redirect()->route('sitios.index')->with('status','contacto no encontrado');
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
        $key=$id;
        $updateData = [
            'url'=>$request->url,
            'descripcion'=>$request->descripcion,

        ];
        $res_update=$this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if ($res_update){
            return redirect()->route('sitios.index')->with('status','contacto actualizado');
        }else{
            return redirect()->route('sitios.index')->with('status','error');
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
        $key=$id;
        $del_data=$this->database->getReference($this->tablename.'/'.$key)->remove();
        if ($del_data){
            return redirect()->route('sitios.index')->with('status','contacto eliminado exitosamente');
        }else{
            return redirect()->route('sitios.index')->with('status','error');
        }
    }
}
