<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelolaKamar;
use App\Models\KelolaNotifikasi;
use App\Models\KelolaPemesanan;
use App\Models\KelolaPenghuni;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Kelola Kamar
    public function indexKamar(Request $request)
    {
        $query = KelolaKamar::query();

        if ($request->has('search')) {
            $query->where('no_kamar', 'like', '%'.$request->search.'%')
                  ->orWhere('deskripsi_kamar', 'like', '%'.$request->search.'%');
        }

        $kamar = $query->paginate(10);
        return view('admin.room.main', compact('kamar'));
    }



    public function storeKamar(Request $request)
    {
        $validated = $request->validate([
            'no_kamar' => 'required|unique:kelola_kamar',
            'harga' => 'required|numeric|min:0',
            'deskripsi_kamar' => 'required|string|max:500',
            'fasilitas' => 'required|array', // Ubah ke array untuk checkbox
            'fasilitas.*' => 'string', // Validasi setiap item dalam array
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'in:available,booked',
        ]);

        if (!isset($validated['status'])) {
            $validated['status'] = 'available';
        }

        try {
            if ($request->hasFile('gambar')) {
                $path = $request->file('gambar')->store('kamar', 'public');
                $validated['gambar'] = $path;
            }

            // Ubah array fasilitas menjadi string (bisa juga disimpan sebagai JSON)
            $validated['fasilitas'] = implode(', ', $validated['fasilitas']);

            KelolaKamar::create($validated);
            return redirect()->route('kamar')->with('success', 'Kamar berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menambahkan kamar: '.$e->getMessage());
        }
    }


    public function updateKamar(Request $request, $id)
    {
        $validated = $request->validate([
            'no_kamar' => 'required|unique:kelola_kamar,no_kamar,' . $id,
            'harga' => 'required|numeric|min:100000', // Minimum Rp100.000
            'deskripsi_kamar' => 'required|string|max:500',
            'fasilitas' => 'required|array|min:1',
            'fasilitas.*' => 'string|in:AC,WiFi,TV,Kulkas,kipas',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // tambahkan gif agar konsisten
            'status' => 'required|in:available,booked',
        ]);

        try {
             $kamar = KelolaKamar::findOrFail($id); // Ambil SATU data, bukan paginate

            // Jika ada gambar baru
            if ($request->hasFile('gambar')) {
                if ($kamar->gambar && Storage::disk('public')->exists($kamar->gambar)) {
                    Storage::disk('public')->delete($kamar->gambar);
                }

                $validated['gambar'] = $request->file('gambar')->store('kamar', 'public');
            }

            // Konversi fasilitas ke string unik
            $validated['fasilitas'] = implode(', ', array_unique($validated['fasilitas']));

            $kamar->update($validated);

            return redirect()->route('kamar')
                ->with('success', 'Data kamar berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Gagal memperbarui: ' . $e->getMessage());
        }
    }


    public function editKamar($id)
    {
        $kamar = KelolaKamar::findOrFail($id);
        return view('admin.room.edit', compact('kamar'));
    }



    public function destroyKamar($id)
    {
        try {
            $kamar = KelolaKamar::findOrFail($id);

            // Hapus gambar terkait
            if ($kamar->gambar) {
                Storage::disk('public')->delete($kamar->gambar);
            }

            $kamar->delete();
            return redirect()->route('kamar')->with('success', 'Kamar berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus kamar: '.$e->getMessage());
        }
    }

    // Kelola Notifikasi
    public function indexNotifikasi(Request $request)
    {
        $query = KelolaNotifikasi::query();

        if ($request->has('search')) {
            $query->where('judul', 'like', '%'.$request->search.'%')
                  ->orWhere('pesan', 'like', '%'.$request->search.'%');
        }

        $notifikasi = $query->paginate(10);
        return view('admin.notification.main', compact('notifikasi'));

    }


    // Kelola Pemesanan
    public function indexPemesanan(Request $request)
    {
        $query = KelolaPemesanan::with(['kamar', 'penghuni']);

        if ($request->has('search')) {
            $query->whereHas('kamar', function($q) use ($request) {
                    $q->where('no_kamar', 'like', '%'.$request->search.'%');
                })
                ->orWhereHas('penghuni', function($q) use ($request) {
                    $q->where('nama', 'like', '%'.$request->search.'%');
                });
        }

        $pemesanan = $query->paginate(10);
        return view('admin.order.main', compact('pemesanan'));
    }

    public function storePemesanan(Request $request)
    {
        $validated = $request->validate([
            'kamar_id' => 'required|exists:kelola_kamar,id',
            'penghuni_id' => 'required|exists:kelola_penghuni,id',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date|after:tanggal_masuk',
            'status' => 'required|in:menunggu,diterima,ditolak',
        ]);

        try {
            KelolaPemesanan::create($validated);
            return redirect()->route('pemesanan')->with('success', 'Pemesanan berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menambahkan pemesanan: '.$e->getMessage());
        }
    }

    public function updatePemesanan(Request $request, $id)
    {
        $pemesanan = KelolaPemesanan::findOrFail($id);

        $validated = $request->validate([
            'kamar_id' => 'required|exists:kelola_kamar,id',
            'penghuni_id' => 'required|exists:kelola_penghuni,id',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date|after:tanggal_masuk',
            'status' => 'required|in:menunggu,diterima,ditolak',
        ]);

        try {
            $pemesanan->update($validated);
            return redirect()->route('pemesanan')->with('success', 'Pemesanan berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui pemesanan: '.$e->getMessage());
        }
    }

    public function destroyPemesanan($id)
    {
        try {
            KelolaPemesanan::destroy($id);
            return redirect()->route('pemesanan')->with('success', 'Pemesanan berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus pemesanan: '.$e->getMessage());
        }
    }

    // Kelola Penghuni
    public function indexPenghuni(Request $request)
    {
        $penghuni = User::where('role', '!=', 'admin')->get();

        return view('admin.penghuni.main', compact('penghuni'));
    }


    public function storePenghuni(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email',
            'no_hp'          => 'required|string|max:20|unique:users,no_hp',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string',
        ], [
            'email.unique'  => 'Email sudah terdaftar. Gunakan email lain.',
            'no_hp.unique'  => 'Nomor HP sudah digunakan. Gunakan nomor lain.',
        ]);

        try {
            // Generate username unik
            do {
                $username = Str::slug($validated['nama_lengkap']) . rand(100, 999);
            } while (User::where('username', $username)->exists());

            // Simpan data penghuni ke tabel `users`
            User::create([
                'name'           => $validated['nama_lengkap'],
                'username'       => $username,
                'email'          => $validated['email'],
                'no_hp'          => $validated['no_hp'],
                'tanggal_lahir'  => $validated['tanggal_lahir'],
                'alamat'         => $validated['alamat'],
                'role'           => 'user',
                'password'       => bcrypt('12345678'), // default password
            ]);



            return redirect()->route('users.index')->with('success', 'Penghuni berhasil ditambahkan sebagai user.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menambahkan penghuni: ' . $e->getMessage());
        }
    }




    public function destroyPenghuni($id)
    {
        try {
            $penghuni = KelolaPenghuni::findOrFail($id);

            // Hapus foto KTP terkait
            if ($penghuni->foto_ktp) {
                Storage::disk('public')->delete($penghuni->foto_ktp);
            }

            $penghuni->delete();
            return redirect()->route('penghuni')->with('success', 'Penghuni berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus penghuni: '.$e->getMessage());
        }
    }


}
