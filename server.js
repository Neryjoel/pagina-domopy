const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');
const ewelink = require('ewelink-api');

const app = express();

app.use(cors({
  origin: 'https://www.domopy.com',
  methods: ['GET', 'POST'],
  allowedHeaders: ['Content-Type'],
}));

app.use(bodyParser.json());

const connection = new ewelink({
  email: process.env.EWELINK_EMAIL,
  password: process.env.EWELINK_PASSWORD,
  region: 'us',
  APP_ID: process.env.EWELINK_APP_ID,
  APP_SECRET: process.env.EWELINK_APP_SECRET,
});

function generarSlug(nombre) {
  return nombre.toLowerCase()
    .replace(/\s+/g, '-')
    .replace(/[á]/g, 'a')
    .replace(/[é]/g, 'e')
    .replace(/[í]/g, 'i')
    .replace(/[ó]/g, 'o')
    .replace(/[ú]/g, 'u')
    .replace(/[ñ]/g, 'n');
}

app.post('/control', async (req, res) => {
  const { dispositivo } = req.body;
  try {
    const devices = await connection.getDevices();
    const slugObjetivo = generarSlug(dispositivo);
    const device = devices.find(d => generarSlug(d.name) === slugObjetivo);

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

app.get('/dispositivos', async (req, res) => {
  try {
    const devices = await connection.getDevices();
    const estados = await Promise.all(
      devices.map(async (d) => {
        try {
          const estado = await connection.getDevicePowerState(d.deviceid);
          return {
            nombre: d.name,
            estado: estado.state,
          };
        } catch {
          return {
            nombre: d.name,
            estado: 'unknown',
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
