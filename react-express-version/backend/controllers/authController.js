const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');
const db = require('../config/db');

exports.login = (req, res) => {
  const { name, pwd } = req.body;

  // Check faculty table first
  let sql = 'SELECT * FROM faculty_tbl WHERE f_name = ?';
  db.query(sql, [name], (err, results) => {
    if (err) throw err;

    if (results.length > 0) {
      const faculty = results[0];
      bcrypt.compare(pwd, faculty.f_pwd, (err, isMatch) => {
        if (err) throw err;
        if (isMatch) {
          const payload = { id: faculty.fid, type: 'faculty' };
          jwt.sign(payload, 'secret', { expiresIn: 3600 }, (err, token) => {
            if (err) throw err;
            res.json({ success: true, token: 'Bearer ' + token });
          });
        } else {
          res.status(400).json({ success: false, msg: 'Password incorrect' });
        }
      });
    } else {
      // Check group table
      sql = 'SELECT * FROM group_stud_tbl WHERE group_name = ?';
      db.query(sql, [name], (err, results) => {
        if (err) throw err;

        if (results.length > 0) {
          const group = results[0];
          bcrypt.compare(pwd, group.pass, (err, isMatch) => {
            if (err) throw err;
            if (isMatch) {
              const payload = { id: group.gsid, type: 'group' };
              jwt.sign(payload, 'secret', { expiresIn: 3600 }, (err, token) => {
                if (err) throw err;
                res.json({ success: true, token: 'Bearer ' + token });
              });
            } else {
              res.status(400).json({ success: false, msg: 'Password incorrect' });
            }
          });
        } else {
          res.status(404).json({ success: false, msg: 'User not found' });
        }
      });
    }
  });
};
