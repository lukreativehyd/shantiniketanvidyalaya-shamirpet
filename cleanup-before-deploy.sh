#!/bin/bash

###############################################################################
# CLEANUP SCRIPT - Remove all test/debug files before server deployment
# Run this script ONCE before uploading to production server
# Usage: bash cleanup-before-deploy.sh
###############################################################################

echo "🧹 Starting cleanup for production deployment..."
echo "==============================================="

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Change to script directory
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
cd "$SCRIPT_DIR" || exit 1

# Function to safely remove file
remove_file() {
    if [ -f "$1" ]; then
        rm -f "$1"
        echo -e "${GREEN}✓${NC} Removed: $1"
    fi
}

# Function to safely remove directory
remove_dir() {
    if [ -d "$1" ]; then
        rm -rf "$1"
        echo -e "${GREEN}✓${NC} Removed: $1"
    fi
}

# Function to show what will be deleted
show_status() {
    echo ""
    echo -e "${YELLOW}Files to be removed:${NC}"
    echo "==============================================="
    find . -maxdepth 3 \( \
        -name "test-*.php" \
        -o -name "*-diagnostic.php" \
        -o -name "check-*.php" \
        -o -name "*_database.db" \
        -o -name ".*_database.db" \
        -o -name "*.backup" \
        -o -name "error.log" \
        -o -name "form-submissions.log" \
        -o -name ".gitignore" \
        -o -name "LOCAL_TESTING_GUIDE.md" \
        -o -name "SETUP_GUIDE.md" \
    \) -type f 2>/dev/null | sort
}

# Ask for confirmation
echo ""
show_status
echo ""
echo -e "${YELLOW}⚠️  WARNING: This will permanently delete the files listed above!${NC}"
read -p "Do you want to continue? (yes/no): " confirm

if [ "$confirm" != "yes" ]; then
    echo -e "${YELLOW}Cleanup cancelled.${NC}"
    exit 0
fi

echo ""
echo "Starting removal..."
echo "==============================================="

# Remove test files from admin folder
remove_file "admin/test-google-sheets.php"
remove_file "admin/check-admin-users.php"
remove_file "admin/check-table-structure.php"
remove_file "admin/setup-local-db.php"
remove_file "admin/setup-blogs.php"
remove_file "admin/blog-diagnostic.php"
remove_file "admin/add-sample-blogs.php"
remove_file "admin/direct-setup.php"

# Remove database files
remove_file "admin/test_database.db"
remove_file "admin/._test_database.db"
remove_file "school_database.db"
remove_file "._school_database.db"

# Remove log files
remove_file "admin/error.log"
remove_file "admin/form-submissions.log"

# Remove backup files
remove_file "admin/abandoned-entries.php.backup"
remove_file "admin/enquiries.php.backup"

# Remove documentation/guides
remove_file "admin/LOCAL_TESTING_GUIDE.md"
remove_file "admin/SETUP_GUIDE.md"

# Remove git files
remove_file ".gitignore"
remove_file "admin/.gitignore"

# Remove test files from root
remove_file "test-abandoned-entry.php"
remove_file "test-google-sheets.php"
remove_file "router.php"

# Remove macOS metadata files (._* files)
echo ""
echo -e "${YELLOW}Cleaning up macOS metadata files...${NC}"
find . -name "._*" -type f -delete
echo -e "${GREEN}✓${NC} Removed all macOS metadata files"

echo ""
echo "==============================================="
echo -e "${GREEN}✅ Cleanup complete!${NC}"
echo ""
echo "📦 Ready for deployment!"
echo ""
echo "Next steps:"
echo "1. Run: tar -czf shamirpet-website.tar.gz --exclude=.DS_Store --exclude=.git ."
echo "2. Deploy via SSH or FTP to your server"
echo "3. Extract on server and set permissions"
echo ""
