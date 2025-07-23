const db = require('../config/db');
const bcrypt = require('bcryptjs');

// Add a new faculty
exports.addFaculty = (req, res) => {
  const { f_name, f_email, f_phno, f_desc, f_qualif, f_exp, f_address, f_pwd } = req.body;
  const hashedPassword = bcrypt.hashSync(f_pwd, 10);

  const sql = 'INSERT INTO faculty_tbl (f_name, f_email, f_phno, f_desc, f_qualif, f_exp, f_address, f_pwd) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
  db.query(sql, [f_name, f_email, f_phno, f_desc, f_qualif, f_exp, f_address, hashedPassword], (err, result) => {
    if (err) throw err;
    res.status(201).send('Faculty added successfully');
  });
};

// Get all faculty
exports.getAllFaculty = (req, res) => {
  const sql = 'SELECT * FROM faculty_tbl';
  db.query(sql, (err, results) => {
    if (err) throw err;
    res.json(results);
  });
};

// Get faculty by ID
exports.getFacultyById = (req, res) => {
  const { id } = req.params;
  const sql = 'SELECT * FROM faculty_tbl WHERE fid = ?';
  db.query(sql, [id], (err, result) => {
    if (err) throw err;
    res.json(result[0]);
  });
};

// Update faculty
exports.updateFaculty = (req, res) => {
  const { id } = req.params;
  const { f_name, f_email, f_phno, f_desc, f_qualif, f_exp, f_address } = req.body;
  const sql = 'UPDATE faculty_tbl SET f_name = ?, f_email = ?, f_phno = ?, f_desc = ?, f_qualif = ?, f_exp = ?, f_address = ? WHERE fid = ?';
  db.query(sql, [f_name, f_email, f_phno, f_desc, f_qualif, f_exp, f_address, id], (err, result) => {
    if (err) throw err;
    res.send('Faculty updated successfully');
  });
};

// Delete faculty
exports.deleteFaculty = (req, res) => {
  const { id } = req.params;
  const sql = 'DELETE FROM faculty_tbl WHERE fid = ?';
  db.query(sql, [id], (err, result) => {
    if (err) throw err;
    res.send('Faculty deleted successfully');
  });
};
