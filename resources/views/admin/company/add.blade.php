<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Добавить компанию</h2>
    </x-slot>

    <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form method="post" action="{{ route('admin.company.store') }}" class="space-y-6 p-8" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="'Название *'" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required/>
                        </div>

                        <div>
                            <x-input-label for="email" :value="'Email'" />
                            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" />
                        </div>

                        <div>
                            <x-input-label for="website" :value="'Вебсайт'" />
                            <x-text-input id="website" name="website" type="text" class="mt-1 block w-full" />
                        </div>

                        <div>
                            <x-input-label for="logo" :value="'Лого'" />
                            <x-text-input id="logo" name="logo" type="file" class="mt-1 block w-full" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>Сохранить</x-primary-button>

                            @if (session('status'))
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 10000)"
                                    class="text-sm text-gray-600"
                                >{{ session('status') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

    </div>
</x-app-layout>
