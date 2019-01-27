<template>
  <div class="ibox-content">
    <div class="table-responsive">
      <table class="table shopping-cart-table">
        <tbody>
        <tr>
          <td width="90">
            <div class="cart-product-imitation">
            </div>
          </td>
          <td class="desc">
            <h3>
              <a class="text-navy product"
                 href="#">
                {{ product }}
              </a>
            </h3>
            <p class="small description">
              {{ description }}
            </p>
            <dl class="small m-b-none" v-if="furtherDetails">
              <dt>Further Details</dt>
              <dd>{{ furtherDetails }}</dd>
            </dl>
          </td>
          <td>
            ${{ discount(price) }}
            <s class="small text-muted" v-if="price !== discount(price)">${{ price }}</s>
          </td>
          <td width="65">
            <input @focus="$event.target.select()" @input="productQty = positive(productQty)"
                   class="form-control"
                   type="text"
                   v-model="productQty">
          </td>
          <td>
            <h4>
              ${{ price }}
            </h4>

            <div style="padding-top: 30px">
              <button @click="updateItem" class="btn btn-primary btn-sm pull-right"><i
                class="fa fa fa-refresh" style="width: 15px"></i> Update
              </button>

              <button @click="removeItem" class="btn btn-danger btn-sm pull-right"
                      style="margin-top: 10px"><i
                class="fa fa fa-trash"></i> Remove
              </button>
            </div>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';
  import toast from '../services/toast';

  export default {
    mounted() {
      this.getDetails();
    },
    props: ['details'],
    data() {
      return {
        description: null,
        furtherDetails: null,
        price: null,
        priceWithDiscount: null,
        product: null,
        productQty: 1,
        taxable: null
      };
    },
    methods: {
      getDetails() {
        axios.get('/api/v1/product/' + this.details.id)
          .then((response) => {
            this.product = this.details.name;
            this.price = this.details.price;
            this.description = response.data.description;
            this.furtherDetails = response.data.furtherDetails;
            this.priceWithDiscount = response.data.priceWithDiscount;
            this.taxable = response.data.taxable;
          })
          .catch(function (error) {
          });
      },
      removeItem() { // todo
        axios.delete('/api/v1/cart/product/' + this.details.id + '/remove')
          .then((response) => {
            // todo
            console.log(response)
          })
          .catch(function (error) {
            console.error(error)
          });
      },
      updateItem() {
        axios.patch('/api/v1/cart', { // todo
          id: this.details.id,
          quantity: this.productQty
        })
          .then((response) => {
            // update item qty
            console.log(response)
            // console.error('Updated item #' + this.details.id + ' qty.')
          })
          .catch(function (error) {
            console.error(error)
          });
      },
      discount(price) { // todo
        return price;
      },
      positive(value) {
        if (Math.sign(value) === 0 || Math.sign(value) === 1) {
          return value;
        } else {
          toast.error('Please input a positive integer.', 'Unsigned Integer');
        }
      }
    }
  }
</script>

<style scoped>
  @import url('https://fonts.googleapis.com/css?family=Fira+Sans:300i|Rokkitt:300,400,500,600,700');

  body {
    margin-top: 20px;
    background: #eee;
  }

  h3 {
    font-size: 16px;
  }

  .text-navy {
    color: #1ab394;
  }

  .product {
    float: left;
    text-transform: uppercase;
    font-size: 16px;
    font-family: 'Rokkitt', serif;
    font-weight: 600;
  }

  .description {
    float: left;
    font-size: 14px;
    font-family: 'Fira Sans', sans-serif;
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
    color: inherit;
    border-top: 1px solid #e7eaec;
    font-size: 90%;
    background: #ffffff;
    padding: 10px 15px;
  }
</style>
