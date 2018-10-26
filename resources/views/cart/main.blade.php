@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
        <div class="col-md-12">
          <div class="ibox">
            <div class="ibox-title">
              <span class="pull-right">(<strong>2</strong>) items</span>
              <h5>Cart</h5>
            </div>
            <div class="ibox-content">
              <div class="table-responsive">
                <table class="table shoping-cart-table">
                  <tbody>
                  <tr>
                    <td width="90">
                      <div class="cart-product-imitation">
                      </div>
                    </td>
                    <td class="desc">
                      <h3>
                        <a href="#" class="text-navy">
                          Desktop publishing software
                        </a>
                      </h3>
                      <p class="small">
                        It is a long established fact that a reader will be distracted by the
                        readable
                        content of a page when looking at its layout. The point of using Lorem
                        Ipsum is
                      </p>
                      <dl class="small m-b-none">
                        <dt>Description lists</dt>
                        <dd>A description list is perfect for defining terms.</dd>
                      </dl>
                      <div class="m-t-sm">
                        <a href="#" class="text-muted"><i class="fa fa-trash"></i> Remove
                          item</a>
                      </div>
                    </td>
                    <td>
                      $180.00
                      <s class="small text-muted">$230.00</s>
                    </td>
                    <td width="65">
                      <input type="text" class="form-control" placeholder="1">
                    </td>
                    <td>
                      <h4>
                        $180.00
                      </h4>

                      <div style="padding-top: 15px">
                        <button class="btn btn-primary btn-sm pull-right"><i
                            class="fa fa fa-refresh"></i> Update
                      </div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="ibox-content">
              <div class="table-responsive">
                <table class="table shoping-cart-table">
                  <tbody>
                  <tr>
                    <td width="90">
                      <div class="cart-product-imitation">
                      </div>
                    </td>
                    <td class="desc">
                      <h3>
                        <a href="#" class="text-navy">
                          Desktop publishing software
                        </a>
                      </h3>
                      <p class="small">
                        It is a long established fact that a reader will be distracted by the
                        readable
                        content of a page when looking at its layout. The point of using Lorem
                        Ipsum is
                      </p>
                      <dl class="small m-b-none">
                        <dt>Description lists</dt>
                        <dd>A description list is perfect for defining terms.</dd>
                      </dl>
                      <div class="m-t-sm">
                        <a href="#" class="text-muted"><i class="fa fa-trash"></i> Remove
                          item</a>
                      </div>
                    </td>
                    <td>
                      $180.00
                      <s class="small text-muted">$230.00</s>
                    </td>
                    <td width="65">
                      <input type="text" class="form-control" placeholder="1">
                    </td>
                    <td>
                      <h4>
                        $180.00
                      </h4>

                      <div style="padding-top: 15px">
                        <button class="btn btn-primary btn-sm pull-right"><i
                            class="fa fa fa-refresh"></i> Update
                      </div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="ibox-content">
              <button class="btn btn-primary pull-right"><i class="fa fa fa-shopping-cart"></i> Checkout
              </button>
              <button class="btn btn-white" onclick="window.history.back()"><i
                  class="fa fa-arrow-left"></i> Back to the main site
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-12" style="padding-top: 50px">
          <div class="ibox" style="text-align: center; padding: 5px">
            <div class="font-weight-bold ibox-title">
              <h4>Cart Summary</h4>
            </div>
            <div class="ibox-content" style="float: right">
                    <span>
                        Total
                    </span>
              <h2 class="font-bold">
                $390.00
              </h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('styles')
  <style>
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

    table.shoping-cart-table {
      margin-bottom: 0;
    }

    table.shoping-cart-table tr td {
      border: none;
      text-align: right;
    }

    table.shoping-cart-table tr td.desc.
    table.shoping-cart-table tr td:first-child {
      text-align: left;
    }

    table.shoping-cart-table tr td:last-child {
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
@endsection