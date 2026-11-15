<?php

namespace App\Http\Controllers;
use App\Models\Lecturers;
use Illuminate\Http\Request;

class LecturersController extends Controller
{
       public function index()
    {
        $Lecturers = Lecturers::all();

        return view('Lecturers',compact('Lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('creatLecturers');
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password'   => 'required|string|min:8|confirmed',
    
    ]);
        // dd($validated);
        User::create($validated);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        
         $user= User::findOrFail($id);

         return view("user.update",compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            ]);
            $user= User::findOrFail($id);
            $user->update($validated);
                    return redirect()->route('user.index');
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user= User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
