<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguagesController extends Controller
{
    public function index(){

        $languages = Language::select()->paginate(PAGINATION_COUNT);
        return view('admin.Languages.index',compact('languages'));
    }

    public function create(){

        return view('admin.Languages.create');
    }

    public function store(LanguageRequest $request){

        //insert to database

        try {

            Language::create($request->except('_token'));

            return redirect()->route('admin.languages')->with(['success' => 'نم الحفظ بنجاح']);

        } catch (\Exception $e){

            return redirect()->route('admin.languages') -> with(['error' => 'هناك خطأ']);

        }


    }

    public function edit($id){

        $language = Language::select()->find($id);

        if(!$language){

            return redirect() -> route('admin.languages') -> with(['error' => 'هذة اللغة غير موجودة']);
        }

        else{

            return view('admin.Languages.edit',compact('language'));

        }


    }

    public function update($id,LanguageRequest $request){

        try {
            $language = Language::find($id);

            if (!$language) {

                return redirect()->route('admin.languages.edit')->with(['error' => 'هذة اللغة غير موجودة']);
            } else {

                if(!$request->has('active'))
                $request->request->add(['active'=>0]);

                $language -> update($request -> except(['_token']));
                return redirect()->route('admin.languages')->with(['success' => "تم التعديل "]);

            }
        }catch (\Exception $ex){
            return redirect()->route('admin.languages.edit')->with(['success' => "هناك خطأ "]);

        }

    }

    public function delete($id){

        try {
            $language = Language::find($id);

            if (!$language) {

                return redirect()->route('admin.languages')->with(['error' => 'هذة اللغة غير موجودة']);
            } else {

                $language -> delete();
                return redirect()->route('admin.languages')->with(['success' => "تم حذف اللغة "]);

            }
        }catch (\Exception $ex){
            return redirect()->route('admin.languages')->with(['success' => "هناك خطأ "]);

        }

    }

}
