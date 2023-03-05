<!-- Add Product Button related modal ta ekhane lekha ase -->


<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">

<form action="" method="post" id="updatecategoryform">
  @csrf
  <input type="hidden" id="up_id">
   <div class="modal-dialog">
       <div class="modal-content">
       <div class="modal-header">
           <h1 class="modal-title fs-5" id="updateModalLabel">Update Product</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
<div class="modal-body">
<div class="errMsgContainer">

</div> 
   <div class="form-group">
       <label for="name">Category Name</label>
       <input type="text" class="form-control" id="upcname" name="upcname" placeholder="Add Category">
  </div>

 <div class="form-group">
       <label for="description">Category Code</label>
       <input type="text" class="form-control" id="upccode" name="upccode" placeholder="Add Code">
 </div>

 <div class="form-group">
       <label for="exampleFormControlTextarea1" class="form-label">Category Description</label>
       <textarea class="form-control" id="upcdes" name="upcdes" rows="3"></textarea>
       <!-- <input type="text" class="form-control" id="cdes" name="cdes" placeholder="Add Description" rows="3"> -->
</div>
</div>
       <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary updatecat">Update</button>
       </div>
     </div>
  </div>
</form>
</div>