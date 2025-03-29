#!/bin/bash

# Define the host entry you want to add
HOST_ENTRY="127.0.0.1 blog.local"

# Check if the entry already exists in /etc/hosts
if ! grep -qF "$HOST_ENTRY" /etc/hosts; then
  echo "Adding blog.local to /etc/hosts..."
  # Append the entry to /etc/hosts (requires sudo privileges)
  echo "$HOST_ENTRY" | sudo tee -a /etc/hosts >/dev/null
else
  echo "blog.local already exists in /etc/hosts."
fi