const express = require('express');
const cors = require('cors');
const app = express();
const port = process.env.PORT || 5000;

app.use(cors());
app.use(express.json());

const authRoutes = require('./routes/auth');
app.use('/api/auth', authRoutes);

const facultyRoutes = require('./routes/faculty');
app.use('/api/faculty', facultyRoutes);

const groupRoutes = require('./routes/groups');
app.use('/api/groups', groupRoutes);

const progressRoutes = require('./routes/progress');
app.use('/api/progress', progressRoutes);

const scheduleRoutes = require('./routes/schedule');
app.use('/api/schedule', scheduleRoutes);

const attendanceRoutes = require('./routes/attendance');
app.use('/api/attendance', attendanceRoutes);

const fileRoutes = require('./routes/files');
app.use('/api/files', fileRoutes);

const notificationRoutes = require('./routes/notifications');
app.use('/api/notifications', notificationRoutes);

const faqRoutes = require('./routes/faq');
app.use('/api/faq', faqRoutes);

const pdfRoutes = require('./routes/pdf');
app.use('/api/pdf', pdfRoutes);

app.get('/', (req, res) => {
  res.send('Hello from the backend!');
});

app.listen(port, () => {
  console.log(`Server is running on port: ${port}`);
});
