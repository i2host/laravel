@extends('interface.main')

@section('main_content')

<div class="row">

    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-primary text-center">
          <strong>Laravel 5 With Stripe Subscription Demo</strong>
        </h1>
    </div>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default credit-card-box">
        <div class="panel-heading display-table" >
            <div class="row display-tr" >
                <h3 class="panel-title display-td" >Payment Details Form</h3>
                <div class="display-td" >                            
                    <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                </div>
            </div>                    
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <form action="{{ route('subscriptions-order') }}" data-parsley-validate method="post" id="payment-form">
                @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                  <button type="button" class="close" data-dismiss="alert">×</button> 

                        <strong>{{ $message }}</strong>

                </div>

                @endif

                <div class="form-group" id="product-group">
                    <lable>Select Plan:</lable>
                    <select name="plane" data-parsley-class-handler="#product-group" required class="form-control">
                        <option value="small">Monthly (9.99$)</option>
                        <option value="large">Yearly (59.88$)</option>
                    </select>
                </div>

                <div class="form-group" id="cc-group">
                    <lable>Credit card number:</lable>
                    <input type="text" required class="form-control" maxlength="16" data-stripe="number" data-parsley-type="number" data-parsley-trigger="change focusout" data-parsley-class-handler="#cc-group">
                </div>

                <div class="form-group" id="ccv-group">
                    <label>CVC (3 or 4 digit number):</label>
                    <input type="text" required class="form-control" maxlength="4" data-stripe="cvc" data-parsley-type="number" data-parsley-trigger="change focusout" data-parsley-class-handler="#ccv-group">
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group" id="exp-m-group">
                        <lable>Ex. Month</lable>
                        <select required data-stripe="exp-month" class="form-control">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group" id="exp-y-group">
                        <lable>Ex. Year</lable>
                        <select required data-stripe="exp-year" class="form-control">
                            <option value="2017">2017</option>
                            <option value="2017">2018</option>
                            <option value="2017">2019</option>
                            <option value="2017">2020</option>
                            <option value="2017">2021</option>
                            <option value="2017">2022</option>
                            <option value="2017">2023</option>
                            <option value="2017">2024</option>
                            <option value="2017">2025</option>
                            <option value="2017">2026</option>
                            <option value="2017">2027</option>
                        </select>
                    </div>
                  </div>
                </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-block btn-primary btn-order" id="submitBtn">Place order!</button>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <span class="payment-errors" style="color: red;margin-top:10px;"></span>
                    </div>
                  </div>
                  {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
  </div>

</div>

@stop