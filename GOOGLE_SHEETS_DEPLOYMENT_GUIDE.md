# 🚀 Google Apps Script Redeployment Guide

## Quick Summary
Your Google Apps Script webhook has broken. This guide will help you redeploy it without breaking anything, keeping the same field names and sheet structure.

---

## STEP 1: Get Your Google Sheet ID

1. Open your Google Sheet with the enquiry data
2. Look at the URL: `https://docs.google.com/spreadsheets/d/**XXXXXXXXXXXXXXXX**/edit`
3. Copy the part between `/d/` and `/edit` - that's your **SHEET_ID**
4. Note the exact name of the sheet tab (usually "Enquiries" or "Sheet1")

---

## STEP 2: Deploy New Google Apps Script

1. Go to **https://script.google.com**
2. Click **"Create Project"** (top left, or create new)
3. Name it: **"Shamirpet Enquiry Handler"**
4. Delete the default code
5. Copy-paste the complete code from `GOOGLE_APPS_SCRIPT_CODE.gs` in this folder
6. **IMPORTANT**: Update line 11 with your SHEET_ID:
   ```javascript
   const SHEET_ID = "YOUR_GOOGLE_SHEET_ID_HERE";
   ```
   Replace `YOUR_GOOGLE_SHEET_ID_HERE` with the actual ID from Step 1

7. Update line 12 if your sheet tab has a different name:
   ```javascript
   const SHEET_NAME = "Enquiries"; // Change if needed
   ```

8. Click **"Save"** (Ctrl+S or Cmd+S)
9. Click **"Deploy"** (top right)
10. Select **"New Deployment"**
11. Click the gear icon ⚙️ and select **"Web app"**
12. Set:
    - **Execute as**: Your email address
    - **Who has access**: Anyone
13. Click **"Deploy"**
14. Google will ask for permissions - click **"Authorize"**
15. A new dialog appears showing your **Deployment ID** and **URL**
16. **COPY THE FULL URL** - it will look like:
    ```
    https://script.google.com/macros/s/[DEPLOYMENT_ID]/usercontent
    ```
    ⚠️ **Don't use the old URL** - copy the new one from the "Copy URL" button

---

## STEP 3: Update Your Shamirpet Website

Open `process-enquiry.php` and find this line (around line 33):

```php
define('GOOGLE_SHEET_WEBHOOK_URL', 'https://script.google.com/macros/s/AKfycbx8OrECBa07KHHu8QB7R5rPy57N2zkt3Q50hzYeafHVAxbaR8t6Sr-NCIumqbGdxoeWCg/exec');
```

Replace it with your **new URL from Step 2**:

```php
define('GOOGLE_SHEET_WEBHOOK_URL', 'https://script.google.com/macros/s/[YOUR_NEW_DEPLOYMENT_ID]/usercontent');
```

Then deploy the website:
```bash
bash deploy.sh
```

---

## STEP 4: Update Your Old Website

**Important**: You need to update the old website's form processor too, OR create a separate Apps Script deployment for it.

### Option A: Same Apps Script for Both (Recommended)
Use the same webhook URL from Step 2 in your old website's code.

Locate the old website's form processor (likely `process-enquiry.php` or similar) and update the webhook URL there too.

### Option B: Separate Apps Scripts (Safer)
If you want to keep them completely independent:
1. Repeat STEP 2 again (Deploy another New Deployment from the same project)
2. Google will create a different URL for the second deployment
3. Use the first URL in Shamirpet website
4. Use the second URL in old website

This way they don't interfere with each other.

---

## STEP 5: Test It

### Test Direct Webhook
```bash
curl -X POST "https://script.google.com/macros/s/[YOUR_DEPLOYMENT_ID]/usercontent" \
  -d "parentName=Test&mobileNumber=9999999999&email=test@example.com&childName=Student&age=10&grade=5&timestamp=$(date +%s)"
```

You should get:
```json
{"status":"success","message":"Data received and saved","timestamp":"2026-03-09T..."}
```

### Test Through Website
1. Submit the form on your website
2. Check if entry appears in Google Sheet within 5 seconds
3. Check if email was sent: ✅

---

## Important Notes

**Field Names** (these must match your sheet headers):
- `parentName` 
- `mobileNumber`
- `email`
- `childName`
- `age`
- `grade`
- `timestamp`

**Sheet Column Order** (the code appends in this order):
1. Timestamp
2. Parent Name
3. Mobile Number
4. Email
5. Child Name
6. Age
7. Grade

If your sheet has different column order, or you want to send different fields, let me know and I can adjust the Apps Script.

---

## Troubleshooting

**"Sheet not found" error**
- Check the SHEET_NAME variable matches your actual sheet tab name (case-sensitive)
- Sheet name is shown at the bottom of Google Sheets, left side

**Still getting 404 or HTML response**
- Make sure you copied the NEW deployment URL from Step 2
- Don't use the old broken URL

**Data not appearing in sheet after 10 seconds**
- Check Google Apps Script logs: https://script.google.com
- Select your project, click "Executions" tab to see errors
- Run a test curl command first to isolate if it's PHP or Apps Script

**Both old and new website need updating**
- Update the webhook URL in BOTH websites' form processors
- Or use separate deployments as described in Option B of STEP 4

---

## Done! ✅

Once data starts appearing in your Google Sheet:
1. Entries come from website form ✅
2. Email notifications still work ✅
3. Admin dashboard saves entries ✅
4. Google Sheet receives data ✅

All three channels working together!
