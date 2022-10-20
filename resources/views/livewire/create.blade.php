<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
 
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <div class="fixed inset-0 z-10 overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
      <form>  
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            
            <div>
                <h1 class="font-bold text-center mb=4">CREATE DATA</h1>
            </div>
                <div>
                    <div class="mb-2">
                        <input wire:model="postId" type="hidden" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Input Post">
                    </div>
                    <div class="mb-2">
                        <label for="title"class="block">Judul Buku</label>
                        <input wire:model="title" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Input Post">
                        @error('title') <h1 class="text-red-500">{{$message}}</h1>@enderror
                    </div>
                    <div class="mb-2">
                        <label for="description"class="block">Deskripsi</label>
                        <textarea wire:model="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Input Post"></textarea>
                        @error('description') <h1 class="text-red-500">{{$message}}</h1>@enderror
                    </div>
                    <div>
                        <label>Masukkan gambar</label><br/>
                        <input type="file" wire:model="uploadImage"/>
                        <br/><br/>
                    </div>
                </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
          <button wire:click.prevent="store()" type="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:border-green focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Submit</button>
          <button wire:click="hideModal()" type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
        </div>
        </form>
      </div>
  </div>
</div>