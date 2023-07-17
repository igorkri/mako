<!DOCTYPE html>
<html lang="uk-UA">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/img/favicon.svg" type="image/x-icon">
    <title>Косметологічний центр МаКо</title>
    <meta name="csrf-param" content="_csrf-frontend">
    <meta name="csrf-token" content="PbSrsSrVgCxnyfJjQMEtu7NgPfQPqCcqOpmb2CwjbhMIxMmFE6bNaxKApwp2iFvJnhgMsHb5YG136eKTbVAMJA==">

    <link href="/css/style_test.css" rel="stylesheet"></head>
<body>
<!-- Модальні вікна -->

<div class="dark_background" id="dark_background">

    <!-- Модальне вікно "зателефонуйте нам"  -->
    <div class="modal_window dn" id="sign_up_window">
        <div class="close">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 2L18 18M18 2L2 18" stroke="#42414D" stroke-width="3" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="alert-message"></div>
        <form action="/order-a-call" method="post" id="order-a-call">
            <h4>Замовити дзвінок</h4>
            <input type="text" name="name"
                   oninvalid="this.setCustomValidity('Укажіть будь ласка Ваше ім’я')"
                   oninput="this.setCustomValidity('')"
                   placeholder="Ваше ім’я" required>
            <input type="text" name="phone"  oninvalid="this.setCustomValidity('Укажіть будь ласка Ваш телефон')" oninput="this.setCustomValidity('')"  placeholder="Номер телефону" required>
            <div class="choose_salon">
                <input type="text" name="address" autocomplete="off" placeholder="Оберіть салон">
                <div class="mark">
                    <img src="/img/mark.svg" alt="">
                </div>
                <div class="drop">
                    <span> м. Київ, проспект Леся Курбаса, 5в </span>
                    <span>м. Київ, вулиця Михайла Максимовича, 3г </span>
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

    <!-- Модальне вікно "записатись" -->
    <div class="modal_window dn" id="call_us_window">
        <div class="close">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 2L18 18M18 2L2 18" stroke="#42414D" stroke-width="3" stroke-linecap="round"/>
            </svg>
        </div>
        <a href="tel:+380689664256" class="tel">
            <img src="/img/vodafone-red.svg" alt="">
            <p> +38 068 966 42 56</p>
        </a>
        <p class="address"> м. Київ, проспект Леся Курбаса, 5в </p>
        <a href="tel:+380689664257" class="tel">
            <img src="/img/vodafone-red.svg" alt="">
            <p>+38 068 966 42 57</p>
        </a>
        <p class="address">м. Київ, вулиця Михайла Максимовича, 3г </p>
    </div>

    <!-- Модальне вікно "кошик" -->
    <div class="modal_cart dn" id="cart_window">
        <div class="head">
            <h5>Кошик</h5>
            <div class="close">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L11 11M11 1L1 11" stroke="" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
        <div id="cart-products" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">        <div class="body_cart"></div>
        </div>    </div>
</div><!----- Хедер ----->

