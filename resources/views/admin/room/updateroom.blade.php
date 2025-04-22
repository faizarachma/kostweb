 {{-- Button Edit Kamar --}}
 <button type="button" class="bg-yellow-500 text-white p-2 rounded-full hover:bg-yellow-600"
     onclick="openEditModal({{ $item->id }}, '{{ $item->no_kamar }}', '{{ $item->harga }}', '{{ $item->deskripsi_kamar }}', '{{ $item->fasilitas }}')">
     <svg viewBox="0 0 24 24" fill="none" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg">
         <path
             d="M3.25 22C3.25 21.5858 3.58579 21.25 4 21.25H20C20.4142 21.25 20.75 21.5858 20.75 22C20.75 22.4142 20.4142 22.75 20 22.75H4C3.58579 22.75 3.25 22.4142 3.25 22Z"
             fill="#ffffff"></path>
         <path
             d="M11.5201 14.929L17.4368 9.01225C16.6315 8.6771 15.6777 8.12656 14.7757 7.22455C13.8736 6.32238 13.323 5.36846 12.9879 4.56312L7.07106 10.4799C6.60932 10.9417 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L8.38334 16.8676C9.00281 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0584 15.3907 11.5201 14.929Z"
             fill="#ffffff"></path>
         <path
             d="M19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142L13.9199 3.63105C13.9296 3.6604 13.9397 3.69015 13.9502 3.72028C14.2103 4.47 14.701 5.45281 15.6243 6.37602C16.5475 7.29923 17.5303 7.78999 18.28 8.05009C18.31 8.0605 18.3396 8.07054 18.3688 8.08021L19.0786 7.37044Z"
             fill="#ffffff"></path>
     </svg>
 </button>

 {{-- Modal Edit Kamar --}}
 <div id="editKamarModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
     <div class="bg-white p-6 rounded-lg shadow-md w-1/3">
         <h2 class="text-xl font-semibold mb-4">Edit Kamar</h2>
         <form id="editKamarForm" method="POST" enctype="multipart/form-data" class="space-y-4">
             @csrf
             @method('PUT')
             <input type="hidden" name="id" id="edit_id">
             <div>
                 <label for="edit_no_kamar" class="block text-sm font-medium text-gray-700">No Kamar</label>
                 <input type="text" name="no_kamar" id="edit_no_kamar" required
                     class="w-full border rounded px-3 py-2">
             </div>
             <div>
                 <label for="edit_harga" class="block text-sm font-medium text-gray-700">Harga</label>
                 <input type="text" name="harga" id="edit_harga" required class="w-full border rounded px-3 py-2">
             </div>
             <div>
                 <label for="edit_deskripsi_kamar" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                 <textarea name="deskripsi_kamar" id="edit_deskripsi_kamar" required class="w-full border rounded px-3 py-2"></textarea>
             </div>
             <div>
                 <label for="edit_fasilitas" class="block text-sm font-medium text-gray-700">Fasilitas</label>
                 <input type="text" name="fasilitas" id="edit_fasilitas" required
                     class="w-full border rounded px-3 py-2">
             </div>
             <div>
                 <label for="edit_gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                 <input type="file" name="gambar" id="edit_gambar" class="w-full border rounded px-3 py-2">
             </div>
             <div class="flex justify-end space-x-2">
                 <button type="button" id="closeEditModalBtn"
                     class="bg-gray-300 text-white px-4 py-2 rounded-full hover:bg-gray-600">Batal</button>
                 <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-700">Simpan
                     Perubahan</button>
             </div>
         </form>
     </div>
 </div>

 <script>
     function openEditModal(id, no_kamar, harga, deskripsi_kamar, fasilitas) {
         // Set the values in the modal form
         document.getElementById('edit_id').value = id;
         document.getElementById('edit_no_kamar').value = no_kamar;
         document.getElementById('edit_harga').value = harga;
         document.getElementById('edit_deskripsi_kamar').value = deskripsi_kamar;
         document.getElementById('edit_fasilitas').value = fasilitas;

         // Show the modal
         document.getElementById('editKamarModal').classList.remove('hidden');
     }

     document.getElementById('closeEditModalBtn').addEventListener('click', function() {
         // Hide the modal
         document.getElementById('editKamarModal').classList.add('hidden');
     });
 </script>
