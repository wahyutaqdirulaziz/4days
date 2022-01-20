$(function(){
    $('.datatables').on('click', 'tr td .btn-delete', function(e){
        e.preventDefault;
        var form = $(this).closest('td').find('.form-delete')
        var title = 'Apakah anda yakin?';
        var message = '';
        // swal({
        //     title: title,
        //     text: message,
        //     icon: "warning",
        //     buttons: true,
        //     showCancelButton: true,
        //     dangerMode: true,
        //     closeOnConfirm: false,
        //     showLoaderOnConfirm: true,
        // })
        // .then((willConfirm) => {
        //     if (willConfirm) {
        //         form.submit();
        //     }
        // });
        Swal.fire({
            title: title,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    });

    $('.datatables').on('click', 'tr td .checkbox-status', function(e){
        var id = $(this).data('id');
        var status = $(this).is(':checked') ? 1 : 0;
        var page = $(this).data('page');
       
        $.ajax({
            url: base_url + '/ajax/' + page + '/status/',
            method: 'PUT',
            data: {id: id, status: status},
            success: function(data){
                console.log(data.message)
            }
        })
    });
});