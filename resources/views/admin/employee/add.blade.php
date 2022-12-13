<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Добавить сотрудника</h2>
    </x-slot>

    <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form method="post" action="{{ route('admin.employee.store') }}" class="space-y-6 p-8" autocomplete="off">
                        @csrf

                        <div>
                            <x-input-label for="first_name" :value="'Имя *'" />
                            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" required/>
                        </div>

                        <div>
                            <x-input-label for="last_name" :value="'Фамилия *'" />
                            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" required/>
                        </div>

                        <div>
                            <x-input-label for="email" :value="'Email'" />
                            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" />
                        </div>

                        <div>
                            <x-input-label for="phone" :value="'Телефон'" />
                            <x-text-input id="phone" name="phone" type="number" class="mt-1 block w-full" />
                        </div>

                        <div>
                            <x-input-label for="company_id" :value="'Компания *'" />
                            <select id="company_id" name="company_id" required>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
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
