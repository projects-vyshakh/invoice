<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\FunctionalTraits;

class InvoiceController extends Controller
{
    use FunctionalTraits;

    public function index() {
        $lines           = [];
        $customerDetails = $this->getCustomer("Tiny India Pvt Ltd", "India");
        $invoiceNumber   = $this->getNumber('REF-0211-2022');


        //$lines[]         = $this->addLine('Monthly Subscription of Product A', 3, 9.99);
        //$lines[]         = $this->addLine('Annual Subscription of Product B', 2, 199.99 );

        $linesData         = [
            [
                'description'  =>'Monthly Subscription  of Product A',
                'quantity'     => 3,
                'rate'         => 99.9
            ],
            [
                'description'  =>'Annual Subscription  of Product B',
                'quantity'     => 2,
                'rate'         => 199.99
            ],

        ];

        $lines          = $this->addLine($linesData);
        $totalAmount    = $this->getTotalAmount($linesData);
        $discount       = $this->addDiscount(2, $totalAmount);

        $parameters = [
            'invoiceNumber'     => $invoiceNumber,
            'lines'             => $lines,
            'customerDetails'   => $customerDetails,
            'discount'          => $discount,
            'totalAmount'       => $totalAmount,
        ];

        //dd($parameters);


        return view('invoice.index', $parameters);

    }
}
