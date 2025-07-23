const express = require('express');
const router = express.Router();
const progressController = require('../controllers/progressController');

// Add progress route
router.post('/', progressController.addProgress);

// Get all progress route
router.get('/', progressController.getAllProgress);

// Get progress by id route
router.get('/:id', progressController.getProgressById);

// Update progress route
router.put('/:id', progressController.updateProgress);

// Delete progress route
router.delete('/:id', progressController.deleteProgress);

module.exports = router;
