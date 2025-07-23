const db = require('../config/db');
const fs = require('fs');

// Upload a new file
exports.uploadFile = (req, res) => {
  const { originalname, path, size } = req.file;
  const { g_id } = req.body;
  const sql = 'INSERT INTO files_tbl (g_id, file_name, file_path, file_size) VALUES (?, ?, ?, ?)';
  db.query(sql, [g_id, originalname, path, size], (err, result) => {
    if (err) throw err;
    res.status(201).send('File uploaded successfully');
  });
};

// Get all files
exports.getAllFiles = (req, res) => {
  const sql = 'SELECT * FROM files_tbl';
  db.query(sql, (err, results) => {
    if (err) throw err;
    res.json(results);
  });
};

// Delete file
exports.deleteFile = (req, res) => {
  const { id } = req.params;
  const sql = 'SELECT * FROM files_tbl WHERE fid = ?';
  db.query(sql, [id], (err, result) => {
    if (err) throw err;
    if (result.length > 0) {
      const file = result[0];
      fs.unlink(file.file_path, (err) => {
        if (err) throw err;
        const deleteSql = 'DELETE FROM files_tbl WHERE fid = ?';
        db.query(deleteSql, [id], (err, result) => {
          if (err) throw err;
          res.send('File deleted successfully');
        });
      });
    } else {
      res.status(404).send('File not found');
    }
  });
};
