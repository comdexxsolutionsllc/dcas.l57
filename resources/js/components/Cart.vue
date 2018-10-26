<template>
  <div class="container" id="cart" name="cart">
    <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
        <div class="col-md-12">
          <div class="ibox">
            <div class="ibox-title">
              <span class="pull-right" style="font-weight: bold">{{ plural }}</span>
              <h5>Cart</h5>
            </div>

            <div v-for="item in contents" v-if="qty > 0">
              <CartItem :details="item" :key="item.id"></CartItem>
            </div>

            <div class="ibox-content" style="text-align: center; padding-top: 50px" v-if="qty == 0">
              <div style="display: inline-block; font-size: 24px">
                I'm empty. Perhaps, add some items to me to continue?
              </div>
            </div>

          </div>
        </div>
        <div class="col-md-12" style="padding-top: 10px; padding-bottom: 50px">
          <div class="ibox" style="text-align: center; padding: 5px">
            <div class="font-weight-bold ibox-title">
              <h4>Cart Summary</h4>
            </div>
            <div class="ibox-content" style="float: left">
              <span>Coupon</span>
              <h2 class="font-bold">
                <input @blur="couponValidator" @focus="$event.target.select()"
                       @input="coupon = $event.target.value.toUpperCase()" class="form-control"
                       id="coupon-input"
                       maxlength="16"
                       name="coupon" placeholder="Coupon" type="text"
                       v-model="coupon">
              </h2>
              <ul class="fa-ul" id="coupon-list"
                  style="margin-top: 15px" v-if="appliedCoupons.length > 0">
                <li :id="index" :key="couponName.id" v-for="(couponName, index) in appliedCoupons"><i
                  @click="$emit('coupon.removed', couponName) && removeCoupon(couponName)"
                  class="fa-li fa fa-minus-circle fa-fw">{{couponName
                  }}</i>
                </li>
              </ul>
            </div>

            <div class="ibox-content" style="float: right">
                            <span>
                                Total
                            </span>
              <h2 class="font-bold">
                ${{ total.toFixed(2) }}
              </h2>
            </div>
          </div>
        </div>

        <div class="ibox-content" style="width: 100%">
          <button class="btn btn-primary pull-right"><i class="fa fa fa-shopping-cart"></i> Checkout
          </button>
          <button class="btn btn-white" onclick="window.history.back()"><i
            class="fa fa-arrow-left"></i> Back to the main site
          </button>

          <div class="ibox-footer">&copy; 2018 Fiber Hop LLC. All rights reserved.</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';
  import CartItem from './CartItem';
  import toast from '../services/toast';

  export default {
    mounted() {
      this.protectObjects();

      this.loadCart();
    },
    data() {
      return {
        appliedCoupons: {
          coupons: [],
          types: [],
          values: []
        },
        contents: null,
        coupon: null,
        couponData: null,
        couponValidated: false,
        originalTotal: 0.00,
        qty: null,
        status: false,
        total: 0.00,
        removedCoupon: {
          name: '',
          type: null,
          value: 0.00
        }
      };
    },
    components: {
      CartItem
    },
    watch: {
      couponData() { // todo: refactor
        if (!this.appliedCoupons.includes(this.couponData.code)) {
          this.appliedCoupons.push(this.couponData.code);
          this.appliedCouponValues.push(this.couponData.value);
          this.appliedCouponTypes.push(this.couponData.type);

          let index = this.appliedCoupons.indexOf(this.couponData.code);

          let coupon_type = this.appliedCouponTypes[index];

          this.total = coupon_type === 'fixed' ? this.total - this.couponData.value : this.total - (this.total * this.couponData.value);

          toast.success('Coupon has been applied.', 'Coupon');
        } else {
          toast.error('Coupon has already been applied.');
        }
      },
      coupon() {
        _.debounce(function () {
          if (!this.couponValidated) {
            toast.error('Coupon is not valid.');
          }
        }, 500);
      },
      appliedCoupons() { //??
        this.$on('total.recalculating', () => { // ?? todo: refactor & stuff
          console.log('total ' + parseFloat(this.total));
          console.log('removed coupon ' + parseFloat(this.removedCoupon));

          this.total = this.removedCouponType === 'fixed' ? parseFloat(this.total) + parseFloat(this.removedCoupon) : parseFloat(this.total) + (parseFloat(this.originalTotal) * parseFloat(this.removedCoupon));

          toast.success('Coupon has been removed.', 'Coupon');

          this.$emit('total.recalculated', this.total);
        });
      }
    },
    computed: {
      plural() {
        let qtyStr = '(' + this.qty + ') ';

        return this.qty === 1 ? qtyStr + 'ITEM' : qtyStr + 'ITEMS';
      }
    },
    methods: {
      protectObjects() {
        Object.seal(this.appliedCoupons);

        Object.seal(this.removedCoupon);
      },
      loadCart() {
        this.getCartContents();
      },
      async getCartContents() {
        await axios.get('/api/v1/cart/contents')
          .then((response) => {
            this.getCount();

            this.getTotal();

            this.contents = response.data;
          });
      },
      async getCount() {
        await axios.get('/api/v1/cart/q/count')
          .then((response) => {
            this.qty = response.data;
          });
      },
      async getTotal() {
        await axios.get('/api/v1/cart/q/total')
          .then((response) => {
            this.originalTotal = response.data;

            this.total = response.data;
          });
      },
      async couponValidator() {
        if (this.qty === 0) {
          toast.error('Coupon cannot be applied to an empty cart.');

          let coupon_input = document.getElementById('coupon-input');

          coupon_input.select();
          coupon_input.value = '';
        }

        if (this.coupon && this.qty !== 0) {
          await axios.get('/api/v1/cart/q/coupon/' + this.coupon)
            .then((response) => {
              this.couponData = response.data;

              this.couponValidated = true;

              this.coupon = '';
            });
        }
      },
      removeCoupon(value) { // todo: refactor
        let index = this.appliedCoupons.indexOf(value);

        this.removedCoupon = this.appliedCouponValues[index];
        this.removedCouponType = this.appliedCouponTypes[index];

        if (index > -1) {
          this.appliedCoupons.splice(index, 1);

          this.appliedCouponValues.splice(index, 1);

          this.appliedCouponTypes.splice(index, 1);
        }

        this.$emit('total.recalculating', this.removedCoupon);
      }
    }
  }
