// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable({
        info: true,
        ordering: true,
        paging: true
    });
});

// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTableShowEvent').DataTable({
        info: false,
        ordering: false,
        paging: false,
        searching: false,
    });

});

// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTableShowCrew').DataTable({
        info: false,
        ordering: false,
        paging: false,
        searching: false
    });

});

// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTableSurabaya').DataTable({
        info: true,
        ordering: true,
        paging: true
    });
});

// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTableBali').DataTable({
        info: true,
        ordering: true,
        paging: true
    });
});

// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#recapCrewDashboard').DataTable({
        info: false,
        ordering: true,
        paging: true,
        searching: false,
        pageLength: 5,
        lengthChange: false,
    });
});

// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#recapInventory').DataTable({
        info: false,
        ordering: true,
        paging: true,
        searching: false,
        pageLength: 5,
        lengthChange: false,
    });
});
