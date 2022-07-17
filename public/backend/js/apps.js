$(function () {
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })

    });
});


// Image Preview
$(document).ready(function () {
    $('#image').change(function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});


// Pending To Confirm
$(function () {
    $(document).on('click', '#confirm', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure to Confirm?',
            text: "Once Confirm, You will not be able to Pending again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Confirm Order!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Confirm!',
                    'Confirm Changes.',
                    'success'
                )
            }
        })

    });
});

// Confirm To Processing
$(function () {
    $(document).on('click', '#processing', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure to Processing?',
            text: "Once Processing, You will not be able to Confirm again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Processing Order!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Processing!',
                    'Processing Changes.',
                    'success'
                )
            }
        })

    });
});



// Processing To Picked
$(function () {
    $(document).on('click', '#picked', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure to Picked?',
            text: "Once Picked, You will not be able to Processing again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Picked Order!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Picked!',
                    'Picked Changes.',
                    'success'
                )
            }
        })

    });
});


// Picked To Shipped
$(function () {
    $(document).on('click', '#shipped', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure to Shipped?',
            text: "Once Shipped, You will not be able to Picked again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Shipped Order!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Shipped!',
                    'Shipped Changes.',
                    'success'
                )
            }
        })

    });
});


// Shipped To Delivered
$(function () {
    $(document).on('click', '#delivered', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure to Delivered?',
            text: "Once Delivered, You will not be able to Shipped again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delivered Order!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Delivered!',
                    'Delivered Changes.',
                    'success'
                )
            }
        })

    });
});
