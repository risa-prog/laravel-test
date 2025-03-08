<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('index',compact('categories'));
    }

    public function regist(){
        return view('auth.register');
    }

    public function confirm(ContactRequest $request){
        $tel=$request->tel1.$request->tel2.$request->tel3;
        
        //   $contact=[
            //  'tel'=>$tel
            //   ];
            //   dd($contact);
    
        $contact=['tel'=>$tel]+$request->only(['first_name','last_name','gender','email','address','building','category_id','detail']);
        //  dd($contact);
        return view('confirm',compact('contact'));
    }

    public function admin(){
        $contacts=Contact::with('category')->Paginate(7);
        $categories=Category::all();

        return view('admin',compact('contacts','categories'));
    }

    public function create(Request $request){
        $contact=$request->all();
        // dd($contact);
        Contact::create($contact);

        if($request->input('back')=='back'){
            return redirect('/')->withInput();
        }

        return view('thanks');
    }

    public function search(Request $request){
        //  $contacts=$request->all();
        //  dd($contacts);

         $contacts=Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->created_at)->Paginate(7);
        //   dd($contacts);
        $categories=Category::all();
        return view('admin',compact('contacts','categories'));
    }

    public function downloadCsv(){
        $contacts=Contact::all();
        $csvHeader = ['id', 'first_name','last_name','gender','tel','email','address','building','detail','created_at', 'updated_at'];
        $csvData = $contacts->toArray();

        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ]);

        return $response;

    }

    public function searchExport(Request $request){
         $contacts=Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->created_at)->get();
        dd($contacts);

         $csvHeader = ['id', 'first_name','last_name','gender','tel','email','address','building','detail','created_at', 'updated_at'];
        $csvData = $contacts->toArray();

         if($contacts !== null){
            $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="searchContacts.csv"',
        ]);

        return $response;

         }
    }

}

