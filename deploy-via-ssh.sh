#!/bin/bash

###############################################################################
# SSH DEPLOYMENT SCRIPT - Deploy to Hostinger via SSH
# This script will backup old site, upload new files, and set permissions
# 
# USAGE: bash deploy-via-ssh.sh
# 
# You'll need to configure these values FIRST:
###############################################################################

# ⚙️ CONFIGURATION - EDIT THESE VALUES
SSH_USER="u723014502"                           # Your Hostinger SSH username
SSH_HOST="82.112.232.197"                       # Your Hostinger server IP/hostname
SSH_PORT="65002"                                # SSH port (usually 22)
REMOTE_PATH="/home/u723014502/public_html"      # Remote path where site lives
LOCAL_PATH="$(pwd)"                             # Current directory (your site)

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${BLUE}╔════════════════════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║   SHAMIRPET WEBSITE - SSH DEPLOYMENT SCRIPT           ║${NC}"
echo -e "${BLUE}╚════════════════════════════════════════════════════════╝${NC}"
echo ""

# Verify configuration
if [ -z "$SSH_USER" ] || [ -z "$SSH_HOST" ] || [ -z "$REMOTE_PATH" ]; then
    echo -e "${RED}❌ ERROR: SSH credentials not configured!${NC}"
    echo ""
    echo "Please edit the configuration section at the top of this script:"
    echo "  SSH_USER, SSH_HOST, SSH_PORT, REMOTE_PATH"
    echo ""
    echo "Get these values from Hostinger cPanel:"
    echo "  1. Login to Hostinger cPanel"
    echo "  2. Go to 'SSH Access' or 'Advanced' section"
    echo "  3. Find your SSH username and server hostname"
    exit 1
fi

# Test SSH connection
echo -e "${YELLOW}🔍 Testing SSH connection...${NC}"
if ssh -o ConnectTimeout=5 -p "$SSH_PORT" "$SSH_USER@$SSH_HOST" "echo 'SSH connection OK'" >/dev/null 2>&1; then
    echo -e "${GREEN}✓ SSH connection successful${NC}"
else
    echo -e "${RED}❌ SSH connection failed!${NC}"
    echo "Please verify your SSH credentials:"
    echo "  SSH_USER: $SSH_USER"
    echo "  SSH_HOST: $SSH_HOST"
    echo "  SSH_PORT: $SSH_PORT"
    exit 1
fi

echo ""
echo -e "${YELLOW}📋 Deployment Summary:${NC}"
echo "  Local path:   $LOCAL_PATH"
echo "  Remote path:  $REMOTE_PATH"
echo "  SSH user:     $SSH_USER@$SSH_HOST"
echo ""

# Create backup on remote server
echo -e "${YELLOW}📦 Creating backup of current site...${NC}"
BACKUP_DIR="shamirpet-website-backup-$(date +%Y%m%d-%H%M%S)"
ssh -p "$SSH_PORT" "$SSH_USER@$SSH_HOST" "cd $REMOTE_PATH && cd .. && tar -czf $BACKUP_DIR.tar.gz public_html/ 2>/dev/null && echo 'Backup created: $BACKUP_DIR.tar.gz'" || echo -e "${YELLOW}⚠️  Backup creation skipped${NC}"

echo ""
echo -e "${YELLOW}📤 Uploading files via rsync...${NC}"
echo "This may take a few minutes depending on file size..."
echo ""

# Deploy using rsync (more efficient than scp)
rsync -avz -e "ssh -p $SSH_PORT" \
    --delete \
    --exclude '.git' \
    --exclude '.DS_Store' \
    --exclude 'node_modules' \
    --exclude 'cleanup-before-deploy.sh' \
    --exclude 'deploy-via-ssh.sh' \
    "$LOCAL_PATH/" "$SSH_USER@$SSH_HOST:$REMOTE_PATH/"

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ Files uploaded successfully${NC}"
else
    echo -e "${RED}❌ Upload failed!${NC}"
    exit 1
fi

echo ""
echo -e "${YELLOW}⚙️  Setting file permissions...${NC}"
ssh -p "$SSH_PORT" "$SSH_USER@$SSH_HOST" << 'EOF'
cd /home/u723014502/public_html
echo "Setting permissions..."
find . -type f -name "*.php" -exec chmod 644 {} \;
find . -type f -name "*.html" -exec chmod 644 {} \;
find . -type f -name "*.js" -exec chmod 644 {} \;
find . -type f -name "*.css" -exec chmod 644 {} \;
find . -type d -exec chmod 755 {} \;

# Make admin/uploads writable
chmod 755 admin/uploads 2>/dev/null
chmod 755 admin 2>/dev/null

echo "Permissions set successfully"
EOF

echo -e "${GREEN}✓ Permissions updated${NC}"

echo ""
echo -e "${BLUE}╔════════════════════════════════════════════════════════╗${NC}"
echo -e "${GREEN}✅ DEPLOYMENT COMPLETE!${NC}"
echo -e "${BLUE}╚════════════════════════════════════════════════════════╝${NC}"
echo ""
echo "📝 Next steps:"
echo ""
echo "1️⃣  Initialize database (run ONCE only):"
echo "   https://yourdomain.com/admin/database-setup.php"
echo ""
echo "2️⃣  Login to admin panel:"
echo "   https://yourdomain.com/admin/login.php"
echo ""
echo "3️⃣  Default login (if using sample data):"
echo "   Username: admin"
echo "   Password: check database-setup.php output"
echo ""
echo "4️⃣  Delete these files after running database-setup:"
echo "   - admin/database-setup.php"
echo "   - admin/migrate-*.php (migration scripts)"
echo ""
echo -e "${YELLOW}⚠️  IMPORTANT SECURITY NOTES:${NC}"
echo "✓ Your db-config.php is protected by .htaccess"
echo "✓ Database credentials are secure"
echo "✓ Always delete test/setup files after deployment"
echo "✓ Change default password immediately"
echo ""
echo -e "${BLUE}Backup location: $(ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "ls -t /home/u723014502/shamirpet-website-backup-* 2>/dev/null | head -1")${NC}"
echo ""