<header id="header">
    <div class="logo">
        <a href="/">
            <img src="/img/MaKo_logo1.png" alt="">
        </a>
    </div>
    <div class="services">
        <div class="badge">
            <span></span>
        </div>
        <p>Послуги та ціни</p>
    </div>
    <div class="links visible">
        <a href="/stocks">Акції</a>
        <a href="#" class="about">Про нас</a>
        <a href="/reviews">Відгуки</a>
        <a href="/contacts">Контакти</a>
        <div class="cloud">
            <a href="/certificate">Сертифікати</a>
            <a href="/team">Команда</a>
            <a href="/videos">Відео</a>
            <a href="/blog">Статті</a>
            <a href="/work">Робота в МаКо</a>
            <a href="/learning">Навчання в МаКо</a>
        </div>
    </div>
    <div class="call_us">
        <div class="call_button">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                        d="M0 1.99934C0 0.895136 0.89543 0 2 0H4.6446C5.62227 0 6.45666 0.706594 6.61738 1.67065L6.98661 3.88526C7.13872 4.79762 6.60426 5.68501 5.72649 5.97751L5.24444 6.13814C5.04305 6.20525 4.92917 6.41795 4.98503 6.6227L5.48668 8.46146C5.76338 9.4757 6.52883 10.2846 7.52649 10.617L8.74681 11.0237C8.91793 11.0807 9.10607 11.0162 9.20612 10.8661L9.7893 9.99166C10.2896 9.24148 11.2302 8.91884 12.0859 9.20395L14.6325 10.0525C15.4491 10.3247 16 11.0887 16 11.9493V14.0007C16 15.1049 15.1046 16 14 16H12.4C5.55167 16 0 10.4502 0 3.60408V1.99934Z"
                        fill="" />
            </svg>
        </div>
        <div class="burger">
            <span></span>
        </div>
    </div>
    <div class="social visible">
        <a href="https://www.facebook.com/MAKOcosmo">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                        d="M20 9.99486C20 4.47761 15.5201 0 10 0C4.47992 0 0 4.47761 0 9.99486C0 14.9871 3.65602 19.1251 8.4449 19.8662V12.877H5.89083V9.99486H8.4449V7.79208C8.4449 5.29079 9.92791 3.90119 12.2142 3.90119C13.3059 3.90119 14.4387 4.10705 14.4387 4.10705V6.54658H13.1823C11.9361 6.54658 11.5448 7.32888 11.5448 8.11117V9.98456H14.3254L13.8826 12.8667H11.5448V19.8559C16.344 19.1251 20 14.9871 20 9.99486Z"
                        fill="" />
            </svg>
        </a>
        <a href="https://www.instagram.com/p/CoZ6QobMeaZ/?igshid=MTc4MmM1YmI2Ng%3D%3D">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                        d="M10 1.8018C12.6701 1.8018 12.9864 1.81199 14.0409 1.86009C15.0158 1.90458 15.5453 2.06748 15.8977 2.20442C16.3645 2.38582 16.6976 2.60254 17.0475 2.95246C17.3975 3.30239 17.6142 3.63552 17.7956 4.10228C17.9325 4.45466 18.0954 4.98417 18.1399 5.95914C18.188 7.01361 18.1982 7.32988 18.1982 10C18.1982 12.6701 18.188 12.9864 18.1399 14.0409C18.0954 15.0158 17.9325 15.5453 17.7956 15.8977C17.6142 16.3645 17.3975 16.6976 17.0475 17.0475C16.6976 17.3975 16.3645 17.6142 15.8977 17.7956C15.5453 17.9325 15.0158 18.0954 14.0409 18.1399C12.9865 18.188 12.6703 18.1982 10 18.1982C7.3297 18.1982 7.01346 18.188 5.95915 18.1399C4.98417 18.0954 4.45466 17.9325 4.10228 17.7956C3.63552 17.6142 3.30239 17.3975 2.95248 17.0475C2.60255 16.6976 2.38582 16.3645 2.20442 15.8977C2.06748 15.5453 1.90458 15.0158 1.86009 14.0409C1.81199 12.9864 1.8018 12.6701 1.8018 10C1.8018 7.32988 1.81199 7.01361 1.86009 5.95915C1.90458 4.98417 2.06748 4.45466 2.20442 4.10228C2.38582 3.63552 2.60254 3.30239 2.95246 2.95248C3.30239 2.60254 3.63552 2.38582 4.10228 2.20442C4.45466 2.06748 4.98417 1.90458 5.95914 1.86009C7.01361 1.81199 7.32988 1.8018 10 1.8018ZM10 0C7.28416 0 6.94362 0.0115027 5.87702 0.0601658C4.81261 0.108735 4.08571 0.27778 3.44961 0.524988C2.79203 0.780541 2.23434 1.12247 1.6784 1.6784C1.12247 2.23434 0.780541 2.79203 0.524988 3.44961C0.27778 4.08571 0.108735 4.81261 0.0601658 5.87702C0.0115027 6.94362 0 7.28415 0 10C0 12.7158 0.0115027 13.0564 0.0601658 14.123C0.108735 15.1874 0.27778 15.9143 0.524988 16.5504C0.780541 17.208 1.12247 17.7657 1.6784 18.3216C2.23434 18.8775 2.79203 19.2195 3.44961 19.475C4.08571 19.7222 4.81261 19.8913 5.87702 19.9398C6.94362 19.9885 7.28416 20 10 20C12.7158 20 13.0564 19.9885 14.123 19.9398C15.1874 19.8913 15.9143 19.7222 16.5504 19.475C17.208 19.2195 17.7657 18.8775 18.3216 18.3216C18.8775 17.7657 19.2195 17.208 19.475 16.5504C19.7222 15.9143 19.8913 15.1874 19.9398 14.123C19.9885 13.0564 20 12.7158 20 10C20 7.28416 19.9885 6.94362 19.9398 5.87702C19.8913 4.81261 19.7222 4.08571 19.475 3.44961C19.2195 2.79203 18.8775 2.23434 18.3216 1.6784C17.7657 1.12247 17.208 0.780541 16.5504 0.524988C15.9143 0.27778 15.1874 0.108735 14.123 0.0601658C13.0564 0.0115027 12.7158 0 10 0ZM10 4.86486C7.16394 4.86486 4.86486 7.16394 4.86486 10C4.86486 12.8361 7.16394 15.1351 10 15.1351C12.8361 15.1351 15.1351 12.8361 15.1351 10C15.1351 7.16394 12.8361 4.86486 10 4.86486ZM10 13.3333C8.15905 13.3333 6.66667 11.8409 6.66667 10C6.66667 8.15905 8.15905 6.66667 10 6.66667C11.8409 6.66667 13.3333 8.15905 13.3333 10C13.3333 11.841 11.8409 13.3333 10 13.3333ZM15.338 3.46197C14.6753 3.46197 14.138 3.99923 14.138 4.66197C14.138 5.32472 14.6753 5.86197 15.338 5.86197C16.0008 5.86197 16.538 5.32472 16.538 4.66197C16.538 3.99923 16.0008 3.46197 15.338 3.46197Z"
                        fill="" />
            </svg>
        </a>
    </div>
    <div class="order visible">
        <a href="/catalog" class="home_care">
            Замовити домашній догляд
        </a>
        <div class="sign_up">
            Записатись
        </div>
        <div class="cart">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                        d="M17.8192 15.0552C17.2579 16.7619 15.5698 18 13.5769 18H4.42309C2.43017 18 0.742143 16.7619 0.180807 15.0552C0.00311874 14.5162 -0.035246 13.9429 0.029369 13.379L0.78858 6.7619C0.78858 6.7619 0.78858 6 1.59625 6C2.40392 6 2.40392 7.33333 3.4135 7.33333H14.5865C15.5961 7.33333 15.5961 6 16.4038 6C17.2114 6 17.2114 6.7619 17.2114 6.7619L17.9706 13.379C18.0352 13.9429 17.9969 14.5162 17.8192 15.0552Z"
                        fill="" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M9 2C7.34315 2 6 3.34315 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 2.23858 6.23858 0 9 0C11.7614 0 14 2.23858 14 5C14 5.55228 13.5523 6 13 6C12.4477 6 12 5.55228 12 5C12 3.34315 10.6569 2 9 2Z"
                      fill="" />
            </svg>
            <div id="header-qty-product" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">			<p>
                    0			</p>
            </div>		</div>
    </div>

    <div class="services_block">
        <div class="services_content">
            <div class="services_categories">
                <div class="wrapper">
                    <div class="category_name">
                        <p>
                            Косметологія обличчя                    </p>
                        <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 9C8.33333 6.33333 11 5 11 5M11 5C11 5 8.33333 3.66667 7 1M11 5H1" stroke=""
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="items">
                        <a href="/service/list/inektsiyna-kosmetologiya">
                            Інєкційна косметологія                     </a>
                        <a href="/service/list/lazerna-kosmetologiya">
                            Лазерна косметологія                     </a>
                        <a href="/service/list/klasichna-kosmetologiya">
                            Класична косметологія                     </a>
                        <a href="/service/list/aparatna-kosmetologiya">
                            Апаратна косметологія                     </a>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="category_name">
                        <p>
                            Косметологія тіла                    </p>
                        <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 9C8.33333 6.33333 11 5 11 5M11 5C11 5 8.33333 3.66667 7 1M11 5H1" stroke=""
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="items">
                        <a href="/service/list/masazh-ruchniy">
                            Масаж ручний                    </a>
                        <a href="/service/list/aparatna-korektsiya-figuri">
                            Апаратна корекція фігури                    </a>
                        <a href="/service/list/obgortannya">
                            Обгортання                    </a>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="category_name">
                        <p>
                            Лазерна епіляція                    </p>
                        <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 9C8.33333 6.33333 11 5 11 5M11 5C11 5 8.33333 3.66667 7 1M11 5H1" stroke=""
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="items">
                        <a href="/service/list/lazerna-yepilyatsiya-2">
                            Лазерна епіляція                      </a>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="category_name">
                        <p>
                            Трихологія                    </p>
                        <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 9C8.33333 6.33333 11 5 11 5M11 5C11 5 8.33333 3.66667 7 1M11 5H1" stroke=""
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="items">
                        <a href="/service/list/trikhologiya-2">
                            Трихологія                     </a>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="category_name">
                        <p>
                            Перманентний макіяж                    </p>
                        <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 9C8.33333 6.33333 11 5 11 5M11 5C11 5 8.33333 3.66667 7 1M11 5H1" stroke=""
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="items">
                        <a href="/service/list/permanentniy-makiyazh-2">
                            Перманентний макіяж                     </a>
                    </div>
                </div>
            </div>
            <div class="services_names">
                <div class="title">
                    <img src="/img/circle-white-arrow.svg" alt="">
                    <h6></h6>
                </div>
            </div>
            <!--
            <div class="header_contacts">
                            <div class="address">
                    <img src="/img/marker.svg" alt="">
                    <p> м. Київ, проспект Леся Курбаса, 5в </p>
                </div>
                <a href="tel:+380689664256" class="phone">
                    <img src="/img/vodafone.svg" alt="">
                    <p> +38 068 966 42 56</p>
                </a>
                            <div class="address">
                    <img src="/img/marker.svg" alt="">
                    <p>м. Київ, вулиця Михайла Максимовича, 3г </p>
                </div>
                <a href="tel:+380689664257" class="phone">
                    <img src="/img/vodafone.svg" alt="">
                    <p>+38 068 966 42 57</p>
                </a>
                            <a href="https://w474688.alteg.io" class="make_appointment">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="48" height="48" rx="24" fill="" />
                        <path d="M22 30C24 26 28 24 28 24C28 24 24 22 22 18" stroke="" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" />
                    </svg>
                    Записатись на прийом
                </a>
            </div>
            -->
        </div>
    </div></header>

