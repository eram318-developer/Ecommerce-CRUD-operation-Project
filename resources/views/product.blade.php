<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('css')
    <style type="text/css">
       .add_product{
           text-align:center;
          padding-top:40px;
       }

       .font_size{
         font-size:40px;
         padding-bottom:40px;
       }
       .text_color{
        color:black;
        padding-bottom:20px;
       }
       label{
        display:inline-block;
        width:200px;
       }
       .div_design{
         padding-bottom:15px;
       }
       .div_designimage{
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


          <div class="add_product">
            <h1 class="font_size">Add Product</h1>

    <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="div_design">
            <label for="">Title</label>
            <input type="text" name="title" placeholder="Write title" required="" class="text_color">
        </div>
        <div class="div_design">
            <label for="">Description</label>
            <input type="text" name="description" placeholder="Write title" required="">
        </div>
        <div class="div_design">
            <label for="">Price</label>
            <input type="number" name="price" placeholder="Write title" required="">
        </div>
        <div class="div_design">
            <label for="">Quantity</label>
            <input type="number" name="quantity" placeholder="Write title" required="">
        </div>
        <div class="div_design">
            <label for="">Discount Price</label>
            <input type="number" name="dprice" placeholder="Write title" required="">
        </div>
        <div class="div_design">
        <label for="">Category</label>
        <select name="category_id" id="">
            @foreach($category as $category)
              <option value="{{ $category->id }}" selected="">
                {{$category->category_name}}
              </option>
            @endforeach
        </select>
        </div>
        <div class="div_designimage">
            <label for="">Image</label>
            <input type="file" name="image" placeholder="Write title" required="">
        </div>

        <div class="div-design">
           <input type="submit" value="Add Product" class="btn btn-primary">
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
