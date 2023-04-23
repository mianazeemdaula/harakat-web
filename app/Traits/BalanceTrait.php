<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use App\Models\Balance;

trait BalanceTrait
{
    public function increaseBalance($amount)
    {
        if(!$this->user){
            $acnt = new Balance();
            $acnt->user_id = $this->id;
            $acnt->save();
        }
        $this->user->balance += $amount;
        $this->user->save();
    }

    public function decreaseBalance($amount)
    {
        if(!$this->user){
            $acnt = new Balance();
            $acnt->user_id = $this->id;
            $acnt->save();
        }
        $this->user->balance -= $amount;
        $this->user->save();
    }
}
