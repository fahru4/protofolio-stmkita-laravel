<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Siswa;
use App\User;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('admin.siswa.index',compact('siswa'));
    }
    public function dashboard()
    {
        $siswa = Siswa::all();
        return view('siswa.dashboard',compact('siswa'));
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


        $user = new User;
        $user->role ='siswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('1234');
        $user->remember_token = Str::random(60);
        $user->save();
        // insert ke table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = Siswa::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('admin/gambar/siswa', $request->file('foto')->getClientOriginalName());
            $siswa->foto = $request->file('foto')->getClientOriginalName();
            $siswa->save();
            
        }
            return redirect('admin/siswa');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view('admin.siswa.view',compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('admin.siswa.edit',compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $siswa = Siswa::find($id);
        $siswa->update($request->all());
        if($request->hasFile('file')){
            $request->file('file')->move('admin/gambar/siswa/',$request->file('file')->getClientOriginalName());
            $siswa->file = $request->file('file')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('admin/siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete(); 
        return redirect('admin/siswa');
    }
    public function del(Request $request)
    {
        $delid = $request->input('delid');
        Siswa::whereIn('id',$delid)->delete();
        return redirect('admin/siswa');
    }
    public function profile(Request $request)
    {
        return view('siswa.profile');
    }
}
