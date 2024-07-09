<?php
/** @var \App\Models\User $user **/
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class MyaccountController extends Controller
{
    public function showmyaccount()
    {
        $user = User::findOrFail(auth()->id());

        return view('myaccount', compact('user'));
    }

    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if (!$user) {
            return back()->with('error', 'User tidak ditemukan.');
        }

        // Menyimpan foto baru jika ada
        if ($request->hasFile('profile_picture')) {
            $imageName = time() . '.' . $request->profile_picture->extension();

            try {
                $request->profile_picture->storeAs('', $imageName, 'profil');
                Log::info('File berhasil disimpan: ' . $imageName);

                // Update path foto di database
                $user->foto = $imageName;
            } catch (\Exception $e) {
                Log::error('Gagal menyimpan file: ' . $e->getMessage());
                return back()->with('error', 'Gagal menyimpan file.');
            }
        }


        /** @var \App\Models\User $user **/
        $user->save();

        return back()->with('success', 'Foto profil berhasil diubah.');
    }
}
