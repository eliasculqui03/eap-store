<div class="w-full max-w-[85rem] min-h-[60vh] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="flex items-center h-full">
        <main class="w-full max-w-md p-6 mx-auto">
            <div class="bg-white border border-gray-200 shadow-sm mt-7 rounded-xl dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Restablecer contraseña</h1>
                    </div>

                    <div class="mt-5">
                        <!-- Form -->
                        <form wire:submit.prevent='guardar'>
                            <div class="grid gap-y-4">
                                <!-- Form Group -->
                                <div>
                                    <label for="contrasenia"
                                        class="block mb-2 text-sm dark:text-white">Contraseña</label>
                                    <div class="relative">
                                        <input type="password" id="contrasenia" wire:model="contrasenia"
                                            class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                            aria-describedby="email-error">
                                        @error('contrasenia')
                                            <div
                                                class="absolute inset-y-0 flex items-center pointer-events-none end-0 pe-3">
                                                <svg class="w-5 h-5 text-red-500" width="16" height="16"
                                                    fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                </svg>
                                            </div>
                                        @enderror
                                    </div>
                                    @error('contrasenia')
                                        <p class="mt-2 text-red-600 " id="password-error">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- End Form Group -->

                                <div>
                                    <label for="contrasenia_confirmation"
                                        class="block mb-2 text-sm dark:text-white">Confirmar
                                        contraseña</label>
                                    <div class="relative">
                                        <input type="password" id="contrasenia_confirmation"
                                            wire:model="contrasenia_confirmation"
                                            class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                            aria-describedby="email-error">

                                        @error('contrasenia_confirmation')
                                            <div class="inset-y-0 flex items-center pointer-events-none end-0 pe-3">
                                                <svg class="w-5 h-5 text-red-500" width="16" height="16"
                                                    fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                </svg>
                                            </div>
                                        @enderror

                                    </div>
                                    @error('contrasenia_confirmation')
                                        <p class="mt-2 text-xs text-red-600" id="password_confirmation-error">
                                            {{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit"
                                    class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    Guardar contraseña
                                </button>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
