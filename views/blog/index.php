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
            <section class="card mb-5 shadow ">
                <div class="card-body p-5">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 d-none d-lg-block "><img class="img-fluid " src="https://picsum.photos/350/300" alt="undefined"></div>
                        <div class="ml-3">
                            <div class="mb-3">
                                <h2 class="mb-0"><a href="#" class="text-danger">TÍTULO DEL ARTÍCULO DEL BLOG</a></h2>
                                <!-- <div class="small text-muted mb-2">July 18, 2021</div> -->
                                <div class="mb-3">
                                    <!-- <a class="badge text-primary text-capitalize">news</a>
                                    <a class="badge text-primary text-capitalize">forms</a> -->
                                </div>
                            </div>
                            <div>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti earum corrupti sapiente amet tempora est quae, deserunt quasi eligendi, impedit repudiandae temporibus illo molestias possimus commodi iusto! Nihil, totam hic!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end section -->
                   
            <!-- Section de prueba eliminar cuando ya tengan con base de datos -->
            <section class="card mb-5 shadow ">
                <div class="card-body p-5">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 d-none d-lg-block "><img class="img-fluid " src="https://picsum.photos/350/300" alt="undefined"></div>
                        <div class="ml-3">
                            <div class="mb-3">
                                <h2 class="mb-0"><a href="#" class="text-danger">Titulo del Blog</a></h2>
                                <!-- <div class="small text-muted mb-2">July 18, 2021</div> -->
                                <div class="mb-3">
                                    <!-- <a class="badge text-primary text-capitalize">news</a>
                                    <a class="badge text-primary text-capitalize">forms</a> -->
                                </div>
                            </div>
                            <div>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti earum corrupti sapiente amet tempora est quae, deserunt quasi eligendi, impedit repudiandae temporibus illo molestias possimus commodi iusto! Nihil, totam hic!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end section -->

            <repeat group="{{ @blogs }}" value="{{ @blog }}">  <!-- Hace un bucle igual a foreach  --> 
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
           
                                            <form id="delete-form" action="{{ @BASE }}/blog/{{ @blog->slug }}/delete" method="POST" class="d-inline" >
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
        </div>
    </div>