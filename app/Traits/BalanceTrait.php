<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait BalanceTrait
{
    public function increaseBalance($amount)
    {
        $this->user->balance += $amount;
        $this->user->save();
    }

    public function decreaseBalance($amount)
    {
        $this->user->balance -= $amount;
        $this->user->save();
    }
}
