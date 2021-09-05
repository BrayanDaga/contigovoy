    <!-- Page Content -->
    <div class="container-fluid">
        <h1 class="page-header text-center text-primary font-weight-bold">BLOG</h1>
        <f3:check if="{{ @SESSION.user  }}">

            <div class="row">
                <div class="col-12">
                    <a href="{{ @BASE }}/blog/create" class="text-center d-block"> <span class="badge badge-secondary">Agergar Nuevo</span></a>
                </div>
            </div>
        </f3:check>
        <hr>
        <div data-cy="blogNewsCards" class="m-auto col-lg-10 mt-lg-n10">

            <!-- Section de prueba eliminar cuando ya tengan con base de datos -->
          
            <!-- end section -->

            <!-- Section de prueba eliminar cuando ya tengan con base de datos -->
          
            <!-- end section -->
            <repeat group="{{ @blogs.subset  }}" value="{{ @blog }}">
                <!-- Hace un bucle igual a foreach  -->
                <section class="card mb-5 shadow ">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-4">
                                <img class="img-fluid " src="{{ @BASE }}/{{ @blog->image }}" alt="undefined">
                            </div>
                            <div class="col-8">
                                <div class="mb-3">
                                    <div>
                                        <h2 class="mb-0 d-inline"><a href="{{ @BASE }}/blog/{{@blog->slug}}" class="text-danger">{{ @blog->title }}</a></h2>

                                        <check if="{{  @SESSION.user}}">
                                            <a href="{{ @BASE }}/blog/{{@blog->slug}}/edit"> <span class="badge badge-secondary">Editar</span></a>

                                            <form id="delete-form" action="{{ @BASE }}/blog/{{ @blog->slug }}/delete" method="POST" class="d-inline">
                                                <button type="submit" class="badge badge-danger">Borrar</button>
                                            </form>
                                        </check>
                                    </div>

                                    <div class="small text-muted mb-2">{{ @blog->created_at }}</div>
                                    <div class="mb-3">
                                        {{ @blog->excerpt | raw }}
                                    </div>
                                </div>

                            </div>
                </section>

            </repeat>

            <b>Page <b>{{ @blogs.pos + 1}}</b> of <b>{{ round(@blogs.total / @blogs.limit) }}</b>
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item   {{ @blogs.pos  == 0  ?  'disabled' : ''  }} ">
                            <a class="page-link" href="{{ @BASE }}/blog?p={{ $_GET['p'] -1  ?? 1 }}" tabindex="-1">Previous</a>
                        </li>
                        <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                        <li class="page-item">
                            <a class="page-link"  href="{{ @BASE }}/blog?p={{ $_GET['p'] + 1 }}">Next</a>
                        </li>
                    </ul>
                </nav>
        </div>
    </div>