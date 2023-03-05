<!-- Add Product Button related modal ta ekhane lekha ase -->


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<form action="" method="post" id="addcategoryform">
  @csrf
   <div class="modal-dialog">
       <div class="modal-content">
       <div class="modal-header">
           <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
<div class="modal-body">
<div class="errMsgContainer">

</div> 
   <div class="form-group">
       <label for="name">Category Name</label>
       <input type="text" class="form-control" id="cname" name="cname" placeholder="Add Category">
  </div>

 <div class="form-group">
       <label for="description">Category Code</label>
       <input type="text" class="form-control" id="ccode" name="ccode" placeholder="Add Code">
 </div>

 <div class="form-group">
       <label for="exampleFormControlTextarea1" class="form-label">Category Description</label>
       <textarea class="form-control" id="cdes" name="cdes" rows="3"></textarea>
       <!-- <input type="text" class="form-control" id="cdes" name="cdes" placeholder="Add Description" rows="3"> -->
</div>
</div>
       <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary addcat">Save changes</button>
       </div>
     </div>
  </div>
</form>
</div>