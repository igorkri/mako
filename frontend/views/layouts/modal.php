<?php


?>

<div class="dark_background" id="dark_background">

    <!-- Модальне вікно "зателефонуйте нам"  -->
    <div class="modal_window dn" id="call_us_window">
        <div class="close">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 2L18 18M18 2L2 18" stroke="#42414D" stroke-width="3" stroke-linecap="round"/>
            </svg>
        </div>
        <a href="tel:+380689664256" class="tel">
            <img src="/img/vodafone-red.svg" alt="">
            <p>+38 068 966 42 56</p>
        </a>
        <p class="address">м. Київ, проспект Леся Курбаса, 5в</p>
        <a href="tel:+380689664257" class="tel">
            <img src="/img/vodafone-red.svg" alt="">
            <p>+38 068 966 42 57</p>
        </a>
        <p class="address">м. Київ, вулиця Михайла Максимовича, 3г</p>
    </div>

    <!-- Модальне вікно "записатись" -->
    <div class="modal_window dn" id="sign_up_window">
        <div class="close">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 2L18 18M18 2L2 18" stroke="#42414D" stroke-width="3" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="alert-message"></div>
        <form action="/order-a-call" method="post" id="order-a-call">
            <h4>Замовити дзвінок</h4>
            <input type="text" name="name" oninvalid="this.setCustomValidity('Укажіть будь ласка Ваше ім’я')" oninput="this.setCustomValidity('')" placeholder="Ваше ім’я" required>
            <input type="text" name="phone"  oninvalid="this.setCustomValidity('Укажіть будь ласка Ваш телефон')" oninput="this.setCustomValidity('')"  placeholder="Номер телефону" required>
            <div class="choose_salon">
                <input type="text" name="address" autocomplete="off" placeholder="Оберіть салон">
                <div class="mark">
                    <img src="/img/mark.svg" alt="">
                </div>
                <div class="drop">
                    <span>м. Київ, проспект Леся Курбаса, 5в</span>
                    <span>м. Київ, вулиця Михайла Максимовича, 3г</span>
                </div>
            </div>
            <input type="checkbox" name="signUpCheckbox" id="sign_up_checkbox" >
            <label for="sign_up_checkbox">Я даю згоду на обробку моїх персональних даних</label>
            <div class="submit">
                <img src="/img/circle_red_arrow.svg" alt="">
                <input type="submit" value="Відправити заявку">
            </div>
        </form>
        <div class="banner">МаKо — Ви вмились і краса лишилась</div>
    </div>

    <!-- Модальне вікно "кощик" -->
    <div class="modal_cart dn" id="cart_window">
        <div class="head">
            <h5>Кошик</h5>
            <div class="close">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L11 11M11 1L1 11" stroke="" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
        <div class="body_cart">
            <div class="goods">
                <div class="item">
                    <div class="img">
                        <img src="/img/good.webp" alt="">
                    </div>
                    <div class="description">
                        <p class="title">Довга назва товару на декілька слів в один-два рядки</p>
                        <p class="price">0000₴</p>
                    </div>
                    <div class="delete">
                        <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3 0.5C3 0.223858 3.22386 0 3.5 0H8.5C8.77614 0 9 0.223858 9 0.5V1H11.5C11.7761 1 12 1.22386 12 1.5V2.5C12 2.77614 11.7761 3 11.5 3H11V13C11 13.5523 10.5523 14 10 14H2C1.44772 14 1 13.5523 1 13V3H0.5C0.223858 3 0 2.77614 0 2.5V1.5C0 1.22386 0.223858 1 0.5 1H3V0.5ZM3.5 5C3.22386 5 3 5.22386 3 5.5V11.5C3 11.7761 3.22386 12 3.5 12H4.5C4.77614 12 5 11.7761 5 11.5V5.5C5 5.22386 4.77614 5 4.5 5H3.5ZM7.5 5C7.22386 5 7 5.22386 7 5.5V11.5C7 11.7761 7.22386 12 7.5 12H8.5C8.77614 12 9 11.7761 9 11.5V5.5C9 5.22386 8.77614 5 8.5 5H7.5Z"
                                  fill=""/>
                        </svg>
                    </div>
                </div>
                <div class="item">
                    <div class="img">
                        <img src="/img/good.webp" alt="">
                    </div>
                    <div class="description">
                        <p class="title">Довга назва товару на декілька слів в один-два рядки</p>
                        <p class="price">0000₴</p>
                    </div>
                    <div class="delete">
                        <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3 0.5C3 0.223858 3.22386 0 3.5 0H8.5C8.77614 0 9 0.223858 9 0.5V1H11.5C11.7761 1 12 1.22386 12 1.5V2.5C12 2.77614 11.7761 3 11.5 3H11V13C11 13.5523 10.5523 14 10 14H2C1.44772 14 1 13.5523 1 13V3H0.5C0.223858 3 0 2.77614 0 2.5V1.5C0 1.22386 0.223858 1 0.5 1H3V0.5ZM3.5 5C3.22386 5 3 5.22386 3 5.5V11.5C3 11.7761 3.22386 12 3.5 12H4.5C4.77614 12 5 11.7761 5 11.5V5.5C5 5.22386 4.77614 5 4.5 5H3.5ZM7.5 5C7.22386 5 7 5.22386 7 5.5V11.5C7 11.7761 7.22386 12 7.5 12H8.5C8.77614 12 9 11.7761 9 11.5V5.5C9 5.22386 8.77614 5 8.5 5H7.5Z"
                                  fill=""/>
                        </svg>
                    </div>
                </div>

            </div>
            <div class="foot">
                <div class="sum">
                    <span class="total">Разом:</span>
                    <span class="quantity">2 од.</span>
                    <span class="price">0000₴</span>
                </div>
                <button class="to_order">
                    Оформити замовлення
                </button>
                <button class="clear_cart">
                    Очистити кошик
                </button>
            </div>
            <div class="empty_cart">
                <p>Кошик порожній.</p>
                <a href="catalog.php">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="24" height="24" rx="12" fill=""/>
                        <path d="M11 15C12 13 14 12 14 12C14 12 12 11 11 9" stroke="white" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    Перейдіть до каталогу
                </a>
                <p>або</p>
                <a href="promo.php">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="24" height="24" rx="12" fill=""/>
                        <path d="M11 15C12 13 14 12 14 12C14 12 12 11 11 9" stroke="white" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    Ознайомтесь з акційними пропозиціями
                </a>
            </div>
        </div>
    </div>
</div>