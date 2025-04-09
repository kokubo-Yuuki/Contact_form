<?php

namespace App\Http\Controllers;


use App\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactForm;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{

    public function home()
    {

        $contacts = Contact::select('message', 'image_path', 'category', 'play_env', 'created_at')->orderBy('created_at', 'desc')->take(3)->get();

        return view('home',[
            'contacts' => $contacts,
        ]);
        
    }


    public function index()
    {

        $cates = [
            'VALORANT',
            'APEX',
            'Rainbow Six Siege',
            'その他',
        ];

        $play_envs = [
            'PS4/PS5',
            'Xbox',
            'PC',
          ];


        return view('contacts/index',compact('cates','play_envs'));

        
    }
    

    public function confirm(ContactForm $request) 
    {
        

        $data = [

            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'sex' => $request->input('sex'),
            'category' =>  implode(', ', $request->input('category', [])),
            'play_env' => $request->input('play_env'),
            'message' => $request->input('message'),

        ];
        

        $image_path = '';

        if($request->hasFile("image_path")) {
            
            //拡張子付きでファイル名を取得
            $imgWithExt = $request->file("image_path")->getClientOriginalName();

            //ファイル名のみを取得
            $imgname = pathinfo($imgWithExt, PATHINFO_FILENAME);

            //拡張子を取得
            $ext = $request->file("image_path")->getClientOriginalExtension();

            //保存のファイル名を構築
            $save_imgname = $imgname."_".time().".".$ext;

            $image_path = $request->file("image_path")->storeAs("public/images", $save_imgname);
    

            if($image_path) {

                $data['image_path'] = $image_path;
                
            }

        }

        session(['contact_data' => $data]);



        return view('contacts.confirm', ['data' => $data]);

    }




    public function thanks(Request $request)
    {
        $data = session('contact_data'); // セッションからデータを取得


        // データが存在する場合、データベースに保存
        if ($data) {

            Contact::create($data); // データを保存

            $request->session()->forget('contact_data'); // セッションからデータを削除

        }
        

        return view('contacts.thanks'); // 完了ページを表示

    }


    private function checkRelation(Contact $contact)
    {

        if (!$data) {
            abort(404);

        }
    }

    

}
