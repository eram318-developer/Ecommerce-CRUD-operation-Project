<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
    @include('sidebar')
      <!-- partial -->
    @include('header')
    <div class="main-panel">
        <div class="content-wrapper">
            <h1>Add Product</h1>
    <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Title</label>
            <input type="text" name="title" placeholder="Write title" required="">
        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description" placeholder="Write title" required="">
        </div>
        <div>
            <label for="">Price</label>
            <input type="number" name="price" placeholder="Write title" required="">
        </div>
        <div>
            <label for="">Quantity</label>
            <input type="number" name="quantity" placeholder="Write title" required="">
        </div>
        <div>
            <label for="">Discount Price</label>
            <input type="number" name="dprice" placeholder="Write title" required="">
        </div>
        <div>
        <label for="">Category</label>
            <input type="text" name="category" placeholder="Write title" required="">
        </div>
        <div>
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
        <!-- partial --> 
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('script')
    <!-- End custom js for this page -->
  </body>
</html>