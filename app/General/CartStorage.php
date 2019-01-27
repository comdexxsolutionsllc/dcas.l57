<?php

namespace App\General;

use App\Models\General\Cart;
use Darryldecode\Cart\CartCollection;

/**
 * Class CartStorage
 *
 * @package App\General
 */
class CartStorage
{

    /**
     * Get an entry from the database.
     *
     * @param $key
     *
     * @return array|\Darryldecode\Cart\CartCollection
     */
    public function get($key)
    {
        if ($this->has($key)) {
            return new CartCollection(Cart::find($key)->cart_data);
        } else {
            return [];
        }
    }

    /**
     * Does the database have the given key?
     *
     * @param $key
     *
     * @return \App\Models\General\Cart|\App\Models\General\Cart[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function has($key)
    {
        return Cart::find($key);
    }

    /**
     * Write an entry to the database.
     *
     * @param $key
     * @param $value
     */
    public function put($key, $value)
    {
        if ($row = Cart::find($key)) {
            // update
            $row->cart_data = $value;
            $row->save();
        } else {
            Cart::create([
                'id'        => $key,
                'cart_data' => $value,
            ]);
        }
    }
}
