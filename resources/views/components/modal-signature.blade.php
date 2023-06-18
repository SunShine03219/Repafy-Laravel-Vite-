<div
    x-init="[initSignature()]" x-cloak 
    x-data="modalSignature({ 
        modelOpen: @entangle('signatureModalShow'),
        signatureImage: @entangle('signature')
    })">
    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen" 
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0" 
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100" 
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
            ></div>

            <div x-cloak x-show="modelOpen" 
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300  rounded-md shadow-sm">
                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-medium">Fight Details</h1>

                    <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
                <canvas x-ref="canvas" height="300" width="500" class="mt-5 mx-auto bg-white"></canvas>
                <form class="mt-5 text-right" wire:submit.prevent="addSignature">
                    @csrf
                    <button type="button" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-500 rounded-md dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:bg-blue-700 hover:bg-blue-600 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50"
                         @click="clearCanvas();">Clear</button>
                    <x-danger-button>
                        {{ __('Complete') }}
                    </x-danger-button>
                    {{-- <button type="submit" class="ml-5 px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50"></button> --}}
                </form>
            </div>
        </div>
    </div>
</div>

@pushonce('scripts')
 <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.1/dist/signature_pad.umd.min.js"></script>
@endpushonce

<script>
    function modalSignature(config) {
        return {
            modelOpen: config.modelOpen,
            signatureImage: config.signatureImage,
            signaturePad: null,
            initSignature() {
                this.signaturePad = new SignaturePad(this.$refs.canvas);
                this.signaturePad.addEventListener("endStroke", ()=>{
                   this.signatureImage = this.signaturePad.toDataURL('image/png');
                });                
            },
            clearCanvas() {
                this.signaturePad.clear();
            },
            addSignature() {

            }
        };
    }
</script>