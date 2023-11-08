<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublishingCompanyRequest;

use App\Http\Requests\UpdatePublishingCompanyRequest;
use App\Http\services\PublishingCompanyService;
use App\Models\PublishingCompany;
use Illuminate\Http\Request;

class PublishingCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private PublishingCompanyService $publishingCompanyService;

    public function __construct(PublishingCompanyService $publishingCompanyService)
    {
        $this->publishingCompanyService = $publishingCompanyService;
    }

    public function index()
    {
        $publishing_companies= $this->publishingCompanyService->getAll();
        return view('admin.pages.publishing_company.index', compact('publishing_companies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishing_companies = $this->publishingCompanyService->getAll();
        return view('admin.pages.publishing_company.create', compact('publishing_companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublishingCompanyRequest $request)
    {
        $this->publishingCompanyService->create($request);
       return redirect()->route('admin.publishing_companies.index')->with('success', 'Thêm nhà xuất bản thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(PublishingCompany $publishing_Company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $publishing_company = $this->publishingCompanyService->getById($id);
        $publishing_companies = $this->publishingCompanyService->getAll();
        return view('admin.pages.publishing_company.edit', compact('publishing_company', 'publishing_companies'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param UpdatePublishingCompanyRequest $request
     */
    public function update($id,UpdatePublishingCompanyRequest $request)
    {
        $this->publishingCompanyService->update($id, $request);
        return redirect()->route('admin.publishing_companies.index')->with('success', 'Cập nhật nhà xuất bản thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->publishingCompanyService->delete($id);
        return redirect()->route('admin.publishing_companies.index')->with('success', 'Xóa nhà xuất bản thành công');

    }
}
