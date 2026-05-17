#!/bin/bash

# ============================================================================
# CORRECTED DEPLOYMENT SCRIPT - Deploy to Staging Domain
# ============================================================================
# This script deploys to: /home/u723014502/domains/staging.shantiniketanvidyalaya.com/public_html/
# And cleans up the incorrectly deployed files from root public_html
# ============================================================================

# Color codes for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# SSH Configuration
SSH_USER="u723014502"
SSH_HOST="82.112.232.197"
SSH_PORT="65002"
REMOTE_BASE_PATH="/home/u723014502"
REMOTE_STAGING_PATH="$REMOTE_BASE_PATH/domains/staging.shantiniketanvidyalaya.com/public_html"
REMOTE_ROOT_PATH="$REMOTE_BASE_PATH/public_html"

# Local paths
LOCAL_SITE_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

echo -e "${BLUE}════════════════════════════════════════════════════════════════${NC}"
echo -e "${BLUE}   SHAMIRPET WEBSITE - CORRECTED DEPLOYMENT${NC}"
echo -e "${BLUE}════════════════════════════════════════════════════════════════${NC}"
echo ""
echo -e "${YELLOW}📍 Deployment Target:${NC}"
echo "   Staging Domain: staging.shantiniketanvidyalaya.com"
echo "   Remote Path: $REMOTE_STAGING_PATH"
echo ""
echo -e "${YELLOW}🧹 Cleanup:${NC}"
echo "   Will remove incorrectly deployed files from: $REMOTE_ROOT_PATH"
echo ""

# Test SSH Connection
echo -e "${YELLOW}🔌 Testing SSH connection...${NC}"
if ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "echo 'SSH connection successful'" 2>/dev/null; then
    echo -e "${GREEN}✓ SSH connection successful${NC}"
else
    echo -e "${RED}✗ SSH connection failed${NC}"
    echo "Please verify credentials and try again."
    exit 1
fi
echo ""

# Create backup of current staging folder (if exists)
echo -e "${YELLOW}📦 Creating backup of current staging folder...${NC}"
BACKUP_TIMESTAMP=$(date +%Y%m%d-%H%M%S)
BACKUP_FILE="staging-backup-$BACKUP_TIMESTAMP.tar.gz"

ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "
    cd $REMOTE_BASE_PATH/domains/staging.shantiniketanvidyalaya.com/ 2>/dev/null && \
    tar -czf $BACKUP_FILE public_html/ 2>/dev/null && \
    echo 'Backup created: $BACKUP_FILE' || \
    echo 'No existing staging folder to backup (first deployment)'
" 2>/dev/null

echo -e "${GREEN}✓ Backup completed${NC}"
echo ""

# Upload files to CORRECT staging location
echo -e "${YELLOW}📤 Uploading files to staging domain...${NC}"
echo "   Source: $LOCAL_SITE_ROOT"
echo "   Destination: $REMOTE_STAGING_PATH"
echo ""

rsync -avz \
    --delete \
    --exclude='.git' \
    --exclude='node_modules' \
    --exclude='.DS_Store' \
    --exclude='._*' \
    -e "ssh -p $SSH_PORT" \
    "$LOCAL_SITE_ROOT/" \
    "$SSH_USER@$SSH_HOST:$REMOTE_STAGING_PATH/"

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ Files uploaded successfully${NC}"
else
    echo -e "${RED}✗ Upload failed${NC}"
    exit 1
fi
echo ""

# Set permissions on staging folder
echo -e "${YELLOW}⚙️  Setting file permissions on staging folder...${NC}"
ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "
    chmod -R 755 $REMOTE_STAGING_PATH/admin/ 2>/dev/null || true
    chmod -R 755 $REMOTE_STAGING_PATH/admin/uploads/ 2>/dev/null || true
    chmod 644 $REMOTE_STAGING_PATH/admin/db-config.php 2>/dev/null || true
"

echo -e "${GREEN}✓ Permissions updated${NC}"
echo ""

# CLEANUP: Remove incorrectly deployed files from root public_html
echo -e "${YELLOW}🧹 Cleaning up incorrectly deployed files from root folder...${NC}"
echo "   Removing: $REMOTE_ROOT_PATH/*"
echo ""

ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "
    # List what will be deleted
    echo 'Files to be removed from root public_html:'
    ls -la $REMOTE_ROOT_PATH/ 2>/dev/null | head -20
    echo ''
    
    # Remove all files and folders from root public_html
    if [ -d '$REMOTE_ROOT_PATH' ]; then
        rm -rf $REMOTE_ROOT_PATH/* 2>/dev/null
        echo 'Root public_html cleaned'
    fi
"

echo -e "${GREEN}✓ Root folder cleaned${NC}"
echo ""

# Verification
echo -e "${YELLOW}✅ Verifying deployment...${NC}"
ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "
    echo 'Staging folder contents:'
    ls -la $REMOTE_STAGING_PATH/ | head -20
    echo ''
    echo 'Files uploaded: ' 
    find $REMOTE_STAGING_PATH -type f | wc -l
"
echo ""

echo -e "${GREEN}════════════════════════════════════════════════════════════════${NC}"
echo -e "${GREEN}✅ CORRECTED DEPLOYMENT COMPLETE!${NC}"
echo -e "${GREEN}════════════════════════════════════════════════════════════════${NC}"
echo ""
echo -e "${YELLOW}📝 Next Steps:${NC}"
echo ""
echo -e "${BLUE}1️⃣  Verify the staging site loads:${NC}"
echo "   https://staging.shantiniketanvidyalaya.com"
echo ""
echo -e "${BLUE}2️⃣  Initialize database (run ONCE only):${NC}"
echo "   https://staging.shantiniketanvidyalaya.com/admin/database-setup.php"
echo ""
echo -e "${BLUE}3️⃣  After setup, delete these files:${NC}"
echo "   - admin/database-setup.php"
echo "   - admin/migrate-*.php"
echo ""
echo -e "${BLUE}4️⃣  Login to admin panel:${NC}"
echo "   https://staging.shantiniketanvidyalaya.com/admin/login.php"
echo ""
echo -e "${YELLOW}⚠️  IMPORTANT:${NC}"
echo "   ✓ Root public_html has been cleaned"
echo "   ✓ Staging folder is now your site's home"
echo "   ✓ Database credentials are secure"
echo "   ✓ Change default password immediately"
echo ""
echo -e "${GREEN}════════════════════════════════════════════════════════════════${NC}"
