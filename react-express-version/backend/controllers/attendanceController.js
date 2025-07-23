const db = require('../config/db');

// Add a new attendance
exports.addAttendance = (req, res) => {
  const { s_id, date, status } = req.body;
  const sql = 'INSERT INTO attendance_tbl (s_id, date, status) VALUES (?, ?, ?)';
  db.query(sql, [s_id, date, status], (err, result) => {
    if (err) throw err;
    res.status(201).send('Attendance added successfully');
  });
};

// Get all attendance
exports.getAllAttendance = (req, res) => {
  const sql = 'SELECT * FROM attendance_tbl';
  db.query(sql, (err, results) => {
    if (err) throw err;
    res.json(results);
  });
};

// Get attendance by ID
exports.getAttendanceById = (req, res) => {
  const { id } = req.params;
  const sql = 'SELECT * FROM attendance_tbl WHERE aid = ?';
  db.query(sql, [id], (err, result) => {
    if (err) throw err;
    res.json(result[0]);
  });
};
