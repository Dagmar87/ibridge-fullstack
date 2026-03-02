import ResumoTable from "./components/ResumoTable";
import TopOperadoresChart from "./components/TopOperadoresChart";
import TopListasChart from "./components/TopListasChart";
import TopCampanhasChart from "./components/TopCampanhasChart";

function App() {
  return (
    <div style={{ padding: 30 }}>
      <h1>Dashboard de Chamadas</h1>

      <ResumoTable />

      <TopOperadoresChart />
      <TopListasChart />
      <TopCampanhasChart />
    </div>
  );
}

export default App;