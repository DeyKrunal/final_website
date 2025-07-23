const express = require('express');
const router = express.Router();
const groupController = require('../controllers/groupController');

// Add group route
router.post('/', groupController.addGroup);

// Get all groups route
router.get('/', groupController.getAllGroups);

// Get group by id route
router.get('/:id', groupController.getGroupById);

// Update group route
router.put('/:id', groupController.updateGroup);

// Delete group route
router.delete('/:id', groupController.deleteGroup);

module.exports = router;
