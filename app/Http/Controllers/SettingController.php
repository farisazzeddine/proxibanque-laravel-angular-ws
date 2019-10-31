<?php

namespace App\Http\Controllers;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings =Setting::all();
        return response()->json($settings);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = new Setting;
        $settings->commissionVirement = request('commissionVirement');
        $settings->commissionRetrait = request('commissionRetrait');
        $settings->commissionVersement = request('commissionVersement');
        $settings->NbrMxconseillersParclient = request('NbrMxconseillersParclient');  
        $settings->nbrconseillers = request('nbrconseillers'); 
        $settings->save();
        return response()->json($settings);
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $settings = Setting::findOrFail($id);
        return response()->json($settings);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
