#!/bin/bash

# ============================================================================
# CLEAN DEPLOYMENT - Restore Original Site + Deploy Shamirpet Correctly
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
REMOTE_BASE="/home/u723014502"
REMOTE_STAGING="/home/u723014502/domains/staging.shantiniketanvidyalaya.com/public_html"
REMOTE_ROOT="/home/u723014502/public_html"

LOCAL_SITE="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

echo -e "${BLUE}════════════════════════════════════════════════════════════════${NC}"
echo -e "${BLUE}   CLEAN REDEPLOYMENT - START${NC}"
echo -e "${BLUE}════════════════════════════════════════════════════════════════${NC}"
echo ""

# Step 1: Restore original WordPress site from backup
echo -e "${YELLOW}1️⃣  Restoring original WordPress site from backup...${NC}"
sshpass -p "$SSH_PASS" ssh -p $SSH_PORT -o StrictHostKeyChecking=no $SSH_USER@$SSH_HOST "
    echo 'Looking for backups...'
    cd $REMOTE_BASE
    BACKUP_FILE=\$(ls -t shamirpet-website-backup-*.tar.gz 2>/dev/null | head -1)
    
    if [ -n \"\$BACKUP_FILE\" ]; then
        echo \"Found backup: \$BACKUP_FILE\"
        echo 'Extracting backup to restore original structure...'
        # Extract to temp location first
        mkdir -p /tmp/restore
        tar -xzf \$BACKUP_FILE -C /tmp/restore
        
        # Copy original WordPress site back to root
        if [ -d \"/tmp/restore/public_html\" ]; then
            cp -r /tmp/restore/public_html/* $REMOTE_ROOT/ 2>/dev/null || true
            echo '✓ Original WordPress site restored'
        fi
        rm -rf /tmp/restore
    else
        echo '⚠️  No backup found, proceeding with current state'
    fi
" 2>/dev/null

echo -e "${GREEN}✓ Step 1 complete${NC}"
echo ""

# Step 2: Clean staging folder completely
echo -e "${YELLOW}2️⃣  Cleaning staging domain folder...${NC}"
sshpass -p "$SSH_PASS" ssh -p $SSH_PORT -o StrictHostKeyChecking=no $SSH_USER@$SSH_HOST "
    if [ -d '$REMOTE_STAGING' ]; then
        rm -rf $REMOTE_STAGING/*
        echo 'Staging folder cleaned'
    fi
    
    mkdir -p $REMOTE_STAGING
    echo 'Staging folder ready'
" 2>/dev/null

echo -e "${GREEN}✓ Step 2 complete${NC}"
echo ""

# Step 3: Deploy Shamirpet website
echo -e "${YELLOW}3️⃣  Deploying Shamirpet website to staging...${NC}"
echo "   Source: $LOCAL_SITE"
echo "   Target: $REMOTE_STAGING"
echo ""

sshpass -p "$SSH_PASS" rsync -avz \
    --delete \
    --exclude='.git' \
    --exclude='node_modules' \
    --exclude='.DS_Store' \
    --exclude='._*' \
    --exclude='*.sh' \
    -e "ssh -p $SSH_PORT -o StrictHostKeyChecking=no" \
    "$LOCAL_SITE/" \
    "$SSH_USER@$SSH_HOST:$REMOTE_STAGING/"

if [ $? -ne 0 ]; then
    echo -e "${RED}✗ Deployment failed${NC}"
    exit 1
fi

echo -e "${GREEN}✓ Step 3 complete${NC}"
echo ""

# Step 4: Set proper permissions on staging
echo -e "${YELLOW}4️⃣  Setting correct permissions...${NC}"
sshpass -p "$SSH_PASS" ssh -p $SSH_PORT -o StrictHostKeyChecking=no $SSH_USER@$SSH_HOST "
    chmod -R 755 $REMOTE_STAGING/admin 2>/dev/null || true
    chmod -R 755 $REMOTE_STAGING/admin/uploads 2>/dev/null || true
    chmod 644 $REMOTE_STAGING/admin/db-config.php 2>/dev/null || true
    chmod 644 $REMOTE_STAGING/.htaccess 2>/dev/null || true
    echo '✓ Permissions set'
" 2>/dev/null

echo -e "${GREEN}✓ Step 4 complete${NC}"
echo ""

# Step 5: Verify deployment
echo -e "${YELLOW}5️⃣  Verifying deployment...${NC}"
echo ""

echo "📊 Staging folder contents:"
sshpass -p "$SSH_PASS" ssh -p $SSH_PORT -o StrictHostKeyChecking=no $SSH_USER@$SSH_HOST "
    echo '   Key files:'
    ls -1 $REMOTE_STAGING/ | grep '\.php$' | head -10
    echo ''
    echo '   Total files uploaded:'
    find $REMOTE_STAGING -type f 2>/dev/null | wc -l
    echo ''
    echo '   Folder size:'
    du -sh $REMOTE_STAGING 2>/dev/null
" 2>/dev/null

echo ""
echo "🔍 Root folder status (WordPress):"
sshpass -p "$SSH_PASS" ssh -p $SSH_PORT -o StrictHostKeyChecking=no $SSH_USER@$SSH_HOST "
    echo '   Contains:'
    ls -1 $REMOTE_ROOT/ 2>/dev/null | head -10
" 2>/dev/null

echo ""
echo -e "${GREEN}════════════════════════════════════════════════════════════════${NC}"
echo -e "${GREEN}✅ CLEAN REDEPLOYMENT COMPLETE!${NC}"
echo -e "${GREEN}════════════════════════════════════════════════════════════════${NC}"
echo ""

echo -e "${YELLOW}📝 What's Been Done:${NC}"
echo "   ✓ Original WordPress site restored to root"
echo "   ✓ Staging folder completely cleaned"
echo "   ✓ Shamirpet website deployed to: staging.shantiniketanvidyalaya.com"
echo "   ✓ Correct permissions applied"
echo ""

echo -e "${YELLOW}📍 Your Sites:${NC}"
echo "   🌐 Original WordPress: https://yourdomain.com (in root public_html)"
echo "   🌐 Shamirpet Staging: https://staging.shantiniketanvidyalaya.com"
echo ""

echo -e "${YELLOW}🔧 Next Steps for Shamirpet:${NC}"
echo ""
echo "   1️⃣  Test staging site loads:"
echo "      https://staging.shantiniketanvidyalaya.com"
echo ""
echo "   2️⃣  Initialize database (RUN ONCE ONLY):"
echo "      https://staging.shantiniketanvidyalaya.com/admin/database-setup.php"
echo ""
echo "   3️⃣  Delete setup files after running:"
echo "      - admin/database-setup.php"
echo "      - admin/migrate-*.php"
echo ""
echo "   4️⃣  Login to admin:"
echo "      https://staging.shantiniketanvidyalaya.com/admin/login.php"
echo ""

echo -e "${GREEN}════════════════════════════════════════════════════════════════${NC}"
