const express = require('express');
const mysql = require('mysql2/promise');
const app = express();
const port = 3000;

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'your_username',
  password: 'your_password',
  database: 'your_database'
});

app.get('/chart-data', async (req, res) => {
  try {
    const [rows] = await connection.query('SELECT * FROM your_table');
    const data = rows.map(row => ({
      label: row.label,
      data: row.data.split(',').map(Number)
    }));
    res.json(data);
  } catch (error) {
    console.error(error);
    res.status(500).send('Internal Server Error');
  }
});

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
