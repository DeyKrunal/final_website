const express = require('express');
const router = express.Router();
const notificationController = require('../controllers/notificationController');

// Add notification route
router.post('/', notificationController.addNotification);

// Get all notifications route
router.get('/', notificationController.getAllNotifications);

// Get notification by id route
router.get('/:id', notificationController.getNotificationById);

module.exports = router;
