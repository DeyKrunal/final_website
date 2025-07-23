const express = require('express');
const router = express.Router();
const pdfController = require('../controllers/pdfController');

// Generate PDF route
router.post('/generate', pdfController.generatePdf);

module.exports = router;
