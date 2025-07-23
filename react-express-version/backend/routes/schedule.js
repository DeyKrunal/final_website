const express = require('express');
const router = express.Router();
const scheduleController = require('../controllers/scheduleController');

// Add schedule route
router.post('/', scheduleController.addSchedule);

// Get all schedules route
router.get('/', scheduleController.getAllSchedules);

// Get schedule by id route
router.get('/:id', scheduleController.getScheduleById);

// Update schedule route
router.put('/:id', scheduleController.updateSchedule);

// Delete schedule route
router.delete('/:id', scheduleController.deleteSchedule);

module.exports = router;
