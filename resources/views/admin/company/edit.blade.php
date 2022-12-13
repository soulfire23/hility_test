<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Редактирование компании</h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="post" action="{{ route('admin.company.update', $company->id) }}" class="space-y-6 p-8" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div>
                        <x-input-label for="name" :value="'Название *'" />
                        <x-text-input id="name" name="name" type="text" value="{{ $company->name }}" class="mt-1 block w-full" required/>
                    </div>

                    <div>
                        <x-input-label for="email" :value="'Email'" />
                        <x-text-input id="email" name="email" type="text" value="{{ $company->email }}" class="mt-1 block w-full" />
                    </div>

                    <div>
                        <x-input-label for="website" :value="'Вебсайт'" />
                        <x-text-input id="website" name="website" type="text" value="{{ $company->website }}" class="mt-1 block w-full" />
                    </div>

                    <div>
                        <x-input-label for="logo" :value="'Лого'" />
                        <x-text-input id="logo" name="logo" type="file" class="mt-1 block w-full" />
                        <div class="w-full md:w-1/6 pt-4">
                            <img src="{{ asset($company->logo) }}" alt="">
                        </div>
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
