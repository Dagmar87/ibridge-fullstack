export const horizontalBarOptions = {
  indexAxis: "y",
  responsive: true,
  plugins: {
    legend: { display: false },
    datalabels: {
      anchor: "end",
      align: "right",
      formatter: (value) => value,
      color: "#000",
      font: { weight: "bold" }
    }
  },
  scales: {
    x: {
      beginAtZero: true
    }
  }
};