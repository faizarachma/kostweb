<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelolaKamar;
use App\Models\KelolaNotifikasi;
use App\Models\KelolaPemesanan;
use App\Models\KelolaPenghuni;
use Illuminate\Support\Facades\Storage;

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
            'fasilitas' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('gambar')) {
                $path = $request->file('gambar')->store('kamar', 'public');
                $validated['gambar'] = $path;
            }

            KelolaKamar::create($validated);
            return redirect()->route('kamar')->with('success', 'Kamar berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menambahkan kamar: '.$e->getMessage());
        }

    }

    public function updateKamar(Request $request, $id)
    {
        $kamar = KelolaKamar::findOrFail($id);

        $validated = $request->validate([
            'no_kamar' => 'required|unique:kelola_kamar,no_kamar,'.$id,
            'harga' => 'required|numeric|min:0',
            'deskripsi_kamar' => 'required|string|max:500',
            'fasilitas' => 'required|string|max:255',
            'gambar' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($kamar->gambar) {
                    Storage::disk('public')->delete($kamar->gambar);
                }

                // Simpan gambar baru
                $path = $request->file('gambar')->store('kamar', 'public');
                $validated['gambar'] = $path;
            }

            $kamar->update($validated);
            return redirect()->route('kamar')->with('success', 'Kamar berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui kamar: '.$e->getMessage());
        }
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

    public function storeNotifikasi(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'pesan' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        try {
            KelolaNotifikasi::create($validated);
            return redirect()->route('notifikasi')->with('success', 'Notifikasi berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menambahkan notifikasi: '.$e->getMessage());
        }
    }

    public function updateNotifikasi(Request $request, $id)
    {
        $notifikasi = KelolaNotifikasi::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'pesan' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        try {
            $notifikasi->update($validated);
            return redirect()->route('notifikasi')->with('success', 'Notifikasi berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui notifikasi: '.$e->getMessage());
        }
    }

    public function destroyNotifikasi($id)
    {
        try {
            KelolaNotifikasi::destroy($id);
            return redirect()->route('notifikasi')->with('success', 'Notifikasi berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus notifikasi: '.$e->getMessage());
        }
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
        $query = KelolaPenghuni::query();

        if ($request->has('search')) {
            $query->where('nama', 'like', '%'.$request->search.'%')
                  ->orWhere('no_ktp', 'like', '%'.$request->search.'%')
                  ->orWhere('email', 'like', '%'.$request->search.'%');
        }

        $penghuni = $query->paginate(10);
        return view('admin.penghuni.main', compact('penghuni'));
    }

    public function storePenghuni(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_ktp' => 'required|string|unique:kelola_penghuni',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string',
            'email' => 'required|email|unique:kelola_penghuni',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            if ($request->hasFile('foto_ktp')) {
                $path = $request->file('foto_ktp')->store('penghuni/ktp', 'public');
                $validated['foto_ktp'] = $path;
            }

            KelolaPenghuni::create($validated);
            return redirect()->route('penghuni')->with('success', 'Penghuni berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menambahkan penghuni: '.$e->getMessage());
        }
    }

    public function updatePenghuni(Request $request, $id)
    {
        $penghuni = KelolaPenghuni::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_ktp' => 'required|string|unique:kelola_penghuni,no_ktp,'.$id,
            'alamat' => 'required|string',
            'no_telepon' => 'required|string',
            'email' => 'required|email|unique:kelola_penghuni,email,'.$id,
            'foto_ktp' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            if ($request->hasFile('foto_ktp')) {
                // Hapus foto lama jika ada
                if ($penghuni->foto_ktp) {
                    Storage::disk('public')->delete($penghuni->foto_ktp);
                }

                // Simpan foto baru
                $path = $request->file('foto_ktp')->store('penghuni/ktp', 'public');
                $validated['foto_ktp'] = $path;
            }

            $penghuni->update($validated);
            return redirect()->route('penghuni')->with('success', 'Penghuni berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui penghuni: '.$e->getMessage());
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
