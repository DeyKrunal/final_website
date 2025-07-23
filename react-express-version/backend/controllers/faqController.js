const db = require('../config/db');

// Add a new faq
exports.addFaq = (req, res) => {
  const { question, answer } = req.body;
  const sql = 'INSERT INTO faq_tbl (question, answer) VALUES (?, ?)';
  db.query(sql, [question, answer], (err, result) => {
    if (err) throw err;
    res.status(201).send('FAQ added successfully');
  });
};

// Get all faqs
exports.getAllFaqs = (req, res) => {
  const sql = 'SELECT * FROM faq_tbl';
  db.query(sql, (err, results) => {
    if (err) throw err;
    res.json(results);
  });
};

// Get faq by ID
exports.getFaqById = (req, res) => {
  const { id } = req.params;
  const sql = 'SELECT * FROM faq_tbl WHERE fid = ?';
  db.query(sql, [id], (err, result) => {
    if (err) throw err;
    res.json(result[0]);
  });
};

// Update faq
exports.updateFaq = (req, res) => {
  const { id } = req.params;
  const { question, answer } = req.body;
  const sql = 'UPDATE faq_tbl SET question = ?, answer = ? WHERE fid = ?';
  db.query(sql, [question, answer, id], (err, result) => {
    if (err) throw err;
    res.send('FAQ updated successfully');
  });
};

// Delete faq
exports.deleteFaq = (req, res) => {
  const { id } = req.params;
  const sql = 'DELETE FROM faq_tbl WHERE fid = ?';
  db.query(sql, [id], (err, result) => {
    if (err) throw err;
    res.send('FAQ deleted successfully');
  });
};
