const db = require('../config/db');
const bcrypt = require('bcryptjs');

// Add a new group
exports.addGroup = (req, res) => {
  const { group_name, pass, sname1, srno1, sdiv1, sphno1, semail1, sname2, srno2, sdiv2, sphno2, semail2, sname3, srno3, sdiv3, sphno3, semail3, sname4, srno4, sdiv4, sphno4, semail4, faculty_id } = req.body;
  const hashedPassword = bcrypt.hashSync(pass, 10);

  const sql = 'INSERT INTO group_stud_tbl (group_name, pass, sname1, srno1, sdiv1, sphno1, semail1, sname2, srno2, sdiv2, sphno2, semail2, sname3, srno3, sdiv3, sphno3, semail3, sname4, srno4, sdiv4, sphno4, semail4, faculty_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
  db.query(sql, [group_name, hashedPassword, sname1, srno1, sdiv1, sphno1, semail1, sname2, srno2, sdiv2, sphno2, semail2, sname3, srno3, sdiv3, sphno3, semail3, sname4, srno4, sdiv4, sphno4, semail4, faculty_id], (err, result) => {
    if (err) throw err;
    res.status(201).send('Group added successfully');
  });
};

// Get all groups
exports.getAllGroups = (req, res) => {
  const sql = 'SELECT * FROM group_stud_tbl';
  db.query(sql, (err, results) => {
    if (err) throw err;
    res.json(results);
  });
};

// Get group by ID
exports.getGroupById = (req, res) => {
  const { id } = req.params;
  const sql = 'SELECT * FROM group_stud_tbl WHERE gsid = ?';
  db.query(sql, [id], (err, result) => {
    if (err) throw err;
    res.json(result[0]);
  });
};

// Update group
exports.updateGroup = (req, res) => {
  const { id } = req.params;
  const { group_name, sname1, srno1, sdiv1, sphno1, semail1, sname2, srno2, sdiv2, sphno2, semail2, sname3, srno3, sdiv3, sphno3, semail3, sname4, srno4, sdiv4, sphno4, semail4, faculty_id } = req.body;
  const sql = 'UPDATE group_stud_tbl SET group_name = ?, sname1 = ?, srno1 = ?, sdiv1 = ?, sphno1 = ?, semail1 = ?, sname2 = ?, srno2 = ?, sdiv2 = ?, sphno2 = ?, semail2 = ?, sname3 = ?, srno3 = ?, sdiv3 = ?, sphno3 = ?, semail3 = ?, sname4 = ?, srno4 = ?, sdiv4 = ?, sphno4 = ?, semail4 = ?, faculty_id = ? WHERE gsid = ?';
  db.query(sql, [group_name, sname1, srno1, sdiv1, sphno1, semail1, sname2, srno2, sdiv2, sphno2, semail2, sname3, srno3, sdiv3, sphno3, semail3, sname4, srno4, sdiv4, sphno4, semail4, faculty_id, id], (err, result) => {
    if (err) throw err;
    res.send('Group updated successfully');
  });
};

// Delete group
exports.deleteGroup = (req, res) => {
  const { id } = req.params;
  const sql = 'DELETE FROM group_stud_tbl WHERE gsid = ?';
  db.query(sql, [id], (err, result) => {
    if (err) throw err;
    res.send('Group deleted successfully');
  });
};
