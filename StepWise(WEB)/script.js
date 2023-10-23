// Когда пользователь прокручивает вниз 20 пикселей от верхней части документа, показать кнопку
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// Когда пользователь кликает на кнопку, прокрутите до верхней части документа
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
