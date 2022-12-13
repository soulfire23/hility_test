<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Сотрудники</h2>
    </x-slot>

    <div class="py-12">
        @foreach($employees as $employee)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-2/3 text-center md:text-left">{{ $employee->last_name }} {{ $employee->first_name }} - {{ $employee->email }}, +{{ $employee->phone }}</div>
                            <div class="w-full md:w-1/3 flex justify-center md:justify-end">
                                <div class="px-2 text-green-600">
                                    <a href="{{ route('admin.employee.edit', $employee->id) }}">Править</a>
                                </div>
                                <div class="px-2 text-red-600">
                                    <form action="{{ route('admin.employee.destroy', $employee->id) }}" method="POST">
                                        @csrf()
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onclick="return confirm('Удалить сотрудника?')">
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="pagination max-w-7xl mx-auto sm:px-6 lg:px-8 my-8 flex justify-start">
            {{ $employees->links() }}
        </div>
    </div>
</x-app-layout>
