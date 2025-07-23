const db = require('../config/db');

// Add a new schedule
exports.addSchedule = (req, res) => {
  const { g_id, f_id, date, time, status } = req.body;
  const sql = 'INSERT INTO schedule_tbl (g_id, f_id, date, time, status) VALUES (?, ?, ?, ?, ?)';
  db.query(sql, [g_id, f_id, date, time, status], (err, result) => {
    if (err) throw err;
    res.status(201).send('Schedule added successfully');
  });
};

// Get all schedules
exports.getAllSchedules = (req, res) => {
  const sql = 'SELECT * FROM schedule_tbl';
  db.query(sql, (err, results) => {
    if (err) throw err;
    res.json(results);
  });
};

// Get schedule by ID
exports.getScheduleById = (req, res) => {
  const { id } = req.params;
  const sql = 'SELECT * FROM schedule_tbl WHERE sid = ?';
  db.query(sql, [id], (err, result) => {
    if (err) throw err;
    res.json(result[0]);
  });
};

// Update schedule
exports.updateSchedule = (req, res) => {
  const { id } = req.params;
  const { g_id, f_id, date, time, status } = req.body;
  const sql = 'UPDATE schedule_tbl SET g_id = ?, f_id = ?, date = ?, time = ?, status = ? WHERE sid = ?';
  db.query(sql, [g_id, f_id, date, time, status, id], (err, result) => {
    if (err) throw err;
    res.send('Schedule updated successfully');
  });
};

// Delete schedule
exports.deleteSchedule = (req, res) => {
  const { id } = req.params;
  const sql = 'DELETE FROM schedule_tbl WHERE sid = ?';
  db.query(sql, [id], (err, result) => {
    if (err) throw err;
    res.send('Schedule deleted successfully');
  });
};
