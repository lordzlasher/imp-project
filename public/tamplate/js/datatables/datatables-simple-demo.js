window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }

    const datatables = document.getElementById('datatables');
    if (datatables) {
        let options = {
            info: false, // Menonaktifkan info
            paging: false, // Menonaktifkan paging
            searchable: false,
            responsive: true,
        };

        new simpleDatatables.DataTable(datatables, options);
    }

    const datatablesCrew = document.getElementById('datatablesCrew');
    if (datatablesCrew) {
        let options = {
            info: false, // Menonaktifkan info
            paging: false, // Menonaktifkan paging
            searchable: false,
            responsive: true,

        };

        new simpleDatatables.DataTable(datatablesCrew, options);
    }

});
