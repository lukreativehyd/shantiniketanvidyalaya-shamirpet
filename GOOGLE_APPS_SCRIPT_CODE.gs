/**
 * Google Apps Script for Shamirpet Website Enquiry Form
 * 
 * DEPLOYMENT INSTRUCTIONS:
 * 1. Go to https://script.google.com
 * 2. Click "Create Project"
 * 3. Replace the default code with this entire script
 * 4. Update the SHEET_ID below with your Google Sheet ID
 * 5. Click "Deploy" > "New Deployment"
 * 6. Type: Web app
 * 7. Execute as: [Your email]
 * 8. Who has access: Anyone
 * 9. Click "Deploy" and copy the new URL
 * 10. Update GOOGLE_SHEET_WEBHOOK_URL in process-enquiry.php with the new URL
 */

// ========== CONFIGURATION ==========
const SHEET_ID = "1_MmQPHdcz9vDvFdVJpLLQ7WcsFPgQoX0KqHsSNR2DXw";
const SHEET_NAME = "New Website Leads";

/**
 * Main entry point - handles POST requests from form
 */
function doPost(e) {
  try {
    console.log("📥 doPost called");
    
    // Check if event object exists
    if (!e) {
      console.error("❌ Event object is undefined");
      return ContentService.createTextOutput("Error: No data received").setMimeType(ContentService.MimeType.TEXT);
    }
    
    // Handle both JSON and URL-encoded data (try-catch pattern)
    let data;
    try {
      // Try to parse POST body as JSON
      if (e.postData && e.postData.contents) {
        data = JSON.parse(e.postData.contents);
        console.log("📋 Parsed as JSON");
      } else {
        // Fall back to URL-encoded parameters
        data = e.parameter || {};
        console.log("📋 Using URL-encoded parameters");
      }
    } catch (err) {
      // If JSON parsing fails, use URL-encoded
      data = e.parameter || {};
      console.log("📋 JSON parsing failed, using URL-encoded parameters");
    }
    
    console.log("Full data: " + JSON.stringify(data));
    
    // Get parameters from POST request
    const parentName = (data.parentName || "").toString().trim();
    const mobileNumber = (data.mobileNumber || "").toString().trim();
    const email = (data.email || "").toString().trim();
    const childName = (data.childName || "").toString().trim();
    const age = (data.age || "").toString().trim();
    const grade = (data.grade || "").toString().trim();
    const timestamp = (data.timestamp || new Date().toISOString()).toString();
    
    console.log("📋 Parsed data - Email: " + email + ", Child: " + childName);
    
    if (!email || !childName) {
      console.warn("⚠️ Missing required fields - Email: " + email + ", Child: " + childName);
      return ContentService.createTextOutput("Missing required fields").setMimeType(ContentService.MimeType.TEXT);
    }
    
    // Append to Google Sheet
    appendToSheet(parentName, mobileNumber, email, childName, age, grade, timestamp);
    
    console.log("✅ Data saved successfully");
    
    return ContentService.createTextOutput("Success").setMimeType(ContentService.MimeType.TEXT);
      
  } catch (error) {
    console.error("❌ Error in doPost: " + error.toString());
    console.error("Stack: " + error.stack);
    
    return ContentService.createTextOutput("Error: " + error.toString()).setMimeType(ContentService.MimeType.TEXT);
  }
}

/**
 * Append form data to Google Sheet
 */
function appendToSheet(parentName, mobileNumber, email, childName, age, grade, timestamp) {
  try {
    console.log("📊 Appending to sheet: " + SHEET_NAME);
    
    const sheet = SpreadsheetApp.openById(SHEET_ID).getSheetByName(SHEET_NAME);
    
    if (!sheet) {
      throw new Error("Sheet '" + SHEET_NAME + "' not found in spreadsheet");
    }
    
    // Append row with data
    sheet.appendRow([
      timestamp,
      parentName,
      mobileNumber,
      email,
      childName,
      age,
      grade
    ]);
    
    console.log("✅ Row appended to sheet");
    
  } catch (error) {
    console.error("❌ Sheet append error: " + error.toString());
    throw error;
  }
}

/**
 * Handle GET requests (for testing)
 */
function doGet(e) {
  return ContentService.createTextOutput("Shamirpet Enquiry Form Handler - POST data here").setMimeType(ContentService.MimeType.TEXT);
}
