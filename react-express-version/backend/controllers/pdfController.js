const PDFDocument = require('pdfkit');
const fs = require('fs');
const db = require('../config/db');

exports.generatePdf = (req, res) => {
  const { groupId } = req.body;

  // Fetch group details from the database
  const groupSql = 'SELECT * FROM group_stud_tbl WHERE gsid = ?';
  db.query(groupSql, [groupId], (err, groupResult) => {
    if (err) throw err;
    if (groupResult.length === 0) {
      return res.status(404).send('Group not found');
    }
    const group = groupResult[0];

    // Fetch progress details from the database
    const progressSql = 'SELECT * FROM progress_tbl WHERE grpid = ?';
    db.query(progressSql, [groupId], (err, progressResult) => {
      if (err) throw err;
      const progress = progressResult[0] || {};

      const doc = new PDFDocument();
      const filePath = `pdfs/group_${groupId}_report.pdf`;
      const stream = fs.createWriteStream(filePath);
      doc.pipe(stream);

      // Add content to the PDF
      doc.fontSize(25).text('Group Report', { align: 'center' });
      doc.moveDown();
      doc.fontSize(20).text(`Group Name: ${group.group_name}`);
      doc.moveDown();

      // Student details
      doc.fontSize(16).text('Student Details', { underline: true });
      for (let i = 1; i <= 4; i++) {
        if (group[`sname${i}`]) {
          doc.moveDown();
          doc.fontSize(12).text(`Student ${i}:`);
          doc.text(`  Name: ${group[`sname${i}`]}`);
          doc.text(`  Roll No: ${group[`srno${i}`]}`);
          doc.text(`  Division: ${group[`sdiv${i}`]}`);
          doc.text(`  Phone: ${group[`sphno${i}`]}`);
          doc.text(`  Email: ${group[`semail${i}`]}`);
        }
      }

      // Progress details
      doc.moveDown();
      doc.fontSize(16).text('Progress Details', { underline: true });
      for (let i = 1; i <= 9; i++) {
        doc.text(`Progress ${i}: ${progress[`p${i}`] || 'N/A'}`);
      }

      doc.end();

      stream.on('finish', () => {
        res.download(filePath);
      });
    });
  });
};
