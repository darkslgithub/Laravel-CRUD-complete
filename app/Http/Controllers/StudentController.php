<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;//to access the views in student

class StudentController extends Controller
{
    public function index()
    {
    	return view('student.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name'=>'required', 'address'=>'required']);
    	$student = new student();
    		
    	$student->name = $request->name;
    	$student->address = $request->address;

    	$student->save();

    return redirect()->route('show')->with('response', 'Registered Successfully');
        // return back()->with('response', 'Registered Successfully'); 
    } 

    public function show()
    {
    	$studentdata = student::get();
                                    //associative array
    	return view('student/show',['studentarray'=>$studentdata]);
    }     

    public function edit($id)
    {          
                         //find method returns the relevent row
        $studentedit = student::find($id);

        return view('student.edit',['seditarray'=>$studentedit]);
    }  

    public function update(Request $request, $id)
    {
         $this->validate($request, ['name'=>'required', 'address'=>'required']);

        $studentup =  student::find($id); 

       // dd($student);
            
        $studentup->name = $request->name;
        $studentup->address = $request->address;

        $studentup->save();

       // return redirect('student/show');
        return redirect()->route('show')->with('response', 'Edited Successfully');
    }   

    public function delete($id)
    {            //delete the relevent row
        student::destroy($id);
        //return redirect('student/show');
         return redirect()->route('show')->with('response', 'Deleted Successfully');
    }                     
}
