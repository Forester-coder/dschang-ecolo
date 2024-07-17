<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\TypeAbonnement;
use Illuminate\Http\Request;
use App\Services\MTNService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MTNPaymentController extends Controller
{
    protected $mtnService;

    public function __construct(MTNService $mtnService)
    {
        $this->mtnService = $mtnService;
    }

    public function showPaymentForm()
    {
        $typeAbonnements = TypeAbonnement::all();
        return view('mtn.payment', compact('typeAbonnements'));
    }

    public function initiatePayment(Request $request)
    {

        $request->validate([
            'type_abonnement' => 'required',
            'contactAbonnement' => 'required'
        ]);

        $typeAbonnement = TypeAbonnement::find($request->input('type_abonnement'));

        $amount = $typeAbonnement->montant;
        $currency = 'EUR';
        $externalId = Str::uuid()->toString();
        $payer = $request->input('contactAbonnement');
        $payerMessage = 'Payment for order';
        $payeeNote = 'Thank you for your purchase';

        $response = $this->mtnService->requestToPay($amount, $currency, $externalId, $payer, $payerMessage, $payeeNote);

        return redirect()->route('mtn.payment.status', ['referenceId' => $externalId, 'typeAbonnement' => $typeAbonnement->id]);
    }

    public function checkPaymentStatus(Request $request)
    {
        $referenceId = $request->query('referenceId');
        $typeAbonnement = TypeAbonnement::find($request->query('typeAbonnement'));
        $status = $this->mtnService->getTransactionStatus($referenceId);

        if ($status == 'SUCCESS') {
            Abonnement::create([
                'date_debut' => now(),
                'date_fin' => $typeAbonnement->nom == 'mensuel' ? now()->addMonth() : ($typeAbonnement->nom == 'trimestriel' ? now()->addMonth(3) : now()->addYear()),
                'etat' => true,
                'type_abonnement_id' => $typeAbonnement->id,
                'moyen_paiement_id' => 1,
                'user_id' => Auth::id()
            ]);
        } else {
          
        }


        return view('mtn.payment_status', ['status' => $status]);
    }
}
