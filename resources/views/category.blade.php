<!DOCTYPE html>
<html lang="en">
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('css')
    <style type="text/css">
        .div_center{
          text-align:center;
          padding-top:40px;
        }
         .font_size{
         font-size:40px;
         padding-bottom:40px;
       }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
    @include('sidebar')
      <!-- partial -->
    @include('header')
        <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="div_center">
                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Category</a>
                <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Code</th>
                    <th scope="col">Category Description</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($cat as $key=>$cat)
                  <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $cat->category_name}}</td>
                    <td>{{ $cat->category_code}}</td>
                    <td>{{ $cat->category_description}}</td>
                    <td>
                    <a href="" class="btn btn-success updatecategory" data-bs-toggle="modal" data-bs-target="#updateModal"
                    
                       data-id="{{ $cat->id }}"
                       data-name="{{ $cat->category_name }}"
                       data-code= "{{ $cat->category_code}}"
                       data-des="{{ $cat->category_description }}"     
                    >
                       Update Category
                    </a>
                      
                    <a href="" class="btn btn-danger delete_product"
                      data-id="{{ $cat->id }}"
                      >
                     Delete
                    </a>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
 
    @include('script')
    @include('category_description')
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>

        $.ajaxSetup({
              headers: {
                  'X-csrf-token': $('meta[name="csrf-token"]').attr('content')
              }
        });

    </script>

    <script>
      $(document).ready(function(){
        $(document).on('click','.addcat',function(e){
          e.preventDefault();
          
          let name=$('#cname').val();
          let code=$('#ccode').val();
          let des=$('#cdes').val();
          console.log(name,code,des, $('meta[name="csrf-token"]').attr('content'));
          
          $.ajax({
           url:"{{ url('add_category') }}",
           method:'post',
           data:{name:name,code:code,des:des},
           success:function(res){
              if(res.status=='success'){
                  $('#exampleModal').modal('hide');//modal e data nie nebar por seta auto sore jabe
                  $('#addcategoryform')[0].reset();//moda e data ta debar por erpor e jokhn abar data dibo ager record jate clr hoe jae
                  $('.table').load(location.href+' .table');//modal thke data ta deoar sathe sathe jeno form e save hoe jae
              }

           },error:function(err){
              let error=err.responseJSON;
              $.each(error.errors,function(index,value){
                   $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');//kono field e data na dile warn msg show korbe
              });
           }

          });
         })







         //Show product on update form

         $(document).on('click','.updatecategory',function(){
          
            let id=$(this).data('id');
            let name=$(this).data('name');
            let code=$(this).data('code');
            let des=$(this).data('des');
         
            $('#up_id').val(id);
            $('#upcname').val(name);
            $('#upccode').val(code);
            $('#upcdes').val(des);
         
           // console.log(id,name,code,des);
         })

         
         
         //update er kaj
         $(document).on('click','.updatecat',function(e){
          e.preventDefault();
          
          let up_name=$('#upcname').val();
          let up_code=$('#upccode').val();
          let up_des=$('#upcdes').val();
          let up_id=$('#up_id').val();
          console.log(up_name,up_code,up_des,up_id);
         
        
          $.ajax({
           url:"{{ url('updatecategory') }}",
           method:'post',
           data:{up_name:up_name,up_code:up_code,up_des:up_des},
           success:function(res){
              if(res.status=='success'){
                  $('#updateModal').modal('hide');//modal e data nie nebar por seta auto sore jabe
                  $('#updatecategoryform')[0].reset();//moda e data ta debar por erpor e jokhn abar data dibo ager record jate clr hoe jae
                  $('.table').load(location.href+' .table');//modal thke data ta deoar sathe sathe jeno form e save hoe jae
              }

           },error:function(err){
              let error=err.responseJSON;
              $.each(error.errors,function(index,value){
                   $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');//kono field e data na dile warn msg show korbe
              });
           }

          });
         })

        
         //Delete
         $(document).on('click','.delete_product',function(e){
          e.preventDefault();
          let product_id=$(this).data('id');
        // console.log(product_id);

          if(confirm('Are you sure to delete?')){
           $.ajax({
           url:"{{ url('deletecategory') }}",
           method:'post',
           data:{product_id:product_id},
           success:function(res){
              if(res.status=='success'){
                  $('.table').load(location.href+' .table');//modal thke data ta deoar sathe sathe jeno form e save hoe jae
              }
            }
           });
         }          
      })


      });
    </script>
    @include('updatecategory')
  </body>
</html>