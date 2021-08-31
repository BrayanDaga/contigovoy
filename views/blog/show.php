    <!-- Page Content -->
    <div class="container-fluid">
        <h1 class="page-header text-center text-primary font-weight-bold">BLOG</h1>
        <hr>
        <div data-cy="blogNewsCards" class="m-auto col-lg-10 mt-lg-n10">
            <section class="card mb-5 shadow ">
                <div class="card-body p-5">
   
                    <div class="row">
                        <div class="ml-3">
                            <div class="mb-3">
                                <h2 class="mb-0"><span class="text-danger">{{ @blog->title  }}</span></h2>
                                
                                <div class="small text-muted mb-2">Publicado el : {{ @blog->created_at  }}</div>
                                <div class="text-center col-12">
                                    <img class="img-fluid" src="{{ @BASE }}/{{ @blog->image }}" alt="{{ @blog->title }}">
                                </div>
                                <div class="mb-3">
                                    <!-- <a class="badge text-primary text-capitalize">news</a>
                                    <a class="badge text-primary text-capitalize">forms</a> -->
                                </div>
                            </div>
                            <div>
                                {{ @blog->body  | raw }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>