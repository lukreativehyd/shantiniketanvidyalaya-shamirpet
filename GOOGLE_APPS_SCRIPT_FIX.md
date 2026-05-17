# Google Apps Script - Corrected doPost Function

## Update Your Apps Script on Google Sheets

Your current Apps Script is receiving form-encoded data. Replace your existing `doPost` function with this:

```javascript
function doPost(e) {
  try {
    var sheet = SpreadsheetApp.getActiveSheet();
    
    var timestamp = new Date();
    var parentName = e.parameter.parentName || '';
    var mobileNumber = e.parameter.mobileNumber || '';
    var email = e.parameter.email || '';
    var childName = e.parameter.childName || '';
    var age = e.parameter.age || '';
    var grade = e.parameter.grade || '';
    var message = e.parameter.message || '';
    
    // Append row to sheet
    sheet.appendRow([
      timestamp,
      parentName,
      mobileNumber,
      email,
      childName,
      age,
      grade
    ]);
    
    // Optional: Add message to column H if it exists
    if (message && sheet.getLastColumn() >= 8) {
      sheet.getRange(sheet.getLastRow(), 8).setValue(message);
    }
    
    // Return success response
    return ContentService.createTextOutput(JSON.stringify({
      status: 'success',
      message: 'Data saved to Google Sheets',
      timestamp: timestamp.toString()
    })).setMimeType(ContentService.MimeType.JSON);
    
  } catch(error) {
    return ContentService.createTextOutput(JSON.stringify({
      status: 'error',
      message: error.toString()
    })).setMimeType(ContentService.MimeType.JSON);
  }
}
```

## Steps to Update:

1. Go to your Google Sheet
2. Click **Extensions → Apps Script**
3. Replace the entire `doPost` function with the code above
4. Save (Ctrl+S or Cmd+S)
5. **No need to redeploy** - the same deployment URL will work

## What Changed:

- Now uses `e.parameter.fieldName` instead of parsing JSON
- This matches the form data format being sent from the website
- All fields (parentName, mobileNumber, email, childName, age, grade, message) will now be captured
- Timestamp, parent name, mobile, email, student name, age, and grade will populate columns A-G
- Message will populate column H (optional)

## After Updating:

1. Test the form again on your website
2. Submit a test enquiry
3. Check your Google Sheet - all fields should populate correctly
4. You should see 7 columns of data + optional message column

---

**Important:** Make sure your Google Sheet columns are labeled exactly as shown in GOOGLE_SHEETS_INTEGRATION_GUIDE.md
