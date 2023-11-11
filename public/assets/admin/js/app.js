!function(){



    $(document).on('change', 'select[data-onchange="table"]', function (e) {
        e.preventDefault();
        let value = $(this).val(),
            name = $(this).attr('name'),
            table = $(this).data('table');

        let queryParams = {};
        queryParams[name] = value;

        $(table).bootstrapTable('refreshOptions', {
            queryParams: queryParams
        })
    });
}();

