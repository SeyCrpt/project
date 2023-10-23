// Получаем данные из localStorage
let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

// Функция для обновления корзины на странице
function updateCart() {
  const cartEl = document.querySelector('#cart');
  // Если корзина пуста, выводим соответствующее сообщение
  if (cartItems.length === 0) {
    cartEl.innerHTML = '<p>В корзине пока ничего нет</p>';
  } else {
    cartEl.innerHTML = '';
    // Для каждого товара в корзине создаем элемент и добавляем его на страницу
    cartItems.forEach(item => {
      const el = document.createElement('div');
      el.className = 'cart-item';
      el.innerHTML = `
        <img src="${item.img}">
        <span>${item.name}</span>
        <span>${item.price} руб.</span>
        <button data-id="${item.id}">Удалить</button>
      `;
      cartEl.appendChild(el);
    });
  }
}

// Обработчик клика на кнопке "Добавить в корзину"
document.addEventListener('click', e => {
  if (e.target.matches('.add-to-cart')) {
    // Получаем данные о товаре из атрибутов кнопки
    const id = parseInt(e.target.dataset.id);
    const name = e.target.dataset.name;
    const img = e.target.dataset.img;
    const price = parseInt(e.target.dataset.price);
    // Добавляем товар в корзину
    cartItems.push({id, name, img, price});
    localStorage.setItem('cartItems', JSON.stringify(cartItems));
    // Обновляем корзину на странице
    updateCart();
  }
});

// Обработчик клика на кнопке "Удалить"
document.addEventListener('click', e => {
  if (e.target.matches('.cart-item button')) {
    const id = parseInt(e.target.dataset.id);
    cartItems = cartItems.filter(item => item.id !== id);
    localStorage.setItem('cartItems', JSON.stringify(cartItems));
    updateCart();
  }
});

// Обработчик клика на кнопке "Оформить заказ"
document.querySelector('#checkout').addEventListener('click', () => {
  // Здесь можно добавить логику для оформления заказа
});