<?=$content?>

<style>
    section.gift_certificates .block .pict {
        background: url(../img/certificates/13-03-2323-640f116d0fb0b.jpg) 50%;
        background-size: cover;
    }
</style>


<!----- Футер ----->

<footer>
    <div class="top_part"><div class="line">
            <div class="address">
                <img src="/img/marker.svg" alt="">
                <p> м. Київ, проспект Леся Курбаса, 5в </p>
            </div>
            <a href="tel:+380689664256" class="tel">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M16 8C16 12.4183 12.4183 16 8 16C3.58172 16 0 12.4183 0 8C0 3.58172 3.58172 0 8 0C12.4183 0 16 3.58172 16 8ZM3.5954 7.58232C3.60515 10.5764 5.87826 12.4405 8.0626 12.4333C10.7595 12.4241 12.3553 10.2069 12.3487 8.1878C12.342 6.16869 11.2429 4.70579 8.82201 4.11622C8.81539 4.07344 8.81213 4.0302 8.81226 3.98691C8.80713 2.45937 9.95856 1.11295 11.4056 0.812776C11.2691 0.766595 11.0464 0.749663 10.8334 0.749663C9.17863 0.755306 7.35655 1.46289 6.02245 2.56558C4.65704 3.69444 3.58925 5.60221 3.5954 7.58232Z"
                          fill="" />
                </svg>
                +38 068 966 42 56
            </a>
            <p>10:00 - 21:00, без вихідних</p>
        </div><div class="line">
            <div class="address">
                <img src="/img/marker.svg" alt="">
                <p>м. Київ, вулиця Михайла Максимовича, 3г </p>
            </div>
            <a href="tel:+380689664257" class="tel">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M16 8C16 12.4183 12.4183 16 8 16C3.58172 16 0 12.4183 0 8C0 3.58172 3.58172 0 8 0C12.4183 0 16 3.58172 16 8ZM3.5954 7.58232C3.60515 10.5764 5.87826 12.4405 8.0626 12.4333C10.7595 12.4241 12.3553 10.2069 12.3487 8.1878C12.342 6.16869 11.2429 4.70579 8.82201 4.11622C8.81539 4.07344 8.81213 4.0302 8.81226 3.98691C8.80713 2.45937 9.95856 1.11295 11.4056 0.812776C11.2691 0.766595 11.0464 0.749663 10.8334 0.749663C9.17863 0.755306 7.35655 1.46289 6.02245 2.56558C4.65704 3.69444 3.58925 5.60221 3.5954 7.58232Z"
                          fill="" />
                </svg>
                +38 068 966 42 57
            </a>
            <p>10:00 - 21:00, без вихідних</p>
        </div><div class="networks">
            <a href="https://www.instagram.com/p/CoZ6QobMeaZ/?igshid=MTc4MmM1YmI2Ng%3D%3D">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">           <path             d="M10 1.8018C12.6701 1.8018 12.9864 1.81199 14.0409 1.86009C15.0158 1.90458 15.5453 2.06748 15.8977 2.20442C16.3645 2.38582 16.6976 2.60254 17.0475 2.95246C17.3975 3.30239 17.6142 3.63552 17.7956 4.10228C17.9325 4.45466 18.0954 4.98417 18.1399 5.95914C18.188 7.01361 18.1982 7.32988 18.1982 10C18.1982 12.6701 18.188 12.9864 18.1399 14.0409C18.0954 15.0158 17.9325 15.5453 17.7956 15.8977C17.6142 16.3645 17.3975 16.6976 17.0475 17.0475C16.6976 17.3975 16.3645 17.6142 15.8977 17.7956C15.5453 17.9325 15.0158 18.0954 14.0409 18.1399C12.9865 18.188 12.6703 18.1982 10 18.1982C7.3297 18.1982 7.01346 18.188 5.95915 18.1399C4.98417 18.0954 4.45466 17.9325 4.10228 17.7956C3.63552 17.6142 3.30239 17.3975 2.95248 17.0475C2.60255 16.6976 2.38582 16.3645 2.20442 15.8977C2.06748 15.5453 1.90458 15.0158 1.86009 14.0409C1.81199 12.9864 1.8018 12.6701 1.8018 10C1.8018 7.32988 1.81199 7.01361 1.86009 5.95915C1.90458 4.98417 2.06748 4.45466 2.20442 4.10228C2.38582 3.63552 2.60254 3.30239 2.95246 2.95248C3.30239 2.60254 3.63552 2.38582 4.10228 2.20442C4.45466 2.06748 4.98417 1.90458 5.95914 1.86009C7.01361 1.81199 7.32988 1.8018 10 1.8018ZM10 0C7.28416 0 6.94362 0.0115027 5.87702 0.0601658C4.81261 0.108735 4.08571 0.27778 3.44961 0.524988C2.79203 0.780541 2.23434 1.12247 1.6784 1.6784C1.12247 2.23434 0.780541 2.79203 0.524988 3.44961C0.27778 4.08571 0.108735 4.81261 0.0601658 5.87702C0.0115027 6.94362 0 7.28415 0 10C0 12.7158 0.0115027 13.0564 0.0601658 14.123C0.108735 15.1874 0.27778 15.9143 0.524988 16.5504C0.780541 17.208 1.12247 17.7657 1.6784 18.3216C2.23434 18.8775 2.79203 19.2195 3.44961 19.475C4.08571 19.7222 4.81261 19.8913 5.87702 19.9398C6.94362 19.9885 7.28416 20 10 20C12.7158 20 13.0564 19.9885 14.123 19.9398C15.1874 19.8913 15.9143 19.7222 16.5504 19.475C17.208 19.2195 17.7657 18.8775 18.3216 18.3216C18.8775 17.7657 19.2195 17.208 19.475 16.5504C19.7222 15.9143 19.8913 15.1874 19.9398 14.123C19.9885 13.0564 20 12.7158 20 10C20 7.28416 19.9885 6.94362 19.9398 5.87702C19.8913 4.81261 19.7222 4.08571 19.475 3.44961C19.2195 2.79203 18.8775 2.23434 18.3216 1.6784C17.7657 1.12247 17.208 0.780541 16.5504 0.524988C15.9143 0.27778 15.1874 0.108735 14.123 0.0601658C13.0564 0.0115027 12.7158 0 10 0ZM10 4.86486C7.16394 4.86486 4.86486 7.16394 4.86486 10C4.86486 12.8361 7.16394 15.1351 10 15.1351C12.8361 15.1351 15.1351 12.8361 15.1351 10C15.1351 7.16394 12.8361 4.86486 10 4.86486ZM10 13.3333C8.15905 13.3333 6.66667 11.8409 6.66667 10C6.66667 8.15905 8.15905 6.66667 10 6.66667C11.8409 6.66667 13.3333 8.15905 13.3333 10C13.3333 11.841 11.8409 13.3333 10 13.3333ZM15.338 3.46197C14.6753 3.46197 14.138 3.99923 14.138 4.66197C14.138 5.32472 14.6753 5.86197 15.338 5.86197C16.0008 5.86197 16.538 5.32472 16.538 4.66197C16.538 3.99923 16.0008 3.46197 15.338 3.46197Z"             fill="#42414D" />         </svg>
                mako.cosmetology
            </a>

            <a href="https://www.facebook.com/MAKOcosmo">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">           <path             d="M20 9.99486C20 4.47761 15.5201 0 10 0C4.47992 0 0 4.47761 0 9.99486C0 14.9871 3.65602 19.1251 8.4449 19.8662V12.877H5.89083V9.99486H8.4449V7.79208C8.4449 5.29079 9.92791 3.90119 12.2142 3.90119C13.3059 3.90119 14.4387 4.10705 14.4387 4.10705V6.54658H13.1823C11.9361 6.54658 11.5448 7.32888 11.5448 8.11117V9.98456H14.3254L13.8826 12.8667H11.5448V19.8559C16.344 19.1251 20 14.9871 20 9.99486Z"             fill="#42414D" />         </svg>
                MAKOcosmo
            </a>
        </div>
    </div>  <div class="bottom_part">
        <img src="/img/MaKo_logo1.png" style="width: 165px" alt="">
        <div class="links">
            <a href="/stocks">Акції</a>
            <a href="/team">Про нас</a>
            <a href="/reviews">Відгуки</a>
            <a href="/contacts">Контакти</a>
        </div>
        <p>©
            2023    </p>
    </div>
    <div class="chat">
        <a href="#">
            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="60" height="60" rx="30" fill="" />
                <path
                        d="M22.8337 19H37.1668C41.4999 19 45 22.4277 45 26.6814L45 33.991C45 37.3776 42.7502 40.2684 39.6252 41.2594C38.542 41.5898 37.8338 42.581 37.8338 43.6959V46.1739C37.8338 46.8347 37.042 47.2476 36.5003 46.8347L30.292 42.168C29.8337 41.8376 29.2503 41.631 28.667 41.631H22.8339C18.5005 41.6728 15 38.2451 15 33.9917V26.682C15 22.4284 18.5007 19 22.8337 19ZM37.9168 32.1739C39.1668 32.1739 40.2085 31.1415 40.2085 29.9025C40.2085 28.6635 39.1668 27.631 37.9168 27.631C36.6667 27.631 35.6251 28.6635 35.6251 29.9025C35.6254 31.1415 36.667 32.1739 37.9168 32.1739ZM30.0003 32.1739C31.2503 32.1739 32.292 31.1415 32.292 29.9025C32.292 28.6635 31.2503 27.631 30.0003 27.631C28.7502 27.631 27.7086 28.6635 27.7086 29.9025C27.7086 31.1415 28.7502 32.1739 30.0003 32.1739ZM22.0837 32.1739C23.3338 32.1739 24.3754 31.1415 24.3754 29.9025C24.3754 28.6635 23.3338 27.631 22.0837 27.631C20.8337 27.631 19.792 28.6635 19.792 29.9025C19.792 31.1415 20.8337 32.1739 22.0837 32.1739Z"
                        fill="" />
            </svg>
        </a>
    </div>
