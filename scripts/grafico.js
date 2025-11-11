function pegarGastos() {
  const elementos = document.querySelectorAll("#dados-gastos p[data-func]");
  const labels = [];
  const valores = [];

  elementos.forEach(p => {
    labels.push(p.getAttribute("data-func"));
    const texto = p.textContent.match(/R\$ ?([\d.,]+)/);
    if (texto) valores.push(parseFloat(texto[1].replace('.', '').replace(',', '.')));
  });

  return { labels, valores };
}


const ctx = document.getElementById('graficoGastos').getContext('2d');
const dados = pegarGastos();

const grafico = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: dados.labels,
    datasets: [{
      label: 'Gastos por Função (R$)',
      data: dados.valores,
      backgroundColor: 'rgba(255,255,255,0.3)',
      borderColor: 'white',
      borderWidth: 2,
      borderRadius: 8
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true,
        ticks: { color: 'white' },
        grid: { color: 'rgba(255,255,255,0.2)' }
      },
      x: {
        ticks: { color: 'white' },
        grid: { color: 'rgba(255,255,255,0.2)' }
      }
    },
    plugins: {
      legend: { labels: { color: 'white' } }
    }
  }
});


const observer = new MutationObserver(() => {
  const novos = pegarGastos();
  grafico.data.labels = novos.labels;
  grafico.data.datasets[0].data = novos.valores;
  grafico.update();
});

observer.observe(document.getElementById('dados-gastos'), { childList: true, subtree: true, characterData: true });
