@extends('core.base')


@section('content')
  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Checkout form</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">


          <!--Card-->
          <div class="">

            <!--Card content-->
            <form  action="{{route('storeAddress')}}" method="post">
                @csrf

              <!--Grid row-->

              <div class="row mb-3">
                    @foreach ($address as $add)
                        <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>{{$add->name}}</h3>
                                        <p>{{$add->contact}}, {{$add->area}}, {{$add->street}} <br>{{ $add->city}} ({{ $add->state}}) -  {{$add->pincode}}</p>
                                    </div>
                                    <div class="card-footer">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="saveAddress" value="{{$add->id}}" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Select This Address
                                        </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    </div>


              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" id="firstName" name="name" class="form-control">
                    <label for="firstName" class="">full Name</label>
                    @error('name')
                            <p class="small text-danger">{{$message}}</p>
                    @enderror
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" id="contact" name="contact" class="form-control">
                    <label for="contact" class="">Contact</label>
                    @error('contact')
                            <p class="small text-danger">{{$message}}</p>
                    @enderror
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

              <!--Username-->
              <div class="md-form input-group pl-0 mb-5">
                <input type="text" class="form-control" id="area" name="area">
                <label for="area" class="">Area</label>
                @error('area')
                            <p class="small text-danger">{{$message}}</p>
                    @enderror
              </div>

              <!--email-->
              <div class="md-form mb-5">
                <input type="text" id="street" name="street" class="form-control">
                <label for="street" class="">street</label>
                @error('street')
                            <p class="small text-danger">{{$message}}</p>
                    @enderror
              </div>

              <!--address-->
              <div class="md-form mb-5">
                <input type="text" id="city" name="city" class="form-control">
                <label for="city" class="">city</label>
                @error('city')
                            <p class="small text-danger">{{$message}}</p>
                    @enderror
              </div>
              <!--Grid row-->
              <div class="row">

                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                  <label for="state">State</label>
                  <select class="custom-select d-block w-100" name="state" id="state">
                    <option value="">Choose...</option>
                    <option>Bihar</option>
                  </select>
                  @error('state')
                            <p class="small text-danger">{{$message}}</p>
                    @enderror

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                  <label for="pin">Pincode</label>
                  <input type="text" class="form-control" name="pincode" id="pin" placeholder="">
                  @error('pincode')
                            <p class="small text-danger">{{$message}}</p>
                    @enderror

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="credit" name="type" value="home" type="radio" class="custom-control-input" checked>
                  <label class="custom-control-label" for="credit">Home</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="debit" name="type" type="radio" value="office" class="custom-control-input">
                  <label class="custom-control-label" for="debit">Office</label>
                </div>

              </div>

              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>

            </form>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Second product</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">-$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>
          <!-- Cart -->


        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->

@endsection
