const db = require('../config/db');

// Add a new progress
exports.addProgress = (req, res) => {
  const { grpid, p1, p2, p3, p4, p5, p6, p7, p8, p9, date } = req.body;
  const sql = 'INSERT INTO progress_tbl (grpid, p1, p2, p3, p4, p5, p6, p7, p8, p9, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
  db.query(sql, [grpid, p1, p2, p3, p4, p5, p6, p7, p8, p9, date], (err, result) => {
    if (err) throw err;
    res.status(201).send('Progress added successfully');
  });
};

// Get all progress
exports.getAllProgress = (req, res) => {
  const sql = 'SELECT * FROM progress_tbl';
  db.query(sql, (err, results) => {
    if (err) throw err;
    res.json(results);
  });
};

// Get progress by ID
exports.getProgressById = (req, res) => {
  const { id } = req.params;
  const sql = 'SELECT * FROM progress_tbl WHERE proid = ?';
  db.query(sql, [id], (err, result) => {
    if (err) throw err;
    res.json(result[0]);
  });
};

// Update progress
exports.updateProgress = (req, res) => {
  const { id } = req.params;
  const { grpid, p1, p2, p3, p4, p5, p6, p7, p8, p9, date } = req.body;
  const sql = 'UPDATE progress_tbl SET grpid = ?, p1 = ?, p2 = ?, p3 = ?, p4 = ?, p5 = ?, p6 = ?, p7 = ?, p8 = ?, p9 = ?, date = ? WHERE proid = ?';
  db.query(sql, [grpid, p1, p2, p3, p4, p5, p6, p7, p8, p9, date, id], (err, result) => {
    if (err) throw err;
    res.send('Progress updated successfully');
  });
};

// Delete progress
exports.deleteProgress = (req, res) => {
  const { id } = req.params;
  const sql = 'DELETE FROM progress_tbl WHERE proid = ?';
  db.query(sql, [id], (err, result) => {
    if (err) throw err;
    res.send('Progress deleted successfully');
  });
};
