<?php

namespace App\Http\Controllers;
use App\Models\Teachers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index(){

        $teacher = Teachers::all();

        if(!$teacher -> isEmpty()){
            return response()->json($teacher,200);
        }else{  
            return 'This is empty';
        }
    }

    public function saveTeacher(Request $request){

        
        
        $validator = Validator::make($request->all(),[
            
             'name' => 'required',
             'email' => 'required|email',
             'number_phone' => 'required',
             'number_document' => 'required',
             'subject_id' => 'required|exists:subject,id'
         ]);
         
         if($validator ->fails()){
             return 'Mistake when you text the data';
         }
             
         $teacher = Teachers::create([
                 'name' => $request->name,
                 'number_document' => $request->number_document,
                 'email' => $request->email,
                 'number_phone' => $request->number_phone,
                 'subject_id' => $request->subject_id, 
             ]);


             return 'Added correctly';
         
 
 
     }

     public function showOne($id){
        $teacher = Teachers::find($id);

        if($teacher){
            return response()->json($teacher,200);
        }

        return 'Not found teacher!!';

     }

     public function deployTeacher($id){
        $teacher = Teachers::find($id);

        if($teacher) {
            $teacher->delete();
            return 'removed !!';
        }
        return "not found";
    
     }



     public function updateTeacher(Request $request,$id){

        $teacher = Teachers::find($id);

        
        
        $validator = Validator::make($request->all(),[
            
             'name' => 'required',
             'email' => 'required|email',
             'number_phone' => 'required',
             'number_document' => 'required',
             'subject_id' => 'required|exists:subject,id'
         ]);
         
         if($validator ->fails()){
             return 'Mistake when you text the data';
         }
             
          
         $teacher->name = $request->name;
         $teacher->number_document = $request->number_document;
         $teacher->email = $request->email;
         $teacher->number_phone = $request->number_phone;
         $teacher->subject_id = $request->subject_id;
         
         $teacher->save();

        return 'Added correctly';
         
 
 
     }

}
