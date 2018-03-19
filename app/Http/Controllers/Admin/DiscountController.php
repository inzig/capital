<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Admin\DiscountRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DiscountController extends AppBaseController
{
    /** @var  DiscountRepository */
    private $discountRepository;

    public function __construct(DiscountRepository $discountRepo)
    {
        $this->discountRepository = $discountRepo;
    }

    /**
     * Display a listing of the SettingRepository.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->discountRepository->pushCriteria(new RequestCriteria($request));
        $discounts = $this->discountRepository->all();

        return view('admin.discounts.index')
            ->with('discounts', $discounts);
    }

    /**
     * Show the form for creating a new SortableContent.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.discounts.create');
    }

    /**
     * Store a newly created SortableContent in storage.
     *
     * @param CreateSortableContentRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $discount = $this->discountRepository->create($data);

        Flash::success('Discount saved successfully.');

        return redirect(route('discounts.index'));
    }

    /**
     * Show the form for editing the specified SortableContent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $discount = $this->discountRepository->findWithoutFail($id);

        if (empty($discount)) {
            Flash::error('Discount not found');

            return redirect(route('discounts.index'));
        }

        return view('admin.discounts.edit')
            ->with('discount', $discount);
    }

    /**
     * Update the specified SortableContent in storage.
     *
     * @param  int              $id
     * @param UpdateSortableContentRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $discount = $this->discountRepository->findWithoutFail($id);

        if (empty($discount)) {
            Flash::error('Discount not found');

            return redirect(route('discounts.index'));
        }

        $data = $request->all();

        $discount = $this->discountRepository->update($data, $id);

        Flash::success('Discount updated successfully.');

        return redirect(route('discounts.index'));
    }

    /**
     * Remove the specified SortableContent from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $discount = $this->discountRepository->findWithoutFail($id);

        if (empty($discount)) {
            Flash::error('Discount not found');

            return redirect(route('discounts.index'));
        }

        $this->discountRepository->delete($id);

        Flash::success('Discount deleted successfully.');

        return redirect(route('discounts.index'));
    }
}