</footer><!--<a href="#" class="ms_booking" data-url="https://w474688.alteg.io">12345</a>-->
<!--<a href="#" class="ms_booking" data-url="https://w333446.alteg.io">67890</a>-->
<script type="text/javascript" src="https://w474688.alteg.io/widgetJS" charset="UTF-8"></script>
<script type="text/javascript" src="https://w333446.alteg.io/widgetJS" charset="UTF-8"></script>
<script>
    var yWidgetSettings = {
        buttonColor : '#1c84c6',
        buttonPosition : 'bottom right',
        buttonAutoShow : true,
        buttonText : 'онлайн запис',
        formPosition : 'right'
    };
</script>
<script src="/assets/6665a8a8/jquery.js"></script>
<script src="/assets/c007dca7/yii.js"></script>
<script src="/assets/c6697ddd/jquery.pjax.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/app.js"></script>
<script>jQuery(function ($) {
        jQuery(document).pjax("#cart-products a", {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#cart-products"});
        jQuery(document).off("submit", "#cart-products form[data-pjax]").on("submit", "#cart-products form[data-pjax]", function (event) {jQuery.pjax.submit(event, {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#cart-products"});});
        jQuery(document).pjax("#header-qty-product a", {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#header-qty-product"});
        jQuery(document).off("submit", "#header-qty-product form[data-pjax]").on("submit", "#header-qty-product form[data-pjax]", function (event) {jQuery.pjax.submit(event, {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#header-qty-product"});});
    });</script></body>
</html>
