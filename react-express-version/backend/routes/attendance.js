const express = require('express');
const router = express.Router();
const attendanceController = require('../controllers/attendanceController');

// Add attendance route
router.post('/', attendanceController.addAttendance);

// Get all attendance route
router.get('/', attendanceController.getAllAttendance);

// Get attendance by id route
router.get('/:id', attendanceController.getAttendanceById);

module.exports = router;
