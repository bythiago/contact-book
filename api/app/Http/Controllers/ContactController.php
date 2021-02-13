<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Laravel\Lumen\Http\Request;

class ContactController extends Controller
{   
    private $contact;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    //
    public function index(Request $request)
    {
        try {

            $data = $request->json()->all();

            $validator = Validator::make($data, [
                'name' => 'required',
                'email' => 'required|email|unique:contacts'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors(), 500);
            }

            $contact = $this->contact->create($data);
            return response()->json($contact, 200);

        } catch(\Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }
}
