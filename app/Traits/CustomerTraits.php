<?php

namespace App\Traits;

/**
 *
 */
trait CustomerTraits
{
    public function setNumber($invoiceNo) {
        return $invoiceNo;
    }

    public function getNumber($number) {
        return $this->setNumber($number);
    }
    public function setCustomer($name, $address) {
        return [
            'name' => $name,
            'address' => $address
        ];
    }

    public function getCustomer($name, $address) {
        return $this->setCustomer($name, $address);
    }

    public function addLine($linesData) {
        $linesArray = [];

        if (count($linesData) > 0) {
            foreach ($linesData as $line) {
                $amount = $line['quantity']*$line['rate'];
                $linesArray[] = [
                    'description' => $line['description'],
                    'quantity'    => $line['quantity'],
                    'rate'        => $line['rate'],
                    'amount'      => $amount,
                ];
            }

            //$linesArray['totalAmount'] = $totalAmount;
        }

        return $linesArray;
    }

    public function getTotalAmount($linesData) {
        $totalAmount = 0;
        if (count($linesData) > 0) {
            foreach ($linesData as $line) {
                $totalAmount = $totalAmount + $line['quantity']*$line['rate'];
            }
        }

        return $totalAmount;

    }

    public function addDiscount($percent, $totalAmount) {
        if ($percent && $totalAmount) {

            return $totalAmount - ($totalAmount*$percent)/100;
        }

        return 0;
    }

}

