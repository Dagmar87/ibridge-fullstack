import { useEffect, useState } from "react";
import { Bar } from "react-chartjs-2";
import api from "../services/api";
import { horizontalBarOptions } from "./chartOptions";

export default function TopListasChart() {
  const [dados, setDados] = useState([]);

  useEffect(() => {
    api.get("/top-listas").then((res) => {
      setDados(res.data);
    });
  }, []);

  const data = {
    labels: dados.map((d) => d.lista?.nome),
    datasets: [
      {
        label: "Fechamentos",
        data: dados.map((d) => d.total_fechamentos),
      },
    ],
  };

  return (
    <div>
      <h2>Top 10 Fechamentos por Lista</h2>
      <Bar data={data} options={horizontalBarOptions} />
    </div>
  );
}