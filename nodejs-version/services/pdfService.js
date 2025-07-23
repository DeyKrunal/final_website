const PDFDocument = require('pdfkit');

exports.generatePdf = (data, stream) => {
  const doc = new PDFDocument();
  doc.pipe(stream);
  doc.fontSize(25).text(data, 100, 100);
  doc.end();
};
