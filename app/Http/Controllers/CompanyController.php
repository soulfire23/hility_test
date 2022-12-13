<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    private UploadedFile|null $logo;
    private string $logoPath;

    public function index(): Factory|View|Application
    {
        $companies = Company::paginate(10);

        return view('admin.company.index', [
            'companies' => $companies,
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.company.add');
    }

    public function store(CompanyRequest $request): RedirectResponse
    {
        $fields = $request->validated();
        $this->logo = $fields['logo'] ?? null;
        $fields['logo'] = $this->storeLogo() === true ? $this->logoPath : null;
        $result = Company::create($fields);

        $status = ($result->id > 0) ? 'company-created' : 'fail';
        return redirect()->back()->with('status', $status);
    }

    public function show()
    {

    }

    public function edit(Company $company): Factory|View|Application
    {
        return view('admin.company.edit', [
            'company' => $company,
        ]);
    }

    public function update(CompanyRequest $request, Company $company): RedirectResponse
    {
        $fields = $request->validated();
        $this->logo = $fields['logo'] ?? null;
        $fields['logo'] = $this->storeLogo() === true ? $this->logoPath : $company->logo;
        $company->update($fields);

        $status = ($company->wasChanged()) ? 'Компания изменена' : 'Компания не изменена';
        return redirect()->back()->with('status', $status);
    }

    public function destroy(Company $company): RedirectResponse
    {
        File::delete('storage/' . $company->logo);
        $status = $company->delete() === true ? 'Компания удалена' : 'Компания не удалена';

        return redirect(route('admin.company.index'))->with('status', $status);
    }


    // Service
    private function storeLogo(): bool
    {
        if ($this->logo === null) {
            return false;
        }

        $logoFileName = md5(uniqid(mt_rand(), true)) . '.' . $this->logo->extension();
        $this->logoPath = 'storage/' . $logoFileName;

        $file = Image::make($this->logo);
        $file->save(public_path($this->logoPath), 80);

        return file_exists($this->logoPath);
    }
}
