<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Admin\WalletRepository;
use App\Repositories\Admin\PaymentRepository;
use App\Repositories\Admin\UserRepository;
use App\Repositories\Admin\SettingRepository;
use App\Repositories\Admin\SortableContentRepository;
use App\Repositories\Admin\DiscountRepository;
use Flash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Stripe;

class DashboardController extends Controller
{
     /** @var  SortableContentRepository */
     private $sortableContentRepository;

     /** @var  WalletRepository */
     private $walletRepository;
 
     /** @var  PaymentRepository */
     private $paymentRepository;
 
     /** @var  UserRepository */
     private $userRepository;
 
     /** @var  SettingRepository */
     private $settingRepository;
 
     /** @var  DiscountRepository */
     private $discountRepository;
    public function __construct(WalletRepository $walletRepo, PaymentRepository $paymentRepo, UserRepository $userRepo, SettingRepository $settingRepo, SortableContentRepository $sortableContentRepository, DiscountRepository $discountRepository)
    {
        $this->walletRepository = $walletRepo;
        $this->paymentRepository = $paymentRepo;
        $this->userRepository = $userRepo;
        $this->settingRepository = $settingRepo;
        $this->sortableContentRepository = $sortableContentRepository;
        $this->discountRepository = $discountRepository;
    }
    
}