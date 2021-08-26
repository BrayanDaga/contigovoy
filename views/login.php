<div class="d-flex d-column justify-content-center" style="height:90vh; background: linear-gradient(273deg, rgba(45,221,45,1) 8%, rgba(172,128,254,1) 48%, rgba(246,177,66,1) 92%);">
    <div class="login-form  card rounded align-self-center p-3">
        <form action="login" method="POST" autocomplete="off">
            <div class="card-header">
                <h2 class="text-center">Log in</h2>
                <f3:check if="{{ @message  }}">
                    <div class="container">
                        <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                            {{ @message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </f3:check>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username"  name="userID" id="userID" value="{{ @POST.userID }}">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password"required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Log in</button>
                </div>
            </div>
        </form>
        <!-- <p class="text-center"><a href="#">Create an Account</a></p> -->
    </div>