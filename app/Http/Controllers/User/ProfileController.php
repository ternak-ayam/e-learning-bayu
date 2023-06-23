<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){
        // dd(User::find(Auth::user()->id));
         return view('dashboardUser.profile.biodata.index', [
              'user' => User::find(Auth::user()->id)
         ]);
    }
    

    public function editBiodata($id){
        return view('dashboardUser.profile.biodata.editBiodata', [
            'user' => User::find($id)
        ]);
    }

    public function updateBiodata($id, Request $request){
        // dd($request->all());
       
        $this->validate($request, [
            'namaLengkap' => 'required',
            'tanggalLahir' => 'required',
            'tempatLahir' => 'required',
            'email' => 'required | email',
            'noTelepon' => 'required',
            'alamat' => 'required',
        ]);
        if(isset($request->foto)){
            // dd($request->all());
            $file = $request->foto;
            $fileName = time() . '_' . \Illuminate\Support\Str::uuid() . '.' . $file->getClientOriginalExtension();
            $user = User::findOrFail($id);
            if($this->uploadFile($request,$fileName,$user)){
           
            $user->name = $request->namaLengkap;
            $user->tgl_lahir = $request->tanggalLahir;
            $user->tempat_lahir = $request->tempatLahir;
            $user->tempat_lahir = $request->tempatLahir;
            $user->email = $request->email;
            $user->phone = $request->noTelepon;
            $user->alamat = $request->alamat;
            $user->image = $fileName;
            $user->save();
            return redirect()->route('profile.biodata.index');
        }
       }else{
           $user = User::findOrFail($id);
           $user->name = $request->namaLengkap;
           $user->tgl_lahir = $request->tanggalLahir;
           $user->tempat_lahir = $request->tempatLahir;
           $user->tempat_lahir = $request->tempatLahir;
           $user->email = $request->email;
           $user->phone = $request->noTelepon;
           $user->alamat = $request->alamat;
           $user->save();
           return redirect()->route('profile.biodata.index');
        }
    
    }

    public function editPassword($user){
          return view('dashboardUser.profile.biodata.editPassword',[
            'user' => User::find($user)->first()
          ]);
    }

    public function updatePassword(User $user, Request $request){
        $validatedData = $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    if (!Hash::check($validatedData['current_password'], $user->password)) {
        return back()->with('error', 'Current password is incorrect.');
    }

    $user->update([
        'password' => Hash::make($validatedData['new_password']),
    ]);

    return back()->with('success', 'Password updated successfully.');
    }

      public function uploadFile(Request $request,$fileName, User $user){
       $oldFile = Storage::disk('public/materi')->exists($user->image)
        ? Storage::disk('public/materi')->get($user->image)
        : null;

        if ($request->hasFile('foto')) {
            // Store the new file
            if (Storage::disk('public/materi')->put($fileName, file_get_contents($request->foto))) {
                // Delete the old file if it exists
                if ($oldFile !== null) {
                    Storage::disk('public/materi')->delete($user->image);
                }
                return true;
            }
        }
        return false;
    }
}
