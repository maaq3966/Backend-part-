<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Page;
use Exception;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
    }
    public function Store(Request $request)
    {

        try {

            $content = Content::createContent($request->data);
            $page = Page::where('hash_id', $request->data["page_id"])->first();
            $page->contents()->attach($content->id);
            $response = ["error" => false, "error_message" => "content added successfuly",  "content" => $content];
        } catch (Exception $e) {
            $response = ["error" => true, "error_message" => $e];
        }
        return response()->json([$response]);
    }

    public function showContent()
    {
        $content = Content::with('pages')->get();
        return $content;
    }

    public function deleteContent(Request $request)
    {

        $response = [];
        $is_deleted = false;
        try {

            $is_deleted = Content::where('hash_id', $request->hash_id)->delete();
            $response = ["error" => false, "error_msg" => "Content Deleted successfuly", "is_deleted" => $is_deleted];
        } catch (Exception $e) {
            $response = ["error" => true, "error_msg" => "Content not deleted", "is_deleted" => $is_deleted];
        }
        return $response;
    }
}
