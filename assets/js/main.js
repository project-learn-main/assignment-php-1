const toast = document.querySelector('.toast');
let cartCount = 0;

function showToast(message) {
  toast.textContent = message;
  toast.classList.add('show');
  window.clearTimeout(showToast.timer);
  showToast.timer = window.setTimeout(() => toast.classList.remove('show'), 2600);
}

document.querySelectorAll('[data-filter]').forEach((button) => {
  button.addEventListener('click', () => {
    document.querySelectorAll('[data-filter]').forEach((item) => item.classList.remove('active'));
    button.classList.add('active');
    const filter = button.dataset.filter;
    document.querySelectorAll('.product-card').forEach((card) => {
      card.hidden = filter !== 'all' && card.dataset.category !== filter;
    });
  });
});

document.querySelectorAll('.add-button').forEach((button) => {
  button.addEventListener('click', () => {
    cartCount += 1;
    document.querySelector('[data-cart-count]').textContent = cartCount;
    showToast(`${button.dataset.product} đã được thêm vào giỏ hàng.`);
  });
});

document.querySelector('.menu-toggle').addEventListener('click', (event) => {
  const links = document.querySelector('.nav-links');
  const open = links.classList.toggle('open');
  event.currentTarget.setAttribute('aria-expanded', String(open));
});

document.querySelector('#newsletter-form').addEventListener('submit', (event) => {
  event.preventDefault();
  event.currentTarget.reset();
  showToast('Đăng ký nhận ưu đãi thành công.');
});

document.querySelector('[data-open-login]').addEventListener('click', () => {
  showToast('Tính năng đăng nhập đang được phát triển.');
});

document.querySelector('.cart-button').addEventListener('click', () => {
  showToast(cartCount ? `Bạn có ${cartCount} sản phẩm trong giỏ.` : 'Giỏ hàng đang trống.');
});
