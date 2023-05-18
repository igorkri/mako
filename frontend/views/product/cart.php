<?php if($products): ?>
<div class="goods">
    <?php foreach ($products as $cart_product): ?>
    <div class="item">
        <div class="img">
            <?php if(isset($cart_product->productImages[0])): ?>
            <img src="/img/products/<?= $cart_product->productImages[0]->name ?>" alt="" width="86">
            <?php else: ?>
            <img src="/img/no-image.png" alt="" width="86">
            <?php endif; ?>
        </div>
        <div class="description">
            <p class="title">
                <?= $cart_product->name ?>
            </p>
            <div class="counter">
                <button class="minus" onclick="minusQtyProduct('<?=$cart_product->getId()?>')">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="1" y="1" width="28" height="28" rx="14" fill="#FFF5F5" />
                        <path d="M22.5 15L7.5 15" stroke="" stroke-width="2" stroke-linecap="round" />
                        <rect x="1" y="1" width="28" height="28" rx="14" stroke="" stroke-width="2" />
                    </svg>
                </button>
                <input type="text" id="qty-product-modal-<?=$cart_product->getId()?>"
                    value="<?= $cart_product->getQuantity() ?>">
                <button class="plus" onclick="plusQtyProduct('<?=$cart_product->getId()?>')">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="1" y="1" width="28" height="28" rx="14" fill="#FFF5F5" />
                        <path d="M22.5 15L7.5 15" stroke="" stroke-width="2" stroke-linecap="round" />
                        <path d="M15 22.5L15 7.5" stroke="" stroke-width="2" stroke-linecap="round" />
                        <rect x="1" y="1" width="28" height="28" rx="14" stroke="" stroke-width="2" />
                    </svg>
                </button>
            </div>
            <p class="price">
                <span id="qty-total-price-<?=$cart_product->getId()?>">
                    <?= Yii::$app->formatter->asDecimal($cart_product->price * $cart_product->getQuantity()) ?>
                </span> ₴
                |
                <span id="qty-total-prod-<?=$cart_product->getId()?>">
                    <?= $cart_product->getQuantity() ?>
                </span> од.
            </p>
        </div>
        <div class="delete" onclick="removePositionModalCart(<?=$cart_product->getId()?>)">
            <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M3 0.5C3 0.223858 3.22386 0 3.5 0H8.5C8.77614 0 9 0.223858 9 0.5V1H11.5C11.7761 1 12 1.22386 12 1.5V2.5C12 2.77614 11.7761 3 11.5 3H11V13C11 13.5523 10.5523 14 10 14H2C1.44772 14 1 13.5523 1 13V3H0.5C0.223858 3 0 2.77614 0 2.5V1.5C0 1.22386 0.223858 1 0.5 1H3V0.5ZM3.5 5C3.22386 5 3 5.22386 3 5.5V11.5C3 11.7761 3.22386 12 3.5 12H4.5C4.77614 12 5 11.7761 5 11.5V5.5C5 5.22386 4.77614 5 4.5 5H3.5ZM7.5 5C7.22386 5 7 5.22386 7 5.5V11.5C7 11.7761 7.22386 12 7.5 12H8.5C8.77614 12 9 11.7761 9 11.5V5.5C9 5.22386 8.77614 5 8.5 5H7.5Z"
                    fill="" />
            </svg>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="foot">
    <div class="sum">
        <span class="total">Разом:</span>
        <span class="quantity">
            <span id="qty-total">
                <?= \Yii::$app->cart->getCount() ?>
            </span> од.
        </span>
        <span class="price" id="summ-total">
            <?= Yii::$app->formatter->asDecimal($totalSumm, 2)?>
        </span> <span class="price"> ₴</span>
    </div>
    <?=\yii\helpers\Html::a('Оформити замовлення', ['/order'], [
            'style' => 'text-align: center',
            'class' => 'to_order',
            'data' => [
                    'pjax' => 0
            ]
    ])?>
    <button class="clear_cart">
        Очистити кошик
    </button>
</div>
<?php else: ?>

