<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\softDeletes;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 1
        // $Student = Student::get();
        // ** return $Student;
        // ** return view('Student.view' , compact('Student'));

        // 2
        $Student = Student::all();
         // ** return $Student;
        return view('Student.view' , compact('Student'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.craete');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  INSERT
    public function store(Request $request)
    {


        // 1 - With Model  -- XXXX MODL XXXX
        // $Student = new Student();
        // // Database Colum = Request Input
        // $Student->fname   = $request->fname;
        // $Student->postion = $request->postion;
        // $Student->company = $request->company;
        // $Student->save();

        // return response(' The Student Add Successfully');

        // // 2 - Way Number Two
        // // We make sure use $fillable in model to insert in this way
        Student::create([
            // "Database Colum"=>"Request Input",
            "fname" => $request->fname,
            "postion" => $request->postion,
            "company" => $request->company,
        ]);
                // return response(' The Student Add Successfully');

        return redirect()->route('student.index');




        // 3 - Way Number Two
        // Must Database Colum and Request Input Same Same Same!!!
        // Student::create($request->all());

        // return response(' The Student Add Successfully');

    }









    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request , $id)
    {

        $Student = Student::onlyTrashed()->get();
        return view('Student.softdelete' , compact('Student'));
        return $Student;

    }











    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $id;


        // 1
        // $Student = Student::find($id);
        // if($Student) {
        //     return $Student;
        // }else {
        //     return response(' XXXXXXXXXXXXXXXXXXXXXXX' );
        // }
        // return $Student;

        // 2 - Just check for ID
        $Student = Student::findorFail($id);
        return view('student.edit' , compact('Student'));


        // 3 - check Anything i want
        // $Student = Student::where("id" , $id)->first();
        // return view('Student.edit' , compact('Student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {

        // 1
        $Student = Student::findorFail($id);
        $Student->fname = $request->fname;
        $Student->postion = $request->postion;
        $Student->company = $request->company;
        $Student->save();

        return redirect()->route('student.index');










        // 2
        // $Student = Student::findorFail($id);
        // $Student->update([
        //     "Fame" => $request->Fame,
        //     "position" => $request->position,
        //     "company" => $request->company,
        // ]);

        // 3
        // $Student = Student::findorFail($id);
        // $Student->update($request->all());;


        // return response(' The Student Update Successfully');
        // return $Student;



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        // 1
        // Student::findorFail($id)->delete();

        // 2
        Student::destroy($id);
        return redirect()->route('student.index');

    }
}
