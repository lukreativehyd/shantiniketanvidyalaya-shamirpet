#!/bin/bash

# ========================================
# Shamirpet Website Deployment Script
# Deploys code + admin folder (excludes images - already on server)
# ========================================

# CONFIGURATION - Update these with your Hostinger details
SSH_USER="u723014502"
SSH_HOST="82.112.232.197"
SSH_PORT="65002"
REMOTE_PATH="/home/u723014502/domains/staging.shantiniketanvidyalaya.com/public_html"  # Staging domain

# Color codes for output
GREEN='\033[0;32m'
BLUE='\033[0;34m'
RED='\033[0;31m'
NC='\033[0m' # No Color

LOCAL_DIR="/Users/apple/Desktop/Shamirpet Website"

# Check if credentials are set
if [ "$SSH_USER" = "your_username" ] || [ "$SSH_HOST" = "your_hostinger_ip_or_domain" ]; then
    echo -e "${RED}❌ ERROR: Please update SSH_USER and SSH_HOST in this script${NC}"
    echo "Open this file and add your Hostinger details"
    exit 1
fi

echo -e "${BLUE}🚀 Starting deployment...${NC}"

# Deploy code + admin (excluding images since they already exist on server)
echo -e "${BLUE}📋 Uploading website code + admin panel (images excluded - already on server)...${NC}"

# Rsync with exclusions for images and unnecessary files
rsync -avz -e "ssh -p $SSH_PORT" \
    --exclude='.git' \
    --exclude='*.code-search' \
    --exclude='node_modules' \
    --exclude='deploy.sh' \
    --exclude='create_placeholders.py' \
    --exclude='ELEMENTOR_CONVERSION_GUIDE.md' \
    --exclude='IMAGES_REQUIRED.md' \
    --exclude='PROJECT_SUMMARY.md' \
    --exclude='QUICKSTART.md' \
    --exclude='README.md' \
    --exclude='ADMIN_README.md' \
    --exclude='ADMIN_DEPLOYMENT_GUIDE.md' \
    --exclude='ADMIN_SYSTEM_IMPLEMENTATION.txt' \
    --exclude='ADMIN_SYSTEM_SUMMARY.md' \
    --exclude='LOCAL_TESTING_GUIDE.md' \
    --exclude='SETUP_GUIDE.md' \
    --exclude='GALLERY_INTEGRATION.md' \
    --exclude='ENQUIRY_TESTING_GUIDE.md' \
    --exclude='assets/images/School Photos/**' \
    --exclude='assets/images/*.jpg' \
    --exclude='assets/images/*.png' \
    --exclude='assets/images/*.webp' \
    --exclude='admin/test_database.db' \
    "$LOCAL_DIR/" \
    "$SSH_USER@$SSH_HOST:$REMOTE_PATH/"

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✅ Deployment successful!${NC}"
    echo -e "${GREEN}📊 Website code + admin panel uploaded${NC}"
    echo -e "${GREEN}🖼️  Images skipped (already on server)${NC}"
else
    echo -e "${RED}❌ Deployment failed. Check your credentials and connection.${NC}"
    exit 1
fi
