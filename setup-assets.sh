#!/bin/bash

# Create assets directory if it doesn't exist
mkdir -p ../assets/book_publisher

# Set proper permissions
chmod -R 775 ../assets/book_publisher 2>/dev/null || true

echo "✓ Assets directory created at ../assets/book_publisher"
echo "✓ Ready to use with Docker Compose"
