<div class="modal fade" id="usermodal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adding or Updating User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>

            <form id="addform" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- Username -->
                    <div class="form-group">
                        <label>Username:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light">
                                    <i class="fa-solid fa-user text-info"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" id="username" name="username">

                        </div>
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <label>Email:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light">
                                    <i class="fa-solid fa-envelope text-info"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" id="email" name="email">

                        </div>
                    </div>

                    <!-- Mobile No. -->
                    <div class="form-group">
                        <label>Mobile No.:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light">
                                    <i class="fa-solid fa-phone text-info"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required" id="mobile" name="mobile" maxlength="10" minlength="10">


                        </div>
                    </div>

                    <!-- Profile pic -->
                    <div class="form-group">
                        <label>User Photo:</label>
                        <div class="input-group">
                            <label for="userphoto" class="custom-file-label">Choose File</label>
                            <input type="file" class="custom-file-input" name="photo" id="userphoto" accept="image/*">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Save changes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <!-- 2 input fields for adding, updating, deleting, and viewing profile -->
                    <input type="hidden" name= "action" value="adduser">
                    <input type="hidden" name="userId" id="userId" value="">
                </div>
            </form>
        </div>
    </div>
</div>

