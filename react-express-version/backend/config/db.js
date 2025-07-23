const mysql = require('mysql');

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'id21878481_projectpilot',
  password: 'Project24@',
  database: 'id21878481_projectpilot'
});

connection.connect(err => {
  if (err) {
    console.error('Error connecting to database:', err);
    return;
  }
  console.log('Connected to database');
});

module.exports = connection;
