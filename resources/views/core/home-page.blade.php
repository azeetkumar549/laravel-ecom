@extends('core.base')


@section('content')
<div id="carousel-example-1z" class="carousel slide carousel-fade pt-4" data-ride="carousel">

  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">
      <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%282%29.jpg'); background-repeat: no-repeat; background-size: cover;">
      </div>
    </div>
    <!--/First slide-->

    <!--Second slide-->
    <div class="carousel-item">
      <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%283%29.jpg'); background-repeat: no-repeat; background-size: cover;">


      </div>
    </div>
    <!--/Second slide-->

    <!--Third slide-->
    <div class="carousel-item">
      <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%285%29.jpg'); background-repeat: no-repeat; background-size: cover;">
      </div>
    </div>
    <!--/Third slide-->

  </div>
  <!--/.Slides-->

  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->

</div>
<!--/.Carousel Wrapper-->

<!--Main layout-->
<main>
  <div class="container">

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark lighten-3 mt-3 mb-5">

      <!-- Navbar brand -->
      <span class="navbar-brand">Categories:</span>

      <!-- Collapse button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
          @foreach ($categories as $cat)
            <li class="nav-item">
              <a class="nav-link" href="#">{{$cat->cat_title}}</a>
            </li>
          @endforeach
        </ul>
        <!-- Links -->

        <form class="form-inline" action="{{route('search')}}">
          <div class="md-form my-0">
            <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" aria-label="Search">
            <input type="submit" class="btn btn-success">
          </div>
        </form>
      </div>
      <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->

    <!--Section: Products v.3-->
    <section class="text-center mb-4">

      <!--Grid row-->
      <div class="row wow fadeIn">
        <!--Grid column-->
        @foreach ($products as $item)
            
       
        <div class="col-lg-3 col-md-6 mb-4">
           <div class="card">
            <div class="view overlay">
              <img src="{{asset("products/$item->img1")}}" class="card-img-top" style="object-fit:contain;height:250px"  alt="">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
           <div class="card-body text-center">
              <a href="{{route('view',['id'=>$item->id])}}" class="grey-text">
                <h5>{{$item->title}}</h5>
              </a>
              <h5>
                <strong>
                  <a href="" class="dark-grey-text">{{$item->category->cat_title}}
                  </a>
                </strong>
              </h5>

              <h4 class="font-weight-bold blue-text">
                <strong>₹{{$item->discount_price}} <del class="small text-muted">₹{{$item->price}}</del></strong>
              </h4>

            </div>
          
          </div>
          <!--Card-->

        </div>
        @endforeach
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!--Section: Products v.3-->

    <!--Pagination-->
    <nav class="d-flex justify-content-center wow fadeIn">
      <ul class="pagination pg-blue">

        <!--Arrow left-->
        <li class="page-item disabled">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>

        <li class="page-item active">
          <a class="page-link" href="#">1
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">4</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">5</a>
        </li>

        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>
    <!--Pagination-->

  </div>
</main>
@endsection