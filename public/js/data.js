$(document).on('submit', '#familyd', function (e) {
    e.preventDefault();

    var form2 = $(this).serialize();
    var thisForm = $(this);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(this).validate({
     
        rules: {
            fname: 'required',
            lname: 'required',
            phone: 'required',
            bdate: 'required',
            marital_sts: 'required',
            address: 'required',
            fname: 'required',
            pincode: 'required',
            city: 'required',
            state: 'required',
        },
        messages: {
            notes: 'This is required',
        },
    });
    if ($(this).valid()) {

        $.ajax({
            url: "/save-family-details",
            type: "POST",
            data: form2,
            // contentType: false,
            // processData: false,
            // contentType: "multipart/form-data; boundary=----WebKitFormBoundaryyEmKNDsBKjB7QEqu",
            success: function (response) {
                console.log(response);
                // location.reload();
            }
        })
    }


});
