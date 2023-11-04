<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductHistory;

class ProductObserver
{
    private $productHistoy;

    public function __construct(ProductHistory $productHistory){
        $this->productHistoy = $productHistory;
    }

    /**
     * Handle the product "created" event.
     */
    public function created(product $product): void
    {
        $this->productHistoy->create([
            'type' => 'created',
            'content' => json_encode($product, JSON_UNESCAPED_UNICODE)
         ]);
    }

    /**
     * Handle the product "updated" event.
     */
    public function updated(product $product): void
    {
        $this->productHistoy->create([
            'type' => 'updated',
            'content' => json_encode($product, JSON_UNESCAPED_UNICODE)
        ]);
    }

    /**
     * Handle the product "deleted" event.
     */
    public function deleted(product $product): void
    {
        $this->productHistoy->create([
            'type' => 'deleted',
            'content' => json_encode($product, JSON_UNESCAPED_UNICODE)
        ]);
    }

    /**
     * Handle the product "restored" event.
     */
    public function restored(product $product): void
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     */
    public function forceDeleted(product $product): void
    {
        //
    }
}