<div class="empty_cart">
    <p>Кошик порожній.</p>
    <?= \yii\helpers\Html::a('<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="24" height="24" rx="12" fill=""/>
                        <path d="M11 15C12 13 14 12 14 12C14 12 12 11 11 9" stroke="white" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    Перейдіть до каталогу', ['product/catalog'], ['data-pjax' => 0]) ?>
    <p>або</p>
    <?= \yii\helpers\Html::a('<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="24" height="24" rx="12" fill=""/>
                        <path d="M11 15C12 13 14 12 14 12C14 12 12 11 11 9" stroke="white" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    Ознайомтесь з акційними пропозиціями', ['promo/index'], ['data-pjax' => 0]) ?>
</div>
<?php endif; ?>

<script>

    function plusQtyProduct(id) {
        var qty = $('input#qty-product-modal-' + id).val();
        var valQty = Number(qty) + 1;
        $('input#qty-product-modal-' + id).val(valQty);

        // console.log('id', id);
        // console.log('qty', valQty);

        $.ajax({
            url: "/product/update-cart",
            type: "get",
            data: {
                product_id: id,
                qty: valQty
            },

            success: function (data) {
                // var productPrice = (data.products[id].price * valQty).toLocaleString('uk-UA');;
                var productPrice = new Intl.NumberFormat('uk-UA').format(data.products[id].price * valQty);
                var currency = new Intl.NumberFormat('uk-UA').format(data.totalSumm);
                $('#qty-total').html(data.qty);
                $('#header-qty-product').html(data.qty);
                $('#summ-total').html(currency);
                $('#qty-total-prod-' + id).html(valQty);
                $('#qty-total-price-' + id).html(productPrice);

            },
            error: function () {
                console.log('error', data);
            }
        });
    }

    function minusQtyProduct(id) {

        var qty = $('input#qty-product-modal-' + id).val();
        var valQty = Number(qty) - 1;
        if(valQty >= 1) {

            $('input#qty-product-modal-' + id).val(valQty);
            $.ajax({
                url: "/product/update-cart",
                type: "get",
                data: {
                    product_id: id,
                    qty: valQty
                },

                success: function (data) {
                    var productPrice = new Intl.NumberFormat('uk-UA').format(data.products[id].price * valQty);
                    var currency = new Intl.NumberFormat('uk-UA').format(data.totalSumm);
                    $('#qty-total').html(data.qty);
                    $('#header-qty-product').html(data.qty);
                    $('#summ-total').html(currency);
                    $('#qty-total-prod-' + id).html(valQty);
                    $('#qty-total-price-' + id).html(productPrice);

                },
                error: function () {
                    console.log('error', data);
                }
            });
        }
    }
</script>
<?php
//$js = <<<JS
//$( document ).ready(function() {
//
//    // function rmQtyproduct(id){
//    //     console.log('id', id);
//    //
//    //     var product_id = $('#rm-qty-product-' + id).data('productId');
//    //     var qty = $('input#qty-product-modal-' + id).val();
//    //     var valQty = Number(qty) + 1;
//    //     $('input#qty-product-modal-' + id).val(valQty);
//    //
//    //
//    //     // var qtyCartTotal = $('#header-qty-product p').html();
//    //     // console.log(Number(qtyCartTotal));
//    //     // $('#header-qty-product').html(valQty);
//    //
//    //     $.ajax({
//    //         url: "/product/update-cart",
//    //         type: "get",
//    //         data: {
//    //             product_id: product_id,
//    //             qty: valQty
//    //         },
//    //
//    //         success: function(data){
//    //             console.log('success', data);
//    //
//    //         },
//    //         error: function(){
//    //            console.log('error', data);
//    //         }
//    //     });
//    // }
//
//    // $('#add-qty-product-' + product_id).click(function (){
//    //     var product_id = $('#rm-qty-product-' + product_id).data('productId');
//    //     var qty = $('input#qty-product-modal-' + product_id).val();
//    //     var valQty = Number(qty) + 1;
//    //     $('input#qty-product-modal-' + product_id).val(valQty);
//    //
//    //     console.log('qty', qty);
//    //
//    //     // var qtyCartTotal = $('#header-qty-product p').html();
//    //     // console.log(Number(qtyCartTotal));
//    //     // $('#header-qty-product').html(valQty);
//    //
//    //     $.ajax({
//    //     url: "/product/update-cart",
//    //     type: "get",
//    //     data: {
//    //         product_id: product_id,
//    //         qty: valQty
//    //     },
//    //
//    //     success: function(data){
//    //         console.log('success', data);
//    //
//    //     },
//    //     error: function(){
//    //        console.log('error', data);
//    //     }
//    // });
//    // return false;
//    // }).on('submit', function(e){
//    // e.preventDefault();
//    // });
//
//    // $('#rm-qty-product').click(function (){
//    //     var qty = $('input#qty-product-modal').val();
//    //     var product_id = $('#rm-qty-product').data('productId');
//    //     var valQty = Number(qty) - 1;
//    //     $('input#qty-product-modal').val(valQty);
//    //
//    //     // $.ajax({
//    //     // url: "/product/add-to-cart",
//    //     // type: "get",
//    //     // data: {
//    //     //     product_id: product_id,
//    //     //     qty: qty
//    //     // },
//    //     //
//    //     // success: function(data){
//    //     //     console.log(data);
//    //     //     $('#header-qty-product').html(data.qty);
//    //     //     $.pjax.reload({ container: '#cart-products' });
//    //     // },
//    //     // error: function(){
//    //     //     $.pjax.reload({ container: '#header-qty-product' });
//    //     // }
//    // // });
//    // return false;
//    // }).on('submit', function(e){
//    // e.preventDefault();
//    // });
//
//
//});
//
//JS;
//$this->registerJs($js);

?>