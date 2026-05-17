# 📝 How to Update Old Website Form Code

Since your old website uses the same Google Sheets webhook, here are the exact steps to update it.

---

## Option 1: Use Same Webhook (Simplest)

If your old website's form processor has code like this:

```php
$googleScriptURL = 'https://script.google.com/macros/s/[OLD_ID]/exec';

// ... send data ...
$ch = curl_init($googleScriptURL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_exec($ch);
curl_close($ch);
```

### Just replace the URL:

Find this line:
```php
$googleScriptURL = 'https://script.google.com/macros/s/AKfycbx8OrECBa07KHHu8QB7R5rPy57N2zkt3Q50hzYeafHVAxbaR8t6Sr-NCIumqbGdxoeWCg/exec';
```

Replace it with (from your new deployment in STEP 2):
```php
$googleScriptURL = 'https://script.google.com/macros/s/[YOUR_NEW_DEPLOYMENT_ID]/usercontent';
```

**Note**: The endpoint changed from `/exec` to `/usercontent` - this is important!

That's it! No other changes needed if the field names are the same.

---

## Option 2: Separate Webhook Per Website (More Robust)

If you want complete independence:

1. Go to **https://script.google.com**
2. Find your "Shamirpet Enquiry Handler" project
3. Click **"Deploy"** > **"Manage Deployments"**
4. Click **"Create new deployment"** (the button next to delete icon)
5. Type: **Web app**
6. Click **"Deploy"**
7. Google gives you a **different URL** - this is for the old website
8. Update old website's code with this new URL

Now:
- **Shamirpet website** → uses URL from Deployment 1
- **Old website** → uses URL from Deployment 2

Both send to the same Google Sheet, but through different deployment URLs.

---

## Finding & Updating the Old Website Code

### Where to look:

The form processor is usually one of these:
- `process-enquiry.php`
- `process-form.php`
- `submit-form.php`
- `api/form.php`
- Search for: `curl_init`, `http_build_query`, or the old webhook URL

### What to update:

Look for the webhook URL definition, usually near the top:

```php
define('GOOGLE_SHEET_WEBHOOK_URL', 'https://...');
// OR
$googleScriptURL = 'https://...';
// OR
const WEBHOOK_URL = 'https://...';
```

Replace the URL with your new one from Step 2 of the deployment guide.

### Code should look like this after update:

```php
<?php
// Old website form processor

// ===== GOOGLE SHEETS WEBHOOK =====
define('GOOGLE_SHEET_WEBHOOK_URL', 'https://script.google.com/macros/s/YOUR_NEW_DEPLOYMENT_ID/usercontent');

// ... rest of form processing code ...

// When sending to sheets:
if (!empty(GOOGLE_SHEET_WEBHOOK_URL)) {
    $postData = [
        'parentName' => $parentName,
        'mobileNumber' => $mobileNumber,
        'email' => $email,
        'childName' => $childName,
        'age' => $age,
        'grade' => $grade,
        'timestamp' => $timestamp
    ];
    
    $ch = curl_init(GOOGLE_SHEET_WEBHOOK_URL);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $response = curl_exec($ch);
    curl_close($ch);
}
?>
```

### Critical Details:

⚠️ **Field names MUST match** what the Google Apps Script expects:
- `parentName`
- `mobileNumber`
- `email`
- `childName`
- `age`
- `grade`
- `timestamp`

If your old website uses different field names (like `parent_phone` instead of `mobileNumber`), let me know and I'll adjust the Google Apps Script to accept both versions.

---

## Testing Old Website

After updating, test it:

```bash
curl -X POST "https://oldwebsite.com/process-form.php" \
  -d "parentName=Test&mobileNumber=9999999999&email=test@old.com&childName=Student&age=10&grade=5&agree=on"
```

Check if:
1. Form submission succeeds (returns success/thank you message)
2. Email is sent
3. Entry appears in Google Sheet within 5 seconds

---

## Summary Checklist

- [ ] Deploy new Google Apps Script (STEP 2 of main guide)
- [ ] Update Shamirpet website's `process-enquiry.php` with new URL
- [ ] Deploy Shamirpet website changes
- [ ] Find old website's form processor
- [ ] Replace old webhook URL with new one
- [ ] Deploy/upload old website changes
- [ ] Test both websites' forms
- [ ] Verify data appears in Google Sheet
- [ ] Verify emails still work

Done! Both websites now use the same Google Sheet integration.
