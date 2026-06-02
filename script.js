const calcValue = (a, b, range) => (a / b * range - range / 2).toFixed(1); // thanks @alice-mx

let timeout;
const updateCards = (x, y) => {
  const cardsList = document.querySelectorAll(".cards");
  if (!cardsList.length) {
    return;
  }

  if (timeout) {
    window.cancelAnimationFrame(timeout);
  }

  timeout = window.requestAnimationFrame(() => {
    [].forEach.call(cardsList, cards => {
      const enabled = cards.getAttribute('data-effect-enabled') !== '0';
      if (!enabled) {
        return;
      }

      const range = parseFloat(cards.getAttribute('data-effect-range') || '40');
      const imageShift = parseFloat(cards.getAttribute('data-image-shift') || '1');
      const bgShift = parseFloat(cards.getAttribute('data-bg-shift') || '0.45');
      const yValue = calcValue(y, window.innerHeight, range);
      const xValue = calcValue(x, window.innerWidth, range);
      const images = cards.querySelectorAll(".card__img");
      const backgrounds = cards.querySelectorAll(".card__bg");

      cards.style.transform = `rotateX(${yValue}deg) rotateY(${xValue}deg)`;

      [].forEach.call(images, image => {
        image.style.transform = `translateX(${-xValue * imageShift}px) translateY(${yValue * imageShift}px)`;
      });

      [].forEach.call(backgrounds, background => {
        background.style.backgroundPosition = `${xValue * bgShift}px ${-yValue * bgShift}px`;
      });
    });
  });
};

document.addEventListener('mousemove', event => {
  updateCards(event.x, event.y);
}, false);

window.addEventListener('mousemove', event => {
  updateCards(event.clientX, event.clientY);
}, false);

document.addEventListener('click', event => {
  const card = event.target.closest('.card[data-card-link]');
  if (!card) {
    return;
  }

  const url = card.getAttribute('data-card-link');
  if (!url) {
    return;
  }

  const target = card.getAttribute('data-card-target') || '_self';
  const rel = card.getAttribute('data-card-rel') || '';

  if (target === '_blank') {
    window.open(url, '_blank', rel.includes('noopener') ? 'noopener' : '');
    return;
  }

  window.location.href = url;
}, false);
