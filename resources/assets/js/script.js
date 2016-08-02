$(document).ready(function () {
    $(".cart-login").click(function () {
        $("#notlogin").modal('hide');
        $("#login").modal('show');
    })
    $("a#addtocart").click(function (e) {
        e.preventDefault();
        var user_id = log_user_id;
        var pro_id = $(this).attr('product-id');
        var product_price = $(this).attr('price');
        console.log(pro_id+" "+user_id+" "+product_price);
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
        $.ajax({
            type:'POST',
            url:'/cart',
            data:{user_id:user_id,product_id:pro_id,quantity:1,product_price:product_price},
            success:function () {
                console.log("Succefull");
                alert("Item have been added to Your Cart");
            },
            error:function () {
                console.log("ERROR");
            }
        });
    });
    $("a#deletefromcart").click(function (e) {
        e.preventDefault();
        var user_id = log_user_id;
        var pro_id = $(this).attr('product-id');
        console.log(pro_id+" "+user_id);
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
        $.ajax({
            type:'POST',
            url:'/cartdelete',
            data:{user_id:user_id,product_id:pro_id},
            success:function () {
                location.reload();
            },
            error:function () {
                console.log("ERROR");
            }
        });
    });
    $("a.update_quantity").click(function (e) {
        e.preventDefault();
        var quantity = $(this).closest('.quantity_value').find('.quantity').val();
        console.log(parent);
        var card_id = $(this).attr('cart_id');
        console.log(quantity+" "+card_id);
        $.ajax({
            type:'GET',
            url:'/update_quantity',
            data:{id:card_id,quantity:quantity},
            success:function () {
                console.log("Succefully");
                location.reload();
            },
            error:function () {
                console.log("Error Cart");
            }
        });
    });

    $('#list').click(function(event){
        event.preventDefault();
        $('#products .item').addClass('list-group-item');
    });
    $('#grid').click(function(event){
        event.preventDefault();
        $('#products .item').removeClass('list-group-item');
        $('#products .item').addClass('grid-group-item');
    });

});

$(document).ready(function () {
    var scroll = $(window).scrollTop();
    var height1 = $(document).height();
    var win = $(window).height();
    console.log(scroll);
});


$(document).ready(function () {
    $("#register_form").validate({
        rules:{
            name:"required",
            email:"required",
            user_password:"required",
            mobile:"required",
            dob:"required",
            address:"required",
            zipcode:"required",
            city:"required"
        },
        messages:{
            name:"Please enter Your name",
            email:"Please enter Your ",
            user_password:"Please enter Your Password",
            mobile:"Please enter Your mobile",
            dob:"Please enter Your DOB",
            address:"Please enter Your Address",
            zipcode:"Please enter Your City",
            city:"Please enter Your City"
        }
    });
    $(".registration").click(function (event) {
        event.preventDefault();
        $("#register_form").valid();
    });

    });
