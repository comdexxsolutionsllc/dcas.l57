<?php

namespace App\Http\Controllers;

use App\Models\General\Coupon;
use App\Models\General\Product;
use Darryldecode\Cart\CartCollection;
use Illuminate\Http\Request;

class CartController extends Controller
{

    /**
     * @var bool|\Cart
     */
    protected $cart;

    /**
     * CartController constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $this->cart = auth()->check() ? \Cart::session(auth()->user()->cartInstance) : \Cart::session(request()->ip());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request    $request
     * @param \App\Models\General\Product $product
     *
     * @return bool|\Cart
     */
    public function store(Request $request, Product $product)
    {
        $item = $this->convert($product);

        return $this->cart->add($item);
    }

    /**
     * Handle the incoming request.
     *
     * @param \App\Models\General\Product $product
     *
     * @return array
     */
    protected function convert(Product $product): array
    {
        return [
            'id'         => $product->id,
            'name'       => $product->name,
            'price'      => $product->price,
            'quantity'   => 1,
            'attributes' => [
                'description' => $product->description,
                'taxable'     => $product->taxable,
            ],
            'conditions' => request()->only('conditions') ?? null,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request    $request
     * @param \App\Models\General\Product $product
     *
     * @return bool
     */
    public function update(Request $request, Product $product): bool
    {
        $item = $this->convert($product);

        return $this->cart->update($item['id'], $item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return bool
     */
    public function destroy($id): bool
    {
        return $this->cart->clear();
    }

    /**
     * Is the cart empty?
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->cart->isEmpty();
    }

    /**
     * Subtotal of all items in cart.
     *
     * @return float
     */
    public function subtotal(): float
    {
        return $this->cart->getSubTotal();
    }

    /**
     * Total of all items in cart.
     *
     * @return float
     */
    public function total(): float
    {
        return $this->cart->getTotal();
    }

    /**
     * Total quantity of all items in the cart.
     *
     * @return int
     */
    public function totalQuantity(): int
    {
        return $this->cart->getTotalQuantity();
    }

    /**
     * Total items in cart.
     *
     * @return int
     */
    public function count(): int
    {
        return $this->contents()->count();
    }

    /**
     * Get items in cart.
     *
     * @return \Darryldecode\Cart\CartCollection
     */
    public function contents(): CartCollection
    {
        return $this->cart->getContent();
    }

    /**
     * Remove an item from the cart.
     *
     * @param $id
     *
     * @return bool
     */
    public function removeItem($id): bool
    {
        return $this->cart->remove($id);
    }

    /**
     * Lookup a coupon.
     *
     * @param $code
     *
     * @return array
     */
    public function coupon($code): array
    {
        return Coupon::whereCode($code)->select([
            'code',
            'type',
            'value',
            'minimum_amount',
            'maximum_discount',
            'valid_start_time',
            'valid_end_time',
        ])->firstOrFail()->toArray();
    }
}
