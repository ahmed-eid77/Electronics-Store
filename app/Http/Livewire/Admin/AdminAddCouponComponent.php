<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminAddCouponComponent extends Component
{

    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expire_date;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required',
            'cart_value' => 'required',
            'expire_date' => 'required'
        ]);
    }


    public function StoreCoupon()
    {
        $this->validate([
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expire_date' => 'required'
        ]);

        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_Value = $this->cart_value;
        $coupon->expire_date = $this->expire_date;
        $coupon->save();
        session()->flash('message', 'Coupon Has Been Add Successfully');
    }


    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component')->layout('layouts.base');
    }
}
