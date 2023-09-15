<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponsComponent extends Component
{

    public function deleteCoupon($id){
        $coupon = Coupon::find($id);
        $coupon->delete();
        session()->flash('message', 'Coupon Has Been Deleted Successfully');
    }

    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupons-component',
            [
                'coupons' => $coupons,
            ])->layout('layouts.base');
    }
}
