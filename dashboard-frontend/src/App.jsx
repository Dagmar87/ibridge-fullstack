import ResumoTable from "./components/ResumoTable";
import TopOperadoresChart from "./components/TopOperadoresChart";
import TopListasChart from "./components/TopListasChart";
import TopCampanhasChart from "./components/TopCampanhasChart";
import AppLayout from "./layout/AppLayout";
import Grid from "@mui/material/Grid";
import Paper from "@mui/material/Paper";
import Typography from "@mui/material/Typography";

function App() {
  return (
    <AppLayout>
      <Typography variant="h4" sx={{ mb: 3, fontWeight: 600 }}>
        Dashboard de Chamadas
      </Typography>

      <Grid container spacing={3}>
        <Grid item xs={12}>
          <Paper elevation={1} sx={{ p: 2 }}>
            <ResumoTable />
          </Paper>
        </Grid>

        <Grid item xs={12} md={6}>
          <Paper elevation={1} sx={{ p: 2 }}>
            <TopOperadoresChart />
          </Paper>
        </Grid>
        <Grid item xs={12} md={6}>
          <Paper elevation={1} sx={{ p: 2 }}>
            <TopListasChart />
          </Paper>
        </Grid>
        <Grid item xs={12} md={6}>
          <Paper elevation={1} sx={{ p: 2 }}>
            <TopCampanhasChart />
          </Paper>
        </Grid>
      </Grid>
    </AppLayout>
  );
}

export default App;
