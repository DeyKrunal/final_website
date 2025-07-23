const express = require('express');
const router = express.Router();
const fileController = require('../controllers/fileController');
const multer = require('multer');

const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, 'uploads/');
  },
  filename: (req, file, cb) => {
    cb(null, Date.now() + '-' + file.originalname);
  }
});

const upload = multer({ storage: storage });

// Upload file route
router.post('/upload', upload.single('file'), fileController.uploadFile);

// Get all files route
router.get('/', fileController.getAllFiles);

// Delete file route
router.delete('/:id', fileController.deleteFile);

module.exports = router;
