jQuery(function ($) {

  // визначаємо у змінні кнопку, поточну сторінку і максимальну кількість сторінок
  var button = $('#loadmore a'),
        paged = button.data('paged'),
        maxPages = button.data('max-pages');

  button.click(function (event) {
    event.preventDefault(); // запобігаємо кліку за посиланням

    $.ajax({
      type: 'POST',
      url: misha.ajax_url, // отримуємо з wp_localize_script()
      data: {
        paged: paged, // номер поточної сторінки
        action: 'loadmore' // екшен для wp_ajax_ i wp_ajax_nopriv_
      },
      beforeSend: function (xhr) {
        button.text('Загружаем...');
      },
      success: function (data) {
        paged++; // інкремент номера сторінки
        button.parent().before(data);
        button.text('Загрузить еще');

        // якщо остання сторінка, то видаляємо кнопку
        if (paged == maxPages) {
          $('#loadmore').remove();
        }
      }
    });
  });
});
