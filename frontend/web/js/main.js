
//================================

$(document).on('click', '#filter_button', function (event) {
    event.preventDefault();
    $('#catalog .content .filters').slideDown(300);
});

//================================
// Замовлення дзвінка
$( "form#order-a-call" ).submit(function( event ) {
    var $form = $(this);
    $.ajax({
        type: "post",
        url: $form.attr("action"),
        data: $form.serialize(),
        success: function (data) {
            // console.log(data);
            if(data.status === 'success'){
                $("form#order-a-call").trigger('reset');
                $('.alert-message').html(data.messages);
            }else{
                console.log(data);
            }
        },
        error: function (data) {
            console.log(data);
        }
    })
    event.preventDefault();
});


function filterCategory(id){
    $.ajax({
        url: '/product/catalog',
        type: 'post',
        data: {
            filters: {
                category_id: id
            }
        },
        success: function(data){
            $('#catalog-list').html(data);
        },
        error: function(){
            // $.pjax.reload({ container: '#all-page' });
        }
    });
}

function filterProducer(id){
    $.ajax({
        url: '/product/catalog',
        type: 'post',
        data: {
            filters: {
                producer_id: id
            }
        },

        success: function(data){
            $('#catalog-list').html(data);
        },
        error: function(){
            // $.pjax.reload({ container: '#all-page' });
        }
    });
}
function filterSerie(id){
    $.ajax({
        url: '/product/catalog',
        type: 'post',
        data: {
            filters: {
                series_id: id
            }
        },

        success: function(data){
            $('#catalog-list').html(data);
        },
        error: function(){
            // $.pjax.reload({ container: '#all-page' });
        }
    });
}
function filterPopular(id){
    $.ajax({
        url: '/product/catalog',
        type: 'post',
        data: {
            filters: {
                popular_product: id
            }
        },

        success: function(data){
            $.pjax.reload({ container: '#catalog-list' });
            // $('#catalog-list').html(data);
        },
        error: function(){
        }
    });
}

function removeFilter(key, value){
    $.ajax({
        url: '/product/remove-session',
        type: 'get',
        data: {
            key: key,
            value: value,
        },

        success: function(data){
            $.pjax.reload({ container: '#catalog-list' });// }
        },
        error: function(){
        }
    });
}

function filterPrice(int){
    $.ajax({
        url: '/product/catalog',
        type: 'post',
        data: {
            filters: {
                sort: int,
            }
        },

        success: function(data){
            $.pjax.reload({ container: '#catalog-list' });
        },
        error: function(){
        }
    });

}

function removePosition(id){
    $.ajax({
        url: '/order/remove-cart',
        type: 'post',
        data: {
            id: id,
        },
        success: function(data){
            // console.log(data);
            $.pjax.reload({ container: '#body_cart' });
        },
        error: function(){
        }
    });

}

function removePositionModalCart(id){
    $.ajax({
        url: '/product/remove-cart',
        type: 'post',
        data: {
            id: id,
        },
        success: function(data){
            $.ajax({
                url: '/order/qty',
                // type: 'post',
                // data: {
                // },
                success: function(res){
                    // console.log(qty);
                    $('.body_cart').html(data);
                    $('#header-qty-product').html(res.qty);
                },
                error: function(){}
            });
        },
        error: function(){
        }
    });

}

$(document).on('click', '.clear_cart', function (event) {

    $.ajax({
        url: '/product/clear-cart',
        type: 'post',
        data: {},
        success: function(data){
            $.ajax({
                url: '/order/qty',
                // type: 'post',
                // data: {
                // },
                success: function(res){
                    // console.log(qty);
                    $('.body_cart').html(data);
                    $('#header-qty-product').html(res.qty);
                },
                error: function(){}
            });
        },
        error: function(){
        }
    });
    event.preventDefault();
});
