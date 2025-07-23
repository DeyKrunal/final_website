const express = require('express');
const router = express.Router();
const facultyController = require('../controllers/facultyController');

// Add faculty route
router.post('/', facultyController.addFaculty);

// Get all faculty route
router.get('/', facultyController.getAllFaculty);

// Get faculty by id route
router.get('/:id', facultyController.getFacultyById);

// Update faculty route
router.put('/:id', facultyController.updateFaculty);

// Delete faculty route
router.delete('/:id', facultyController.deleteFaculty);

module.exports = router;
