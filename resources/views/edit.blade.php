<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('css')
    <style class="text/css">
        .update_product{
           text-align:center;
          padding-top:40px;
       }
       .font_size{
         font-size:40px;
         padding-bottom:40px;
       }
       label{
        display:inline-block;
        width:200px;
       }
       .div_design{
         padding-bottom:15px;
       }
       .div_designimage{
        padding-right:98px;
        padding-bottom:15px;
       }
       .div_designcimage{
         padding-bottom:15px;
         padding-left:144px;
    
       }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
    @include('sidebar')
      <!-- partial -->
    @include('header')
    <div class="main-panel">
        <div class="content-wrapper">
        @if(session()->has('success'))
           <div class="alert alert-success">
              {{ session('success') }}
           </div>
        @endif
        <div class="update_product">
            <h1 class="font_size">Update Product</h1>
    <form action="{{ url('/update_product',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="div_design">
            <label for="">Title</label>
            <input type="text" name="title" placeholder="Write title" required="" value="{{ $product->name }}">
        </div>
        <div class="div_design">
            <label for="">Description</label>
            <input type="text" name="description" placeholder="Write title" required="" value="{{ $product->description }}">
        </div>
        <div class="div_design">
            <label for="">Price</label>
            <input type="number" name="price" placeholder="Write title" required="" value="{{ $product->price }}">
        </div>
        <div class="div_design">
            <label for="">Quantity</label>
            <input type="number" name="quantity" placeholder="Write title" required="" value="{{ $product->quantity }}">
        </div>
        <div class="div_design">
            <label for="">Discount Price</label>
            <input type="number" name="dprice" placeholder="Write title" required="" value="{{ $product->discount_price }}">
        </div>
        <div class="div_design">
        <label for="">Category</label>
            <input type="text" name="category" placeholder="Write title" required="" value="{{ $product->catagory }}">
        </div>
        
        <div class="div_designimage">
            <label for="">Current Image</label>
            <!-- <input type="file" name="image" placeholder="Write title" required="" value="{{ $product->image }}"> -->
            <img src="/product/{{ $product->image }}" alt="" style="margin:auto;"height="100" width="100">
        </div>

        <div class="div_designcimage">
            <label for="">Change Product Image</label>
            <input type="file" name="image" placeholder="Write title"  value="{{ $product->image }}">
        </div>

        <div class="div-design">
           <input type="submit" value="Update Product" class="btn btn-primary">
        </div>
        </form>
        </div>
     </div>
  </div>
</div>
        <!-- partial --> 
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('script')
    <!-- End custom js for this page -->
  </body>
</html>