<?php
namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Services\PersonalityAnalysisService;

class PaymentController extends Controller
{
    public function processPayment(Request $request, Result $result)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Premium Analysis: ' . $result->title,
                    ],
                    'unit_amount' => 999,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', $result).'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('results.show', $result),
            'customer_email' => auth()->user()->email,
            'metadata' => [
                'user_id' => auth()->id(),
                'result_id' => $result->id
            ],
        ]);

        return redirect()->away($session->url);
    }

    public function paymentSuccess(Request $request, Result $result)
    {
        $sessionId = $request->get('session_id');

        Stripe::setApiKey(config('services.stripe.secret'));
        $session = Session::retrieve($sessionId);

        // Generate premium content
        $premiumContent = (new PersonalityAnalysisService())->generatePremiumContent($result);

        // Update result
        $result->update([
            'is_paid' => true,
            'payment_id' => $session->payment_intent,
            'payment_amount' => $session->amount_total / 100,
            'paid_at' => now(),
            'premium_content' => $premiumContent
        ]);

        return redirect()->route('results.show', $result)
            ->with('success', 'Payment successful! Your premium analysis is now available.');
    }

    public function handleWebhook(Request $request)
    {
        \Log::info('Stripe webhook received', ['payload' => $request->all()]);

        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sigHeader, config('services.stripe.webhook.secret')
            );
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 403);
        }

        // Handle events
        switch ($event->type) {
            case 'checkout.session.completed':
                // Handle completed checkout
                break;
            case 'payment_intent.succeeded':
                // Handle successful payment
                break;
        }

        return response()->json(['status' => 'success']);
    }
}
