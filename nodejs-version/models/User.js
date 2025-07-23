const db = require('../config/database');

class User {
  static async getAllUsers() {
    const [rows] = await db.query('SELECT * FROM users');
    return rows;
  }
}

module.exports = User;
