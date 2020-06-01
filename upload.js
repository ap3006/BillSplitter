// POST /upload for single file upload
/* ===== Make sure that file name matches the name attribute in your html ===== */
app.post('/upload', upload.single('myFile'), (req, res) => {
    if (req.file) {
        console.log('Uploading file...');
        var filename = req.file.filename;
        var uploadStatus = 'File Uploaded Successfully';
    } else {
        console.log('No File Uploaded');
        var filename = 'FILE NOT UPLOADED';
        var uploadStatus = 'File Upload Failed';
    }

    /* ===== Add the function to save filename to database ===== */

    res.render('index.hbs', { status: uploadStatus, filename: `Name Of File: ${filename}` });
});
