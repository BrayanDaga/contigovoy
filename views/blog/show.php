    <!-- Page Content -->
    <div class="container-fluid">
        <h1 class="page-header text-center text-primary font-weight-bold">BLOG</h1>
        <hr>
        <div data-cy="blogNewsCards" class="m-auto col-lg-10 mt-lg-n10">
            <section class="card mb-5 shadow ">
                <div class="card-body p-5">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 d-none d-lg-block "><img class="img-fluid " src="https://picsum.photos/350/300" alt="undefined"></div>
                        <div class="ml-3">
                            <div class="mb-3">
                                <h2 class="mb-0"><span class="text-danger">{{ @blog->title  }}</span></h2>
                                <div class="small text-muted mb-2">{{ @blog->created_at  }}</div>
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