</script>

<style scoped>
  body {
    margin-top: 20px;
    background: #eee;
  }

  h3 {
    font-size: 16px;
  }

  ul#coupon-list {
    padding-left: 0em;
  }

  li {
    padding-top: 25px;
  }

  .text-navy {
    color: #1ab394;
  }

  .cart-product-imitation {
    text-align: center;
    padding-top: 30px;
    height: 80px;
    width: 80px;
    background-color: #f8f8f9;
  }

  .product-imitation.xl {
    padding: 120px 0;
  }

  .product-desc {
    padding: 20px;
    position: relative;
  }

  .ecommerce .tag-list {
    padding: 0;
  }

  .ecommerce .fa-star {
    color: #d1dade;
  }

  .ecommerce .fa-star.active {
    color: #f8ac59;
  }

  .ecommerce .note-editor {
    border: 1px solid #e7eaec;
  }

  table.shopping-cart-table {
    margin-bottom: 0;
  }

  table.shopping-cart-table tr td {
    border: none;
    text-align: right;
  }

  table.shopping-cart-table tr td.desc.
  table.shopping-cart-table tr td:first-child {
    text-align: left;
  }

  table.shopping-cart-table tr td:last-child {
    width: 80px;
  }

  .ibox {
    clear: both;
    margin-bottom: 25px;
    margin-top: 0;
    padding: 0;
  }

  .ibox.collapsed .ibox-content {
    display: none;
  }

  .ibox:after.
  .ibox:before {
    display: table;
  }

  .ibox-title {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #ffffff;
    border-color: #e7eaec;
    border-image: none;
    border-style: solid solid none;
    border-width: 3px 0 0;
    color: inherit;
    margin-bottom: 0;
    padding: 14px 15px 7px;
    min-height: 48px;
  }

  .ibox-content {
    background-color: #ffffff;
    color: inherit;
    padding: 15px 20px 20px 20px;
    border-color: #e7eaec;
    border-image: none;
    border-style: solid solid none;
    border-width: 1px 0;
  }

  .ibox-footer {
    text-align: center;
    color: inherit;
    border-top: 1px solid #e7eaec;
    font-size: 90%;
    background: #ffffff;
    padding: 10px 15px;
    margin-top: 45px;
  }
</style>
