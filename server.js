const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');
const ewelink = require('ewelink-api');

const app = express();
app.use(cors());
app.use(bodyParser.json());

const connection = new ewelink({
  email: process.env.EWELINK_EMAIL,
  password: process.env.EWELINK_PASSWORD,
  region: 'us',
  APP_ID: process.env.EWELINK_APP_ID,
  APP_SECRET: process.env.EWELINK_APP_SECRET
});

// Control de encendido/apagado (POST)
app.post('/control', async (req, res) => {
  const { dispositivo } = req.body;
  console.log("Recibido dispositivo para controlar:", dispositivo);  // Log de lo que recibe el servidor

  try {
    const devices = await connection.getDevices();
    const device = devices.find(
      d => d.name.toLowerCase() === dispositivo.toLowerCase()
    );
    if (!device) return res.json({ success: false, message: 'Dispositivo no encontrado' });

    const estado = await connection.getDevicePowerState(device.deviceid);
    const nuevoEstado = estado.state === 'on' ? 'off' : 'on';
    await connection.setDevicePowerState(device.deviceid, nuevoEstado);

    res.json({ success: true, estado: nuevoEstado });
  } catch (err) {
    console.error(err);
    res.json({ success: false, message: 'Error al controlar el dispositivo' });
  }
});

// Evitar error "Cannot GET /control" para peticiones GET
app.get('/control', (req, res) => {
  res.send('Ruta /control solo acepta peticiones POST para controlar dispositivos.');
});

// Página principal
app.get('/', (req, res) => {
  res.send('API de control de luces activa');
});

// Listado de dispositivos disponibles
app.get('/dispositivos', async (req, res) => {
  try {
    const devices = await connection.getDevices();
    const estados = await Promise.all(
      devices.map(async (d) => {
        try {
          const estado = await connection.getDevicePowerState(d.deviceid);
          return {
            nombre: d.name,
            estado: estado.state
          };
        } catch {
          return {
            nombre: d.name,
            estado: 'unknown'
          };
        }
      })
    );
    res.json(estados);
  } catch (err) {
    console.error(err);
    res.status(500).json({ error: 'Error al obtener los dispositivos' });
  }
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => console.log(`Servidor corriendo en puerto ${PORT}`));
