#!/bin/bash

# ============================================================================
# CLEAN DEPLOYMENT - Shamirpet to Staging (without School Photos)
# ============================================================================

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

SSH_USER="u723014502"
SSH_HOST="82.112.232.197"
SSH_PORT="65002"
SSH_PASS="Snis@13579"
REMOTE_STAGING="/home/u723014502/domains/staging.shantiniketanvidyalaya.com/public_html"

LOCAL_SITE="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

echo -e "${BLUE}════════════════════════════════════════════════════════════════${NC}"
echo -e "${BLUE}   CLEAN DEPLOYMENT - Shamirpet to Staging${NC}"
echo -e "${BLUE}════════════════════════════════════════════════════════════════${NC}"
echo ""

# Step 1: Clean staging folder
echo -e "${YELLOW}1️⃣  Cleaning staging folder...${NC}"
sshpass -p "$SSH_PASS" ssh -p $SSH_PORT -o StrictHostKeyChecking=no $SSH_USER@$SSH_HOST "
    rm -rf $REMOTE_STAGING/*
    mkdir -p $REMOTE_STAGING
    echo '✓ Staging folder cleaned and ready'
" 2>/dev/null

echo -e "${GREEN}✓ Step 1 complete${NC}"
echo ""

# Step 2: Deploy Shamirpet (excluding School Photos)
echo -e "${YELLOW}2️⃣  Deploying Shamirpet website...${NC}"
echo "   Source: $LOCAL_SITE"
echo "   Target: staging.shantiniketanvidyalaya.com"
echo "   Excluding: assets/images/School Photos/"
echo ""

sshpass -p "$SSH_PASS" rsync -avz \
    --delete \
    --exclude='.git' \
    --exclude='node_modules' \
    --exclude='.DS_Store' \
    --exclude='._*' \
    --exclude='*.sh' \
    --exclude='assets/images/School Photos' \
    -e "ssh -p $SSH_PORT -o StrictHostKeyChecking=no" \
    "$LOCAL_SITE/" \
    "$SSH_USER@$SSH_HOST:$REMOTE_STAGING/"

if [ $? -ne 0 ]; then
    echo -e "${RED}✗ Deployment failed${NC}"
    exit 1
fi

echo -e "${GREEN}✓ Step 2 complete${NC}"
echo ""

# Step 3: Set permissions
echo -e "${YELLOW}3️⃣  Setting permissions...${NC}"
sshpass -p "$SSH_PASS" ssh -p $SSH_PORT -o StrictHostKeyChecking=no $SSH_USER@$SSH_HOST "
    chmod -R 755 $REMOTE_STAGING/admin 2>/dev/null || true
    chmod -R 755 $REMOTE_STAGING/admin/uploads 2>/dev/null || true
    chmod 644 $REMOTE_STAGING/admin/db-config.php 2>/dev/null || true
    chmod 644 $REMOTE_STAGING/.htaccess 2>/dev/null || true
" 2>/dev/null

echo -e "${GREEN}✓ Step 3 complete${NC}"
echo ""

# Step 4: Verify
echo -e "${YELLOW}4️⃣  Verifying deployment...${NC}"
echo ""

sshpass -p "$SSH_PASS" ssh -p $SSH_PORT -o StrictHostKeyChecking=no $SSH_USER@$SSH_HOST "
    echo 'Main PHP files:'
    ls -1 $REMOTE_STAGING/*.php | head -10
    echo ''
    echo 'Total files:'
    find $REMOTE_STAGING -type f 2>/dev/null | wc -l
    echo ''
    echo 'Folder size:'
    du -sh $REMOTE_STAGING 2>/dev/null
    echo ''
    echo 'Image folders (excluding School Photos):'
    ls -1 $REMOTE_STAGING/assets/images/Website/ 2>/dev/null | head -15
" 2>/dev/null

echo ""
echo -e "${GREEN}════════════════════════════════════════════════════════════════${NC}"
echo -e "${GREEN}✅ DEPLOYMENT COMPLETE!${NC}"
echo -e "${GREEN}════════════════════════════════════════════════════════════════${NC}"
echo ""

echo -e "${YELLOW}📝 Next Steps:${NC}"
echo ""
echo "   1️⃣  Test the site:"
echo "      https://staging.shantiniketanvidyalaya.com"
echo ""
echo "   2️⃣  Initialize database (RUN ONCE ONLY):"
echo "      https://staging.shantiniketanvidyalaya.com/admin/database-setup.php"
echo ""
echo "   3️⃣  Delete setup files after:"
echo "      - admin/database-setup.php"
echo "      - admin/migrate-*.php"
echo ""
echo "   4️⃣  Login to admin panel:"
echo "      https://staging.shantiniketanvidyalaya.com/admin/login.php"
echo ""
echo -e "${GREEN}════════════════════════════════════════════════════════════════${NC}"
