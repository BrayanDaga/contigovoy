<link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap4.min.css">

<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>

<f3:check if="{{ @SESSION.user.role  == 'doctor' ||  @SESSION.user.role  == 'admin'  }}">
    <script>
        let table = $('#myTable').DataTable({
            responsive: true,
            processing: true,
            ajax: {
                url: '/citaslist',
                dataSrc: 'data'
            },
            columns: [{
                    data: 'id',
                },
                {
                    data: 'doctor'
                },
                {
                    data: 'patient'
                },
                {
                    data: 'day'
                },
                {
                    data: 'hour'
                },
                {
                    render: (d, t, f, m) => {
                        if (f.status == 'pendiente') {
                            r = `<span class="badge badge-warning">${f.status}</span>`;
                        } else if (f.status == 'aceptado') {
                            r = `<span class="badge badge-success">${f.status}</span>`;
                        } else {
                            r = `<span class="badge badge-warning">${f.status}</span>`;
                        }
                        return r;
                    }
                },

                {
                    render: (d, t, f, m) => {
                        if(f.status == 'aceptado'){
                            r = "No accion";
                        }else{
                            r = `
                        <button class="btn btn-sm btn-success" onclick="accept(${f.id})">Aceptar</button>
                        <button class="btn btn-sm btn-danger" onclick="deny(${f.id})">Negar</button>
                        `;
                        }
                        return r;
                    }
                }

            ],


        });
        function accept(id) {
            $.ajax({
                url: '/acceptappointment/' + id,
                type: 'PUT',
                success: function() {
                    table.ajax.reload();
                }
            });
        }
        function deny(id) {
            $.ajax({
                url: '/denyappointment/' + id,
                type: 'DELETE',
         
                success: function() {
                    table.ajax.reload();
                }
            });
        }

        
        setInterval(function() {
            table.ajax.reload(null, false); // user paging is not reset on reload
        }, 30000);
    </script>
</f3:check>


<f3:check if="{{ @SESSION.user.role  == 'paciente'  }}">
    <script>
        let table = $('#myTable').DataTable({
            ajax: {
                url: '/citaslist',
                dataSrc: 'data'
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'doctor'
                },
                {
                    data: 'patient'
                },
                {
                    data: 'day'
                },
                {
                    data: 'hour'
                },
                {
                    render: (d, t, f, m) => {
                        if (f.status == 'pendiente') {
                            r = `<span class="badge badge-warning">${f.status}</span>`;
                        } else if (f.status == 'aceptado') {
                            r = `<span class="badge badge-success">${f.status}</span>`;
                        } else {
                            r = `<span class="badge badge-warning">${f.status}</span>`;
                        }
                        return r;
                    }
                },

            ],


        });
        
        setInterval(function() {
            table.ajax.reload(null, false); // user paging is not reset on reload
        }, 30000);
    </script>
</f3:check>