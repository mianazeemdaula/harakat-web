<?php


namespace App\Helper;
use App\Models\PaymentCard;
use Stripe\Stripe;
use Stripe\Token;
use Stripe\Charge;
use Stripe\Exception\CardException;

class StripePayment{
    
    static public function cardPayment(PaymentCard $card, $amount)
    {
        $stripe = Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $token = Token::create([
                'card' => [
                    'number' => $card->card_no,
                    'exp_month' => $card->expiry_month,
                    'exp_year' => $card->expiry_year,
                    'cvc' => $card->cvc,
                ],
            ]);

            $charge = Charge::create([
                'card' => $token->id,
                'currency' => 'AED',
                'amount' => $amount,
                'description' => 'wallet',
            ]);
            return $charge;
            if(isset($charge['id'])) {
                return $charge;
            } else {
                return $charge;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}