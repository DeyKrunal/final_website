const db = require('../config/db');

// Add a new notification
exports.addNotification = (req, res) => {
  const { user_id, message, type } = req.body;
  const sql = 'INSERT INTO notification_tbl (user_id, message, type) VALUES (?, ?, ?)';
  db.query(sql, [user_id, message, type], (err, result) => {
    if (err) throw err;
    res.status(201).send('Notification added successfully');
  });
};

// Get all notifications
exports.getAllNotifications = (req, res) => {
  const sql = 'SELECT * FROM notification_tbl';
  db.query(sql, (err, results) => {
    if (err) throw err;
    res.json(results);
  });
};

// Get notification by ID
exports.getNotificationById = (req, res) => {
  const { id } = req.params;
  const sql = 'SELECT * FROM notification_tbl WHERE nid = ?';
  db.query(sql, [id], (err, result) => {
    if (err) throw err;
    res.json(result[0]);
  });
};
