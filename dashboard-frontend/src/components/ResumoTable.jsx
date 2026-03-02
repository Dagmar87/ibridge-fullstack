import { useEffect, useState } from "react";
import api from "../services/api";

export default function ResumoTable() {
  const [dados, setDados] = useState([]);

  useEffect(() => {
    api.get("/resumo").then((res) => {
      setDados(res.data);
    });
  }, []);

  return (
    <div>
      <h2>Resumo por Lista</h2>
      <table border="1" cellPadding="8">
        <thead>
          <tr>
            <th>Campanha</th>
            <th>Lista</th>
            <th>Chamadas</th>
            <th>Sem Contato</th>
            <th>Contato</th>
            <th>Abordagem</th>
            <th>Fechamento</th>
          </tr>
        </thead>
        <tbody>
          {dados.map((item) => (
            <tr key={item.lista_id}>
              <td>{item.lista?.campanha?.nome}</td>
              <td>{item.lista?.nome}</td>
              <td>{item.total}</td>
              <td>{item.sem_contato}</td>
              <td>{item.contato}</td>
              <td>{item.abordagem}</td>
              <td>{item.fechamentos}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}