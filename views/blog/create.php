    <div class="container">
        <p class="page-header h1 text-primary text-cenmter">Crear Post</p>
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
        {* form multipart data enctype files  *}
        <form action="{{ @BASE }}/blog/create" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="title">Titulo</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Titulo" value="{{ @POST.title }}">
                    </div>
                    <div class="col-6">
                        {* form group file image *}
                        <label for="image">Imagen</label>
                        <div class="custom-file">
                            <input type="file" name="myfile">
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea id="editor" name="body">{{ @POST.body | raw  }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>