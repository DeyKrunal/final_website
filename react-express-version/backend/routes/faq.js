const express = require('express');
const router = express.Router();
const faqController = require('../controllers/faqController');

// Add faq route
router.post('/', faqController.addFaq);

// Get all faqs route
router.get('/', faqController.getAllFaqs);

// Get faq by id route
router.get('/:id', faqController.getFaqById);

// Update faq route
router.put('/:id', faqController.updateFaq);

// Delete faq route
router.delete('/:id', faqController.deleteFaq);

module.exports = router;
