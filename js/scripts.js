$('#nav--main').on('click', (e) => {
  $('#nav--main').children('button').removeClass('active');
  $(e.target).addClass('active');
  const linkId = "#" + e.target['innerText'].toLowerCase();
  $('html, body').animate({
    scrollTop: $(linkId).offset().top
  }, 2000);
});