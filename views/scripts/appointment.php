<link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.3.7/css/autoFill.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.3.7/js/dataTables.autoFill.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.3.7/js/autoFill.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap4.min.js"></script>
<script>
// $('#myTable').DataTable( {
//     ajax: ...
// } );
 
// or!
 
$('#myTable').DataTable( {
    ajax: {
        url: '/citaslist',
        dataSrc: 'data'
    },
        columns: [
        { data: 'id' },
        { data: 'name' },
        { data: 'day' },
        { data: 'hour' },
        { data: 'status' }

    ]
    
} );
</script>