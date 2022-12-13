<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class EmployeeController extends Controller
{
    public function index(): Factory|View|Application
    {
        $employees = Employee::orderBy('last_name')->paginate(10);

        return view('admin.employee.index', [
            'employees' => $employees,
        ]);
    }

    public function create(): Factory|View|Application
    {
        $companies = Company::all();

        return view('admin.employee.add', [
            'companies' => $companies,
        ]);
    }

    public function store(EmployeeRequest $request): RedirectResponse
    {
        $fields = $request->validated();
        $result = Employee::create($fields);

        $status = ($result->id > 0) ? 'employee-created' : 'fail';
        return redirect()->back()->with('status', $status);
    }

    public function show()
    {

    }

    public function edit(Employee $employee): Factory|View|Application
    {
        $companies = Company::all();

        return view('admin.employee.edit', [
            'employee' => $employee,
            'companies' => $companies,
        ]);
    }

    public function update(EmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $fields = $request->validated();
        $employee->update($fields);

        $status = ($employee->wasChanged()) ? 'Сотрудник изменен' : 'Сотрудник не изменен';
        return redirect()->back()->with('status', $status);
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $status = $employee->delete() === true ? 'Сотрудник удален' : 'Сотрудник не удален';

        return redirect(route('admin.employee.index'))->with('status', $status);
    }
}
