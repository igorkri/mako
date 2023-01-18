<?php

use frontend\Widgets\FooterWidget; ?>

<footer>
    <?= FooterWidget::widget() ?>
  <div class="bottom_part">
    <img src="/img/MaKo_grey.svg" alt="">
    <div class="links">
      <a href="promo.php">Акції</a>
      <a href="team.php">Про нас</a>
      <a href="reviews.php">Відгуки</a>
      <a href="contacts.php">Контакти</a>
    </div>
    <p>© <?=date('Y')?></p>
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
</footer>