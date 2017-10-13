jQuery(document).ready(function () {

    "use strict";

    /*--------------------------------------------
    		Editable Datatable Settings
    ---------------------------------------------*/

    $('#editable-datatable').DataTable({
        columnDefs: [{
            orderable: false,
            className: 'select-checkbox',
            targets: 0
        }],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
        order: [[1, 'asc']],
        scrollX: true,
    });

    var table = $('#basic_datatable').DataTable();
    $('#basic_datatable tbody').on('click', 'tr', function () {
        var data = table.row(this).data();
    });

    $('#exportable-data-table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print'
        ]
    });
});
