    <div class="container">
        <p class="page-header h1 text-primary text-cenmter">Crear Post</p>
        <form action="{{ @BASE }}/blog/create" method="POST">
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                    <label for="title">Titulo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titulo" value="{{ @POST.title }}">
                    </div>
                    <div class="col-6">
                    <label for="title">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="slug">
                    </div>
                </div>
               
            </div>
            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea id="editor" name="body"></textarea>
            </div>  
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
