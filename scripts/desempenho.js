document.querySelectorAll('.botaodese').forEach(btn => {
  btn.addEventListener('click', () => {
    const id = btn.getAttribute('data-target');
    const el = document.getElementById('items-' + id);
    const expanded = btn.getAttribute('aria-expanded') === 'true';

    if (el) {
      if (expanded) {
        el.style.display = 'none';
        btn.textContent = '▸';
        btn.setAttribute('aria-expanded', 'false');
      } else {
        el.style.display = 'flex';
        btn.textContent = '▾';
        btn.setAttribute('aria-expanded', 'true');
      }
    }
  });
});
