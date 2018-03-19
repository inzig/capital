<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Admin\DiscountRepository;
use App\Repositories\Admin\DiscountRateRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DiscountRateController extends AppBaseController
{
    /** @var  DiscountRepository */
    private $discountRepository;

    /** @var  DiscountRateRepository */
    private $discountRateRepository;

    public function __construct(DiscountRepository $discountRepo, DiscountRateRepository $discountRateRepo)
    {
        $this->discountRepository = $discountRepo;
        $this->discountRateRepository = $discountRateRepo;
    }

    /**
     * Display a listing of the SettingRepository.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, $discountId)
    {
        $discount = $this->discountRepository->findWithoutFail($discountId);

        if (empty($discount)) {
            Flash::error('Discount not found');

            return redirect(route('discounts.index'));
        }

        $rates = $discount->discount_rates;

        return view('admin.discount-rates.index')
            ->with('discountId', $discountId)
            ->with('rates', $rates);
    }

    /**
     * Show the form for creating a new SortableContent.
     *
     * @return Response
     */
    public function create(Request $request, $discountId)
    {
        $discount = $this->discountRepository->findWithoutFail($discountId);

        if (empty($discount)) {
            Flash::error('Discount not found');

            return redirect(route('discounts.index'));
        }

        return view('admin.discount-rates.create')
            ->with('discountId', $discountId);
    }

    /**
     * Store a newly created SortableContent in storage.
     *
     * @param CreateSortableContentRequest $request
     *
     * @return Response
     */
    public function store(Request $request, $discountId)
    {
        $data = $request->all();

        $rate = $this->discountRateRepository->create($data);

        Flash::success('Discount rate saved successfully.');

        return redirect(route('discounts.index'));
    }

    /**
     * Show the form for editing the specified SortableContent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Request $request, $discountId, $id)
    {
        $rate = $this->discountRateRepository->findWithoutFail($id);

        if (empty($rate)) {
            Flash::error('Discount rate not found');

            return redirect(route('discounts.index'));
        }

        return view('admin.discount-rates.edit')
            ->with('discountId', $discountId)
            ->with('rate', $rate);
    }

    /**
     * Update the specified SortableContent in storage.
     *
     * @param  int              $id
     * @param UpdateSortableContentRequest $request
     *
     * @return Response
     */
    public function update(Request $request, $discountId, $id)
    {
        $rate = $this->discountRateRepository->findWithoutFail($id);

        if (empty($rate)) {
            Flash::error('Discount rate not found');

            return redirect(route('discounts.index'));
        }

        $data = $request->all();

        $rate = $this->discountRateRepository->update($data, $id);

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
    public function destroy(Request $request, $discountId, $id)
    {
        $rate = $this->discountRateRepository->findWithoutFail($id);

        if (empty($rate)) {
            Flash::error('Discount rate not found');

            return redirect(route('discounts.index'));
        }

        $this->discountRateRepository->delete($id);

        Flash::success('Discount rate deleted successfully.');

        return redirect(route('discounts.index'));
    }
}
