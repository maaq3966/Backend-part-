<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $pages = Page::all()->toArray();
            $response = ["error" => false, "error_msg" => "showing pages", "page" => $pages];
        } catch (Exception $e) {
            $response = ["error" => true, "error_msg" => $e];
        }
        return $response;
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
        $response =[];
        $name = $request->names;
        try {
            $data = ["hash_id" => User::generateHashId(), "name" => $name, 'ip' => $request->ip(), "time" => now()];
            $is_created = Page::create($data);
            $response = ["error" => false, "error_msg" => "Page Created Successfuly", "page" => $is_created];
        } catch (Exception $e) {
            // return $e;
            $response = ["error" => true, "error_msg" => $e, "is_created" => false];
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $hash_id = $request->id;
        $name = $request->name;
        $response = [];
        try{
            $is_updated = Page::where('hash_id', $hash_id)->update(["name" => $name]);
            $response = ["error" => false, "error_message"=> "Page is updated", "is_updated"=>$is_updated];
        }
        catch(Exception $e){
            $response = ["error" => true, "error_message"=> "Page is not updated", "is_updated"=>false];

        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response =[];
        try{
            $is_deleted = Page::where('hash_id',$id)->delete();
            $response = ["error" => true, "error_msg" =>"Page Delete Successfuly", "is_deleted" => $is_deleted];
        }
        catch(Exception $e){
            $response = ["error" => true, "error_msg" => $e, "is_created" => false];
        }
        return $response;
    }
}
