<?php

public function showDetails($type) {
    $prices = [
        'cor' => 150,
        'tor' => 150,
        'diploma' => 200,
    ];
    
    $price = $prices[strtolower($type)] ?? 150;
    
    return view('user.document-detail', compact('type', 'price'));
}